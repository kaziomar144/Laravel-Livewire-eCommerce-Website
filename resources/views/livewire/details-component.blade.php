{{-- <!--main area--> --}}
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="{{asset('assets')}}/images/products/{{$product->image}}">
                                <img src="{{asset('assets')}}/images/products/{{$product->image}}" alt="{{$product->name}}" />
                            </li>

                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            @php
                                $avgRating = 0;
                                $perRating = 0;
                                foreach ($product->orderItems->where('rstatus',1) as  $orderItem) {
                                    $avgRating = $avgRating + $orderItem->review->rating / $product->orderItems->where('rstatus',1)->count();
                                    $perRating = (100/5)* $avgRating;
                                }
                            @endphp
                            {{-- @for ($i = 1; $i <= 5; $i++)
                                @if ($i<= $avgRating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star" aria-hidden="true" style="color: #e6e6e6"></i>
                                @endif
                                
                            @endfor --}}
                            <div class="star-rating">
                                <span style="width: {{$perRating}}%">Rated <strong class="rating">5</strong> out of 5</span>
                            </div>
                            {{-- <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i> --}}
                            <a href="#" class="count-review">({{$product->orderItems->where('rstatus',1)->count()}})</a>
                        </div>
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">
                            {!!$product->short_description!!}
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{asset('assets')}}/images/social-list.png" alt=""></a>
                        </div>
                        @if ($product->sale_price && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
						<div class="wrap-price"><ins><p class="product-price">${{$product->sale_price}}</p></ins> <del><p class="product-price">${{$product->regular_price}}</p></del></div>
						@else
						<div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
						@endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{$product->stock_status}}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty">
                                
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            @if ($product->sale_price && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" class="btn add-to-cart">Add to Cart</a>
                            @else
                            <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn add-to-cart">Add to Cart</a>
                            @endif
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {!!$product->description!!}
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">1 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">
                                
                                <div class="wrap-review-form">
                                    
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{$product->orderItems->where('rstatus',1)->count()}} review for <span style="text-transform: capitalize">{{$product->name}}</span></h2>
                                        <ol class="commentlist">
                                            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                <div id="comment-20" class="comment_container"> 
                                                    <img alt="" src="{{asset('assets')}}/images/author-avata.jpg" height="80" width="80">
                                                    <div class="comment-text">
                                                        <div class="star-rating">
                                                            <span style="width: {{$orderItem->review->rating * 20}}%">Rated <strong class="rating">5</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta"> 
                                                            <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong> 
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" > {{$orderItem->review->created_at->format('d F Y g:i A')}}</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>{{$orderItem->review->comment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div><!-- #comments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($popular_products as $p_products)
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('product.details',['slug'=>$p_products->slug])}}" title="{{$p_products->name}}">
                                            <figure><img src="{{asset('assets')}}/images/products/{{$p_products->image}}" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details',['slug'=>$p_products->slug])}}" class="product-name"><span>{{\Illuminate\Support\Str::limit($p_products->name,30,$end='...')}}</span></a>
                                        @if ($p_products->sale_price)
										<div class="wrap-price"><ins><p class="product-price">${{$p_products->sale_price}}</p></ins> <del><p class="product-price">${{$p_products->regular_price}}</p></del></div>
										@else
										<div class="wrap-price"><span class="product-price">${{$p_products->regular_price}}</span></div>
										@endif
                                    </div>
                                </div>
                            </li>
                            @endforeach 
                        </ul>
                    </div>
                </div>

            </div><!--end sitebar-->

            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Related Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            
                            @foreach ($related_products as $r_products)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}" title="{{$r_products->name}}">
                                        <figure><img src="{{asset('assets')}}/images/products/{{$r_products->image}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{route('product.details',['slug'=>$r_products->slug])}}" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}" class="product-name"><span>{{ \Illuminate\Support\Str::limit($r_products->name, 50, $end='...') }}</span></a>
                                    @if ($r_products->sale_price)
                                    <div class="wrap-price"><ins><p class="product-price">${{$r_products->sale_price}}</p></ins> <del><p class="product-price">${{$r_products->regular_price}}</p></del></div>
                                    @else
                                    <div class="wrap-price"><span class="product-price">${{$r_products->regular_price}}</span></div>
                                    @endif
                                    
                                    
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>
{{-- <!--main area--> --}}
