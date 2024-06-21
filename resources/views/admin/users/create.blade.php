@extends('layouts.master_dashboard_layout')
@section('main_content')

    <div class="flex items-center justify-between py-5 lg:py-6">
        <div class="flex items-center space-x-1">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                Add a User
            </h2>
            <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(268px, 122px);" data-popper-placement="bottom-start">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.index', ['prefix' => 'admin']) }}" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <span> All Users</span></a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    <span>Export Users</span></a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Setting</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-2">
            <label class="relative hidden sm:flex">
                <input class="form-input peer h-9 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 text-xs+ placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Search users..." type="text">
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"></path>
                </svg>
              </span>
            </label>

            <div class="flex">
                <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <circle cx="10.2" cy="10.2" r="7.2" stroke-width="1.5"></circle>
                        <path stroke-width="1.5" stroke-linecap="round" d="M21 21l-3.6-3.6"></path>
                    </svg>
                </button>
                <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 5.109C3 4.496 3.47 4 4.05 4h16.79c.58 0 1.049.496 1.049 1.109 0 .612-.47 1.108-1.05 1.108H4.05C3.47 6.217 3 5.721 3 5.11zM5.798 12.5c0-.612.47-1.109 1.05-1.109H18.04c.58 0 1.05.497 1.05 1.109s-.47 1.109-1.05 1.109H6.848c-.58 0-1.05-.497-1.05-1.109zM9.646 18.783c-.58 0-1.05.496-1.05 1.108 0 .613.47 1.109 1.05 1.109h5.597c.58 0 1.05-.496 1.05-1.109 0-.612-.47-1.108-1.05-1.108H9.646z"></path>
                    </svg>
                </button>
                <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <form action="{{ route('admin.users.store', ['prefix' => 'admin']) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
            </div>
            <div class="form-group">
                <label for="main_interest_in_yowza">Main Interest in Yowza</label>
                <select name="main_interest_in_yowza" id="main_interest_in_yowza" class="form-control" required>
                    <option value="Business Tool">Business Tool</option>
                    <option value="Business Opportunities">Business Opportunities</option>
                    <option value="Document Library">Document Library</option>
                    <option value="Funding/Sponsorship">Funding/Sponsorship</option>
                    <option value="Marketplace">Marketplace</option>
                    <option value="Training">Training</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
            </div>
            <div class="form-group">
                <label for="landline_number">Landline Number</label>
                <input type="text" class="form-control" id="landline_number" name="landline_number" value="{{ old('landline_number') }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ethnics_group">Ethnic Group</label>
                <select name="ethnics_group" id="ethnics_group" class="form-control">
                    <option value="African">African</option>
                    <option value="White">White</option>
                    <option value="Coloured">Coloured</option>
                    <option value="Indian">Indian</option>
                </select>
            </div>
            <div class="form-group">
                <label for="disability">Disability</label>
                <input type="text" class="form-control" id="disability" name="disability" value="{{ old('disability') }}">
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <select name="nationality" id="nationality" class="form-control">
                    <option value="South Africa">South Africa</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                    <option value="Mozambique">Mozambique</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="roles">Roles</label>
                <select name="roles[]" id="roles" class="form-control" multiple required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>

    </div>

@endsection
