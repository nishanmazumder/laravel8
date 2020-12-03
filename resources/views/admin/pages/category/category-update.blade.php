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
                            <h1 class="h4 text-gray-900 mb-4">Create Category</h1>
                            @if (Session::get('message'))
                        <p class="text-warning">{{Session::get('message')}}. Go to <a class="text-small" href="{{url('category')}}">Category List</a></p>
                            @endif
                        </div>
                        {{-- <form class="" method="post" action="{{ url('category/'.$category->id.'') }}"> --}}
                            {{-- @csrf --}}
                            {{-- @method('PATCH') --}}

                            {!! Form::open(['url' => 'category/'.$category->id.'', 'method' => 'PUT', 'files'=>true]) !!}

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="category_name" class="form-control form-control-user"
                                        id="catName" placeholder="Category Name" value="{{$category->category_name}}">
                                        <small
                                    class="text-danger">{{$errors->has('category_name')?$errors->first('category_name'):''}}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="calegory_des" class="form-control form-control-user"
                                        id="catName" placeholder="Category Description" value="{{$category->calegory_des}}">
                                        <small
                                    class="text-danger">{{$errors->has('calegory_des')?$errors->first('calegory_des'):''}}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control-file form-control-user" name="cat_img" id="catImg">
                                    <small
                                        class="text-danger">{{$errors->has('cat_img')?$errors->first('cat_img'):''}}</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select name="pub_status" class="form-control form-control-user" id="">
                                        <option {{$category->pub_status == 0 ? 'selected':''}} value="0">Publish</option>
                                        <option {{$category->pub_status == 1 ? 'selected':''}} value="1">Unpublish</option>
                                    </select>
                                    <small
                                    class="text-danger">{{$errors->has('pub_status')?$errors->first('pub_status'):''}}</small>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            {!! Form::close() !!}
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
