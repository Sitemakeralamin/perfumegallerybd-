{{-- =====================================================
     PERFUME PREFERENCE POPUP
     • Shows once per session on home page
     • Saves choice to DB (logged-in) + session + localStorage
     • After selection → redirects to shop filtered by scent keyword
===================================================== --}}

<style>
/* ===== OVERLAY ===== */
.scent-overlay {
    position: fixed;
    inset: 0;
    background: rgba(3, 2, 1, 0.88);
    backdrop-filter: blur(12px) saturate(130%);
    -webkit-backdrop-filter: blur(12px) saturate(130%);
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    opacity: 0;
    animation: scentOverlayIn 0.5s ease 0.8s forwards;
}
@keyframes scentOverlayIn  { to   { opacity: 1; } }
@keyframes scentOverlayOut { from { opacity: 1; } to   { opacity: 0; } }
.scent-overlay.hiding { animation: scentOverlayOut 0.35s ease forwards; }

/* ===== POPUP CARD ===== */
.scent-popup {
    background: linear-gradient(155deg, #18120a 0%, #221a0b 50%, #14100a 100%);
    border: 1px solid rgba(201,168,76,0.35);
    border-radius: 28px;
    padding: 42px 38px 34px;
    max-width: 590px;
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow:
        0 0 0 1px rgba(201,168,76,0.10),
        0 30px 80px rgba(0,0,0,0.80),
        inset 0 1px 0 rgba(255,255,255,0.05);
    opacity: 0;
    transform: translateY(65px) scale(0.87);
    animation: scentPopupIn 0.65s cubic-bezier(0.34,1.45,0.64,1) 1.0s forwards;
}
@keyframes scentPopupIn {
    to { opacity: 1; transform: translateY(0) scale(1); }
}
.scent-popup.hiding {
    animation: scentPopupOut 0.3s cubic-bezier(0.4,0,0.2,1) forwards !important;
}
@keyframes scentPopupOut {
    to { opacity: 0; transform: translateY(20px) scale(0.93); }
}

/* Glow blobs */
.scent-popup__glow-a {
    position: absolute; top: -80px; right: -80px;
    width: 240px; height: 240px;
    background: radial-gradient(circle, rgba(201,168,76,0.16) 0%, transparent 65%);
    pointer-events: none;
}
.scent-popup__glow-b {
    position: absolute; bottom: -60px; left: -60px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(183,110,121,0.10) 0%, transparent 65%);
    pointer-events: none;
}

/* ===== CLOSE × ===== */
.scent-popup__close {
    position: absolute; top: 14px; right: 16px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(201,168,76,0.18);
    border-radius: 50%;
    width: 34px; height: 34px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    color: rgba(232,216,176,0.5);
    font-size: 13px;
    transition: all 0.25s ease;
    outline: none;
}
.scent-popup__close:hover {
    background: rgba(201,168,76,0.15);
    border-color: rgba(201,168,76,0.45);
    color: #c9a84c;
    transform: rotate(90deg) scale(1.1);
}

/* ===== HEADER ===== */
.scent-popup__header {
    text-align: center;
    margin-bottom: 28px;
    position: relative; z-index: 1;
}
.scent-popup__icon-wrap {
    width: 72px; height: 72px;
    background: linear-gradient(135deg, rgba(201,168,76,0.22), rgba(183,110,121,0.16));
    border: 1px solid rgba(201,168,76,0.32);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 18px;
    font-size: 32px;
    animation: scentIconFloat 4s ease-in-out infinite;
    box-shadow: 0 0 28px rgba(201,168,76,0.20);
}
@keyframes scentIconFloat {
    0%,100% { transform: translateY(0) rotate(0deg); }
    40%      { transform: translateY(-7px) rotate(5deg); }
    70%      { transform: translateY(-3px) rotate(-4deg); }
}

/* ── TITLE: বড়, উজ্জ্বল ── */
.scent-popup__title {
    font-size: clamp(1.4rem, 5vw, 2.1rem);
    font-weight: 900;
    background: linear-gradient(135deg, #f0d060 0%, #c9a84c 45%, #e8b86d 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-family: 'Hind Siliguri', 'SolaimanLipi', 'Kalpurush', serif;
    margin: 0 0 12px;
    line-height: 1.3;
    text-shadow: none;
    letter-spacing: -0.2px;
}

/* ── SUBTITLE: পরিষ্কার, পড়া যায় ── */
.scent-popup__subtitle {
    font-size: clamp(0.9rem, 2.5vw, 1.05rem);
    color: rgba(240, 224, 185, 0.82);
    font-family: 'Hind Siliguri', 'SolaimanLipi', sans-serif;
    margin: 0;
    line-height: 1.7;
    font-weight: 400;
}
.scent-popup__divider {
    width: 52px; height: 2px;
    background: linear-gradient(90deg, transparent, #c9a84c, rgba(183,110,121,0.9), transparent);
    margin: 14px auto 0;
    border-radius: 2px;
    box-shadow: 0 0 10px rgba(201,168,76,0.35);
}

/* ===== OPTIONS GRID ===== */
.scent-popup__options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
    margin-bottom: 26px;
    position: relative; z-index: 1;
}

/* ===== SCENT CARD ===== */
.scent-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(201,168,76,0.18);
    border-radius: 18px;
    padding: 22px 14px 18px;
    cursor: pointer;
    text-align: center;
    transition: all 0.38s cubic-bezier(0.34,1.5,0.64,1);
    position: relative;
    overflow: hidden;
    outline: none;
    opacity: 0;
    animation: scentCardIn 0.55s cubic-bezier(0.34,1.2,0.64,1) forwards;
}
.scent-card:nth-child(1) { animation-delay: 1.15s; }
.scent-card:nth-child(2) { animation-delay: 1.26s; }
.scent-card:nth-child(3) { animation-delay: 1.37s; }
.scent-card:nth-child(4) { animation-delay: 1.48s; }
@keyframes scentCardIn {
    from { opacity: 0; transform: translateY(24px) scale(0.86); }
    to   { opacity: 1; transform: translateY(0)    scale(1); }
}

.scent-card::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(201,168,76,0.12), rgba(183,110,121,0.07));
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: inherit;
}
.scent-card:hover, .scent-card:focus {
    border-color: rgba(201,168,76,0.60);
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 18px 40px rgba(0,0,0,0.5), 0 0 24px rgba(201,168,76,0.20);
}
.scent-card:hover::before { opacity: 1; }

.scent-card.selected {
    border-color: #c9a84c !important;
    background: rgba(201,168,76,0.14) !important;
    transform: scale(0.97) !important;
    box-shadow: 0 0 0 2px rgba(201,168,76,0.38) !important;
}

/* ── ICON ── */
.scent-card__icon {
    display: block;
    font-size: 2.6rem;
    margin-bottom: 10px;
    line-height: 1;
    transition: transform 0.38s cubic-bezier(0.34,1.56,0.64,1);
}
.scent-card:hover .scent-card__icon { transform: scale(1.28) rotate(-7deg); }

/* ── LABEL: পরিষ্কার, বড় ── */
.scent-card__label {
    display: block;
    font-size: clamp(0.88rem, 2.2vw, 1.0rem);
    font-weight: 700;
    color: #f0e4c0;
    font-family: 'Hind Siliguri', 'SolaimanLipi', sans-serif;
    margin-bottom: 6px;
    transition: color 0.3s ease;
    line-height: 1.35;
}
.scent-card:hover .scent-card__label { color: #f5d060; }

/* ── DESCRIPTION: দেখা যাচ্ছে ── */
.scent-card__desc {
    display: block;
    font-size: clamp(0.72rem, 1.8vw, 0.82rem);
    color: rgba(232,216,176,0.60);
    font-family: 'Hind Siliguri', sans-serif;
    line-height: 1.5;
}

/* Tick mark */
.scent-card__check {
    position: absolute; top: 10px; right: 10px;
    width: 22px; height: 22px;
    background: linear-gradient(135deg, #f0d060, #c9a84c);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transform: scale(0);
    transition: all 0.35s cubic-bezier(0.34,1.56,0.64,1);
    font-size: 12px;
    color: #1a1200;
    font-weight: 900;
}
.scent-card.selected .scent-card__check { opacity: 1; transform: scale(1); }

/* ===== REDIRECT NOTICE (appears after selection) ===== */
.scent-redirect-notice {
    display: none;
    text-align: center;
    padding: 12px 0 4px;
    position: relative; z-index: 1;
}
.scent-redirect-notice p {
    font-size: 0.88rem;
    color: rgba(240,228,192,0.80);
    font-family: 'Hind Siliguri', sans-serif;
    margin: 0;
    line-height: 1.5;
}
.scent-redirect-dots {
    display: inline-flex;
    gap: 5px;
    margin-top: 8px;
}
.scent-redirect-dots span {
    width: 7px; height: 7px;
    background: #c9a84c;
    border-radius: 50%;
    animation: scentDotBounce 0.9s ease-in-out infinite;
}
.scent-redirect-dots span:nth-child(2) { animation-delay: 0.18s; }
.scent-redirect-dots span:nth-child(3) { animation-delay: 0.36s; }
@keyframes scentDotBounce {
    0%,100% { transform: scale(0.6); opacity: 0.4; }
    50%      { transform: scale(1.2); opacity: 1;   }
}

/* ===== FOOTER: skip ===== */
.scent-popup__footer {
    text-align: center;
    position: relative; z-index: 1;
    opacity: 0;
    animation: scentCardIn 0.5s 1.6s forwards;
}
.scent-skip {
    background: none; border: none;
    color: rgba(232,216,176,0.42);
    font-size: 0.82rem;
    cursor: pointer;
    padding: 6px 14px;
    font-family: 'Hind Siliguri', sans-serif;
    transition: color 0.3s ease;
    text-decoration: underline;
    text-underline-offset: 3px;
    text-decoration-color: rgba(232,216,176,0.18);
}
.scent-skip:hover {
    color: rgba(232,216,176,0.70);
    text-decoration-color: rgba(232,216,176,0.45);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 480px) {
    .scent-popup { padding: 30px 16px 26px; border-radius: 22px; }
    .scent-popup__options { gap: 10px; }
    .scent-card { padding: 18px 10px 14px; border-radius: 14px; }
    .scent-card__icon  { font-size: 2.1rem; }
    .scent-popup__icon-wrap { width: 62px; height: 62px; font-size: 28px; }
}
</style>

{{-- ============ HTML ============ --}}
<div id="scentPopupOverlay" class="scent-overlay" role="dialog" aria-modal="true" aria-labelledby="scentTitle">
    <div class="scent-popup" id="scentPopupCard">

        {{-- Glow blobs --}}
        <div class="scent-popup__glow-a" aria-hidden="true"></div>
        <div class="scent-popup__glow-b" aria-hidden="true"></div>

        {{-- Close × --}}
        <button class="scent-popup__close" id="scentClose" aria-label="Close" title="বন্ধ করুন">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round">
                <line x1="18" y1="6"  x2="6"  y2="18"/>
                <line x1="6"  y1="6"  x2="18" y2="18"/>
            </svg>
        </button>

        {{-- Header --}}
        <div class="scent-popup__header">
            <div class="scent-popup__icon-wrap" aria-hidden="true">🌸</div>
            <h2 id="scentTitle" class="scent-popup__title">আপনার স্টাইল, আপনার সুগন্ধ!</h2>
            <p class="scent-popup__subtitle">
                কোন গন্ধটি আপনার মন ছোঁয়?<br>
                বেছে নিন আপনার পছন্দের ক্যাটাগরি।
            </p>
            <div class="scent-popup__divider" aria-hidden="true"></div>
        </div>

        {{-- Scent cards --}}
        {{--
            data-keyword = search URL-এ যে keyword পাঠানো হবে
            (products table-এর title/description-এ এই word match করবে)
        --}}
        <div class="scent-popup__options" role="group" aria-label="Scent preferences">

            <button class="scent-card" type="button"
                    data-preference="fresh"
                    data-keyword="fresh"
                    data-label="ফ্রেশ ও ক্যাজুয়াল">
                <div class="scent-card__check" aria-hidden="true">✓</div>
                <span class="scent-card__icon">🌿</span>
                <span class="scent-card__label">ফ্রেশ ও ক্যাজুয়াল</span>
                <span class="scent-card__desc">হালকা, প্রকৃতির মতো সতেজ সুগন্ধ</span>
            </button>

            <button class="scent-card" type="button"
                    data-preference="romantic"
                    data-keyword="floral"
                    data-label="রোমান্টিক ও ফ্লোরাল">
                <div class="scent-card__check" aria-hidden="true">✓</div>
                <span class="scent-card__icon">🌹</span>
                <span class="scent-card__label">রোমান্টিক ও ফ্লোরাল</span>
                <span class="scent-card__desc">ফুলের মতো মনোমুগ্ধকর ও রোমান্টিক</span>
            </button>

            <button class="scent-card" type="button"
                    data-preference="bold"
                    data-keyword="oud"
                    data-label="বোল্ড ও ইনটেন্স">
                <div class="scent-card__check" aria-hidden="true">✓</div>
                <span class="scent-card__icon">🪵</span>
                <span class="scent-card__label">বোল্ড ও ইনটেন্স</span>
                <span class="scent-card__desc">শক্তিশালী, গভীর ও আকর্ষণীয়</span>
            </button>

            <button class="scent-card" type="button"
                    data-preference="luxurious"
                    data-keyword="luxury"
                    data-label="লাক্সুরিয়াস ও ক্লাসি">
                <div class="scent-card__check" aria-hidden="true">✓</div>
                <span class="scent-card__icon">✨</span>
                <span class="scent-card__label">লাক্সুরিয়াস ও ক্লাসি</span>
                <span class="scent-card__desc">মহৎ, পরিশীলিত ও অতুলনীয় সুবাস</span>
            </button>

        </div>

        {{-- Redirect loading notice --}}
        <div class="scent-redirect-notice" id="scentRedirectNotice">
            <p>আপনার পছন্দ অনুযায়ী পণ্য খুঁজছি<br>
               <span id="scentSelectedLabel" style="color:#c9a84c;font-weight:700;"></span>
            </p>
            <div class="scent-redirect-dots">
                <span></span><span></span><span></span>
            </div>
        </div>

        {{-- Footer: skip --}}
        <div class="scent-popup__footer" id="scentFooter">
            <button id="scentSkip" class="scent-skip" type="button">
                এখন নয়, পরে দেখব &rarr;
            </button>
        </div>

    </div>
</div>

{{-- ============ JavaScript ============ --}}
<script>
(function () {
    'use strict';

    /* ── Already dismissed? Remove immediately ── */
    if (localStorage.getItem('pgbd_scent_dismissed')) {
        var _el = document.getElementById('scentPopupOverlay');
        if (_el) _el.remove();
        return;
    }

    var overlay  = document.getElementById('scentPopupOverlay');
    var card     = document.getElementById('scentPopupCard');
    var notice   = document.getElementById('scentRedirectNotice');
    var footer   = document.getElementById('scentFooter');
    var saveUrl  = '{{ route("save.scent.preference") }}';
    var shopUrl  = '{{ route("products") }}';          // /shop base URL
    var csrf     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var closed   = false;

    /* ── Animate overlay out & remove DOM ── */
    function animateOut(cb) {
        overlay.classList.add('hiding');
        card.classList.add('hiding');
        setTimeout(function () {
            overlay.remove();
            if (cb) cb();
        }, 350);
    }

    /* ── Close without any preference (skip / × / outside / Esc) ── */
    function dismissPopup() {
        if (closed) return;
        closed = true;
        console.log('%c⏭ Scent Popup Skipped', 'color:#999;');
        localStorage.setItem('pgbd_scent_dismissed', '1');
        saveToServer('');
        animateOut();
    }

    /* ── Select a preference → show loading → redirect to shop ── */
    function selectPreference(btn) {
        if (closed) return;
        closed = true;

        var pref    = btn.getAttribute('data-preference');
        var keyword = btn.getAttribute('data-keyword');
        var label   = btn.getAttribute('data-label');

        console.log('%c🌸 Scent Preference Selected:', 'color:#c9a84c;font-weight:bold;', pref);

        /* Mark card as selected */
        btn.classList.add('selected');

        /* Hide skip footer, show redirect notice */
        footer.style.display = 'none';
        document.getElementById('scentSelectedLabel').textContent = label;
        notice.style.display = 'block';

        /* Persist */
        localStorage.setItem('pgbd_scent_dismissed', '1');
        localStorage.setItem('pgbd_scent_preference', pref);
        saveToServer(pref);

        /* After 1.2s → redirect to shop with keyword search */
        setTimeout(function () {
            animateOut(function () {
                window.location.href = shopUrl + '?search=' + encodeURIComponent(keyword);
            });
        }, 1200);
    }

    /* ── Save to Laravel session + DB ── */
    function saveToServer(pref) {
        fetch(saveUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept':       'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({ preference: pref })
        }).catch(function () {});
    }

    /* ── Attach card click events ── */
    overlay.querySelectorAll('.scent-card').forEach(function (btn) {
        btn.addEventListener('click', function () { selectPreference(this); });
        /* Keyboard support */
        btn.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                selectPreference(this);
            }
        });
    });

    /* ── Skip ── */
    document.getElementById('scentSkip').addEventListener('click', dismissPopup);

    /* ── Close × ── */
    document.getElementById('scentClose').addEventListener('click', dismissPopup);

    /* ── Click outside card ── */
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) dismissPopup();
    });

    /* ── Esc key ── */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') dismissPopup();
    });

})();
</script>
