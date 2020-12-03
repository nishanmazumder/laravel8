<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = Category::all();
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.pages.category.category-list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function categoryValidation($req)
    {
        $this->validate($req, [
            'category_name' => 'required|max:50|min:2|regex:/^[\pL\s\-]/u',
            'calegory_des' => 'required',
            'cat_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pub_status' => 'required'
        ]);
    }

    protected function categoryImgUpload($req)
    {
        // $catgoryImg = $req->file('cat_img');
        // $imgName = $catgoryImg->getClientOriginalName();
        // //$imgDir = base_path() . '/public/uploads';
        // $imgDir = public_path() . '/uploads';
        // $imgUri = $imgDir . $imgName;
        // $catgoryImg->move($imgDir, $imgName);

        // return $imgUri;

        if ($req->hasFile('cat_img')) {
            $file = $req->cat_img;
            $catImg = $req->category_name.'-'.time().'.'.$file->getClientOriginalExtension();
            $dir = public_path().'/uploads/'.$catImg;
            Image::make($file)->save($dir);
        }

        return $catImg;
    }

    protected function categoryDataSave($req, $catImg)
    {
        $category = new Category();
        $category->category_name = $req->category_name;
        $category->calegory_des = $req->calegory_des;
        $category->pub_status = $req->pub_status;

        $category->cat_img = $catImg;

        //return $imgUload;

        $category->save();
    }

    public function store(Request $request)
    {
        $this->categoryValidation($request);

        $catImg = $this->categoryImgUpload($request);

        $this->categoryDataSave($request, $catImg);

        //dd($imgUload);
        //return $request->all();



        //Category::create($request->all());

        // DB::table('categories')->insert([
        //     'category_name' => $request->category_name,
        //     'calegory_des' => $request->calegory_des,
        //     'pub_status' => $request->pub_status,
        // ]);

        return redirect('category/create')->with('message', 'Category Created');
    }

    //Categero Publication
    public function unpublish($id)
    {
        $category = Category::find($id);
        $category->pub_status = 1;
        $category->save();

        return redirect('category')->with('message', 'Category unpublish');
    }

    public function publish($id)
    {
        $category = Category::find($id);
        $category->pub_status = 0;
        $category->save();

        return redirect('category')->with('message', 'Category unpublish');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.category.category-update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->categoryValidation($request);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->calegory_des = $request->calegory_des;
        $catImg = $this->categoryImgUpload($request);
        $category->cat_img = $catImg;
        $category->pub_status = $request->pub_status;

        $category->save();


        return Redirect::to('category')->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return Redirect::to('category');
    }
}
