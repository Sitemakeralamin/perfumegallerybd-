<style>
    .team__items {
        width: 100% !important;
    }

    .cat-box {
        border: 1px solid rgb(234, 230, 230);
        border-radius: 14px !important;
    }

    .home1__slider--bg {
        height: 200px;
        background-repeat: no-repeat !important;
        background-attachment: scroll !important;
        background-position: center center !important;
        background-size: cover !important;
    }

    .hover-zoom:hover {
        -ms-transform: scale(.5);
        -webkit-transform: scale(.5);
        transition: transform 1.2s;
        transform: scale(1.1);
    }

    /* Custom Code var(--logo-color) */
   
    .cat-zoom {
        transition: transform 1.2s, border-color 1.2s, box-shadow 1.2s;
    }


    .cat-zoom:hover {
        -ms-transform: scale(.5);
        -webkit-transform: scale(.5);
        transition: transform 1.2s;
        transform: scale(1.1);
    }
    .cat-zoom:hover .cat-title {
        color: var(--secondary-color);
        transition: transform 1.2s;
        transform: scale(1.1);
    }
    .cat-zoom:hover img {
        filter: grayscale(0%);
        /* Remove grayscale on hover */
    }

    /* ./ Custome End */

    h4.product__items--content__title {
        min-height: 50px !important;
    }

    .product_col:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        transition: .4s;
    }

    .toastify {
        /* border-radius: 30px !important; */
        padding: 6px 10px !important;
    }

    input.quantity__number {
        width: 5rem !important;
    }

    .side_cart_update_button {
        height: 25px !important;
        font-size: 10px;
    }

    .side_cart_qty {
        width: 60px !important;
        height: 25px !important;
    }

    @media only screen and (min-width: 768px) {
        .main__logo--img {
            max-width: 226px !important;
        }

        .big-screen-none {
            display: none !important;
        }



    }

    @media only screen and (max-width: 768px) {
        .header__sticky {
            border-bottom: 1px solid #e6e3e0 !important;
        }
    }

    .search_product_output {
        padding: 3px;
        list-style: none;
        text-align: left;
        position: absolute;
        z-index: 998;
        background-color: #fff;
        width: 95%;
        overflow: hidden;
    }


    a.whatsapp {
        color: #00A356 !important;
    }

    .custom_phone {
        font-size: 25px !important;
        padding: 1px !important;
        padding: 9px !important
    }

    #scroll__top {
        /* border-radius: 50px !important; */
        text-align: center !important;
        bottom: 75px !important;
    }

    iframe {
        bottom: 75px !important;
    }

    .header__topbar {
        padding: 5px !important;
    }

    .header__menu--link:hover {
        color: var(--dlux-gold) !important;
    }

    .offcanvas__stikcy--toolbar__icon {
        background-color: none !important;
        background: none !important;
        height: 2.5rem !important;
    }

    .offcanvas__stikcy--toolbar__label {
        margin-top: 0px !important;
    }

    /* .items__count {
        background-color: none !important;
    } */

    .offcanvas__stikcy--toolbar {
        /* border-top: 1px solid #EE2761; */
    }

    .bottom_navigation_custom {
        text-align: center;
        padding: 5px;
        border-radius: 10px;
        border: 1.5px solid var(--logo-color);
        box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
    }

    .minicart__quantity {
        margin-right: 5px !important;
    }

    /* .minicart__product {

    } */

    /* .bg__secondary {
        background: #F59C33 !important;
    }

    .items__count {
        background: #F59C33 !important;
    } */

    .shop_more_btn {
        font-size: 1.7rem !important;
        line-height: 4rem !important;
        height: 4rem !important;
        padding: 0px 15px !important;
    }

    .color-animation {
        animation: color-change-animation 2s infinite;
    }

    @keyframes color-change-animation {
        0% {
            color: var(--logo-color);
        }

        33% {
            color: var(--logo-color);
        }

        67% {
            color: var(--logo-color);
        }

        100% {
            color: var(--logo-color);
        }

    }
    .flex{display: flex}
    .flex-col{flex-direction: column}
    .h-full{height:100%;}
    .h-auto{height: auto}
    .w-full{width:100%;}
    .w-auto{width: auto}
    .items-center{align-items:center;}
    .gap-4{gap:1rem;}
    .duration-300{transition-duration: .3s;}
    .rounded-full{border-radius: 9999px;}
    .border-white {
        border-color: rgb(242, 240, 240);
    }
    .border-primary-hover:hover {
        border-color: var(--logo-color);
    }
    .text-xl {
    font-size: 1.25rem;
    }
    .tracking-wider {
    letter-spacing: .05em;
}
.text-2xl {font-size: 1.5rem;}
.text-3xl {font-size: 2rem;}
.w-1{width:1px;}
.w-14{width:3.5rem;}
.w-24{width:5.5rem;}
.h-5{height: 1.25rem;}
.block{display:block;}
.text-lg{font-size: 1.125rem;}
.product-details-tab-list{
    cursor:pointer;
    margin-right: 1.5rem;
    border: 1px solid #aba8a8;
    border-bottom:0px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 7px;
    padding-bottom: 7px;
    border-radius: 5px 5px 0px 0px;
    font-size: 1.8rem;
    font-weight: 500;
}
.single-product-bg-info{
    background-color: rgba(20,14,5,0.80);
    border: 1px solid rgba(201,168,76,0.12);
    border-radius: 8px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
}
.text-xs{ font-size: .813rem;}
.text-2xs{ font-size: .75rem;}
.bg-secondary{background-color: var(--secondary-color)}

/* WhatsApp Start */
@import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
* {
	font-family: "Roboto", sans-serif;
}
button.wh-ap-btn {
	outline: none;
	width: 60px;
	height: 60px;
	border: 0;
	background-color: #2ecc71;
	padding: 0;
	border-radius: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
	cursor: pointer;
	transition: opacity 0.3s, background 0.3s, box-shadow 0.3s;
}

button.wh-ap-btn::after {
	content: "";
	background-image: url("{{ asset('frontend/assets/img/icon/WhatsApp.png') }}");
	background-position: center center;
	background-repeat: no-repeat;
	background-size: 60%;
	width: 100%;
	height: 100%;
	display: block;
	opacity: 1;
}

button.wh-ap-btn:hover {
	opacity: 1;
	background-color: #20bf6b;
	box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.wh-api {
	position: fixed;
	bottom: 0;
	right: 0;
}

.wh-fixed {
	margin-right: 15px;
	margin-bottom: 65px;
}

.wh-fixed > a {
	display: block;
	text-decoration: none;
}

button.wh-ap-btn::before {
	content: "Chat with me";
	display: block;
	position: absolute;
	margin-left: -130px;
	margin-top: 16px;
	height: 25px;
	background: #49654e;
	color: #fff;
	font-weight: 400;
	font-size: 15px;
	border-radius: 3px;
	width: 0;
	opacity: 0;
	padding: 0;
	transition: opacity 0.4s, width 0.4s, padding 0.5s;
	padding-top: 7px;
	border-radius: 30px;
	box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
}

/* .wh-fixed > a:hover button.wh-ap-btn::before {
	opacity: 1;
	width: auto;
	padding-top: 0px;
	padding-left: 10px;
	padding-right: 10px;
	width: 110px;
} */

/* animacion pulse */

.whatsapp-pulse {
	width: 60px;
	height: 60px;
	right: 10px;
	bottom: 10px;
	background: #10b418;
	position: fixed;
	text-align: center;
	color: #ffffff;
	cursor: pointer;
	border-radius: 50%;
	z-index: 99;
	display: inline-block;
	line-height: 65px;
}

.whatsapp-pulse:before {
	position: absolute;
	content: " ";
	z-index: -1;
	bottom: -15px;
	right: -15px;
	background-color: #10b418;
	width: 90px;
	height: 90px;
	border-radius: 100%;
	animation-fill-mode: both;
	-webkit-animation-fill-mode: both;
	opacity: 0.6;
	-webkit-animation: pulse 1s ease-out;
	animation: pulse 1.8s ease-out;
	-webkit-animation-iteration-count: infinite;
	animation-iteration-count: infinite;
}

@-webkit-keyframes pulse {
	0% {
		-webkit-transform: scale(0);
		opacity: 0;
	}
	25% {
		-webkit-transform: scale(0.3);
		opacity: 1;
	}
	50% {
		-webkit-transform: scale(0.6);
		opacity: 0.6;
	}
	75% {
		-webkit-transform: scale(0.9);
		opacity: 0.3;
	}
	100% {
		-webkit-transform: scale(1);
		opacity: 0;
	}
}

@keyframes pulse {
	0% {
		transform: scale(0);
		opacity: 0;
	}
	25% {
		transform: scale(0.3);
		opacity: 1;
	}
	50% {
		transform: scale(0.6);
		opacity: 0.6;
	}
	75% {
		transform: scale(0.9);
		opacity: 0.3;
	}
	100% {
		transform: scale(1);
		opacity: 0;
	}
}

/* WhatsApp End*/

/* ============================================================
   DARK LUXURY GLOBAL THEME — applies to ALL pages
   ============================================================ */

/* Google Fonts: Playfair Display for headings */
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap');

/* ---- CSS Variables ---- */
:root {
    --dlux-bg:       #080604;
    --dlux-surface:  #0e0b05;
    --dlux-surface2: #161109;
    --dlux-card:     rgba(18,13,5,0.80);
    --dlux-gold:     #c9a84c;
    --dlux-gold-lt:  #f0c840;
    --dlux-gold-dk:  #9a7a0a;
    --dlux-rose:     #b76e79;
    --dlux-glow:     rgba(201,168,76,0.35);
    --dlux-text:     #e8d8b0;
    --dlux-text-muted: rgba(232,216,176,0.55);
    --dlux-border:   rgba(201,168,76,0.16);
}

/* ---- Base: Body & Page ---- */
body {
    background-color: var(--dlux-bg) !important;
    color: var(--dlux-text) !important;
}
.main__content_wrapper { background-color: var(--dlux-bg) !important; }

/* ---- ALL Sections: Dark ---- */
section,
.section--padding,
.product__section,
.shop__section,
.breadcrumb__section,
.cart__section,
.checkout__section,
.about__section,
.contact__section,
.blog__section,
.account__section,
.wishlist__section,
.order__section,
.track__section,
.flash__sale--section,
.my__account--section,
.others__page--section {
    background-color: var(--dlux-surface) !important;
}

/* ---- Text: Headings ---- */
h1, h2, h3, h4, h5, h6 { color: var(--dlux-text) !important; }
p { color: rgba(232,216,176,0.72) !important; }
a { color: var(--dlux-text) !important; }
a:hover { color: var(--dlux-gold) !important; }
span { color: inherit; }
label { color: var(--dlux-text) !important; }
li { color: rgba(232,216,176,0.72) !important; }

/* ---- Breadcrumb ---- */
.breadcrumb__section {
    background: linear-gradient(135deg, var(--dlux-bg) 0%, var(--dlux-surface2) 100%) !important;
    border-bottom: 1px solid var(--dlux-border) !important;
}
.breadcrumb__content--title { color: var(--dlux-text) !important; }
.breadcrumb__list--link,
.breadcrumb__list--title { color: var(--dlux-text-muted) !important; }
.breadcrumb__list--link:hover { color: var(--dlux-gold) !important; }

/* ---- Shop Sidebar ---- */
.widget__bg,
.shop__sidebar,
.single__widget,
.offcanvas__filter--sidebar {
    background: var(--dlux-card) !important;
    backdrop-filter: blur(16px) !important;
    border: 1px solid var(--dlux-border) !important;
    border-radius: 10px !important;
}
.widget__title { color: var(--dlux-text) !important; }
.widget__categories--menu__text,
.widget__categories--sub__menu--text { color: rgba(232,216,176,0.80) !important; }
.widget__categories--sub__menu--link:hover .widget__categories--sub__menu--text {
    color: var(--dlux-gold) !important;
}
.widget__range--output,
.widget__price--output { color: var(--dlux-gold) !important; }

/* Price range slider track */
.widget__range--slider { background: rgba(201,168,76,0.25) !important; }
.noUi-connect { background: var(--dlux-gold) !important; }
.noUi-handle {
    background: var(--dlux-gold) !important;
    border: 2px solid var(--dlux-gold-lt) !important;
    box-shadow: 0 0 10px var(--dlux-glow) !important;
}

/* ---- Shop Top Bar: sort/filter bar ---- */
.shop__header,
.product__showing--count { color: var(--dlux-text-muted) !important; }
.select2-container .select2-selection--single,
.form-select {
    background: var(--dlux-card) !important;
    border: 1px solid var(--dlux-border) !important;
    color: var(--dlux-text) !important;
    border-radius: 6px !important;
}
.select2-results__option { background: var(--dlux-surface2) !important; color: var(--dlux-text) !important; }
.select2-results__option--highlighted { background: var(--dlux-gold-dk) !important; color: #fff !important; }

/* ---- Forms ---- */
input:not([type="submit"]):not([type="button"]):not([type="radio"]):not([type="checkbox"]),
select,
textarea {
    background: rgba(20,14,5,0.85) !important;
    border: 1px solid var(--dlux-border) !important;
    color: var(--dlux-text) !important;
    border-radius: 6px !important;
    transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
}
input:focus,
select:focus,
textarea:focus {
    border-color: var(--dlux-gold) !important;
    box-shadow: 0 0 0 3px rgba(201,168,76,0.15) !important;
    outline: none !important;
}
input::placeholder,
textarea::placeholder { color: var(--dlux-text-muted) !important; }

/* ---- Cart / Checkout Tables ---- */
.cart__table--body__list,
.order__table,
.table {
    background: var(--dlux-card) !important;
    color: var(--dlux-text) !important;
    border-color: var(--dlux-border) !important;
}
.cart__table--head,
thead th {
    background: rgba(20,14,5,0.95) !important;
    color: var(--dlux-gold) !important;
    border-color: var(--dlux-border) !important;
    font-family: 'Playfair Display', serif !important;
    letter-spacing: 1px;
}
.table td, .table th { border-color: var(--dlux-border) !important; }
.cart__product--name a { color: var(--dlux-text) !important; }
.cart__product--name a:hover { color: var(--dlux-gold) !important; }

/* Cart totals */
.cart__summary,
.checkout__section .card,
.order__summary {
    background: var(--dlux-card) !important;
    border: 1px solid var(--dlux-border) !important;
    border-radius: 12px !important;
    color: var(--dlux-text) !important;
}

/* ---- Buttons: Gold Luxury ---- */
.primary__btn,
.checkout__btn,
.place__order--btn,
.coupon__code--apply,
.order__btn {
    background: linear-gradient(135deg, var(--dlux-gold-dk), var(--dlux-gold)) !important;
    color: #fff !important;
    border: none !important;
    border-radius: 8px !important;
    font-weight: 700 !important;
    letter-spacing: 1px;
    transition: box-shadow 0.3s ease, transform 0.3s ease !important;
}
.primary__btn:hover,
.checkout__btn:hover,
.place__order--btn:hover {
    box-shadow: 0 0 20px rgba(201,168,76,0.5) !important;
    transform: translateY(-2px) !important;
    color: #fff !important;
}

/* ---- Account / Customer Pages ---- */
.account__sidebar,
.account__wrapper,
.my__account--box {
    background: var(--dlux-card) !important;
    border: 1px solid var(--dlux-border) !important;
    border-radius: 12px !important;
    color: var(--dlux-text) !important;
}
.account__sidebar--link,
.account__sidebar--menu__link {
    color: var(--dlux-text-muted) !important;
    transition: color 0.3s ease, padding-left 0.3s ease !important;
}
.account__sidebar--link:hover,
.account__sidebar--menu__link:hover,
.account__sidebar--link.active {
    color: var(--dlux-gold) !important;
    padding-left: 6px !important;
}

/* ---- Single Product Page ---- */
.product__details--section,
.product__details--info,
.single-product-bg-info {
    background: var(--dlux-card) !important;
    border-radius: 12px !important;
    border: 1px solid var(--dlux-border) !important;
    color: var(--dlux-text) !important;
}
.product__details--info__title { color: var(--dlux-text) !important; }
.product__details--price .current__price { color: var(--dlux-gold) !important; font-weight: 700 !important; }
.product__details--price .old__price { color: var(--dlux-text-muted) !important; text-decoration: line-through; }
.product-details-tab-list {
    background: var(--dlux-card) !important;
    border-color: var(--dlux-border) !important;
    color: var(--dlux-text) !important;
}
.product-details-tab-list.active,
.product-details-tab-list:hover { border-color: var(--dlux-gold) !important; color: var(--dlux-gold) !important; }

/* ---- Header Submenu: VISIBLE Fix ---- */
.header__sub--menu {
    background: rgba(12,9,3,0.97) !important;
    backdrop-filter: blur(22px) !important;
    border-top: 2px solid var(--dlux-gold) !important;
    border: 1px solid var(--dlux-border) !important;
    box-shadow: 0 12px 40px rgba(0,0,0,0.6) !important;
}
.header__sub--menu__link {
    color: #e0ceA0 !important;
    transition: color 0.25s ease, padding-left 0.25s ease, background 0.25s ease !important;
    padding: 6px 14px !important;
    display: block;
    border-radius: 4px;
}
.header__sub--menu__link:hover {
    color: var(--dlux-gold) !important;
    background: rgba(201,168,76,0.08) !important;
    padding-left: 20px !important;
}

/* ---- Search Dropdown ---- */
.search_product_output {
    background: rgba(12,9,3,0.97) !important;
    border: 1px solid var(--dlux-border) !important;
    border-radius: 8px !important;
    backdrop-filter: blur(20px) !important;
    box-shadow: 0 12px 40px rgba(0,0,0,0.6) !important;
}

/* ---- Footer: Dark Luxury ---- */
.footer__section,
.footer__section.bg__logo {
    background: #060402 !important;
    border-top: 1px solid rgba(201,168,76,0.18) !important;
}
.footer__widget--title { color: var(--dlux-gold-lt) !important; }
.footer__widget--menu__text { color: rgba(232,216,176,0.65) !important; }
.footer__widget--menu__text:hover { color: var(--dlux-gold) !important; }
.copyright__content { color: rgba(232,216,176,0.5) !important; }
.copyright__content--link { color: rgba(232,216,176,0.5) !important; }
.copyright__content--link:hover { color: var(--dlux-gold) !important; }
.text-ofwhite { color: rgba(232,216,176,0.75) !important; }
.footer__bottom { border-top: 1px solid var(--dlux-border) !important; }

/* ---- Minicart / Side Cart ---- */
.offCanvas__minicart {
    background: rgba(10,7,3,0.98) !important;
    backdrop-filter: blur(20px) !important;
    border-left: 1px solid var(--dlux-border) !important;
    z-index: 999999 !important;
}
/* Minicart backdrop overlay must also be on top */
.offCanvas__minicart--overlay,
[data-offcanvas-overlay],
.body__overlay {
    z-index: 999998 !important;
}
.minicart__title { color: var(--dlux-text) !important; }
.minicart__product--name a { color: var(--dlux-text) !important; }
.minicart__product--name a:hover { color: var(--dlux-gold) !important; }
.minicart__product--price { color: var(--dlux-gold) !important; }
.minicart__close--btn { color: var(--dlux-text-muted) !important; }
.minicart__close--btn:hover { color: var(--dlux-gold) !important; }

/* ---- Offcanvas Mobile Menu ---- */
.offcanvas__header {
    background: rgba(10,7,3,0.98) !important;
    backdrop-filter: blur(20px) !important;
}
.offcanvas__menu_item,
.offcanvas__sub_menu_item { color: var(--dlux-text) !important; }
.offcanvas__menu_item:hover,
.offcanvas__sub_menu_item:hover { color: var(--dlux-gold) !important; }
.offcanvas__close--btn { color: var(--dlux-text-muted) !important; background: none !important; }
.offcanvas__close--btn:hover { color: var(--dlux-gold) !important; }

/* ---- Section Headings Site-wide ---- */
.section__heading--maintitle {
    font-family: 'Playfair Display', Georgia, serif !important;
    color: var(--dlux-text) !important;
}
.section__heading--subtitle { color: var(--dlux-text-muted) !important; }

/* ---- Pagination ---- */
.pagination__area,
.pagination li a,
.pagination-item a {
    background: var(--dlux-card) !important;
    border: 1px solid var(--dlux-border) !important;
    color: var(--dlux-text) !important;
    border-radius: 6px !important;
}
.pagination li a:hover,
.pagination li.active a {
    background: var(--dlux-gold-dk) !important;
    color: #fff !important;
    border-color: var(--dlux-gold) !important;
}

/* ---- Skeleton loader dark ---- */
.skeleton {
    background: linear-gradient(90deg, rgba(25,18,6,0.8) 25%, rgba(40,30,10,0.8) 50%, rgba(25,18,6,0.8) 75%) !important;
    background-size: 200% 100% !important;
}

/* ---- Rating stars: gold ---- */
.rating__list--icon svg path { fill: var(--dlux-gold) !important; }
.rating__list--icon { color: var(--dlux-gold) !important; }

/* ---- Mobile bottom toolbar dark ---- */
.offcanvas__stikcy--toolbar {
    background: rgba(8,6,3,0.96) !important;
    backdrop-filter: blur(18px) !important;
    border-top: 1px solid var(--dlux-border) !important;
}
.offcanvas__stikcy--toolbar__label { color: rgba(232,216,176,0.65) !important; }
.offcanvas__stikcy--toolbar__icon { color: rgba(232,216,176,0.65) !important; background: none !important; }
.offcanvas__stikcy--toolbar__btn:hover .offcanvas__stikcy--toolbar__icon,
.offcanvas__stikcy--toolbar__btn:hover .offcanvas__stikcy--toolbar__label {
    color: var(--dlux-gold) !important;
}

/* ---- Predictive search box dark ---- */
.predictive__search--box {
    background: rgba(8,6,3,0.97) !important;
    backdrop-filter: blur(22px) !important;
    border-right: 1px solid var(--dlux-border) !important;
}
.predictive__search--title { color: var(--dlux-text) !important; }
.predictive__search--input {
    background: rgba(20,14,5,0.85) !important;
    border: 1px solid var(--dlux-border) !important;
    color: var(--dlux-text) !important;
    border-radius: 30px !important;
}
.predictive__search--input:focus {
    border-color: var(--dlux-gold) !important;
    box-shadow: 0 0 0 3px rgba(201,168,76,0.15) !important;
}

/* ============================================================
   FIX 1 — Brand / Filter Checkbox Cards (Shop Sidebar)
   ============================================================ */
.widget__form--check__label {
    background: rgba(18,13,5,0.80) !important;
    border: 1px solid rgba(201,168,76,0.18) !important;
    color: var(--dlux-text) !important;
    backdrop-filter: blur(10px);
    border-radius: 8px !important;
    transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease !important;
}
.widget__form--check__label:hover {
    border-color: rgba(201,168,76,0.55) !important;
    color: var(--dlux-gold) !important;
    background: rgba(201,168,76,0.1) !important;
}

/* Custom checkmark circle — rose-gold ring */
.widget__form--checkmark {
    background: rgba(15,11,5,0.9) !important;
    border: 1.5px solid rgba(183,110,121,0.55) !important;
    box-shadow: none !important;
    transition: all 0.3s ease !important;
}
.widget__form--check__input:checked ~ .widget__form--checkmark {
    background: linear-gradient(135deg, #9a7a0a, #c9a84c) !important;
    border-color: var(--dlux-gold) !important;
    box-shadow: 0 0 10px rgba(201,168,76,0.5) !important;
}
.widget__form--check__input:checked ~ .widget__form--check__label {
    border-color: var(--dlux-gold) !important;
    color: var(--dlux-gold) !important;
    background: rgba(201,168,76,0.1) !important;
}

/* Price filter inputs in sidebar */
.price__filter--input {
    background: rgba(18,13,5,0.85) !important;
    border: 1px solid rgba(201,168,76,0.2) !important;
    border-radius: 6px !important;
}
.price__filter--input__field {
    background: transparent !important;
    color: var(--dlux-text) !important;
}
.price__filter--currency { color: var(--dlux-gold) !important; }
.price__filter--label { color: var(--dlux-text-muted) !important; }

/* ============================================================
   FIX 2 — Nav Submenu Z-Index (above all content)
   ============================================================ */
.header__section { z-index: 9999 !important; position: relative; }
.main__header    { z-index: 9999 !important; position: relative; }
.header__bottom  { z-index: 9998 !important; position: relative; }

.header__menu--items {
    position: relative !important;
    z-index: 9999 !important;
}
.header__sub--menu {
    z-index: 99999 !important;
    position: absolute !important;
    top: 100% !important;
    left: 0 !important;
}

/* ============================================================
   FIX 3 — Single Product Page: Description / Tab Section
   ============================================================ */

/* Tab section background */
.product__details--tab__section,
.single-product-section-padding {
    background: var(--dlux-surface) !important;
}

/* Tab bar */
.product__details--tab {
    border-bottom: 1px solid rgba(201,168,76,0.2) !important;
}
.product-details-tab-list {
    background: rgba(18,13,5,0.80) !important;
    border: 1px solid rgba(201,168,76,0.2) !important;
    color: var(--dlux-text-muted) !important;
    border-bottom: 0 !important;
    border-radius: 8px 8px 0 0 !important;
    transition: all 0.3s ease !important;
}
.product-details-tab-list:hover {
    border-color: rgba(201,168,76,0.5) !important;
    color: var(--dlux-gold) !important;
    background: rgba(201,168,76,0.08) !important;
}
.product-details-tab-list.active {
    background: rgba(201,168,76,0.12) !important;
    border-color: var(--dlux-gold) !important;
    border-bottom-color: transparent !important;
    color: var(--dlux-gold) !important;
    font-weight: 700 !important;
}

/* Tab inner content box */
.product__details--tab__inner {
    background: rgba(18,13,5,0.80) !important;
    backdrop-filter: blur(16px) !important;
    border: 1px solid rgba(201,168,76,0.15) !important;
    border-radius: 0 12px 12px 12px !important;
    padding: 24px !important;
}

/* Description text */
.product__tab--content,
.product__tab--content p,
.product__tab--content span,
.product__tab--content li,
.product__tab--content div,
.product__tab--content td,
.product__tab--content th {
    color: rgba(232,216,176,0.75) !important;
    line-height: 1.9 !important;
}
.product__tab--content h1,
.product__tab--content h2,
.product__tab--content h3,
.product__tab--content h4,
.product__tab--content h5 {
    color: var(--dlux-text) !important;
    font-family: 'Playfair Display', Georgia, serif !important;
}
.product__tab--content a { color: var(--dlux-gold) !important; }
.product__tab--content table {
    border-color: rgba(201,168,76,0.15) !important;
    width: 100% !important;
}
.product__tab--content td,
.product__tab--content th {
    border: 1px solid rgba(201,168,76,0.12) !important;
    padding: 8px 12px !important;
}
.product__tab--content th {
    background: rgba(20,14,5,0.95) !important;
    color: var(--dlux-gold) !important;
}

/* Single product info boxes */
.single-product-bg-info {
    background: rgba(20,14,5,0.80) !important;
    border: 1px solid rgba(201,168,76,0.12) !important;
    border-radius: 8px !important;
    color: var(--dlux-text) !important;
    backdrop-filter: blur(10px) !important;
}

/* Review section */
.reviews__comment--list { border-bottom: 1px solid rgba(201,168,76,0.1) !important; }
.reviews__comment--content__title { color: var(--dlux-text) !important; }
.reviews__comment--content__date  { color: var(--dlux-text-muted) !important; }
.reviews__comment--content__desc  { color: rgba(232,216,176,0.65) !important; }

/* ============================================================
   FIX 4 — Sidebar Category Menu Items (image + text rows)
   ============================================================ */
.widget__categories--menu__label {
    background: rgba(18,13,5,0.78) !important;
    border: 1px solid rgba(201,168,76,0.14) !important;
    border-radius: 8px !important;
    padding: 6px 10px !important;
    margin-bottom: 4px !important;
    color: var(--dlux-text) !important;
    backdrop-filter: blur(10px) !important;
    transition: background 0.3s ease, border-color 0.3s ease !important;
}
.widget__categories--menu__label:hover {
    background: rgba(201,168,76,0.10) !important;
    border-color: rgba(201,168,76,0.50) !important;
    color: var(--dlux-gold) !important;
}
.widget__categories--menu__list {
    background: transparent !important;
    border: none !important;
}
.widget__categories--sub__menu--link {
    background: rgba(14,10,3,0.65) !important;
    border: 1px solid rgba(201,168,76,0.10) !important;
    border-radius: 6px !important;
    padding: 5px 8px !important;
    margin-bottom: 3px !important;
    color: rgba(232,216,176,0.80) !important;
    transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease !important;
}
.widget__categories--sub__menu--link:hover {
    background: rgba(201,168,76,0.10) !important;
    border-color: rgba(201,168,76,0.45) !important;
    color: var(--dlux-gold) !important;
}
.widget__categories--menu__img,
.widget__categories--sub__menu--img {
    filter: brightness(0.88) saturate(0.9) !important;
    transition: filter 0.3s ease !important;
}
.widget__categories--menu__label:hover .widget__categories--menu__img,
.widget__categories--sub__menu--link:hover .widget__categories--sub__menu--img {
    filter: brightness(1.05) saturate(1.1) !important;
}

/* ============================================================
   FIX 5 — Single Product Info Boxes: More Padding + Spacing
   ============================================================ */
.single-product-bg-info {
    display: inline-block !important;
    padding: 8px 16px !important;
    margin: 4px 4px 6px 0 !important;
    line-height: 1.6 !important;
}
/* Product title: give breathing room */
.product__details--info__title {
    padding: 10px 0 6px !important;
    margin-bottom: 10px !important;
}
/* Product info column: overall padding */
.product__details--info {
    padding: 16px 20px !important;
}

/* ============================================================
   FIX 6 — Customer Dashboard & Account Pages
   ============================================================ */

/* Outer wrapper */
.my__account--section__inner {
    background: rgba(14,10,4,0.75) !important;
    backdrop-filter: blur(20px) !important;
    border: 1px solid rgba(201,168,76,0.14) !important;
    border-radius: 16px !important;
    box-shadow: 0 16px 50px rgba(0,0,0,0.45) !important;
}

/* Left sidebar */
.account__left--sidebar {
    background: rgba(12,8,3,0.80) !important;
    border: 1px solid rgba(201,168,76,0.14) !important;
    border-radius: 12px !important;
    padding: 20px 16px !important;
    min-width: 180px;
}
.account__left--sidebar .account__content--title {
    font-family: 'Playfair Display', Georgia, serif !important;
    color: var(--dlux-gold) !important;
    font-size: 1rem !important;
    margin-bottom: 16px !important;
    padding-bottom: 10px !important;
    border-bottom: 1px solid rgba(201,168,76,0.15) !important;
}

/* Sidebar menu items */
.account__menu--list {
    list-style: none !important;
    margin-bottom: 4px !important;
}
.account__menu--list a,
.account__menu--list > a {
    display: block !important;
    padding: 9px 14px !important;
    border-radius: 8px !important;
    color: rgba(232,216,176,0.65) !important;
    font-size: 0.92rem !important;
    transition: background 0.25s ease, color 0.25s ease, padding-left 0.25s ease !important;
    text-decoration: none !important;
}
.account__menu--list a:hover,
.account__menu--list.active a {
    background: rgba(201,168,76,0.10) !important;
    color: var(--dlux-gold) !important;
    padding-left: 20px !important;
}
.account__menu--list.active a {
    background: rgba(201,168,76,0.14) !important;
    border-left: 3px solid var(--dlux-gold) !important;
    font-weight: 600 !important;
}
.account__menu--list .btn-outline-danger {
    background: transparent !important;
    border: 1px solid rgba(183,110,121,0.50) !important;
    color: #b76e79 !important;
    border-radius: 8px !important;
    padding: 8px 14px !important;
    font-size: 0.88rem !important;
    transition: background 0.3s ease, box-shadow 0.3s ease !important;
    width: 100% !important;
    margin-top: 6px !important;
}
.account__menu--list .btn-outline-danger:hover {
    background: rgba(183,110,121,0.15) !important;
    box-shadow: 0 0 14px rgba(183,110,121,0.3) !important;
    color: #e88a96 !important;
}

/* Right content wrapper */
.account__wrapper {
    background: transparent !important;
    flex: 1;
}
.account__content--title {
    font-family: 'Playfair Display', Georgia, serif !important;
    color: var(--dlux-text) !important;
    padding-bottom: 12px !important;
    border-bottom: 1px solid rgba(201,168,76,0.15) !important;
    margin-bottom: 20px !important;
}

/* Dashboard stat cards (Orders / Wishlist counts) */
.shipping__items2 {
    background: rgba(18,13,5,0.80) !important;
    backdrop-filter: blur(16px) !important;
    border: 1px solid rgba(201,168,76,0.18) !important;
    border-radius: 14px !important;
    box-shadow: 0 6px 30px rgba(0,0,0,0.35) !important;
    transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease !important;
    overflow: hidden;
    position: relative;
    margin-bottom: 16px !important;
}
.shipping__items2::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, #c9a84c, #b76e79, #c9a84c, transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.shipping__items2:hover {
    transform: translateY(-5px) !important;
    border-color: rgba(201,168,76,0.45) !important;
    box-shadow: 0 14px 40px rgba(0,0,0,0.45), 0 0 20px rgba(201,168,76,0.10) !important;
}
.shipping__items2:hover::before { opacity: 1; }
.shipping__items2--content {
    padding: 20px 24px !important;
    text-align: center;
    width: 100%;
}
.shipping__items2--content h2 {
    font-family: 'Playfair Display', Georgia, serif !important;
    font-size: 2.2rem !important;
    color: var(--dlux-gold) !important;
    margin-bottom: 4px !important;
}
.shipping__items2--content h6 {
    color: rgba(232,216,176,0.60) !important;
    font-size: 0.85rem !important;
    letter-spacing: 1px !important;
    text-transform: uppercase !important;
}
.shipping__items2 a {
    display: block !important;
    width: 100% !important;
    text-decoration: none !important;
}

/* Inner content panels (shadow + rounded divs in profile/orders) */
.account__table--area .shadow,
.account__table--area > div,
.my__account--section__inner .shadow {
    background: rgba(16,11,4,0.82) !important;
    backdrop-filter: blur(16px) !important;
    border: 1px solid rgba(201,168,76,0.14) !important;
    border-radius: 12px !important;
    box-shadow: 0 8px 30px rgba(0,0,0,0.35) !important;
    color: var(--dlux-text) !important;
}
/* Section title inside panels */
.account__table--area .shadow h3,
.account__table--area > div h3 {
    font-family: 'Playfair Display', Georgia, serif !important;
    color: var(--dlux-gold) !important;
    border-bottom: 1px solid rgba(201,168,76,0.15) !important;
    padding-bottom: 10px !important;
    margin-bottom: 18px !important;
}
/* Override .text-danger on h3 in account pages */
.account__table--area .text-danger {
    color: var(--dlux-gold) !important;
}
/* Table in orders */
.account__table--area .table {
    border-color: rgba(201,168,76,0.12) !important;
}
.account__table--area .table thead th {
    background: rgba(12,8,3,0.95) !important;
    color: var(--dlux-gold) !important;
    border-color: rgba(201,168,76,0.14) !important;
    font-family: 'Playfair Display', Georgia, serif !important;
    letter-spacing: 0.5px !important;
    font-size: 0.88rem !important;
}
.account__table--area .table tbody tr {
    background: transparent !important;
    border-color: rgba(201,168,76,0.08) !important;
    transition: background 0.25s ease !important;
}
.account__table--area .table tbody tr:hover {
    background: rgba(201,168,76,0.05) !important;
}
.account__table--area .table td {
    color: rgba(232,216,176,0.72) !important;
    border-color: rgba(201,168,76,0.08) !important;
    vertical-align: middle !important;
}
.account__table--area .table td a {
    background: rgba(201,168,76,0.12) !important;
    border: 1px solid rgba(201,168,76,0.30) !important;
    color: var(--dlux-gold) !important;
    border-radius: 6px !important;
    padding: 4px 12px !important;
    font-size: 0.85rem !important;
    transition: background 0.3s ease, box-shadow 0.3s ease !important;
}
.account__table--area .table td a:hover {
    background: rgba(201,168,76,0.22) !important;
    box-shadow: 0 0 10px rgba(201,168,76,0.3) !important;
}

/* Quantity box */
.quantity__value {
    background: rgba(20,14,5,0.85) !important;
    border: 1px solid rgba(201,168,76,0.2) !important;
    color: var(--dlux-text) !important;
    transition: all 0.3s ease !important;
}
.quantity__value:hover {
    background: rgba(201,168,76,0.15) !important;
    border-color: var(--dlux-gold) !important;
    color: var(--dlux-gold) !important;
}
.quantity__number {
    background: rgba(15,11,5,0.9) !important;
    border-top: 1px solid rgba(201,168,76,0.15) !important;
    border-bottom: 1px solid rgba(201,168,76,0.15) !important;
    color: var(--dlux-text) !important;
    text-align: center;
}

/* Variant selectors (size, color chips) */
.variant__input--fieldset label {
    background: rgba(20,14,5,0.80) !important;
    border: 1.5px solid rgba(201,168,76,0.2) !important;
    color: var(--dlux-text) !important;
    border-radius: 6px !important;
    transition: all 0.3s ease !important;
}
.variant__input--fieldset label:hover {
    border-color: rgba(201,168,76,0.55) !important;
    color: var(--dlux-gold) !important;
}
.variant__input--fieldset input[type=radio]:checked + label {
    border-color: var(--dlux-gold) !important;
    color: var(--dlux-gold) !important;
    background: rgba(201,168,76,0.12) !important;
    box-shadow: 0 0 10px rgba(201,168,76,0.3) !important;
}

/* bg--gray on shop header bar */
.bg__gray--color {
    background: rgba(20,14,5,0.85) !important;
    border: 1px solid rgba(201,168,76,0.12) !important;
    border-radius: 8px !important;
    color: var(--dlux-text) !important;
}
.widget__filter--btn {
    background: rgba(201,168,76,0.1) !important;
    border: 1px solid rgba(201,168,76,0.3) !important;
    color: var(--dlux-text) !important;
    border-radius: 6px !important;
    padding: 6px 14px !important;
    transition: all 0.3s ease !important;
}
.widget__filter--btn:hover {
    background: rgba(201,168,76,0.2) !important;
    border-color: var(--dlux-gold) !important;
    color: var(--dlux-gold) !important;
}

/* ============================================================
   END DARK LUXURY GLOBAL THEME
   ============================================================ */
</style>
