@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center space-x-4 py-5 lg:py-6">
    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
        Profile Edit
    </h2>
    <div class="hidden h-full py-1 sm:flex">
        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
    </div>
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Dashboard</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li>help desk</li>
    </ul>
</div>

<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 lg:col-span-4">
        <div class="card p-4 sm:p-5">
            <div class="flex items-center space-x-4">
                <div class="avatar size-14">
                    @if ($profileImage)
                    <img class="mask is-squircle" src="{{ Storage::url($profileImage->profile_picture) }}" alt="avatar">
                    @else
                    <img class="rounded-full" src="{{ asset('backend/images/avatar/black-afro.png') }}" alt="avatar" />
                    @endif

                    <div x-data="{showModal:false}" class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700">
                        <button @click="showModal = true" class="btn size-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </button>
                        <template x-teleport="#x-teleport-target">
                            <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                <form action="{{ route('profile-image.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                    <div class="relative max-w-md rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]" x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]">
                                        <div class="avatar size-20">
                                            @if ($profileImage)
                                            <img src="{{ Storage::url($profileImage->profile_picture) }}" alt="Profile Image">
                                            @else
                                            <img class="rounded-full" src="{{ asset('backend/images/avatar/black-afro.png') }}" alt="avatar" />
                                            @endif

                                            <div class="absolute right-0 m-1 size-4 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                                            </div>
                                        </div>
                                        <div class="mt-4 px-4 sm:px-12">
                                            <div class="form-group">
                                                <label for="profile_picture">Profile Picture</label>
                                                <input type="file" name="profile_picture" id="profile_picture" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="my-4 mt-16 h-px bg-slate-200 dark:bg-navy-500"></div>

                                        <div class="space-x-3">
                                            <button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </template>
                    </div>

                </div>
                <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                    </h3>
                    <p class="text-xs+">{{ Auth::user()->email }} </p>
                </div>
            </div>
            <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                    <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span>Account</span>
                    </a>
                </li>

                <li>
                    <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>

                        <span>Notification(coming soon)</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                        <span>Security(coming soon)</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span>Apps(coming soon)</span>
                    </a>
                </li>
                <li>
                    <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        <span> Privacy &amp; data (coming soon)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-8">
        <div class="card">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">

                    <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Account Setting
                    </h2>
                    <div class="flex justify-center space-x-2">

                        <button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Update Profile
                        </button>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    <div class="flex flex-col">


                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">





                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="main_interest_in_yowza">Main Interest in Yowza</label>
                                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="main_interest_in_yowza" name="main_interest_in_yowza" required>
                                    <option value="Business Tool" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Business Tool' ? 'selected' : '' }}>Business
                                        Tool
                                    </option>
                                    <option value="Business Opportunities" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Business Opportunities' ? 'selected' : '' }}>
                                        Business Opportunities</option>
                                    <option value="Document Library" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Document Library' ? 'selected' : '' }}>Document
                                        Library</option>
                                    <option value="Funding/Sponsorship" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Funding/Sponsorship' ? 'selected' : '' }}>
                                        Funding/Sponsorship</option>
                                    <option value="Marketplace" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Marketplace' ? 'selected' : '' }}>Marketplace
                                    </option>
                                    <option value="Training" {{ old('main_interest_in_yowza', $user->main_interest_in_yowza) == 'Training' ? 'selected' : '' }}>Training
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}">
                            </div>

                            <div class="form-group">
                                <label for="landline_number">Landline Number</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="landline_number" name="landline_number" value="{{ old('landline_number', $user->landline_number) }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="gender" name="gender">
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="prefer not to say" {{ old('gender', $user->gender) == 'prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ethnics_group">Ethnic Group</label>
                                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="ethnics_group" name="ethnics_group">
                                    <option value="African" {{ old('ethnics_group', $user->ethnics_group) == 'African' ? 'selected' : '' }}>African</option>
                                    <option value="White" {{ old('ethnics_group', $user->ethnics_group) == 'White' ? 'selected' : '' }}>White</option>
                                    <option value="Coloured" {{ old('ethnics_group', $user->ethnics_group) == 'Coloured' ? 'selected' : '' }}>Coloured</option>
                                    <option value="Indian" {{ old('ethnics_group', $user->ethnics_group) == 'Indian' ? 'selected' : '' }}>Indian</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="disability">Disability</label>
                                <input type="text" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="disability" name="disability" value="{{ old('disability', $user->disability) }}">
                            </div>

                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="nationality" name="nationality">
                                    <option value="South Africa" {{ old('nationality', $user->nationality) == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                    <option value="Lesotho" {{ old('nationality', $user->nationality) == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                    <option value="Botswana" {{ old('nationality', $user->nationality) == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                    <option value="Zambia" {{ old('nationality', $user->nationality) == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                    <option value="Zimbabwe" {{ old('nationality', $user->nationality) == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                    <option value="Mozambique" {{ old('nationality', $user->nationality) == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" id="password_confirmation" name="password_confirmation">
                            </div>

                            <!-- <button type="submit" class="btn btn-primary">Update Profile</button> -->

                            <!-- <label class="block">
                        <span>Display name </span>
                        <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter name" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                        </span>
                    </label>
                    <label class="block">
                        <span>Full Name </span>
                        <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter full name" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-user text-base"></i>
                            </span>
                        </span>
                    </label>
                    <label class="block">
                        <span>Email Address </span>
                        <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter email address" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-envelope text-base"></i>
                            </span>
                        </span>
                    </label>
                    <label class="block">
                        <span>Phone Number</span>
                        <span class="relative mt-1.5 flex">
                            <input
                                class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter phone number" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                    </label> -->
                        </div>
                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                        <div>
                            <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                                Linked Accounts(coming soon)
                            </h3>
                            <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                Link accounts such as google, facebook, linkedIn etc with yowza!
                            </p>
                            <div class="flex items-center justify-between pt-4">
                                <div class="flex items-center space-x-4">
                                    <div class="size-12">
                                        <img src="{{ asset('backend/images/logos/google.svg')}}" alt="logo">
                                    </div>
                                    <p class="font-medium line-clamp-1">
                                        Sign In with Google
                                    </p>
                                </div>
                                <button class="btn h-8 rounded-full border border-slate-200 px-3 text-xs+ font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                    Connect
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>



<style>
    /* Hide file input by default */
    .form-control-file {
        display: none;
    }

</style>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>


@endsection
