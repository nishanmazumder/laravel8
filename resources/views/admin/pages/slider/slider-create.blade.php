@extends('admin.master')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row item-align-middle">
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-4">Create Slider</h1>
                            @if (Session::get('message'))
                            <p class="text-warning">{{Session::get('message')}}. Go to <a class="text-small"
                                    href="{{url('slider')}}">Slider List</a></p>
                            @endif
                        </div>

                        {!! Form::open(['url' => 'slider', 'method' => 'POST', 'files'=>true]) !!}

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="slider_name" class="form-control form-control-user"
                                    id="" placeholder="Slider Name" value="">
                                <small
                                    class="text-danger">{{$errors->has('slider_name')?$errors->first('slider_name'):''}}</small>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" name="slider_name_color" class="form-control form-control-user"
                                    id="" placeholder="Slider Name Color" value="">
                                <small
                                    class="text-danger">{{$errors->has('slider_name_color')?$errors->first('slider_name_color'):''}}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="slider_subtitle" class="form-control form-control-user"
                                    id="" placeholder="Slider Subtitle" value="">
                                <small
                                    class="text-danger">{{$errors->has('slider_subtitle')?$errors->first('slider_subtitle'):''}}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="slider_btn" class="form-control form-control-user"
                                    id="" placeholder="Slider Button" value="">
                                <small
                                    class="text-danger">{{$errors->has('slider_btn')?$errors->first('slider_btn'):''}}</small>
                            </div>

                            <div class="col-sm-6">
                                <input type="url" name="slider_btn_url" class="form-control form-control-user"
                                    id="" placeholder="Slider Button URL" value="">
                                <small
                                    class="text-danger">{{$errors->has('slider_btn_url')?$errors->first('slider_btn_url'):''}}</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file form-control-user" name="slider_img"
                                    id="">
                                <small
                                    class="text-danger">{{$errors->has('slider_img')?$errors->first('slider_img'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="pub_status" class="form-control form-control-user" id="">
                                    <option value="0">Publish</option>
                                    <option value="1">Unpublish</option>
                                </select>
                                <small
                                    class="text-danger">{{$errors->has('pub_status')?$errors->first('pub_status'):''}}</small>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                        {{-- </form> --}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
