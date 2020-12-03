@extends('web.master')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Cart <span>Page </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                    <li>Cart Page</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($CartEmpty)
                <h1 class="text-center">Cart Empty</h1>
                @else
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Action</th>
                            <th class="text-center" scope="col">Product Name</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Quantity</th>
                            <th class="text-center" scope="col">Price</th>
                            <th class="text-center" scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($items as $row)
                        <tr>
                            <td>
                                <a href="{{url('cart-delete', ['id'=>''.$row->id.''])}}"
                                    class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                            <td>{{$row->name}}</td>
                            <td><img src="{{asset('/uploads')}}{{'/'.$row->attributes['image']}}" alt="{{$row->name}}" style="width: 30px"></td>
                            <td>
                                {!! Form::open(['url'=>'cart-update', 'method'=>'POST', 'class'=> 'form-inline']) !!}
                                <input type="hidden" name="rowId" id="" value="{{$row->id}}">
                                <input type="hidden" name="product_price" id="" value="{{$row->price}}">
                                <input type="number" name="product_qty" value="{{$row->quantity}}" class="" min="1">
                                <button type="submit" class="btn nm-btn">Add More</button>
                                {!! Form::close() !!}
                            </td>
                            <td>Tk. {{$row->price}}</td>
                            <td>Tk. {{$row->price * $row->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
            <a href="{{url('cart-empty')}}" class="btn nm-btn">Remove All</a>
            </div>
            <div class="col-md-4" style="float: right">
                <table class="table text-center" style="border: 1px solid #ddd">
                    <thead class="" style="background: #2FDAB8">
                        <tr>
                            <th class="" scope="col">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Vat (2%):</th>
                            <td>Tk. {{$vat = (2/100)*$total}}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>Tk. {{$vat + $total}}</td>
                        </tr>
                    </tbody>

                </table>
            <a href="{{url('login')}}" class="nm-btn nm-cart-btn nm-btn-cart-page">
                    Order Now
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
<!--//single_page-->
@include('web.pages.home.sections.service')

@endsection
