@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center space-x-4 py-5 lg:py-6">
    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
        User Edit
    </h2>
    <div class="hidden h-full py-1 sm:flex">
        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
    </div>
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="#">All Users</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li>Help</li>
    </ul>
</div>

<div class="grid grid-cols-8 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-8">

        <div class="card p-4 sm:p-5">
            <p class="text-base font-medium text-slate-700 dark:text-navy-100">Edit User Information</p>
            <form action="{{ route('admin.users.update', ['prefix' => 'admin', 'user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')




                <div class="mt-4 space-y-4">
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        <label for="role">Role*</label>
                        <select name="role[]"
                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                            id="role" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ in_array($role->id, old('categories', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach 
                        </select>
                        @if($errors->has('role'))
                            <em class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </em>
                        @endif
                    </div>
                    <label class="block">
                        <span>Name</span>
                        <span class="relative mt-1.5 flex">
                            <input name="name" value="{{ old('name', $user->name) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="First Name" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="far fa-user text-base"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Last Name</span>
                        <span class="relative mt-1.5 flex">
                            <input name="lastname" value="{{ old('lastname', $user->lastname) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Last Name" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="far fa-user text-base"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Main Interest in Yowza</span>
                        <select name="main_interest_in_yowza"
                            class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            @foreach(['Business Tool', 'Business Opportunities', 'Document Library', 'Funding/Sponsorship', 'Marketplace', 'Training'] as $interest)
                                <option value="{{ $interest }}" {{ $user->main_interest_in_yowza == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block">
                        <span>Mobile Number</span>
                        <span class="relative mt-1.5 flex">
                            <input name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="(999) 999-9999" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Landline Number</span>
                        <span class="relative mt-1.5 flex">
                            <input name="landline_number" value="{{ old('landline_number', $user->landline_number) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Landline Number" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa fa-phone"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Gender</span>
                        <select name="gender"
                            class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="prefer not to say" {{ $user->gender == 'prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                    </label>

                    <label class="block">
                        <span>Ethnics Group</span>
                        <select name="ethnics_group"
                            class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            <option value="African" {{ $user->ethnics_group == 'African' ? 'selected' : '' }}>African
                            </option>
                            <option value="White" {{ $user->ethnics_group == 'White' ? 'selected' : '' }}>White</option>
                            <option value="Coloured" {{ $user->ethnics_group == 'Coloured' ? 'selected' : '' }}>Coloured
                            </option>
                            <option value="Indian" {{ $user->ethnics_group == 'Indian' ? 'selected' : '' }}>Indian
                            </option>
                        </select>
                    </label>

                    <label class="block">
                        <span>Disability</span>
                        <span class="relative mt-1.5 flex">
                            <input name="disability" value="{{ old('disability', $user->disability) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Disability" type="text">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa fa-wheelchair"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Nationality</span>
                        <select name="nationality"
                            class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            @foreach(['South Africa', 'Lesotho', 'Botswana', 'Zambia', 'Zimbabwe', 'Mozambique'] as $country)
                                <option value="{{ $country }}" {{ $user->nationality == $country ? 'selected' : '' }}>
                                    {{ $country }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="block">
                        <span>Email</span>
                        <span class="relative mt-1.5 flex">
                            <input name="email" value="{{ old('email', $user->email) }}"
                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Email Address" type="email">
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <i class="fa-regular fa-envelope text-base"></i>
                            </span>
                        </span>
                    </label>

                    <label class="block">
                        <span>Language</span>
                        <select name="lang"
                            class="form-select peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            <option value="en" {{ $user->lang == 'en' ? 'selected' : '' }}>English</option>
                            <option value="af" {{ $user->lang == 'af' ? 'selected' : '' }}>Afrikaans</option>
                            <option value="zu" {{ $user->lang == 'zu' ? 'selected' : '' }}>Zulu</option>
                            <option value="xh" {{ $user->lang == 'xh' ? 'selected' : '' }}>Xhosa</option>
                            <option value="st" {{ $user->lang == 'st' ? 'selected' : '' }}>Sotho</option>
                            <option value="tn" {{ $user->lang == 'tn' ? 'selected' : '' }}>Tswana</option>
                            <option value="ts" {{ $user->lang == 'ts' ? 'selected' : '' }}>Tsonga</option>
                            <option value="ve" {{ $user->lang == 've' ? 'selected' : '' }}>Venda</option>
                            <option value="nr" {{ $user->lang == 'nr' ? 'selected' : '' }}>Ndebele</option>
                            <option value="ss" {{ $user->lang == 'ss' ? 'selected' : '' }}>Swazi</option>
                            <option value="nso" {{ $user->lang == 'nso' ? 'selected' : '' }}>Northern Sotho</option>
                            <option value="tn" {{ $user->lang == 'tn' ? 'selected' : '' }}>Setswana</option>
                        </select>

                    </label>
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="submit"
                        class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <span>Save</span>
                    </button>
                </div>
            </form>

        </div>

    </div>


</div>
@endsection