@extends('admin.master')

@section('content')
<div class="container-fluid">
    <!-- Category -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                {{-- <div id="nmMessage" class="alert alert-warning" role="alert"></div> --}}

                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">All Slider List</h6>
                    @if (Session::get('message'))
                    <p class="text-warning">{{Session::get('message')}}</p>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a href="{{url('slider/create')}}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add Slider</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Title Color</th>
                            <th>Subtitle</th>
                            <th>Button</th>
                            <th>Button Url</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Title Color</th>
                            <th>Subtitle</th>
                            <th>Button</th>
                            <th>Button Url</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$slider->slider_name}}</td>
                            <td>{{$slider->slider_name_color}}</td>
                            <td>{{$slider->slider_subtitle}}</td>
                            <td>{{$slider->slider_btn}}</td>
                            <td>{{$slider->slider_btn_url}}</td>
                            <td class="text-center"><img src="{{asset('uploads')}}{{'/'.$slider->slider_img}}"
                                    alt="" width="60px"></td>
                            <td>{{$slider->pub_status == 0 ? 'Publish' : 'Unpublish'}}</td>
                            <td class="text-center">

                                <table>
                                    <tr>
                                        <td class="border-0 m-0 p-0">
                                            @if ($slider->pub_status == 0)
                                            <a href="{{url('slider-unpublish', ['id'=>$slider->id])}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @else
                                            <a href="{{url('slider-publish', ['id'=>$slider->id])}}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td style="padding: 0px 3px" class="border-0 m-0">
                                            <a href="{{url('slider/'.$slider->id.'/edit')}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="border-0 m-0 p-0">
                                            {!! Form::open(['url'=>'slider/'.$slider->id.'', 'method'=>'DELETE',
                                            'id'=>'nmFormDel']) !!}
                                            <button type="submit" href="" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
