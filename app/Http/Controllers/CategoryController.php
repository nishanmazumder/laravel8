<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    protected function categoryValidation($req)
    {
        $this->validate($req, [
            'category_name' => 'required|max:20|min:2|regex:/^[\pL\s\-]/u',
            'calegory_des' => 'required',
            'cat_img.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pub_status' => 'required'
        ]);
    }

    protected function categoryImgUpload($req)
    {
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

        $category->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categoryValidation($request);
        $catImg = $this->categoryImgUpload($request);
        $this->categoryDataSave($request, $catImg);

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

        return redirect('category')->with('message', 'Category publish');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.pages.category.category-update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        $this->categoryValidation($request);
        unlink(public_path('/uploads/'.$category->cat_img));
        $catImg = $this->categoryImgUpload($request);

        $category->category_name = $request->category_name;
        $category->calegory_des = $request->calegory_des;
        $category->cat_img = $catImg;
        $category->pub_status = $request->pub_status;
        $category->save();

        return redirect('/category')->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('message', 'Data Deleted');
    }
}
