	{{-- <!--main area--> --}}
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Wishlist</span></li>
				</ul>
			</div>
            <style>
                .product-wish{
                    position: absolute;
                    top: 10%;
                    left: 0;
                    z-index: 99;
                    right: 30px;
                    text-align: right;
                    padding-top: 0;
                }
                .product-wish a{
                    color: #cbcbcb;
                    font-size: 32px;
                    transition: all linear 0.3s;
                }
                .product-wish .fa:hover{
                    color:#ff7007;
                }
                .fill-heart{
                    color: #ff7007 !important;
                }
            </style>
            <div class="row">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach (Cart::instance('wishlist')->content() as $item)
                    <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                    <figure><img src="{{asset('assets')}}/images/products/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    @if (Carbon\Carbon::parse($item->model->created_at)->addDays(4) >= Carbon\Carbon::now())
                                        <span class="flash-item new-label">new</span>
                                    @endif
                                    @if ($item->model->sale_price)
                                        <span class="flash-item sale-label">sale</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{ \Illuminate\Support\Str::limit($item->model->name, 25, $end='...') }}</span></a>
                                
                                @if ($item->model->sale_price)
                                <div class="wrap-price"><ins><p class="product-price">${{$item->model->sale_price}}</p></ins> <del><p class="product-price">${{$item->model->regular_price}}</p></del></div>
                                <a wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}',{{$item->model->sale_price}})" class="btn add-to-cart">Add To Cart</a>
                                <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFormWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                </div>
                                @else
                                <div class="wrap-price"><span class="product-price">${{$item->model->regular_price}}</span></div>
                                <a wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}',{{$item->model->regular_price}})" class="btn add-to-cart">Add To Cart</a>
                                <div class="product-wish">
                                        <a href="#"  wire:click.prevent="removeFormWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>  
                @else 
                    <h4>No Item in wishlist</h4>                      
                @endif
            </div>
        </div>
    </main>