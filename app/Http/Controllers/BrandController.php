<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Intervention\Image\Facades\Image as Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.pages.brand.brand-list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.brand-create');
    }

    // Validation
    protected function brandValidation($request)
    {
        $this->validate($request, [
            'brand_name' => 'required|max:20|min:2|regex:/^[\pL\s\-]/u',
            'brand_des' => 'required',
            'brand_img.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pub_status' => 'required'
        ]);
    }

    protected function brandImgupload($request){
        if($request->hasFile('brand_img')){
            $file = $request->brand_img;
            $imgName = $request->brand_name.'-'.time().'.'.$file->getClientOriginalExtension();
            $dir = public_path('/uploads/'.$imgName);
            Image::make($file)->save($dir);

            return $imgName;
        }
    }

    protected function brandDataSave($request, $brandImg){
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_des = $request->brand_des;
        $brand->brand_img = $brandImg;
        $brand->pub_status = $request->pub_status;
        $brand->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->brandValidation($request);
        $brandImg = $this->brandImgupload($request);
        $this->brandDataSave($request, $brandImg);

        return Redirect::to('brand')->with('message', 'Brand Created');
    }

    //Publish & Unpublish

    public function unpublish($id){
        $pub_status = Brand::find($id);
        $pub_status->pub_status = 1;
        $pub_status->save();

        return Redirect::to('brand')->with('message', 'Brand Unpublish');
    }

    public function publish($id){
        $pub_status = Brand::find($id);
        $pub_status->pub_status = 0;
        $pub_status->save();

        return Redirect::to('brand')->with('message', 'Brand publish');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.pages.brand.brand-update', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->brandValidation($request);
        unlink(public_path('/uploads/'.$brand->brand_img));

        $brandImg = $this->brandImgupload($request);

        $brand->brand_name = $request->brand_name;
        $brand->brand_des = $request->brand_des;
        $brand->brand_img = $brandImg;
        $brand->pub_status = $request->pub_status;
        $brand->save();

        return Redirect::to('brand/'.$brand->id.'/edit')->with('message', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return Redirect::to('brand')->with('message', 'Data Deleted');
    }
}
