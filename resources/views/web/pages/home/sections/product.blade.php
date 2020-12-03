<!-- Product -->
<div class="new_arrivals_agile_w3ls_info">
    <div class="container">
        <h3 class="wthree_text_info">New <span>Arrivals</span></h3>
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li> Men's</li>
                <li> Women's</li>
            </ul>
            <div class="resp-tabs-container">
                <!--/tab_one-->
                <div class="tab1">
                    @foreach ($products as $product)
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('/uploads')}}{{'/'.$product->product_img}}" alt=""
                                    class="pro-image-front">
                                <img src="{{asset('/uploads')}}{{'/'.$product->product_img}}" alt=""
                                    class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('product-single', ['id'=>$product->id, 'name'=>$product->product_name])}}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a
                                        href="{{url('product-single', ['id'=>$product->id, 'name'=>$product->product_name])}}">{{$product->product_name}}</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">{{$product->product_price}}</span>
                                    <del>$189.71</del>
                                </div>

                                <div class="info-product-price">
                                    <a href="#" id="nmCartSbmt" data-id="{{$product->id}}" class="nm-cart-btn nm-btn nm-btn-text">Add to cart</a>
                                </div>

                                {{-- {!! Form::open(['method'=>'GET', 'id'=>'nmCartAdd']) !!}
                                <input type="hidden" name="productId" value="{{$product->id}}">
                                <input type="submit" value="Add to cart" id="nmCartSbmt" class="nm-cart-btn" />
                                {!! Form::close() !!} --}}

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <!--//tab_one-->
                <!--/tab_two-->
                <div class="tab2">
                    @foreach ($products as $product)
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{asset('public/uploads')}}{{'/'.$product->product_img}}" alt=""
                                    class="pro-image-front">
                                <img src="{{asset('public/uploads')}}{{'/'.$product->product_img}}" alt=""
                                    class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('product-single', ['id'=>$product->id, 'name'=>$product->product_name])}}"
                                            class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a
                                        href="{{url('product-single', ['id'=>$product->id, 'name'=>$product->product_name])}}">{{$product->product_name}}</a>
                                </h4>
                                <div class="info-product-price">
                                    <span class="item_price">{{$product->product_price}}</span>
                                    <del>$189.71</del>
                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="A-line Black Skirt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                <!--//tab_two-->
            </div>
        </div>
    </div>
</div>
<!-- //new_arrivals -->
