@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 ">
                <div class="card p-4 sm:p-5">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                        {{ __('Reset Password') }}
                    </p>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mt-4 space-y-4">
                            <label class="block">
                                <span>{{ __('Email Address') }}</span>

                                <span class="relative mt-1.5 flex">
                                    <input
                                        class="form-input peer @error('email') is-invalid @enderror w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="{{ __('Email Address') }}" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-regular fa-envelope text-base"></i>
                                    </span>
                                </span>
                            </label>



                            <div class="flex justify-end space-x-2">

                                <button type="submit"
                                    class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>{{ __('Send Password Reset Link') }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
