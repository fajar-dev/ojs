@extends('layouts.auth')

@section('pageTitle', 'Buat Akun')

@section('style')
    <!-- CSS Libraries -->
@endsection

@section('content')
<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"  method="POST" action="{{ route('register') }}">
    @csrf
    <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
        <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
    </div>
    <div class="fv-row mb-8">
        <input type="text" placeholder="Full name" name="name" value="{{ old('name') }}" autocomplete="off" class="form-control bg-transparent" />
    </div>
    <div class="fv-row mb-8">
        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="off" onchange="username_validasi()" class="form-control bg-transparent" />
        <div class="text-muted">max 20 characters and numbers with symbols ( - , _ ) are allowed</div>
        @error('username')
            <div class="fv-plugins-message-container invalid-feedback validate" id="validate-uname">
                <div data-field="email" data-validator="regexp">Username has been taken</div>
            </div>
        @enderror
    </div>
    <div class="fv-row mb-8">
        <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" onchange="email_validasi()" class="form-control bg-transparent" />
        @error('username')
        <div class="fv-plugins-message-container invalid-feedback validate" id="validate-email">
            <div data-field="email" data-validator="regexp">Email has been taken</div>
        </div>
    @enderror
    </div>
    <div class="fv-row mb-8" data-kt-password-meter="true">
        <div class="mb-1">
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
            </div>
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
        </div>
        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
    </div>
    <div class="fv-row mb-8">
        <input placeholder="Repeat Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
    </div>
    <div class="fv-row mb-8">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="toc" value="1" />
            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
            <a href="#" class="ms-1 link-primary">Terms</a></span>
        </label>
    </div>
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
            <span class="indicator-label">Sign up</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
    <a href="{{ route('login') }}" class="link-primary fw-semibold">Sign in</a></div>
</form>

@endsection

@section('script')
    <script src="{{ asset('theme/js/custom/authentication/sign-up/general.js') }}"></script>
    @error('username')
        <script>
            Error();
        </script>
    @enderror
    @error('email')
        <script>
            Error();
        </script>
    @enderror
@endsection