
@extends('user.inc.master')
@php( $business_info = business_info() )
@section('title') Welcome To  @endsection
@section('description'){{optional($business_info)->meta_description}}@endsection
@section('keywords'){{optional($business_info)->meta_keywords}}@endsection

@section('content')

{{-- ===== DARK LUXURY HOMEPAGE GLOBAL THEME ===== --}}
<style>
/* ---- Dark Luxury CSS Variables ---- */
:root {
    --dlux-bg:        #080604;
    --dlux-surface:   #100d06;
    --dlux-surface2:  #161109;
    --dlux-gold:      #c9a84c;
    --dlux-gold-lt:   #f0c840;
    --dlux-gold-dk:   #9a7a0a;
    --dlux-rose:      #b76e79;
    --dlux-glow:      rgba(201,168,76,0.38);
    --dlux-text:      #e8d8b0;
    --dlux-text-dim:  rgba(232,216,176,0.6);
}

/* ---- Page Background ---- */
body {
    background-color: var(--dlux-bg) !important;
}

/* ---- Header area transparency on hero ---- */
.header__section {
    position: relative;
    z-index: 100;
}

/* ---- All page sections: dark surfaces ---- */
.team__section,
.product__section,
#category_wise_product,
#best_selling_products,
#featured_products,
#trending_now,
.section--padding {
    background-color: var(--dlux-surface) !important;
}

/* Alternating surface for depth */
#best_selling_products .product__section,
#trending_now .product__section {
    background-color: var(--dlux-surface2) !important;
}

/* ---- Section Headings: Luxury Gold ---- */
.section__heading--maintitle {
    color: var(--dlux-text) !important;
    font-family: 'Playfair Display', 'Georgia', serif !important;
    position: relative;
    display: inline-block;
}
.section__heading--maintitle::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--dlux-gold), var(--dlux-rose), var(--dlux-gold), transparent);
    border-radius: 2px;
    box-shadow: 0 0 10px var(--dlux-glow);
    transition: width 0.8s ease 0.4s;
}
.section__heading.visible .section__heading--maintitle::after { width: 65%; }
.section__heading--subtitle { color: var(--dlux-text-dim) !important; }

/* ---- Category Section ---- */
.team__section {
    background: linear-gradient(180deg, var(--dlux-bg) 0%, var(--dlux-surface) 100%) !important;
    padding: 40px 0 !important;
}

/* Gold Divider */
.gold-divider {
    width: 70px;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--dlux-gold), var(--dlux-rose), var(--dlux-gold), transparent);
    margin: 14px auto 0;
    border-radius: 2px;
    opacity: 0;
    transform: scaleX(0);
    transition: opacity 0.6s ease 0.5s, transform 0.6s ease 0.5s;
}
.section__heading.visible .gold-divider { opacity: 1; transform: scaleX(1); }

/* ---- Category Cards: Dark Glassmorphism ---- */
@keyframes catBounceIn {
    0%   { opacity: 0; transform: translateY(55px) scale(0.72); }
    55%  { transform: translateY(-12px) scale(1.07); }
    78%  { transform: translateY(5px) scale(0.97); }
    100% { opacity: 1; transform: translateY(0) scale(1); }
}
.cat-anim {
    opacity: 0;
    animation: catBounceIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
}
.cat-anim:nth-child(1)  { animation-delay: 0.06s; }
.cat-anim:nth-child(2)  { animation-delay: 0.14s; }
.cat-anim:nth-child(3)  { animation-delay: 0.22s; }
.cat-anim:nth-child(4)  { animation-delay: 0.30s; }
.cat-anim:nth-child(5)  { animation-delay: 0.38s; }
.cat-anim:nth-child(6)  { animation-delay: 0.46s; }
.cat-anim:nth-child(7)  { animation-delay: 0.54s; }
.cat-anim:nth-child(8)  { animation-delay: 0.62s; }
.cat-anim:nth-child(9)  { animation-delay: 0.70s; }
.cat-anim:nth-child(10) { animation-delay: 0.78s; }
.cat-anim:nth-child(11) { animation-delay: 0.86s; }
.cat-anim:nth-child(12) { animation-delay: 0.94s; }

.cat-box {
    background: rgba(20, 15, 6, 0.75) !important;
    backdrop-filter: blur(16px) saturate(140%) !important;
    -webkit-backdrop-filter: blur(16px) saturate(140%) !important;
    border: 1px solid rgba(201,168,76,0.15) !important;
    border-radius: 12px !important;
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.04) !important;
}
.cat-box::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(201,168,76,0.1), transparent 60%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
    z-index: 0;
}
.cat-box:hover {
    transform: translateY(-10px) scale(1.05) !important;
    border-color: rgba(201,168,76,0.6) !important;
    box-shadow: 0 16px 45px rgba(0,0,0,0.5),
                0 0 30px rgba(201,168,76,0.15),
                inset 0 1px 0 rgba(255,255,255,0.08) !important;
}
.cat-box:hover::before { opacity: 1; }
.cat-image {
    transition: transform 0.5s cubic-bezier(0.34, 1.2, 0.64, 1) !important;
    position: relative; z-index: 1;
    filter: brightness(0.9) saturate(0.9);
    transition: transform 0.5s ease, filter 0.5s ease !important;
}
.cat-box:hover .cat-image {
    transform: scale(1.12) rotate(-1deg) !important;
    filter: brightness(1.05) saturate(1.1) !important;
}
.cat-title {
    color: var(--dlux-text) !important;
    font-weight: 600 !important;
    transition: color 0.3s ease, letter-spacing 0.3s ease !important;
    position: relative; z-index: 1;
}
.cat-box:hover .cat-title {
    color: var(--dlux-gold) !important;
    letter-spacing: 0.5px !important;
}

/* ---- Scroll Reveal: 3D Zoom-In from Front ---- */
.reveal {
    opacity: 0;
    transform: perspective(900px) scale(0.78) translateZ(-80px) translateY(30px);
    transform-origin: center center;
    transition: opacity 0.9s cubic-bezier(0.34, 1.15, 0.64, 1),
                transform 0.9s cubic-bezier(0.34, 1.15, 0.64, 1);
    will-change: transform, opacity;
}
.reveal.visible {
    opacity: 1;
    transform: perspective(900px) scale(1) translateZ(0) translateY(0);
}

/* ---- Four Banner Section: Dark overlay ---- */
.banner__section,
.banner__items--thumbnail__img {
    filter: brightness(0.88) !important;
    transition: filter 0.4s ease !important;
}
.banner__items--thumbnail:hover .banner__items--thumbnail__img {
    filter: brightness(1.0) !important;
}

/* ---- Blog Section Dark ---- */
.blog__section { background: var(--dlux-surface) !important; }
.blog__items--content__title a { color: var(--dlux-text) !important; }
.blog__items--content__title a:hover { color: var(--dlux-gold) !important; }
.blog__items--content__desc { color: var(--dlux-text-dim) !important; }
.blog__items {
    background: rgba(20,15,6,0.7) !important;
    border: 1px solid rgba(201,168,76,0.1) !important;
    border-radius: 12px !important;
    overflow: hidden;
    transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
}
.blog__items:hover {
    border-color: rgba(201,168,76,0.4) !important;
    box-shadow: 0 8px 30px rgba(0,0,0,0.4) !important;
}
</style>

@include('user.partials.slider')

{{-- ===== FEATURED CATEGORIES ===== --}}
<section class="team__section py-4 mt-10">
    <div class="container-fluid">
        <div class="section__heading text-center mb-4 reveal">
            <h2 title="Get your desired product from featured category"
                class="section__heading--maintitle">{{ __('messages.Featured Categories') }}</h2>
            <div class="gold-divider"></div>
        </div>
        <div class="row
            row-cols-xxl-6
            row-cols-xl-6
            row-cols-lg-6
            cat-cols-md-3
            cat-cols-sm-3
            cat-cols-3
        ">
            @foreach($featured_categories as $category)
            <div class="p-2 cat-anim">
                <div class="rounded shadow cat-zoom cat-py-5 cat-box">
                    <a href="{{route('products', ['category_id'=>$category->id])}}">
                        <div class="row text-center">
                            <div class="col-12">
                                <img class="cat-image"
                                     src="{{ asset('images/category/'.$category->image) }}"
                                     alt="{{ $category->title }}">
                            </div>
                            <div class="col-12 cat-title-box">
                                <p class="cat-title"> {{ __translate($category->title, $category->bn_title) }} </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Category wise Product --}}
<div id="category_wise_product" class="reveal">
    <section class="product__section section--padding pt-0" style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>
</div>

{{-- top selling --}}
<div id="best_selling_products" class="reveal"></div>

{{-- New arrival products --}}
<div id="featured_products" class="reveal">
    <section class="product__section section--padding pt-0" style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>
</div>

{{-- <div id="flash_sale_offer"></div> --}}
<div class="reveal">
    @include('user.partials.home_page_four_banner')
</div>

{{-- Trending Now --}}
<div id="trending_now" class="reveal">
    <section class="product__section section--padding pt-0" style="padding-bottom: 3rem !important;">
        <div class="container-fluid">
            @include('user.inc.skeleton-product',['load'=>4])
        </div>
    </section>
</div>

<!-- Start testimonial section -->
<div class="reveal">
    @include('user.inc.testimonial')
</div>
<!-- End testimonial section -->

@if($blogs->isNotEmpty())
    <div class="reveal">
        @include('user.inc.blog')
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Scroll-reveal with IntersectionObserver
    const _dluxReveal = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .section__heading').forEach(el => _dluxReveal.observe(el));

    $(window).on('load', function () {
        featured_products();
        trending_now();
        category_wise_product();
        best_selling_products();
        // flash_sale_offer();
    });
</script>
@endsection
