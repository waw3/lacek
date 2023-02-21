@extends('layouts.noauth')

@push('css')
<!-- Page CSS Code -->
@endpush

@push('js')
<!-- Page JS Code -->
@vite(['resources/js/pages/auth_signin.js'])
@endpush

@section('content')
<div class="bg-image" style="background-image: url('assets/media/photos/photo12@2x.jpg');">
    <div class="row g-0 justify-content-center bg-black-75">
        <!-- Main Section -->
        <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
            <div class="p-3 w-100">
                <!-- Header -->
                <div class="mb-3 text-center">
                    <a class="fw-bold fs-1" href="/">
                        <span class="text-dark">Lacek</span><span class="text-primary">Group</span>
                    </a>
                    <p class="text-uppercase fw-bold fs-sm text-muted">{{ __('Create New Account') }}</p>
                </div>
                <!-- END Header -->

                <!-- Sign Up Form -->
                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="py-3">

                                <div class="mb-4">
                                    <input id="first_name" type="text" class="form-control form-control-lg form-control-alt @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required placeholder="{{ __('First Name') }}" autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <input id="last_name" type="text" class="form-control form-control-lg form-control-alt @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required placeholder="{{ __('Last Name') }}" autocomplete="last_name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('Email') }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-4">
                                    <input id="password" type="password" class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Password') }}" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" autocomplete="new-password">
                                </div>

                                <div class="mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                                        <label class="form-check-label" for="signup-terms">I agree to
                                            <a class="" href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">
                                                Terms &amp; Conditions
                                            </a>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                    <i class="fa fa-fw fa-plus opacity-50 me-1"></i> {{ __('Sign Up') }}
                                </button>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                        <i class="fa fa-sign-in-alt opacity-50 me-1"></i> {{ __('Sign In') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Sign Up Form -->
            </div>
        </div>
        <!-- END Main Section -->
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->
</div>
@endsection
