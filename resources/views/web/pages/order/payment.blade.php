@extends('web.master')

@section('content')
<div class="container">
    <!-- Modal1 -->
    <div class="modal-body modal-body-sub_agile nm-sing-in">
        <div class="col-md-8 modal_body_left modal_body_left1">
            <h3 class="agileinfo_sign">Pay <span>Safe</span></h3>
            {{-- Register --}}
            {!! Form::open(['url' => 'customer/payment/confirm', 'method' => 'POST']) !!}
            <table class="table text-center" style="border: 1px solid #2FDAB8">
                <thead class="" style="border-top:1px solid #2FDAB8">
                    
                </thead>
                <tbody>
                    <tr>
                        <th>Cash on delivery</th>
                        <td><input type="radio" name="payment_type" value="Cash"></td>
                    </tr>
                    <tr>
                        <th>Paypal</th>
                        <td><input type="radio" name="payment_type" value="Paypal"></td>
                    </tr>
                    <tr>
                        <th>bKash</th>
                        <td><input type="radio" name="payment_type" value="bKash"></td>
                    </tr>
                </tbody>

            </table>

            <input type="submit" value="Continue">
            {!! Form::close() !!}
            
            <div class="clearfix"></div>

        </div>
        <div class="col-md-4 modal_body_right modal_body_right1">
            <img src="{{asset('/web')}}/images/log_pic.jpg" alt=" " />
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //Modal1 -->






</div>

@include('web.pages.home.sections.service')

@endsection