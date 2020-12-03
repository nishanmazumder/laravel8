@extends('admin.master')

@section('content')
<div class="container-fluid">
    <!-- Category -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                {{-- <div id="nmMessage" class="alert alert-warning" role="alert"></div> --}}

                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">All Product List</h6>
                    @if (Session::get('message'))
                    <p class="text-warning">{{Session::get('message')}}</p>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a href="{{url('product/create')}}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add Product</span>
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
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td class="text-center"><img src="{{asset('uploads')}}{{'/'.$product->product_img}}"
                                    alt="" width="60px"></td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->pub_status == 0 ? 'Publish' : 'Unpublish'}}</td>
                            <td class="text-center">

                                <table>
                                    <tr>
                                        <td class="border-0 m-0 p-0">
                                            @if ($product->pub_status == 0)
                                            <a href="{{url('product-unpublish', ['id'=>$product->id])}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @else
                                            <a href="{{url('product-publish', ['id'=>$product->id])}}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td style="padding: 0px 3px" class="border-0 m-0">
                                            <a href="{{url('product/'.$product->id.'/edit')}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="border-0 m-0 p-0">
                                            {!! Form::open(['url'=>'product/'.$product->id.'', 'method'=>'DELETE',
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
