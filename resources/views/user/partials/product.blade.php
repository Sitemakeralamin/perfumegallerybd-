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

@once
<style>
/* ===== GLASSMORPHISM PRODUCT CARD — ALL PAGES ===== */

/* Neon pulse keyframe */
@keyframes neonGoldPulse {
    0%, 100% {
        box-shadow: 0 0 8px rgba(201,168,76,0.45),
                    0 0 18px rgba(201,168,76,0.2);
    }
    50% {
        box-shadow: 0 0 20px rgba(201,168,76,0.75),
                    0 0 40px rgba(201,168,76,0.35),
                    0 0 60px rgba(183,110,121,0.18);
    }
}

@keyframes cardShimmer {
    0%   { background-position: -200% 0; }
    100% { background-position:  200% 0; }
}

/* Card container */
.product__items {
    position: relative;
    background: rgba(15, 11, 5, 0.72) !important;
    backdrop-filter: blur(18px) saturate(160%) !important;
    -webkit-backdrop-filter: blur(18px) saturate(160%) !important;
    border: 1px solid rgba(201,168,76,0.18) !important;
    border-radius: 14px !important;
    overflow: hidden;
    transition: transform 0.4s cubic-bezier(0.34, 1.3, 0.64, 1),
                box-shadow 0.4s ease,
                border-color 0.4s ease !important;
    box-shadow: 0 6px 30px rgba(0,0,0,0.45),
                inset 0 1px 0 rgba(255,255,255,0.05) !important;
}

/* Top shimmer line on card */
.product__items::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg,
        transparent 0%, rgba(201,168,76,0.7) 50%, transparent 100%);
    background-size: 200% 100%;
    animation: cardShimmer 3s linear infinite;
    z-index: 2;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.product__items:hover::after { opacity: 1; }

.product__items:hover {
    transform: translateY(-8px) scale(1.015) !important;
    border-color: rgba(201,168,76,0.55) !important;
    box-shadow: 0 16px 48px rgba(0,0,0,0.55),
                0 0 30px rgba(201,168,76,0.14),
                inset 0 1px 0 rgba(255,255,255,0.09) !important;
}

/* Product image */
.product__items--thumbnail { position: relative; overflow: hidden; }
.product__items--img {
    transition: transform 0.55s cubic-bezier(0.34, 1.2, 0.64, 1) !important;
}
.product__items:hover .product__items--img {
    transform: scale(1.1) !important;
}

/* Badge */
.product__badge--items.sale {
    background: linear-gradient(135deg, #9a7a0a, #c9a84c) !important;
    color: #fff !important;
    font-weight: 700 !important;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 12px rgba(201,168,76,0.45) !important;
    border-radius: 4px !important;
}

/* Product title */
.product__items--content { padding: 14px 12px !important; }
.product__items--content__title a {
    color: #e8d8b0 !important;
    transition: color 0.3s ease !important;
    font-weight: 600 !important;
}
.product__items--content__title a:hover {
    color: #c9a84c !important;
}

/* Price */
.current__price {
    color: #c9a84c !important;
    font-weight: 700 !important;
    font-size: 1.05rem !important;
}
.old__price {
    color: rgba(200,180,140,0.45) !important;
    text-decoration: line-through;
}

/* ===== ADD TO CART: Neon Glow ===== */
.bg-add-to-cart {
    position: absolute;
    bottom: 0px;
    right: 0px;
    opacity: 0;
    background: linear-gradient(135deg, #9a7a0a 0%, #c9a84c 50%, #b76e79 100%) !important;
    background-size: 200% 100% !important;
    color: #fff !important;
    font-weight: 700 !important;
    letter-spacing: 0.5px;
    border: none !important;
    transition: opacity 0.4s ease, transform 0.45s cubic-bezier(0.34, 1.3, 0.64, 1),
                background-position 0.4s ease, box-shadow 0.4s ease !important;
}
.product__items:hover .bg-add-to-cart {
    opacity: 1;
    transform: translateY(-8%) !important;
    animation: neonGoldPulse 2.2s ease-in-out infinite;
}
.bg-add-to-cart:hover {
    background-position: right center !important;
    box-shadow: 0 0 28px rgba(201,168,76,0.65),
                0 0 55px rgba(201,168,76,0.28) !important;
}

/* Wishlist & Quick-view buttons */
.add-to-wishlist {
    position: absolute;
    top: 40px;
    right: 0px;
    opacity: 0;
    background: rgba(10,8,4,0.72) !important;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(201,168,76,0.22) !important;
    color: #c9a84c !important;
    border-radius: 6px 0 0 6px !important;
    transition: opacity 0.45s ease, transform 0.45s cubic-bezier(0.34, 1.3, 0.64, 1),
                background 0.3s ease, box-shadow 0.3s ease !important;
}
.add-to-search {
    position: absolute;
    top: 74px;
    right: 0px;
    opacity: 0;
    background: rgba(10,8,4,0.72) !important;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(201,168,76,0.22) !important;
    color: #c9a84c !important;
    border-radius: 6px 0 0 6px !important;
    transition: opacity 0.45s ease, transform 0.45s cubic-bezier(0.34, 1.3, 0.64, 1),
                background 0.3s ease, box-shadow 0.3s ease !important;
}
.product__items:hover .add-to-wishlist {
    opacity: 1;
    transform: translateX(-8%) !important;
}
.product__items:hover .add-to-search {
    opacity: 1;
    transform: translateX(-8%) !important;
}
.add-to-wishlist:hover,
.add-to-search:hover {
    background: rgba(201,168,76,0.18) !important;
    border-color: rgba(201,168,76,0.6) !important;
    box-shadow: 0 0 14px rgba(201,168,76,0.4) !important;
}

/* Action button (Add to Cart / Order Now in product footer) */
.product__items--action__btn.add__to--cart:not(.bg-add-to-cart):not(.bg-buy-now):not(.d-none) {
    background: linear-gradient(135deg, rgba(201,168,76,0.15), rgba(183,110,121,0.12)) !important;
    border: 1px solid rgba(201,168,76,0.45) !important;
    color: #c9a84c !important;
    backdrop-filter: blur(8px);
    border-radius: 8px !important;
    font-weight: 600 !important;
    letter-spacing: 0.5px;
    transition: all 0.35s ease !important;
}
.product__items--action__btn.add__to--cart:not(.bg-add-to-cart):not(.bg-buy-now):hover {
    background: linear-gradient(135deg, rgba(201,168,76,0.3), rgba(183,110,121,0.2)) !important;
    box-shadow: 0 0 18px rgba(201,168,76,0.4) !important;
    color: #fff !important;
}
</style>
@endonce

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
