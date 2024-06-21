@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card px-4 pb-4 sm:px-5">
            <div class="my-3 flex h-8 items-center justify-between">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                    {{ __('Verify Your Email Address') }}
                </h2>

            </div>
            <div class="max-w-2xl">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <p>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </p>
                    <br>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">{{ __('click here to request another') }}</button>.
                </form>
            </div>

        </div>

{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
