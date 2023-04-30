@extends('layouts.auth')

@section('pageTitle', 'Atur Ulang Kata Sandi')

@section('content')

<form class="form w-100" novalidate="novalidate" id="kt_new_password_form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="text-center mb-10">
        <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
        <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
        <a href="{{ route('login') }}" class="link-primary fw-bold">Sign in</a></div>
    </div>
    <div class="fv-row mb-8">
        <input type="text" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" autocomplete="off" class="form-control bg-transparent" />
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
        <input type="password" placeholder="Repeat Password" name="password_confirmation" autocomplete="off" class="form-control bg-transparent" />
    </div>
    <div class="fv-row mb-8">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="toc" value="1" />
            <span class="form-check-label fw-semibold text-gray-700 fs-6 ms-1">I Agree &
            <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
        </label>
    </div>
    <div class="d-grid mb-10">
        <button type="button" id="kt_new_password_submit" class="btn btn-primary">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>

    {{-- <div class="card card-primary">
        <div class="card-header"><h4>Atur Ulang Kata Sandi</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate="">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                   
                </div>

                <div class="form-group">
                    <label for="password" class="d-block">Kata Sandi</label>
                    <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" autocomplete="new-password">
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="d-block">Konfirmasi Kata Sandi</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div> 

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Atur Ulang Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </div>  --}}
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('theme/js/custom/authentication/reset-password/new-password.js') }}"></script>
    @error('email')
        <script>
            error();
        </script>
    @enderror 
@endsection