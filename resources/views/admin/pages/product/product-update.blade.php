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
                        {!! Form::open(['url' => 'product/'.$product->id.'', 'method' => 'PUT', 'files'=>true, 'name'=>'productUpdate']) !!}

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_name" class="form-control form-control-user"
                                    placeholder="Product Name" value="{{$product->product_name}}">
                                <small
                                    class="text-danger">{{$errors->has('product_name')?$errors->first('product_name'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_price" class="form-control form-control-user"
                                    placeholder="Product Price" value="{{$product->product_price}}">
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
                                    placeholder="">{{$product->product_short_des}}</textarea>
                                <small
                                    class="text-danger">{{$errors->has('product_short_des')?$errors->first('product_short_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control form-control-user editor" name="product_long_des" id=""
                                    placeholder="">{{$product->product_long_des}}</textarea>
                                <small
                                    class="text-danger">{{$errors->has('product_long_des')?$errors->first('product_long_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <img class="img-thumbnail" src="{{asset('public/uploads')}}{{'/'.$product->product_img}}" alt="{{$product->product_name}}">
                                <input type="file" class="form-control-file form-control-user" name="product_img" id="">
                                <small
                                    class="text-danger">{{$errors->has('product_img')?$errors->first('product_img'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="product_quantity" class="form-control form-control-user"
                                    placeholder="" value="{{$product->product_quantity}}">
                                <small
                                    class="text-danger">{{$errors->has('product_quantity')?$errors->first('product_quantity'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="pub_status" class="form-control form-control-user" id="">
                                    <option {{$product->pub_status == 0 ? 'selected':''}} value="0">Publish</option>
                                    <option {{$product->pub_status == 1 ? 'selected':''}} value="1">Unpublish</option>
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

<script>
    document.forms['productUpdate'].elements['category_id'].value = '{{$product->category_id}}';
    document.forms['productUpdate'].elements['brand_id'].value = '{{$product->brand_id}}';
</script>

@endsection
