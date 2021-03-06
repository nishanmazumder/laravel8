<div class="header" id="home">
    <div class="container">
        <ul>
            @if (Session::get('customerName'))
            <li>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Hello {{Session::get('customerName')}}
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                    <div style="background: #000" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('customer/logout')}}">Logout</a>
                    </div>
                </div>

            </li>
            @else
            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt"
                        aria-hidden="true"></i> Sign In </a></li>
            <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o"
                        aria-hidden="true"></i> Sign Up </a></li>
            @endif

            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a
                    href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="{{url('/')}}"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag"
                        aria-hidden="true"></i></a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">Share On : </li>
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



        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link"
                                    href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                            <li class=" menu__item"><a class="menu__link" href="about.html">About</a></li>
                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-2 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                {{-- from app service provider --}}
                                                @foreach ($productCategories as $productCategory)
                                                <li><a
                                                        href="{{url('product-category', ['id'=>$productCategory->id])}}">{{$productCategory->category_name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-2 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="womens.html">Jewellery</a></li>
                                                <li><a href="womens.html">Sunglasses</a></li>
                                                <li><a href="womens.html">Perfumes</a></li>
                                                <li><a href="womens.html">Beauty</a></li>
                                                <li><a href="womens.html">Shirts</a></li>
                                                <li><a href="womens.html">Sunglasses</a></li>
                                                <li><a href="womens.html">Swimwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="womens.html">Jewellery</a></li>
                                                <li><a href="womens.html">Sunglasses</a></li>
                                                <li><a href="womens.html">Perfumes</a></li>
                                                <li><a href="womens.html">Beauty</a></li>
                                                <li><a href="womens.html">Shirts</a></li>
                                                <li><a href="womens.html">Sunglasses</a></li>
                                                <li><a href="womens.html">Swimwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <a href="womens.html"><img src="{{asset('web')}}/images/top1.jpg"
                                                    alt=" " /></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="menu__item dropdown">
                                <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Short
                                    Codes <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="icons.html">Web Icons</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                </ul>
                            </li>
                            <li class=" menu__item"><a class="menu__link" href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                <form action="{{url('product-cart')}}" method="GET" class="">
                    <button class="w3view-cart" type="submit" name="" value=""><i class="fa fa-cart-arrow-down"
                            aria-hidden="true"></i></button>
                    <span class="nmCartCount nm-cart-count"></span>

                </form>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    <small class="text-danger">{{Session::get('message')}}</small>
                    {!! Form::open(['url' => 'login/customer', 'method' => 'GET']) !!}
                    <div class="styled-input">
                        <input type="email" name="email" required>
                        <label>Email</label>
                        <span></span>
                        <small class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</small>
                    </div>
                    <div class="styled-input">
                        <input type="password" name="password" required>
                        <label>Password</label>
                        <span></span>
                    </div>
                    <input type="submit" value="Sign In">
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
                    <p><a href="#" data-toggle="modal" data-target="#myModal2"> Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{asset('web')}}/images/log_pic.jpg" alt=" " />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <small class="text-danger">{{Session::get('messageReg')}}</small>
                    {!! Form::open(['url' => 'register/customer', 'method' => 'POST']) !!}
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="name" required>
                        <label>Name</label>
                        <span></span>
                        <small class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</small>
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
                        <small class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</small>
                    </div>
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="phone" required>
                        <label>Phone</label>
                        <span></span>
                        <small class="text-danger">{{$errors->has('phone')?$errors->first('phone'):''}}</small>
                    </div>
                    <div class="styled-input agile-styled-input-top">
                        <input type="text" name="address" required>
                        <label>Address</label>
                        <small class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</small>
                        <span></span>
                    </div>
                    <input type="submit" value="Sign Up">
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
                    <img src="{{asset('web')}}/images/log_pic.jpg" alt=" " />
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->
