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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
