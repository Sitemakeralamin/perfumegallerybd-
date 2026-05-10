@extends('user.inc.master')

@section('title') Register @endsection

@section('content')
<style>
/* ===== DARK LUXURY REGISTER PAGE ===== */
@keyframes regCardIn {
    from { opacity: 0; transform: translateY(36px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}
@keyframes regShimmer {
    0%   { background-position: -200% 0; }
    100% { background-position:  200% 0; }
}
@keyframes regOrbFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50%       { transform: translate(-15px, 20px) scale(1.08); }
}

.login__section {
    min-height: calc(100vh - 100px);
    background:
        radial-gradient(ellipse at 70% 30%, rgba(183,110,121,0.07) 0%, transparent 55%),
        radial-gradient(ellipse at 20% 70%, rgba(201,168,76,0.05) 0%, transparent 55%),
        var(--dlux-bg) !important;
    display: flex;
    align-items: center;
    padding: 50px 0 !important;
    border-top: none !important;
    position: relative;
    overflow: hidden;
}

.login__section .orb-1,
.login__section .orb-2 {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    z-index: 0;
}
.login__section .orb-1 {
    width: 350px; height: 350px;
    top: -80px; right: -80px;
    background: radial-gradient(circle, rgba(183,110,121,0.07) 0%, transparent 70%);
    animation: regOrbFloat 10s ease-in-out infinite;
}
.login__section .orb-2 {
    width: 280px; height: 280px;
    bottom: -60px; left: -60px;
    background: radial-gradient(circle, rgba(201,168,76,0.06) 0%, transparent 70%);
    animation: regOrbFloat 13s ease-in-out infinite reverse;
}

.login__section > .container { position: relative; z-index: 1; }

.dlux-login-brand {
    text-align: center;
    color: rgba(201,168,76,0.50);
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 0.78rem;
    letter-spacing: 5px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.account__login.register {
    background: rgba(14,10,4,0.88) !important;
    backdrop-filter: blur(28px) saturate(160%) !important;
    -webkit-backdrop-filter: blur(28px) saturate(160%) !important;
    border: 1px solid rgba(201,168,76,0.22) !important;
    border-radius: 20px !important;
    padding: 40px 40px 34px !important;
    box-shadow:
        0 24px 70px rgba(0,0,0,0.55),
        inset 0 1px 0 rgba(255,255,255,0.04) !important;
    position: relative;
    overflow: hidden;
    animation: regCardIn 0.7s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.account__login.register::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg,
        transparent 0%, #b76e79 30%, #c9a84c 60%, #b76e79 80%, transparent 100%);
    background-size: 200% 100%;
    animation: regShimmer 3s linear infinite;
}

.account__login--header__title {
    font-family: 'Playfair Display', Georgia, serif !important;
    color: var(--dlux-text) !important;
    font-size: 1.85rem !important;
    letter-spacing: 0.5px !important;
    margin-bottom: 6px !important;
}
.account__login--header__desc {
    color: rgba(232,216,176,0.42) !important;
    font-size: 0.85rem !important;
}
.account__login--header {
    position: relative;
    padding-bottom: 18px !important;
}
.account__login--header::after {
    content: '';
    display: block;
    width: 55px; height: 2px;
    background: linear-gradient(90deg, transparent, #b76e79, #c9a84c, transparent);
    margin: 14px auto 0;
    border-radius: 2px;
}

.account__login--input {
    background: rgba(20,14,5,0.65) !important;
    border: 1px solid rgba(201,168,76,0.22) !important;
    border-radius: 10px !important;
    color: var(--dlux-text) !important;
    padding: 13px 18px !important;
    font-size: 0.95rem !important;
    width: 100% !important;
    transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
    margin-bottom: 14px !important;
    display: block !important;
}
.account__login--input:focus {
    border-color: #c9a84c !important;
    box-shadow: 0 0 0 3px rgba(201,168,76,0.12), 0 0 18px rgba(201,168,76,0.07) !important;
    outline: none !important;
}
.account__login--input::placeholder { color: rgba(232,216,176,0.35) !important; }

/* Terms checkbox */
.checkout__checkbox--label.login__remember--label {
    color: rgba(232,216,176,0.55) !important;
    font-size: 0.87rem !important;
}
.checkout__checkbox--label.login__remember--label a {
    color: #c9a84c !important;
}

.account__login--btn.primary__btn {
    background: linear-gradient(135deg, #9a7a0a 0%, #c9a84c 50%, #b76e79 100%) !important;
    background-size: 200% 100% !important;
    background-position: left center !important;
    color: #fff !important;
    border: none !important;
    border-radius: 10px !important;
    padding: 14px 24px !important;
    font-weight: 700 !important;
    font-size: 0.95rem !important;
    letter-spacing: 2px !important;
    text-transform: uppercase !important;
    width: 100% !important;
    text-align: center !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: background-position 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease !important;
    margin-bottom: 16px !important;
}
.account__login--btn.primary__btn:hover {
    background-position: right center !important;
    box-shadow: 0 0 30px rgba(201,168,76,0.45), 0 6px 24px rgba(0,0,0,0.4) !important;
    transform: translateY(-2px) !important;
}

.account__login--forgot {
    color: rgba(201,168,76,0.75) !important;
    font-size: 0.87rem !important;
    transition: color 0.3s ease !important;
}
.account__login--forgot:hover { color: #c9a84c !important; }

.account__login--signup__text {
    color: rgba(232,216,176,0.48) !important;
    font-size: 0.88rem !important;
    text-align: center !important;
    margin-top: 6px !important;
    margin-bottom: 0 !important;
}
.account__login--signup__text a {
    color: #c9a84c !important;
    font-weight: 600 !important;
    transition: color 0.3s ease !important;
    text-decoration: none !important;
}
.account__login--signup__text a:hover { color: #f0c840 !important; }

.dlux-error {
    color: #b76e79 !important;
    font-size: 0.82rem;
    display: block;
    margin: -8px 0 10px 4px;
}
</style>

<!-- Start register section  -->
<div class="login__section sign_in_top">
    <div class="orb-1"></div>
    <div class="orb-2"></div>
    <div class="container">
        <form method="POST" action="{{ route('custom.register') }}">
            @csrf
            <div class="login__section--inner">
                <input type="hidden" name="register_type" id="register_type" value="phone">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="col">
                            <p class="dlux-login-brand">✦ Perfume Gallery BD ✦</p>
                            <div class="account__login register">
                                <div class="account__login--header mb-25 text-center">
                                    <h2 class="account__login--header__title h3 mb-10">Create Account</h2>
                                    <p class="account__login--header__desc">Join our exclusive perfume community</p>
                                </div>
                                <div class="account__login--inner">
                                    <input class="account__login--input" placeholder="Full Name" name="name" value="{{old('name')}}" required type="text">

                                    <input class="account__login--input" id="phone" name="phone" required value="{{old('phone')}}" placeholder="Phone Number (11 digits)" minlength="11" maxlength="11" type="number">
                                    <input class="account__login--input" id="email" style="display:none;" value="{{old('email')}}" name="email" placeholder="Email Address" type="email">

                                    <div class="mb-2">
                                        @error('phone')
                                            <span class="dlux-error">{{ $message }}</span>
                                        @enderror
                                        @error('email')
                                            <span class="dlux-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <input class="account__login--input" placeholder="Password (min. 8 characters)" name="password" required type="password">
                                    <input class="account__login--input" placeholder="Confirm Password" required name="password_confirmation" type="password">

                                    <div class="account__login--remember position__relative mb-3">
                                        <input class="checkout__checkbox--input" id="check2" required type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            I agree to the terms &amp; conditions
                                        </label>
                                    </div>
                                    <button class="account__login--btn primary__btn mb-10" type="submit">Create Account</button>
                                </div>
                                <p class="account__login--signup__text">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End register section  -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    @if(session('register_type'))
        $(document).ready(function() {
            use_register_type('{{session('register_type')}}');
        });
    @endif

    function use_register_type(type) {
        if(type == 'email') {
            $('#use_mobile_btn').show();
            $('#use_email_btn').hide();
            $('#phone').hide();
            $('#email').show();
            $("#email").prop('required', true);
            $("#phone").prop('required', false);
            $('#register_type').val('email');
        } else if(type == 'phone') {
            $('#use_mobile_btn').hide();
            $('#use_email_btn').show();
            $('#phone').show();
            $('#email').hide();
            $("#email").prop('required', false);
            $("#phone").prop('required', true);
            $('#register_type').val('phone');
        }
    }
</script>
@endsection
