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
                            <th>Date</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Payment</th>
                            <th>Quantity</th>
                            <th>Pay. Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Payment</th>
                            <th>Quantity</th>
                            <th>Pay. Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->productprice}}</td>
                            <td>{{$order->productQty}}</td>
                            <td>{{$order->orderStatus}}</td>

                            <td class="text-center">
                                <table>
                                    <tr>
                                        <td class="border-0 m-0 p-0">
                                            <a href="{{url('order/view', ['id'=>'1'])}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                        <td class="border-0 m-0 p-0">
                                            <a href="{{url('order/invoice', ['id'=>$order->id])}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="far fa-file-pdf"></i>
                                            </a>
                                        </td>
                                        <td style="padding: 0px 3px" class="border-0 m-0">
                                            <a href="{{url('product/'.'1'.'/edit')}}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="border-0 m-0 p-0">
                                            {!! Form::open(['url'=>'product/'.'1'.'', 'method'=>'DELETE',
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