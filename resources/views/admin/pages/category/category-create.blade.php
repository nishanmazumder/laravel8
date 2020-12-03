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
                            <p class="text-warning">{{Session::get('message')}}. Go to <a class="text-small"
                                    href="{{url('category')}}">Category List</a></p>
                            @endif
                        </div>
                        {{-- <form class="" method="post" action="{{ url('category') }}"> --}}
                        {!! Form::open(['url' => 'category', 'method' => 'POST', 'files'=>true]) !!}

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="category_name" class="form-control form-control-user"
                                    id="" placeholder="Category Name" value="">
                                <small
                                    class="text-danger">{{$errors->has('category_name')?$errors->first('category_name'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                {{-- <input type="text" value="category descrioption" name="calegory_des"> --}}
                                <textarea class="form-control form-control-user" name="calegory_des" id=""
                                    rows="3" placeholder="Category Description"></textarea>
                                <small
                                    class="text-danger">{{$errors->has('calegory_des')?$errors->first('calegory_des'):''}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file form-control-user" name="cat_img" id="">
                                <small
                                    class="text-danger">{{$errors->has('cat_img')?$errors->first('cat_img'):''}}</small>
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

                        <button class="btn btn-primary" type="submit">Submit</button>
                        {{-- </form> --}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
