@extends('admin.master')

@section('content')
<div class="container-fluid">
    <!-- Category -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                {{-- <div id="nmMessage" class="alert alert-warning" role="alert"></div> --}}

                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">All Caegory List</h6>
                    @if (Session::get('message'))
                    <p class="text-warning">{{Session::get('message')}}</p>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a href="{{url('category/create')}}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add Category</span>
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
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Count</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Count</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->calegory_des}}</td>
                        <td class="text-center"><img src="{{asset('uploads')}}{{'/'.$category->cat_img}}" alt="" width="60px"></td>
                            <td>count</td>
                            <td>{{$category->pub_status == 0 ? 'Publish' : 'Unpublish'}}</td>
                            <td class="text-center">

                                <table>
                                    <tr>
                                        <td class="border-0 m-0 p-0">
                                            @if ($category->pub_status == 0)
                                            <a href="{{url('cat-unpublish', ['id'=>$category->id])}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @else
                                            <a href="{{url('cat-publish', ['id'=>$category->id])}}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td style="padding: 0px 3px" class="border-0 m-0">
                                            <a href="{{url('category/'.$category->id.'/edit')}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="border-0 m-0 p-0">
                                            <form action="{{url('category/'.$category->id.'')}}" method="post"
                                                id="nmFormDel">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
