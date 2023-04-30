@extends('layouts.auth')

@section('pageTitle', 'Buat Akun')

@section('style')
    <!-- CSS Libraries -->
@endsection

@section('content')
<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="../../demo1/dist/authentication/layouts/corporate/sign-in.html" action="#">
    <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
        <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
    </div>
    <div class="fv-row mb-8">
        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
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
    <a href="../../demo1/dist/authentication/layouts/corporate/sign-in.html" class="link-primary fw-semibold">Sign in</a></div>
</form>

    <div class="card card-primary">
        <div class="card-header"><h4>Buat Akun</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                @csrf                
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('theme/js/custom/authentication/sign-up/general.js') }}"></script>
@endsection