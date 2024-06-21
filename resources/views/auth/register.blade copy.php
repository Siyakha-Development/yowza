@extends('layouts.app2')

@section('content')
<div class="flex w-full max-w-sm grow flex-col justify-center p-5">
    <div class="text-center">
        <img class="mx-auto size-16 lg:hidden" src="https://yowza.co.za/images/Logo/April-2024/yowza-logo-mark-1.png"
            alt="logo">
        <div class="mt-4">
            <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                Welcome To yowza!
            </h2>
            <p class="text-slate-400 dark:text-navy-300">
                Please register to continue
            </p>
        </div>
    </div>

    <div class="mt-10 flex space-x-4">
        <button
            class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
            <img class="size-5.5" src="images/logos/google.svg" alt="logo">
            <span>Google</span>
        </button>
        <button
            class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
            <img class="size-5.5" src="images/logos/github.svg" alt="logo">
            <span>Github</span>
        </button>
    </div>
    <div class="my-7 flex items-center space-x-3">
        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
        <p class="text-tiny+ uppercase">or sign up with email</p>

        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mt-4 space-y-4">

            <label class="relative flex">
                <input
                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="First Name" type="text" name="name">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
            </label>
            <label class="relative flex">
                <input
                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Last Name" type="text" name="lastname">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
            </label>
            <label class="relative flex">
                <select name="role" id="role"
                    class="form-select mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    required>
                    <option value="">Select Your User Type</option>
                    <option value="Individual">Individual</option>
                    <option value="SMME">SMME</option>
                </select>
            </label>
            <label class="relative flex">
                <input
                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Email" type="email" name="email">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </span>
            </label>
            <label class="relative flex">
                <select id="main_interest_in_yowza"
                    class="form-select mt-1.5 w-full @error('main_interest_in_yowza') is-invalid @enderror rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    name="main_interest_in_yowza" required>
                    <option value="">{{ __('Main Interest in Yowza') }}</option>
                    <option value="Business Tool">Business Tool</option>
                    <option value="Business Opportunities">Business Opportunities</option>
                    <option value="Document Library">Document Library</option>
                    <option value="Funding/Sponsorship">Funding/Sponsorship</option>
                    <option value="Marketplace">Marketplace</option>
                    <option value="Training">Training</option>
                </select>
                @error('main_interest_in_yowza')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <label class="relative flex">
                <input
                    class="form-input peer @error('mobile_number') is-invalid @enderror w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Mobile Number" type="text" id="mobile_number" name="mobile_number"
                    autocomplete="mobile_number">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
            </label>

            <label class="relative flex">
                <input
                    class="form-input peer @error('landline_number') is-invalid @enderror w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Landline Number" type="text" id="landline_number" name="landline_number"
                    autocomplete="landline_number">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
            </label>

            <label for="gender" class="relative flex">
                <div class="col-md-12">
                    <select id="gender"
                        class="form-control @error('gender') is-invalid @enderror form-select mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                        name="gender">
                        <option value="">{{ __('Gender') }}</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="prefer not to say">Prefer not to say</option>
                    </select>

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </label>

            <label for="ethnics_group" class="relative flex">
                <select id="ethnics_group"
                    class="form-control @error('ethnics_group') is-invalid @enderror form-select mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    name="ethnics_group">
                    <option value="">{{ __('Ethnics Group') }}</option>
                    <option value="African">African</option>
                    <option value="White">White</option>
                    <option value="Coloured">Coloured</option>
                    <option value="Indian">Indian</option>
                </select>

                @error('ethnics_group')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>





            <label for="nationality">
                <select id="nationality"
                    class="form-control @error('nationality') is-invalid @enderror form-select mt-1.5 w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    name="nationality">
                    <option value="">{{ __('Country') }}</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                    <option value="Mozambique">Mozambique</option>
                </select>

                @error('nationality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </label>
            <label class="relative flex">
                <input
                    class="form-input peer @error('disability') is-invalid @enderror w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Disability" type="text" id="disability" name="disability" autocomplete="disability">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
            </label>
            <label class="relative flex">
                <input
                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Password" id="passowrd" type="password" name="password" required
                    autocomplete="new-password">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </span>
            </label>
            <label class="relative flex">
                <input
                    class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                    placeholder="Repeat Password" id="password-confirm" name="password_confirmation" required
                    autocomplete="new-password" type="password">
                <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 transition-colors duration-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </span>
            </label>
            <div class="mt-4 flex items-center space-x-2">
                <input
                    class="form-checkbox is-basic size-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                    type="checkbox">
                <p class="line-clamp-1">
                    I agree with
                    <a href="#" class="text-slate-400 hover:underline dark:text-navy-300">
                        privacy policy
                    </a>
                </p>
            </div>

        </div>
        <button type="submit"
            class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
            Register
        </button>
    </form>
    <div class="mt-4 text-center text-xs+">
        <p class="line-clamp-1">
            <span>Already have an account? </span>
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="pages-login-2.html">Sign In</a>
        </p>
    </div>
</div>
@endsection
