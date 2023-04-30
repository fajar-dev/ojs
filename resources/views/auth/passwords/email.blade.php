@extends('layouts.auth')

@section('pageTitle', 'Lupa Kata Sandi')

@section('style')
    <!-- CSS Libraries -->
@endsection

@section('content')

<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('password.email') }}" method="POST">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
        <!--end::Link-->
    </div>
           
    <!--begin::Heading-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent" />
        <!--end::Email-->
    </div>
    <!--begin::Actions-->
    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
            <!--begin::Indicator label-->
            <span class="indicator-label">Submit</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
        <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
    </div>
    <!--end::Actions-->
</form>

@endsection

@section('script')
    <script src="{{ asset('theme/js/custom/authentication/reset-password/reset-password.js') }}"></script>
    @if (session('status'))
        <script>
            success();
        </script>
    @endif
    @error('email')
        <script>
            error();
        </script>
    @enderror
@endsection


