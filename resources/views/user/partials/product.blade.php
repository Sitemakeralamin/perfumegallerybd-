@if(!empty($product))
@php
    //$stock_price = $product->single_stock;
    $stock_price = DB::table('product_stocks')->where('product_id', $product->id)->where('variant', '=', null)->where('color', '=', null)->first(['price', 'qty']);
    $sale_text = __('messages.New');

    if($product->discount_type <> 'no') {
        if($product->discount_type == 'flat' && optional($product)->discount_amount>0) {
            $sale_text = '- '.__currency().bnConv('bnComNum',optional($product)->discount_amount);
        }
        else if($product->discount_type == 'percentage' && optional($product)->discount_amount>0) {
            $sale_text = '- '.bnConv('bnComNum',optional($product)->discount_amount)."%";
        }
    }

    if($product->type == 'single' && optional($stock_price)->qty <= 0) {
        $sale_text = __('messages.Out of Stock');
    }
    else {
        $stock_price = DB::table('product_stocks')->where('product_id', $product->id)->first(['price', 'qty']);

        //$variations = $product->variation_stock;
        //$min_price = $variations->min('price');
        //$max_price = $variations->max('price');
    }

@endphp

<style>
    .product__items{
        position: relative;
    }
    .bg-add-to-cart{
        position: absolute;
        bottom: 0px;
        right: 0px;
        opacity: 0;
    }
    .add-to-wishlist{
        position: absolute;
        top: 40px;
        right: 0px;
        opacity: 0;
    }
    .add-to-search{
        position: absolute;
        top: 74px;
        right: 0px;
        opacity: 0;
    }
    .product__items:hover .bg-add-to-cart{
        opacity: 1;
        transition: opacity 0.6s ease-in-out;
        transition: opacity 0.6s ease, transform 0.6s ease;
        transform: translateY(-10%);
    }
    .product__items:hover .add-to-wishlist {
        opacity: 1;
        transform: translateX(-10%);
        transition: opacity 0.6s ease-in-out;
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .product__items:hover .add-to-search {
        opacity: 1;
        transform: translateX(-10%);
        transition: opacity 0.6s ease-in-out;
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
</style>

<div class="col mb-30 py-3 rounded product_col">
    {{-- <div class="w-100">
        {{$product}}
    </div> --}}
    <div class="product__items" style="">
        <div class="product__items--thumbnail position-relative">
            <a class="product__items--link" 
                href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                <img class="product__items--img product__primary--img product_img border-radius-10" src="{{ asset('images/product/'.$product->thumbnail_image) }}" alt="{{$product->title}}">
            </a>
            <div class="product__badge">
                <span class="product__badge--items sale">{{$sale_text}}</span>
            </div>
            <button class="product__items--action__btn add__to--cart bg-add-to-cart w-100 rounded-0 bg-buy-now" onclick="addToCart({{ $product->id }}, 'only', 'cart')" type="button" >
                {{ __('messages.Add To Cart') }}
            </button>
            <button class="product__items--action__btn add__to--cart add-to-wishlist rounded-0 border-0 text-danger" onclick="addToWishlist({{ $product->id }})" title="Wishlist" type="button" ><i class="fa-regular fa-heart"></i></button>
            <button class="product__items--action__btn add__to--cart add-to-search rounded-0 border-0 text-danger d-none" onclick="quick_view({{ $product->id }})" title="Quick Search" type="button" ><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="product__items--content text-center">
            <h4 class="product__items--content__title mh-0"><a href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                {{ __translate(Str::limit($product->title,50), Str::limit($product->bn_title,50)) }}
            </a></h4>
            <div class="product__items--price">
                <span class="current__price">
                    {{ __currency().bnConv('bnComNum',optional($stock_price)->price) }}
                </span>
                    @if($product->discount_type <> 'no')
                    <?php
                        $old_price = null;
                        if($product->discount_type == 'flat') {
                            $old_price = optional($stock_price)->price + optional($product)->discount_amount;
                        }
                        elseif($product->discount_type == 'percentage') {
                            $discount_amount_tk = (optional($product)->discount_amount * optional($stock_price)->price)/100;
                            $old_price = optional($stock_price)->price + $discount_amount_tk;
                        }
                    ?>
                    @if($old_price)
                    <span class="price__divided"></span>
                    <span class="old__price">{{ __currency().bnConv('bnComNum',$old_price) }}</span>
                    @endif
                @endif
            </div>

            <ul class="product__items--action">
                <li class="product__items--action__list text-center">
                    @if($product->type == 'single')
                        @if(optional($stock_price)->qty > 0)
                            {{-- Buy Now --}}
                            <button class="product__items--action__btn buy__now--cart bg-buy-now d-none" onclick="addToCart({{ $product->id }}, 'only', 'checkout')" type="button">
                                {{ __('messages.Buy Now') }}
                            </button>

                            {{-- Add to cart --}}
                            <button class="product__items--action__btn add__to--cart bg-add-to-cart d-none" onclick="addToCart({{ $product->id }}, 'only', 'cart')" type="button" >
                                {{ __('messages.Add To Cart') }}
                            </button>
                        @else
                            {{-- Out of Stock --}}
                            <a class="product__items--action__btn add__to--cart" style="background-color: var(--logo-color);color:white" href="javascript:void(0)">
                                <span class="add__to--cart__text">{{ __('messages.Out of Stock') }}</span>
                            </a>
                        @endif
                    @else
                    {{-- Select Product --}}
                        <a class="product__items--action__btn add__to--cart" style="background-color: var(--logo-color);color:white"  {{--onclick="quick_view({{ $product->id }})"--}} href="{{ route('single.product', [$product->id, Str::slug($product->title)]) }}">
                            <span class="add__to--cart__text">{{ __('messages.Order Now') }}</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

@endif
