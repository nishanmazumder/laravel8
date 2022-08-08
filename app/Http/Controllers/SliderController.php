<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.pages.slider.slider-list', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.slider-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->slider_field_validation($request);
        $sliderImg = $this->sliderImgUpload($request);
        $this->sliderDataSave($request, $sliderImg);

        return Redirect::to('slider')->with('message', 'Slider Created');
    }

    protected function sliderDataSave($request, $sliderImg){
        $slider = new Slider();
        $slider->slider_name = $request->slider_name;
        $slider->slider_name_color = $request->slider_name_color;
        $slider->slider_subtitle = $request->slider_subtitle;
        $slider->slider_btn = $request->slider_btn;
        $slider->slider_btn_url = $request->slider_btn_url;
        $slider->slider_img = $sliderImg;
        $slider->pub_status = $request->pub_status;
        $slider->save();
    }

    protected function sliderImgUpload($request){
        if($request->hasFile('slider_img')){
            $file = $request->slider_img;
            $imgName = $request->slider_name.'-'.time().'.'.$file->getClientOriginalExtension();
            $dir = public_path('/uploads/'.$imgName);
            Image::make($file)->save($dir);

            return $imgName;
        }

    }

    protected function slider_field_validation($request){
        $this->validate($request, [
            'slider_name' => 'required|max:20|min:2|regex:/^[\pL\s\-]/u',
            'slider_name_color' => 'required|max:20|min:2|regex:/^[\pL\s\-]/u',
            'slider_subtitle' => 'required|max:50|min:2|regex:/^[\pL\s\-]/u',
            'slider_btn' => 'required',
            'slider_btn_url' => 'required',
            'slider_img.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pub_status' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    public function publish($id){
        $slider = Slider::find($id);
        $slider->pub_status = 0;
        $slider->save();

        return Redirect::to('slider')->with('message', 'Slider publish!');
    }

    public function unpublish($id){
        $slider = Slider::find($id);
        $slider->pub_status = 1;
        $slider->save();

        return Redirect::to('slider')->with('message', 'Slider unpublish!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        echo '<pre>';
        print($slider);
        //return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return Redirect::to('slider')->with('message', 'Slider Deleted!');
    }
}
