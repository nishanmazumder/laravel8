@extends('admin.master')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row item-align-middle">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-4">Create Brand</h1>
                            @if (Session::get('message'))
                            <p class="text-warning">{{Session::get('message')}}. Go to <a class="text-small"
                                    href="{{url('brand')}}">Brand List</a></p>
                            @endif
                        </div>
                        {{-- <form class="" method="post" action="{{ url('category') }}"> --}}
                        {!! Form::open(['url' => 'brand', 'method' => 'POST', 'files'=>true]) !!}

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="brand_name" class="form-control form-control-user"
                                    id="" placeholder="Brand Name" value="">
                                <small
                                    class="text-danger">{{$errors->has('brand_name')?$errors->first('brand_name'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                {{-- <input type="text" value="Brand descrioption" name="brand_des" id="brandDes"> --}}
                                <textarea class="form-control form-control-user" name="brand_des" id=""
                                    rows="3" placeholder="Brand Description"></textarea>
                                <small
                                    class="text-danger">{{$errors->has('brand_des')?$errors->first('brand_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file form-control-user" name="brand_img"
                                    id="">
                                <small
                                    class="text-danger">{{$errors->has('brand_img')?$errors->first('brand_img'):''}}</small>
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
