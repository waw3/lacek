@extends('layouts.noauth')

@push('css')
<!-- Page CSS Code -->
@endpush

@push('js')
<!-- Page JS Code -->
@vite(['resources/js/pages/auth_signin.js'])
@endpush

@section('content')
<div class="bg-image" style="background-image: url('/assets/media/photos/photo17@2x.jpg');">
    <div class="row g-0 bg-gd-fruit-op">
        <!-- Main Section -->
        <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
            <div class="p-3 w-100">
                <!-- Header -->
                <div class="text-center">
                    <a class="fw-bold fs-1" href="/">
                        <span class="text-dark">Lacek</span><span class="text-primary">Group</span>
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted">{{ __('Reset Password') }}</p>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="py-3 mb-4">
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                    <i class="fa fa-fw fa-reply opacity-50 me-1"></i> {{ __('Send Password Reset Link') }}
                                </button>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in-alt opacity-50 me-1"></i> {{ __('Sign In') }}
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                                        <i class="fa fa-plus opacity-50 me-1"></i> {{ __('New Account') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Reminder Form -->
            </div>
        </div>
        <!-- END Main Section -->

        <!-- Meta Info Section -->
        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                <p class="display-4 fw-bold text-white mb-0">
                    Be ready to fail..
                </p>
                <p class="fs-1 fw-semibold text-white-75 mb-0">
                    ..to be able to succeed!
                </p>
            </div>
        </div>
        <!-- END Meta Info Section -->
    </div>
</div>
@endsection
