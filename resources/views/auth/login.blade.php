@extends('layouts.spring')

@section('content')

<section class="hero-wrap hero-wrap-3 pt-5" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-2 bread">{{ __('auth.Login to Site') }}</h1>
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ route('register')}}" class="btn btn-info">{{ __('auth.I am New') }}</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-left">{{ __('auth.Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" autofocus>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('auth.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="custom-control custom-checkbox form-check text-md-left">
                                    <label class="custom-control-label form-check-label" for="remember">
                                        {{ __('auth.Remember Me') }}
                                    </label>
                                    <input class="custom-control-input form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-md-left">
                            <div class="col-md-8 offset-md-4">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('auth.Forgot Your Password?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary">
                                    {{ __('auth.Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

