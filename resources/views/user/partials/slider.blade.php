
<!-- ===== DARK LUXURY HERO STYLES ===== -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap');

/* Particle canvas */
#hero-particles {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 2;
}

/* Slider section */
.hero__slider--section { position: relative; overflow: hidden; }

/* Cinematic overlay on each slide */
.hero__slider--items {
    position: relative;
    background-size: cover !important;
    background-position: center !important;
}
.hero__slider--items::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        115deg,
        rgba(6,4,2,0.80) 0%,
        rgba(15,10,4,0.50) 55%,
        rgba(6,4,2,0.25) 100%
    );
    z-index: 1;
}

/* Hero text overlay */
.hero-luxury-overlay {
    position: absolute;
    top: 50%;
    left: 7%;
    transform: translateY(-50%);
    z-index: 5;
    max-width: 560px;
}

/* Brand pill tag */
.hero-brand-tag {
    display: inline-block;
    color: #c9a84c;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 4px;
    text-transform: uppercase;
    margin-bottom: 18px;
    padding: 6px 18px;
    border: 1px solid rgba(201,168,76,0.45);
    border-radius: 30px;
    background: rgba(201,168,76,0.08);
    backdrop-filter: blur(6px);
    animation: heroElemIn 1s ease 0.2s both;
}

/* Headline */
.hero-headline {
    font-family: 'Playfair Display', 'Georgia', serif !important;
    font-size: clamp(2.4rem, 5.5vw, 4.2rem);
    font-weight: 700;
    font-style: italic;
    line-height: 1.1;
    background: linear-gradient(135deg, #f7e08a 0%, #c9a84c 35%, #b76e79 65%, #f7e08a 100%);
    background-size: 300% 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: heroElemIn 1.1s ease 0.45s both, goldTextFlow 5s ease 1.6s infinite;
    margin-bottom: 14px;
    text-shadow: none;
}

/* Sub-headline */
.hero-subline {
    color: rgba(245,225,185,0.80);
    font-size: 0.95rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 32px;
    animation: heroElemIn 1.1s ease 0.7s both;
}

/* CTA button */
.hero-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 32px;
    background: linear-gradient(135deg, rgba(201,168,76,0.18), rgba(183,110,121,0.12));
    border: 1.5px solid rgba(201,168,76,0.6);
    color: #f0c040 !important;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    text-decoration: none !important;
    border-radius: 50px;
    backdrop-filter: blur(10px);
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    animation: heroElemIn 1.1s ease 0.95s both;
    position: relative;
    overflow: hidden;
}
.hero-cta-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(201,168,76,0.3), rgba(183,110,121,0.2));
    opacity: 0;
    transition: opacity 0.4s ease;
    border-radius: inherit;
}
.hero-cta-btn:hover::before { opacity: 1; }
.hero-cta-btn:hover {
    box-shadow: 0 0 28px rgba(201,168,76,0.5), 0 0 55px rgba(201,168,76,0.18);
    transform: translateY(-3px) scale(1.03);
    border-color: #f0c040;
    color: #fff !important;
}
.hero-cta-btn svg { transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1); position: relative; z-index: 1; }
.hero-cta-btn:hover svg { transform: translateX(7px); }
.hero-cta-btn span { position: relative; z-index: 1; }

/* Scroll indicator */
.hero-scroll-hint {
    position: absolute;
    bottom: 22px;
    left: 7%;
    z-index: 5;
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(201,168,76,0.6);
    font-size: 0.7rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    animation: heroElemIn 1.4s ease 1.4s both;
}
.hero-scroll-line {
    width: 40px;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.7));
    animation: scrollLineGrow 2s ease 1.8s both;
}
@keyframes scrollLineGrow {
    from { width: 0; opacity: 0; }
    to   { width: 40px; opacity: 1; }
}

/* Keyframes */
@keyframes heroElemIn {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes goldTextFlow {
    0%, 100% { background-position: 0% 50%; }
    50%       { background-position: 100% 50%; }
}

/* Swiper nav buttons luxury gold */
.swiper__nav--btn.swiper-button-next,
.swiper__nav--btn.swiper-button-prev {
    color: rgba(201,168,76,0.8) !important;
    width: 44px !important;
    height: 44px !important;
    background: rgba(10,8,4,0.65) !important;
    backdrop-filter: blur(12px) !important;
    border: 1px solid rgba(201,168,76,0.25) !important;
    border-radius: 50% !important;
    transition: all 0.35s ease !important;
}
.swiper__nav--btn:hover {
    background: rgba(201,168,76,0.18) !important;
    border-color: rgba(201,168,76,0.6) !important;
    box-shadow: 0 0 18px rgba(201,168,76,0.3) !important;
}
.swiper__nav--btn.swiper-button-next::after,
.swiper__nav--btn.swiper-button-prev::after {
    font-size: 14px !important;
    font-weight: 900 !important;
}

/* Side banners luxury */
.banner__items {
    border-radius: 10px !important;
    overflow: hidden;
}
.banner__items--thumbnail {
    position: relative;
    overflow: hidden;
    display: block;
    border-radius: 10px !important;
    border: 1px solid rgba(201,168,76,0.1);
    transition: border-color 0.3s ease;
}
.banner__items--thumbnail::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 45%, rgba(6,4,2,0.55) 100%);
    pointer-events: none;
    z-index: 1;
}
.banner__items--thumbnail:hover {
    border-color: rgba(201,168,76,0.4) !important;
    box-shadow: 0 0 20px rgba(201,168,76,0.15) !important;
}
.slider-side-banner {
    width: 100%;
    transition: transform 0.5s cubic-bezier(0.34, 1.2, 0.64, 1) !important;
}
.banner__items--thumbnail:hover .slider-side-banner {
    transform: scale(1.07) !important;
}
</style>

<!-- Start slider section -->
<div class="container-fluid">
    <div class="row slider-p pb-0">
        <div class="col-md-8 slider-pb">
            <section class="hero__slider--section">

                {{-- Gold Particle Canvas --}}
                <canvas id="hero-particles" aria-hidden="true"></canvas>

                {{-- Cinematic Hero Overlay --}}
                <div class="hero-luxury-overlay d-none d-md-block">
                    <span class="hero-brand-tag">✦ &nbsp;Perfume Gallery BD&nbsp; ✦</span>
                    <h1 class="hero-headline">Essence<br>of Luxury</h1>
                    <p class="hero-subline">Discover rare fragrances from around the world</p>
                    <a href="{{ route('products') }}" class="hero-cta-btn">
                        <span>Explore Collection</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                {{-- Scroll Hint --}}
                <div class="hero-scroll-hint d-none d-lg-flex">
                    <div class="hero-scroll-line"></div>
                    <span>Scroll</span>
                </div>

                <div class="hero__slider--inner hero__slider--activation swiper">
                    <div class="hero__slider--wrapper swiper-wrapper">
                        @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="hero__slider--items home1__slider--bg" style="
                                background: url('{{ asset('images/slider/'.$slider->image) }}');
                                background-size: cover;
                                background-position: center;
                            ">
                                <div class="container-fluid">
                                    <div class="hero__slider--items__inner">
                                        <div class="row row-cols-1">
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </section>
        </div>

        <div class="col-md-4">
            <div class="row mb--n28">
                <div class="col-lg-12 mb-28">
                    <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        @foreach($sliderSideBanner as $slider)
                            <div class="col-lg-12 col-md-12 col-6 mb-3">
                                <div class="banner__items">
                                    <a class="banner__items--thumbnail position__relative"
                                       href="{{optional($slider)->link}}">
                                        <img class="banner__items--thumbnail__img slider-side-banner"
                                             src="{{ asset('images/slider/side-banner/'.optional($slider)->image) }}"
                                             alt="banner-img">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Gold Particle Animation Script --}}
<script>
(function () {
    const canvas = document.getElementById('hero-particles');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    function resize() {
        const parent = canvas.parentElement;
        canvas.width  = parent ? parent.offsetWidth  : window.innerWidth;
        canvas.height = parent ? parent.offsetHeight : 500;
    }
    resize();
    window.addEventListener('resize', resize, { passive: true });

    const PALETTES = [
        [201, 168, 76],   // champagne gold
        [183, 110, 121],  // rose gold
        [240, 192, 64],   // bright gold
        [255, 220, 140],  // light gold
    ];

    class Particle {
        constructor() { this.init(true); }
        init(randomY) {
            this.x  = Math.random() * canvas.width;
            this.y  = randomY ? Math.random() * canvas.height : canvas.height + 6;
            this.r  = Math.random() * 2.4 + 0.35;
            this.vx = (Math.random() - 0.5) * 0.6;
            this.vy = -(Math.random() * 0.75 + 0.15);
            this.phase     = Math.random() * Math.PI * 2;
            this.phaseSpd  = Math.random() * 0.028 + 0.007;
            const rgb = PALETTES[Math.floor(Math.random() * PALETTES.length)];
            this.r1 = rgb[0]; this.g1 = rgb[1]; this.b1 = rgb[2];
        }
        update() {
            this.x     += this.vx;
            this.y     += this.vy;
            this.phase += this.phaseSpd;
            if (this.y < -10 || this.x < -10 || this.x > canvas.width + 10) {
                this.init(false);
            }
        }
        draw() {
            const alpha = Math.abs(Math.sin(this.phase)) * 0.72 + 0.15;
            ctx.save();
            ctx.shadowBlur  = 12;
            ctx.shadowColor = `rgba(${this.r1},${this.g1},${this.b1},0.9)`;
            ctx.fillStyle   = `rgba(${this.r1},${this.g1},${this.b1},${alpha})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    const particles = Array.from({ length: 75 }, () => new Particle());

    (function loop() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => { p.update(); p.draw(); });
        requestAnimationFrame(loop);
    })();
})();
</script>
<!-- End slider section -->
