@extends('web.master')

@section('content')
<div class="container">
    <!-- Modal1 -->
    <div class="modal-body modal-body-sub_agile nm-sing-in">
        <div class="col-md-8 modal_body_left modal_body_left1">
            <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
            {{-- Register --}}
            {!! Form::open(['url' => 'customer/add', 'method' => 'POST']) !!}
            <div class="styled-input agile-styled-input-top">
                <input type="text" name="name" required>
                <label>Name</label>
                <span></span>
            </div>
            <div class="styled-input">
                <input type="email" name="email" id="nmEmail" required>
                <label>Email</label>
                <span></span>
                <small class="text-danger" id="nmMailErr"></small>
            </div>
            <div class="styled-input">
                <input type="password" name="password" required>
                <label>Password</label>
                <span></span>
            </div>
            <div class="styled-input agile-styled-input-top">
                <input type="text" name="phone" required>
                <label>Phone</label>
                <span></span>
            </div>
            <div class="styled-input agile-styled-input-top">
                <input type="text" name="address" required>
                <label>Address</label>
                <span></span>
            </div>
            <input type="submit" id="nmRegBtn" value="Sign Up">
            {!! Form::close() !!}

            <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                <li><a href="#" class="facebook">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="twitter">
                        <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="instagram">
                        <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="pinterest">
                        <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                    </a></li>
            </ul>
            <div class="clearfix"></div>
            <p><a href="#">By clicking register, I agree to your terms</a></p>

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