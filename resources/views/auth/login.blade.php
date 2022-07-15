@extends('front.layouts.app')

@section('content')
<div class="account-pages pt-4 pt-sm-4 pb-4 pb-sm-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card mb-0">
                    <div class="card-body p-1 p-sm-3 p-lg-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">{{ __('Sign In') }}</h4>
                            <p class="text-muted mb-4">{{ __('Enter your email address and password to access admin panel.') }}</p>
                        </div>

                        <form action="{{ route('login') }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted float-end"><small>{{ __('Forgot Your Password?') }}</small></a>
                                @endif

                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password"  placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-1 mb-0 text-center">
                                <button type="submit" class="btn btn-primary px-3">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('head-scripts')
    <link href="{{ asset('admin/css/app-modern.min.css ') }}" rel="stylesheet" type="text/css" id="light-style" />
    <style>
        dl, ol, ul, p{
            margin: 0;
        }
        ol, ul{
            padding-left: 0;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
@endpush
