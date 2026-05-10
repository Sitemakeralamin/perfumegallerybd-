
@extends('user.inc.master')

@section('title') {{ __('messages.Checkout') }} @endsection
@section('description') {{ __('messages.Checkout') }}  @endsection
@section('keywords') {{ __('messages.Checkout') }} @endsection

@section('content')
@php
    $total = Cart::subtotal();
    $discount = 0;
    if(Session::has('coupon_discount')){
        $discount = Session::get('coupon_discount');
    }
    $total_with_discount = $total - $discount;
@endphp

<style>
    /* ===== CHECKOUT PAGE STYLES ===== */
    .checkout-page {
        background: #f7f8fc;
        min-height: 100vh;
        padding: 40px 0 60px;
    }

    /* Steps indicator */
    .checkout-steps {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        margin-bottom: 36px;
    }
    .checkout-step {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #bbb;
    }
    .checkout-step .step-num {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 2px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
        background: #fff;
    }
    .checkout-step.active { color: var(--logo-color, #EE2761); }
    .checkout-step.active .step-num {
        background: var(--logo-color, #EE2761);
        border-color: var(--logo-color, #EE2761);
        color: #fff;
    }
    .checkout-step.done { color: #0ABB75; }
    .checkout-step.done .step-num {
        background: #0ABB75;
        border-color: #0ABB75;
        color: #fff;
    }
    .step-line {
        height: 2px;
        width: 60px;
        background: #e0e0e0;
        margin: 0 8px;
    }

    /* Cards */
    .checkout-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        padding: 28px 28px 24px;
        margin-bottom: 20px;
    }
    .checkout-card-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #222;
        letter-spacing: 0.3px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .checkout-card-title .title-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: #ffeef4;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--logo-color, #EE2761);
        font-size: 1rem;
    }

    /* Form fields */
    .checkout-label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #555;
        margin-bottom: 6px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .checkout-label .req { color: var(--logo-color, #EE2761); margin-left: 2px; }
    .checkout-input {
        width: 100%;
        border: 1.5px solid #e8e8e8;
        border-radius: 10px;
        padding: 11px 15px;
        font-size: 0.93rem;
        color: #333;
        background: #fafafa;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }
    .checkout-input:focus {
        border-color: var(--logo-color, #EE2761);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(238, 39, 97, 0.08);
    }
    .checkout-input::placeholder { color: #bbb; }
    textarea.checkout-input { resize: vertical; min-height: 80px; }
    select.checkout-input { appearance: none; cursor: pointer; }

    /* Select wrapper */
    .select-wrapper {
        position: relative;
    }
    .select-wrapper::after {
        content: '\f107';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        pointer-events: none;
        font-size: 0.9rem;
    }

    /* Order items */
    .order-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid #f2f2f2;
    }
    .order-item:last-child { border-bottom: none; }
    .order-item-img {
        position: relative;
        flex-shrink: 0;
    }
    .order-item-img img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #eee;
    }
    .order-item-qty {
        position: absolute;
        top: -6px;
        right: -6px;
        background: var(--logo-color, #EE2761);
        color: #fff;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1px 4px rgba(238,39,97,0.25);
    }
    .order-item-info { flex: 1; min-width: 0; }
    .order-item-name {
        font-size: 0.88rem;
        font-weight: 600;
        color: #222;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .order-item-attr {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        margin-bottom: 4px;
    }
    .attr-badge {
        font-size: 0.72rem;
        background: #f3f4f6;
        border-radius: 5px;
        padding: 2px 7px;
        color: #555;
        font-weight: 500;
    }
    .order-item-price {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--logo-color, #EE2761);
        text-align: right;
        white-space: nowrap;
    }

    /* Coupon */
    .coupon-form {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .coupon-form input {
        flex: 1;
        border: 1.5px dashed #d0d0d0;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 0.9rem;
        outline: none;
        background: #fafafa;
        transition: border-color 0.2s;
    }
    .coupon-form input:focus { border-color: var(--logo-color, #EE2761); background: #fff; }
    .coupon-apply-btn {
        padding: 10px 20px;
        background: var(--logo-color, #EE2761);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 0.88rem;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s;
        white-space: nowrap;
    }
    .coupon-apply-btn:hover { opacity: 0.88; }
    .remove-coupon-btn {
        display: inline-block;
        margin-top: 8px;
        padding: 6px 14px;
        border: 1.5px solid #ddd;
        border-radius: 8px;
        font-size: 0.8rem;
        color: #555;
        text-decoration: none;
        transition: all 0.2s;
    }
    .remove-coupon-btn:hover { border-color: #888; color: #333; }

    /* Price summary */
    .price-summary { margin-top: 18px; }
    .price-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 9px 0;
        font-size: 0.9rem;
        color: #555;
        border-bottom: 1px solid #f5f5f5;
    }
    .price-row:last-child { border-bottom: none; }
    .price-row.total-row {
        font-size: 1.05rem;
        font-weight: 700;
        color: #111;
        padding-top: 14px;
        margin-top: 4px;
        border-top: 2px solid #eee;
        border-bottom: none;
    }
    .price-row .label { font-weight: 500; }
    .price-row .amount { font-weight: 600; }
    .price-row.discount-row .amount { color: #0ABB75; }
    .price-row.total-row .amount { color: var(--logo-color, #EE2761); }

    /* Payment badge */
    .payment-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f0fdf6;
        border: 1.5px solid #0ABB75;
        border-radius: 10px;
        padding: 10px 16px;
        color: #0ABB75;
        font-weight: 700;
        font-size: 0.93rem;
    }
    .payment-badge i { font-size: 1.1rem; }

    /* Delivery info banner */
    .delivery-banner {
        background: linear-gradient(135deg, #fff8e1, #fff3cd);
        border: 1.5px solid #ffe082;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 16px;
        font-size: 0.88rem;
        color: #7a5a00;
        font-weight: 500;
    }
    .delivery-banner strong { display: block; margin-bottom: 2px; font-size: 0.9rem; }

    /* Terms checkbox */
    .terms-check { display: flex; align-items: flex-start; gap: 10px; }
    .terms-check input[type="checkbox"] {
        width: 18px;
        height: 18px;
        border: 2px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 2px;
        flex-shrink: 0;
        accent-color: var(--logo-color, #EE2761);
    }
    .terms-check label {
        font-size: 0.85rem;
        color: #666;
        cursor: pointer;
        line-height: 1.5;
    }
    .terms-check a { color: var(--logo-color, #EE2761); text-decoration: none; font-weight: 500; }
    .terms-check a:hover { text-decoration: underline; }

    /* Submit button */
    .confirm-btn {
        width: 100%;
        padding: 14px 20px;
        background: var(--logo-color, #EE2761);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.25s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 4px 16px rgba(238, 39, 97, 0.25);
        margin-bottom: 12px;
    }
    .confirm-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(238, 39, 97, 0.35);
        opacity: 0.95;
    }
    .confirm-btn:active { transform: translateY(0); }
    .return-link {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        color: #888;
        font-size: 0.85rem;
        text-decoration: none;
        transition: color 0.2s;
    }
    .return-link:hover { color: #333; }

    /* Login notice */
    .login-notice {
        background: #f9f9f9;
        border-left: 3px solid var(--logo-color, #EE2761);
        border-radius: 0 8px 8px 0;
        padding: 10px 16px;
        font-size: 0.88rem;
        color: #555;
        margin-bottom: 20px;
    }
    .login-notice a { color: var(--logo-color, #EE2761); font-weight: 600; }

    /* Hidden radio (payment) */
    .hiddenradio [type=radio] { position: absolute; opacity: 0; width: 0; height: 0; }
    .hiddenradio [type=radio] + img { cursor: pointer; }
    .hiddenradio [type=radio]:checked + img { outline: 4px solid #0ABB75; }

    /* Responsive */
    @media (max-width: 991px) {
        .checkout-page { padding: 24px 0 40px; }
        .checkout-card { padding: 20px 16px; }
        .step-line { width: 32px; }
    }
    @media (max-width: 576px) {
        .checkout-steps { font-size: 0.75rem; gap: 2px; }
        .step-line { width: 20px; }
        .coupon-form { flex-direction: column; }
    }
</style>

<div class="checkout-page">
    <div class="container">

        {{-- Step Indicator --}}
        <div class="checkout-steps">
            <div class="checkout-step done">
                <span class="step-num"><i class="fa fa-check" style="font-size:0.7rem"></i></span>
                <span class="d-none d-sm-inline">{{ __('messages.Cart') }}</span>
            </div>
            <div class="step-line"></div>
            <div class="checkout-step active">
                <span class="step-num">2</span>
                <span class="d-none d-sm-inline">{{ __('messages.Checkout') }}</span>
            </div>
            <div class="step-line"></div>
            <div class="checkout-step">
                <span class="step-num">3</span>
                <span class="d-none d-sm-inline">{{ __('messages.Confirm') }}</span>
            </div>
        </div>

        <div class="row g-4">

            {{-- LEFT: ORDER SUMMARY --}}
            <div class="col-lg-5 order-lg-2">
                <div style="position: sticky; top: 20px;">

                    {{-- Product list --}}
                    <div class="checkout-card">
                        <div class="checkout-card-title">
                            <span class="title-icon"><i class="fa fa-bag-shopping"></i></span>
                            {{ __('messages.Order Summary') }}
                            <span style="margin-left:auto; font-size:0.8rem; color:#aaa; font-weight:500;">{{ count($carts) }} {{ __('messages.items') }}</span>
                        </div>

                        <div class="order-items-list" style="max-height: 340px; overflow-y: auto; padding-right: 4px;">
                            @foreach($carts as $cart)
                            @php
                                $product_info = App\Models\Product::find(optional($cart->options)->product_id);
                            @endphp
                            @if(!is_null($product_info))
                            @php
                                $variation_info = [];
                                if($cart->weight != 0) {
                                    $stock_info = App\Models\ProductStocks::find($cart->weight);
                                    if(optional($stock_info)->sku) {
                                        $variation_info[] = '<span class="attr-badge"><b>'.__('messages.Code').':</b> '.optional($stock_info)->sku.'</span>';
                                    }
                                    if(optional($stock_info)->color) {
                                        $color_attribute_info = color_info($stock_info->color);
                                        $variation_info[] = '<span class="attr-badge"><b>'.__('messages.Color').':</b> '.optional($color_attribute_info)->name.'</span>';
                                    }
                                    if(optional($stock_info)->variant) {
                                        $variant_attribute_info = variation_info($stock_info->variant);
                                        $variation_info[] = '<span class="attr-badge"><b>'.__translate(optional($variant_attribute_info)->title, optional($variant_attribute_info)->bn_title).':</b> '.optional($stock_info)->variant_output.'</span>';
                                    }
                                } else {
                                    $stock_info = $product_info->single_stock;
                                }
                            @endphp
                            <div class="order-item">
                                <div class="order-item-img">
                                    <a href="{{ route('single.product', [$product_info->id, Str::slug($product_info->title)]) }}">
                                        <img src="{{ asset('images/product/'.optional($product_info)->thumbnail_image) }}" alt="{{ $product_info->title }}">
                                    </a>
                                    <span class="order-item-qty">{{ bnConv('bnNum', $cart->qty) }}</span>
                                </div>
                                <div class="order-item-info">
                                    <div class="order-item-name">
                                        <a href="{{ route('single.product', [$product_info->id, Str::slug($product_info->title)]) }}" style="color:inherit; text-decoration:none;">
                                            {{ __translate(Str::limit($product_info->title, 45), Str::limit($product_info->bn_title, 45)) }}
                                        </a>
                                    </div>
                                    @if(count($variation_info) > 0)
                                    <div class="order-item-attr">
                                        {!! implode(' ', $variation_info) !!}
                                    </div>
                                    @endif
                                </div>
                                <div class="order-item-price">
                                    {{ __currency() }}{{ bnConv('bnComNum', optional($cart->options)->single_price * $cart->qty) }}
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        {{-- Coupon --}}
                        <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #f2f2f2;">
                            <div style="font-size: 0.82rem; font-weight: 600; color: #555; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                                <i class="fa fa-tag" style="color: var(--logo-color, #EE2761); margin-right: 5px;"></i>
                                {{ __('messages.Coupon') }}
                            </div>
                            <p style="font-size:0.82rem; color:#888; margin-bottom:8px;">{{ __('messages.Enter your coupon code if you have one') }}</p>
                            <form class="coupon-form" action="{{ route('coupon.apply') }}" method="POST">
                                @csrf
                                <input name="code" type="text" required placeholder="{{ __('messages.Coupon Code') }}">
                                <button class="coupon-apply-btn" type="submit">{{ __('messages.Apply Coupon') }}</button>
                            </form>
                            @if(Session::has('coupon_success'))
                                <div class="alert alert-success mt-2 py-2" style="font-size:0.85rem; border-radius:8px;">{{ Session::get('coupon_success') }}</div>
                            @endif
                            @if(Session::has('invalid'))
                                <div class="alert alert-danger mt-2 py-2" style="font-size:0.85rem; border-radius:8px;">{{ Session::get('invalid') }}</div>
                            @endif
                            @if(Session::has('coupon_discount'))
                                <a href="{{ route('coupon.remove') }}" class="remove-coupon-btn">
                                    <i class="fa fa-times" style="margin-right:4px;"></i>{{ __('messages.Remove Coupon') }}
                                </a>
                            @endif
                        </div>

                        {{-- Price breakdown --}}
                        <div class="price-summary">
                            <div class="price-row">
                                <span class="label">{{ __('messages.Subtotal') }}</span>
                                <span class="amount">{{ __currency() }}{{ bnConv('bnComNum', $total) }}</span>
                            </div>
                            @if($discount > 0)
                            <div class="price-row discount-row">
                                <span class="label">{{ __('messages.Discount') }}</span>
                                <span class="amount">- {{ __currency() }}{{ bnConv('bnComNum', $discount) }}</span>
                            </div>
                            @endif
                            <div class="price-row">
                                <span class="label">{{ __('messages.Shipping Charge') }}</span>
                                <span class="amount" id="shipping_charge_label">{{ __currency() }}{{ bnConv('bnComNum', 0) }}</span>
                            </div>
                            <div class="price-row total-row">
                                <span class="label">{{ __('messages.Total') }}</span>
                                <span class="amount" id="total_show">{{ __currency() }}{{ bnConv('bnComNum', $total_with_discount) }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- RIGHT: CHECKOUT FORM --}}
            <div class="col-lg-7 order-lg-1">
                <form class="checkout-form" action="{{ route('order.create') }}" method="post">
                    @csrf

                    {{-- Hidden fields --}}
                    <input type="hidden" name="subtotal" id="subtotal" value="{{ $total }}">
                    <input type="hidden" name="discount" id="discount" value="{{ $discount }}">
                    <input type="hidden" name="shipping_charge" id="shipping_charge" value="0">
                    <input type="hidden" name="total" id="total" value="{{ $total_with_discount }}">
                    @if(!Auth::check())
                        <input type="hidden" name="auth_status" id="auth_status" value="0">
                    @else
                        <input type="hidden" name="auth_status" id="auth_status" value="1">
                    @endif

                    {{-- Login notice --}}
                    @if(!Auth::check())
                    <div class="login-notice">
                        {{ __('messages.Returning customer') }}?
                        <a href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                        {{ __('messages.for a faster checkout') }}
                    </div>
                    @endif

                    {{-- Billing Details --}}
                    <div class="checkout-card">
                        <div class="checkout-card-title">
                            <span class="title-icon"><i class="fa fa-user"></i></span>
                            {{ __('messages.Billing Details') }}
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="checkout-label">{{ __('messages.Name') }} <span class="req">*</span></label>
                                <input type="text" class="checkout-input" name="name"
                                    value="{{ optional(Auth::user())->name . ' ' . optional(Auth::user())->last_name }}"
                                    placeholder="{{ __('messages.Full Name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="checkout-label">{{ __('messages.Phone') }} <span class="req">*</span></label>
                                <input type="text" class="checkout-input" name="phone"
                                    value="{{ optional(Auth::user())->phone }}"
                                    placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label class="checkout-label">{{ __('messages.Email') }} <span style="font-weight:400; text-transform:none; color:#aaa;">({{ __('messages.Optional') }})</span></label>
                                <input type="email" class="checkout-input" name="email"
                                    value="{{ optional(Auth::user())->email }}"
                                    placeholder="email@example.com">
                            </div>
                        </div>
                    </div>

                    {{-- Shipping --}}
                    <div class="checkout-card">
                        <div class="checkout-card-title">
                            <span class="title-icon"><i class="fa fa-location-dot"></i></span>
                            {{ __('messages.Shipping Details') }}
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="checkout-label">{{ __('messages.Shipping area') }} <span class="req">*</span></label>
                                <div class="select-wrapper">
                                    <select name="district_id" id="district_id" class="checkout-input @error('district_id') is-invalid @enderror" required>
                                        <option value="">{{ __('messages.Please Chose Your Shipping Area') }}</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ __translate($district->name, $district->bn_name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('district_id')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-md-6 d-none">
                                <label class="checkout-label">Area <span class="req">*</span></label>
                                <div class="select-wrapper">
                                    <select name="area_id" id="areas" class="checkout-input @error('area_id') is-invalid @enderror">
                                        <option value="">{{ __('messages.Please Chose an Area') }}</option>
                                    </select>
                                </div>
                                @error('area_id')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="checkout-label">{{ __('messages.Address') }} <span class="req">*</span></label>
                                <textarea name="shipping_address" class="checkout-input" rows="3"
                                    placeholder="{{ __('messages.House number and street name') }}"
                                    required>{{ optional(Auth::user())->address }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="checkout-label">{{ __('messages.Note') }} <span style="font-weight:400; text-transform:none; color:#aaa;">({{ __('messages.Optional') }})</span></label>
                                <textarea name="note" class="checkout-input" rows="2"
                                    placeholder="{{ __('messages.Any special instructions for your order...') }}"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="checkout-card">
                        <div class="checkout-card-title">
                            <span class="title-icon"><i class="fa fa-credit-card"></i></span>
                            {{ __('messages.Payment Method') }}
                        </div>

                        @if(env('DELIVERY_CHARGE_ADVANCED') == true)
                        <div class="delivery-banner">
                            <strong><i class="fa fa-circle-info" style="margin-right:5px;"></i>ডেলিভারি চার্জ সম্পর্কে জানুন</strong>
                            ক্যাশ অন ডেলিভারিতে ডেলিভারি চার্জ অগ্রিম প্রযোজ্য — ঢাকার ভিতরে ৭০ টাকা, ঢাকার বাহিরে ১২০ টাকা।
                            বিকাশ / নগদ: <strong>01784447632</strong>
                        </div>
                        @endif

                        <div class="payment-badge">
                            <i class="fa fa-truck"></i>
                            {{ __('messages.Cash On Delivery') }}
                        </div>

                        {{-- Hidden payment options (preserved for future use) --}}
                        <div class="d-none">
                            <div class="hiddenradio d-flex">
                                <label class="text-center shadow rounded p-3 mx-3">
                                    <input type="radio" name="payment_type" checked value="cod" required>
                                    <img width="100" class="rounded-pill" src="{{ asset('assets/images/cod.png') }}">
                                    <br><span>{{ __('messages.Cash On Delivery') }}</span>
                                </label>
                                @if(env('BKASH') == true)
                                <label class="text-center shadow rounded p-3 mx-3">
                                    <input type="radio" name="payment_type" value="bkash">
                                    <img width="100" class="rounded-pill" src="{{ asset('assets/images/bkash-logo.png') }}">
                                    <br><span>{{ __('messages.Online Payment') }}</span>
                                </label>
                                @endif
                                @if(Auth::check() && (optional(Auth::user())->wallet_amount >= $total_with_discount))
                                <label class="text-center shadow rounded p-3 mx-3" style="display: none;" id="wallet_select_body">
                                    <input type="radio" name="payment_type" value="wallet">
                                    <img width="100" class="rounded-pill" src="{{ asset('assets/images/online-payment.jpg') }}">
                                    <br><span>{{ __('messages.Use Wallet') }} ({{ optional(Auth::user())->wallet_amount }})</span>
                                </label>
                                @endif
                            </div>
                        </div>
                        {{-- Visible COD radio for form submission --}}
                        <input type="radio" name="payment_type" value="cod" checked required style="display:none;">
                    </div>

                    {{-- Terms & Confirm --}}
                    <div class="checkout-card">
                        <div class="terms-check mb-4">
                            <input class="checkout__checkbox--input" id="check2" required type="checkbox" checked>
                            <label for="check2">
                                {{ __('messages.I agree to the') }}
                                <a href="#">{{ __('messages.Terms and Conditions') }}</a>,
                                <a href="#">{{ __('messages.Return Refund Policy') }}</a>
                                {{ __('messages.&') }}
                                <a href="#">{{ __('messages.Privacy Policy') }}</a>
                            </label>
                        </div>

                        <button class="confirm-btn" type="submit">
                            <i class="fa fa-lock"></i>
                            {{ __('messages.Confirm Order') }}
                        </button>

                        <a class="return-link" href="{{ route('products') }}">
                            <i class="fa fa-arrow-left" style="font-size:0.75rem;"></i>
                            {{ __('messages.Return to shop') }}
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#district_id').change(function(){
        var district_id = $(this).val();
        if (district_id == '') { district_id = -1; }

        var option = "<option value=''>{{ __('messages.Please Chose Your Shipping Area') }}</option>";
        var url = "{{ url('/') }}";

        $.get(url + "/get-area/" + district_id, function(data) {
            data = JSON.parse(data);
            data.forEach(function(element) {
                option += "<option value='" + element.id + "'>" + element.name + "</option>";
            });
            $('#areas').html(option);
        });

        var subtotal = $('#subtotal').val();
        let discount = $('#discount').val();
        let auth_status = $('#auth_status').val();

        $.ajax({
            url: url + "/get-shipping-charge",
            type: "get",
            data: { district_id: district_id, subtotal: subtotal, discount: discount },
            success: function(response) {
                var total = (parseInt(subtotal) - parseInt(discount)) + parseInt(response.shipping_charge_amount);
                var wallet_amount = response.wallet_amount;

                if (auth_status == 1 && parseFloat(wallet_amount) >= parseFloat(total)) {
                    $('#wallet_select_body').show();
                }

                $('#shipping_charge_label').html(response.shipping_charge);
                $('#total_show').html(response.total_show);
                $('#total').val(response.total_amount);
                $('#shipping_charge').val(response.shipping_charge_amount);
            }
        });
    });

    function calculate_total() {}

    function payment_setup(type) {
        if (type == 'cod') {
            $('#online_mfs_main_div').hide();
            $('#online_payment_mfs').prop('required', false);
            $('#online_mfs_paymnet_number').prop('required', false);
        } else if (type == 'online_mfs') {
            $('#online_mfs_main_div').show();
            $('#online_payment_mfs').prop('required', true);
            $('#online_mfs_paymnet_number').prop('required', true);
        }
    }
</script>

@endsection
