@extends('layouts.marketplace_layout')

@section('marketplace_content')
    <div class="py-5 text-center lg:py-6">
        <p class="text-sm uppercase">Are you new here?</p>
        <h3
            class="mt-1 text-xl font-semibold text-slate-600 dark:text-navy-100"
        >
            Welcome. Where do you like to Start?
        </h3>
    </div>
    <div class="grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
        <div class="card" onclick="handleCardClick(this, '{{ route('marketplace.listings.create') }}')">
            <div class="flex justify-center p-5">
                <img
                    class="w-9/12"
                    src="{{asset('backend/images/illustrations/creativedesign.svg')}}"
                    alt="image"
                />
            </div>
            <div class="px-4 pb-8 text-center sm:px-5">
                <h4
                    class="text-lg font-semibold text-slate-700 dark:text-navy-100"
                >
                    Item for sale
                </h4>
                <p class="pt-3">
                    Create a single listing for one or more items to sell
                </p>
            </div>
        </div>
        <div class="card" onclick="handleCardClick(this, '{{ route('marketplace.listings.create') }}')">
            <div class="flex justify-center p-5">
                <img
                    class="w-9/12"
                    src="{{asset('backend/images/illustrations/responsive.svg')}}"
                    alt="image"
                />
            </div>
            <div class="px-4 pb-8 text-center sm:px-5">
                <h4
                    class="text-lg font-semibold text-slate-700 dark:text-navy-100 "
                >
                   Service Offered
                </h4>
                <p class="pt-3">
                   Create  a single or more services offered
                </p>
            </div>
        </div>
        <div class="card" onclick="handleCardClick(this, '{{ route('marketplace.listings.create') }}')">
            <div class="flex justify-center p-5">
                <img
                    class="w-9/12"
                    src="{{asset('backend/images/illustrations/performance.svg')}}"
                    alt="image"
                />
            </div>
            <div class="px-4 pb-8 text-center sm:px-5">
                <h4
                    class="text-lg font-semibold text-slate-700 dark:text-navy-100"
                >
                    Home for sale or rent
                </h4>
                <p class="pt-3">
                    List a home or apartment for sale or rent
                </p>

            </div>
        </div>
    </div>
@endsection
