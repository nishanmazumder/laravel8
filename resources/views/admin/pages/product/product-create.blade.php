@extends('admin.master')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-4">Create Product</h1>
                            @if (Session::get('message'))
                            <p class="text-warning">{{Session::get('message')}}. Go to <a class="text-small"
                                    href="{{url('product')}}">Product List</a></p>
                            @endif
                        </div>
                        {{-- <form class="" method="post" action="{{ url('category') }}"> --}}
                        {!! Form::open(['url' => 'product', 'method' => 'POST', 'files'=>true]) !!}

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_name" class="form-control form-control-user"
                                    placeholder="Product Name" value="T-shirt">
                                <small
                                    class="text-danger">{{$errors->has('product_name')?$errors->first('product_name'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_price" class="form-control form-control-user"
                                    placeholder="Product Price" value="500">
                                <small
                                    class="text-danger">{{$errors->has('product_price')?$errors->first('product_price'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="category_id" class="form-control form-control-user" id="">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                                <small
                                    class="text-danger">{{$errors->has('category_id')?$errors->first('category_id'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="brand_id" class="form-control form-control-user" id="">
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                <small
                                    class="text-danger">{{$errors->has('pub_status')?$errors->first('pub_status'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control form-control-user editor" name="product_short_des" id=""
                                    placeholder="Product Short Description"></textarea>
                                <small
                                    class="text-danger">{{$errors->has('product_short_des')?$errors->first('product_short_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control form-control-user editor" name="product_long_des" id=""
                                    placeholder="Product Long Description"></textarea>
                                <small
                                    class="text-danger">{{$errors->has('product_long_des')?$errors->first('product_long_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file form-control-user" name="product_img" id="">
                                <small
                                    class="text-danger">{{$errors->has('product_img')?$errors->first('product_img'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_quantity" class="form-control form-control-user"
                                    placeholder="Product Quantity" value="10">
                                <small
                                    class="text-danger">{{$errors->has('product_quantity')?$errors->first('product_quantity'):''}}</small>
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
