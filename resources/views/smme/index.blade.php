@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    <div class="col-span-12 lg:col-span-8 xl:col-span-9">
        <div :class="$store.breakpoints.smAndUp && 'via-purple-300'" class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row">
            <div class="flex justify-center sm:order-last">
                <img class="-mt-16 h-40 sm:mt-0" src="{{asset('backend/images/illustrations/teacher.svg')}}" alt="" />
            </div>
            <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                <h3 class="text-xl">
                    Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span> to yowza!
                </h3>
                <p class="mt-2 leading-relaxed">
                    Your SMME Dashboard to help you grow your business
                    <!-- <span class="font-semibold text-navy-700">85%</span> of tasks -->
                </p>
                <!-- <p>Progress is <span class="font-semibold">excellent!</span></p> -->

                <a href="{{ route('profile.edit')}}" class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                    View Profile
                </a>
            </div>
        </div>


        @if ($workspaces->isEmpty())
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="card px-4 pb-4 sm:px-5">
                <div class="my-3 flex h-8 items-center justify-between">
                    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                        Don't have a Workspace yet
                    </h2>

                </div>

                <div>
                    <p class="max-w-2xl">
                        Tooltip can be triggered by a variety of different events,
                        including click, focus, or any other even. Check out code for
                        detail of usage.
                    </p>
                    <div class="inline-space mt-5 flex flex-wrap">
                        <div x-data="{showModal:false}">
                            <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                Create a Workspace
                            </button>
                            <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-[100] flex flex-col items-center  overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                    <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                    <div style="max-height: 80vh; overflow-y: auto;" class="relative origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                                        <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                Create your SMME Workspace
                                            </h3>
                                            <button @click="showModal = !showModal" class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="px-4 py-4 sm:px-5">

                                            <div class="mt-4 space-y-4">
                                                <form action="{{ route('smme.smmeworkspace.store', ['prefix' => 'admin']) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <label class="block">
                                                            <span>Name:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="name" required>
                                                        </label>
                                                        <label class="block">
                                                            <span>Business Name:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_name" required>
                                                        </label>
                                                    </div>
                                                    <label class="block">
                                                        <span>Logo:</span>
                                                        <input type="file" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_logo">
                                                    </label>
                                                    <label class="block">
                                                        <span>Description of Business:</span>
                                                        <textarea rows="4" class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_description_of_business" required></textarea>
                                                    </label>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        {{-- <label class="block">
                                                            <span>Industry:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_industry">
                                                        </label> --}}
                                                        <label class="block">
                                                            <span>Industry:</span>
                                                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_industry">
                                                                <option value="">Select an industry</option>
                                                                <option value="Agriculture, Forestry and Fishing">Agriculture, Forestry and Fishing</option>
                                                                <option value="Arts, Entertainment and Recreation">Arts, Entertainment and Recreation</option>
                                                                <option value="Beauty and Cosmetics">Beauty and Cosmetics</option>
                                                                <option value="Catering, Accommodation and Events">Catering, Accommodation and Events</option>
                                                                <option value="Cleaning and Hygiene, Facilities Management">Cleaning and Hygiene, Facilities Management</option>
                                                                <option value="Clothing and Textiles">Clothing and Textiles</option>
                                                                <option value="Construction">Construction</option>
                                                                <option value="Education, Training and Development">Education, Training and Development</option>
                                                                <option value="Electrical, Gas and Water Services">Electrical, Gas and Water Services</option>
                                                                <option value="Environment, Conservation, Waste Management">Environment, Conservation, Waste Management</option>
                                                                <option value="Finance, Business, HR, and Consulting Services">Finance, Business, HR, and Consulting Services</option>
                                                                <option value="General Maintenance and Repairs">General Maintenance and Repairs</option>
                                                                <option value="Healthcare, Personal and Social Services">Healthcare, Personal and Social Services</option>
                                                                <option value="ICT and Communications">ICT and Communications</option>
                                                                <option value="Manufacturing and Packaging">Manufacturing and Packaging</option>
                                                                <option value="Marketing and Design">Marketing and Design</option>
                                                                <option value="Mining and Quarrying">Mining and Quarrying</option>
                                                                <option value="Motor Maintenance and Repairs">Motor Maintenance and Repairs</option>
                                                                <option value="Office Supplies and Furniture">Office Supplies and Furniture</option>
                                                                <option value="Professional, Scientific and Technical Services">Professional, Scientific and Technical Services</option>
                                                                <option value="Real Estate">Real Estate</option>
                                                                <option value="Safety and Security">Safety and Security</option>
                                                                <option value="Transportation, Logistics, and Storage">Transportation, Logistics, and Storage</option>
                                                                <option value="Travel and Tourism">Travel and Tourism</option>
                                                                <option value="Wholesale and Retail Trade">Wholesale and Retail Trade</option>
                                                            </select>
                                                        </label>

                                                        <label class="block">
                                                            {{-- <span>Company Size:</span>
                                                        <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_company_size">
                                                             --}}
                                                            <label class="block">
                                                                <span>Company Size:</span>
                                                                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_company_size">
                                                                    <option value="">Select company size</option>
                                                                    <option value="1">1 (Sole Proprietor)</option>
                                                                    <option value="2-10">2-10 (Micro)</option>
                                                                    <option value="11-50">11-50 (Small)</option>
                                                                    <option value="51+">51+ (Medium)</option>
                                                                </select>
                                                            </label>

                                                        </label>
                                                    </div>
                                                    <label class="block">
                                                        <span>Business Registration Number:</span>
                                                        <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_registration_number">

                                                    </label>
                                                    <label class="block">
                                                        <span>Company Address:</span>
                                                        <textarea rows="2" class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_company_address"></textarea>
                                                    </label>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <label class="block">
                                                            <span>Company Email:</span>
                                                            <input type="email" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_company_email">
                                                        </label>
                                                        <label class="block">
                                                            <span>Landline Number:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_landline_number">
                                                        </label>
                                                    </div>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        {{-- <label class="block">
                                                            <span>Business Classification:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_classification">
                                                        </label> --}}
                                                        <label class="block">
                                                            <span>Business Classification:</span>
                                                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_classification">
                                                                <option value="">Select business classification</option>
                                                                <option value="EME : Less than R10m annual turnover">EME : Less than R10m annual turnover</option>
                                                                <option value="QSE : More than R10m but less than R50m annual turnover">QSE : More than R10m but less than R50m annual turnover</option>
                                                                <option value="Generic : More than R50m annual turnover">Generic : More than R50m annual turnover</option>
                                                            </select>
                                                        </label>

                                                        <label class="block">
                                                            <span>Established in Year:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_established_in_year">
                                                        </label>
                                                    </div>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <label class="block">
                                                            <span>Do you have a BBBEE Certificate?</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_do_you_have_a_b_bbee_certificate">
                                                        </label>
                                                        {{-- <label class="block">
                                                            <span>BBBEE Level:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_b_bbee_level">
                                                        </label> --}}
                                                        <label class="block">
                                                            <span>BBBEE Level:</span>
                                                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_b_bbee_level">
                                                                <option value="">Select BBBEE Level</option>
                                                                <option value="Level 1">Level 1</option>
                                                                <option value="Level 2">Level 2</option>
                                                                <option value="Level 3">Level 3</option>
                                                                <option value="Level 4">Level 4</option>
                                                                <option value="Level 5">Level 5</option>
                                                                <option value="Level 6">Level 6</option>
                                                                <option value="Level 7">Level 7</option>
                                                                <option value="Level 8">Level 8</option>
                                                                <option value="Non compliant">Non compliant</option>
                                                            </select>
                                                        </label>

                                                    </div>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        {{-- <label class="block">
                                                            <span>Black Woman Ownership:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_black_woman_ownership">
                                                        </label> --}}
                                                        <label class="block">
                                                            <span>Black Woman Ownership:</span>
                                                            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_black_woman_ownership">
                                                                <option value="">Select Black Woman Ownership</option>
                                                                <option value="0%">0%</option>
                                                                <option value="Less than 30%">Less than 30%</option>
                                                                <option value="Between 30% and 50%">Between 30% and 50%</option>
                                                                <option value="More than 50%">More than 50%</option>
                                                                <option value="100%">100%</option>
                                                            </select>
                                                        </label>

                                                        <label class="block">
                                                            <span>Growth in Profit:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_growth_in_profit">
                                                        </label>
                                                    </div>
                                                    <label class="block">
                                                        <span>Growth in Jobs:</span>
                                                        <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_growth_in_jobs">
                                                    </label>
                                                    <label class="block">
                                                        <span>Growth in Economic Participation:</span>
                                                        <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_growth_in_economic_participation">
                                                    </label>
                                                    <br>
                                                    <div class="space-x-2 text-right">
                                                        <button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                            Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <button class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" x-tooltip.on.click="'Click me'">
                            Join a Workspace
                        </button>
                    </div>
                </div>


            </div>
        </div>
        @else

        <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="flex h-8 items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    SMME Workspaces
                </h2>
                <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                    All</a>
            </div>
            <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5">
                @foreach ($workspaces as $workspace)
                <div class="card flex-row overflow-hidden">
                    <div class="h-full w-1 bg-gradient-to-b from-blue-500 to-purple-600"></div>
                    <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                        <div>
                            @if ($workspace->smme_logo)
                            <img class="size-12 rounded-lg object-cover object-center" src="{{ asset('storage/' . $workspace->smme_logo) }}" alt="image" />
                            @endif
                            <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                {{ $workspace->name }}
                            </h3>
                            <p class="text-xs+">Mon. 08:00 - 09:00</p>
                            <div class="mt-2 flex space-x-1.5">
                                <a href="#" class="tag bg-primary py-1 px-1.5 text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    {{ $workspace->smme_business_name}}
                                </a>
                            </div>
                        </div>
                        <div class="mt-10 flex justify-between">
                            <div class="flex -space-x-2">
                                <div class="avatar size-7 hover:z-10">
                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{asset('backend/images/avatar/avatar-16.jpg')}}" alt="avatar" />
                                </div>

                                <div class="avatar size-7 hover:z-10">
                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                        jd
                                    </div>
                                </div>

                                <div class="avatar size-7 hover:z-10">
                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{asset('backend/images/avatar/avatar-19.jpg')}}" alt="avatar" />
                                </div>
                            </div>

                            <button onclick="showTermsModal('{{ $workspace->id }}')" x-tooltip.placement.right-start.success="'Join: {{ $workspace->name }} workspace'" type="submit" class="btn size-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endif

        @foreach ($workspaces as $workspace)
        <div id="termsModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Terms and Conditions</h2>

                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rutrum justo et massa malesuada, nec fringilla nisl fermentum.</p>
                <br>
                <form action="{{ route('smme.workspaces.join', ['prefix' => 'admin', 'workspace' => $workspace->id]) }}" method="POST" id="joinForm">
                    @csrf
                    <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">

                    <label class="block mb-4">
                        <div>
                            <label>
                                <input type="radio" name="accept_terms" value="yes" required> Yes
                            </label>
                            <label>
                                <input type="radio" name="accept_terms" value="no" required> No
                            </label>
                        </div>
                    </label>
                    <div class="mt-4 text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-primary text-white rounded-full px-4 py-2 hover:bg-primary-focus focus:bg-primary-focus">
                            Join Workspace
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

        <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Learn
                </h2>
                <div class="flex">
                    <div class="flex items-center" x-data="{isInputActive:false}">
                        <label class="block">
                            <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});" :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'" class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200" placeholder="Search here..." type="text" />
                        </label>
                        <button @click="isInputActive = !isInputActive" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                            Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                            else</a>
                                    </li>
                                </ul>
                                <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                            Link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <table class="is-hoverable w-full text-left">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    COURSE NAME
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    COURSE START
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    PROGRESS
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    LESSONS
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    STATUS
                                </th>

                                <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div class="flex items-center space-x-4">
                                        <div class="relative flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5.5 text-primary dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <span class="font-medium text-slate-700 dark:text-navy-100">{{ $course->title}}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <a href="#" class="hover:underline focus:underline">{{ $course->start_date }}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                        <div class="size-2 rounded-full bg-current"></div>
                                        <span>Feature coming soon</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    Feature coming soon
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                    Feature coming soon
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="flex h-8 items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    Latest Posts
                </h2>
                <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                    All</a>
            </div>
            <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="image">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="#" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">What
                                is Tailwind CSS?</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
                            distinctio dolorum harum.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar size-6">
                                    <img class="rounded-full" src="images/avatar/avatar-10.jpg" alt="avatar">
                                </div>
                                <span class="line-clamp-1">John Doe</span>
                            </a>
                            <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs">25 May, 2022</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="image">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="#" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">Tailwind
                                CSS Card Example</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur. Lorem ipsum dolor on
                            the sit.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar size-6">
                                    <img class="rounded-full" src="images/avatar/avatar-20.jpg" alt="avatar">
                                </div>
                                <span class="line-clamp-1">Konnor Guzman </span>
                            </a>
                            <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs">30 May, 2022</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="image">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="#" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">What
                                is PHP?</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur. Lorem ipsum dolor on
                            the sit.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar size-6">
                                    <img class="rounded-full" src="images/avatar/avatar-19.jpg" alt="avatar">
                                </div>
                                <span class="line-clamp-1">Travis Fuller </span>
                            </a>
                            <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs">10 June, 2022</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="image">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="#" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">Top
                                Design Systems</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Architecto assumenda.
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar size-6">
                                    <img class="rounded-full" src="images/avatar/avatar-18.jpg" alt="avatar">
                                </div>
                                <span class="line-clamp-1">Alfredo Elliott </span>
                            </a>
                            <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs">19 June, 2022</span>
                            </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
            <div class="card pb-5">
                <div class="mt-3 flex items-center justify-between px-4">
                    <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        ASSESSMENTS
                        AVERAGE SCORE
                    </h2>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>

                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                            Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                            else</a>
                                    </li>
                                </ul>
                                <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                            Link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.workingHours); $el._x_chart.render() });">
                    </div>
                </div>
                <div class="px-4 text-center text-xs+ sm:px-5">
                    <p>HOURS SPENT IN ONLINE TRAINING <b>Feature Coming Soon</b></p>
                </div>
            </div>

            <div class="card pb-5">
                <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
                    <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        BUSINESS GROWTH
                    </h2>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>

                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-74px, 132px);" data-popper-placement="bottom-end">
                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">All Records</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Update</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                    </li>
                                </ul>
                                <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="mx-auto mt-3 max-w-xs px-4 text-center text-xs+ sm:px-5">

                    <div x-data="{showModal:false}">
                        @if($workspaces->isEmpty())
                        <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Add Your Financial Data
                        </button>
                        @else
                        <p>Please create a workspace first to enter financial data.</p>
                        @endif
                        <template x-teleport="#x-teleport-target">
                            <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                <div style="width: 100%" class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">


                                    <div class="mt-4">
                                        @if($workspaces)
                                        <form method="POST" action="{{ route('smme.financial-data.store', ['prefix' => 'admin']) }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="total_income">Total Income:</label>
                                                <input type="number" step="0.01" class="form-control" id="total_income" name="total_income" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="total_expenses">Total Expenses:</label>
                                                <input type="number" step="0.01" class="form-control" id="total_expenses" name="total_expenses" required>
                                            </div>

                                            <input type="hidden" name="s_m_m_e_workspace_id" value="{{ $workspaceId }}">
                                            <!-- Assuming $workspaceId is passed from the controller -->

                                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            <!-- Assuming the logged-in user's ID is used for user_id -->

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
            <div class="card p-4 lg:order-last">
                <div class="space-y-1 text-center font-inter text-xs+">
                    <!-- Month and Navigation Buttons -->
                    <div class="flex items-center justify-between px-2 pb-4">
                        <p id="currentDate" class="font-medium text-slate-700 dark:text-navy-100"></p>
                        <div class="flex space-x-2">
                            <button id="prevMonthBtn" class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="nextMonthBtn" class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Days of the Week -->
                    <div class="grid grid-cols-7 pb-2">
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            SUN
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            MON
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            TUE
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            WED
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            THU
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            FRI
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            SAT
                        </div>
                    </div>

                    <!-- Calendar Days -->
                    <div id="calendarGrid" class="grid grid-cols-7 gap-1 place-items-center">
                        <!-- Days will be dynamically generated here -->
                    </div>
                </div>
            </div>

            {{--
            <div class="card p-4 lg:order-last">
                <div class="space-y-1 text-center font-inter text-xs+">
                    <div class="flex items-center justify-between px-2 pb-4">
                        <p class="font-medium text-slate-700 dark:text-navy-100">
                            January 2022
                        </p>
                        <div class="flex space-x-2">
                            <button class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 pb-2">
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            SUN
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            MON
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            TUE
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            WED
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            THU
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            FRY
                        </div>
                        <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                            SAT
                        </div>
                    </div>
                    <div class="grid grid-cols-7 place-items-center">
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            29
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            30
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            31
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            1
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            2
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            3
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            4
                        </button>
                    </div>
                    <div class="grid grid-cols-7 place-items-center">
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            5
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            6
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            7
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            8
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            9
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            10
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            11
                        </button>
                    </div>
                    <div class="grid grid-cols-7 place-items-center">
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            12
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            13
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl font-medium text-primary hover:bg-primary/10 hover:text-primary dark:text-accent-light dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            14
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            15
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            16
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            17
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            18
                        </button>
                    </div>
                    <div class="grid grid-cols-7 place-items-center">
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            19
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            20
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            21
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            22
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            23
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            24
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            25
                        </button>
                    </div>
                    <div class="grid grid-cols-7 place-items-center">
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            26
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            27
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            28
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            29
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            30
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            1
                        </button>
                        <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                            2
                        </button>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="sm:col-span-2 lg:col-span-1">--}}
            {{-- <div class="flex h-8 items-center justify-between">--}}
            {{-- <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">--}}
            {{-- Students--}}
            {{-- </h2>--}}
            {{-- <a href="#" --}} {{--
                    class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View--}}
            {{-- All</a>--}}
            {{-- </div>--}}
            {{-- <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-x-5 lg:grid-cols-1">--}}
            {{-- <div class="card p-3">--}}
            {{-- <div class="flex items-center justify-between space-x-2">--}}
            {{-- <div class="flex items-center space-x-3">--}}
            {{-- <div class="avatar size-10">--}}
            {{-- <img class="rounded-full" src="{{asset('backend/images/avatar/avatar-20.jpg')}}"
            --}} {{-- alt="avatar" />--}}
            {{-- <div--}} {{--
                                    class="absolute right-0 size-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                                    --}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div>--}}
            {{-- <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{-- Travis Fuller--}}
            {{-- </p>--}}
            {{-- <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">--}}
            {{-- 65% completed--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="relative cursor-pointer">--}}
            {{-- <button--}} {{--
                            class="btn size-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" --}} {{--
                                viewBox="0 0 24 24" stroke="currentColor">--}}
            {{--
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" --}} {{--
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                --}}
            {{--
                            </svg>--}}
            {{-- </button>--}}
            {{-- <div--}} {{--
                                class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                --}}
            {{-- 2--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="card p-3">--}}
            {{-- <div class="flex items-center justify-between space-x-2">--}}
            {{-- <div class="flex items-center space-x-3">--}}
            {{-- <div class="avatar size-10">--}}
            {{-- <img class="rounded-full" src="{{asset('backend/images/avatar/avatar-19.jpg')}}" --}} {{--
                            alt="avatar" />--}}
            {{-- </div>--}}
            {{-- <div>--}}
            {{-- <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{-- Konnor Guzman--}}
            {{-- </p>--}}
            {{-- <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">--}}
            {{-- 78% completed--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="relative cursor-pointer">--}}
            {{-- <button--}} {{--
                        class="btn size-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" --}} {{--
                            viewBox="0 0 24 24" stroke="currentColor">--}}
            {{--
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" --}} {{--
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            --}}
            {{--
                        </svg>--}}
            {{-- </button>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="card p-3">--}}
            {{-- <div class="flex items-center justify-between space-x-2">--}}
            {{-- <div class="flex items-center space-x-3">--}}
            {{-- <div class="avatar size-10">--}}
            {{-- <img class="rounded-full" src="{{asset('backend/images/avatar/avatar-18.jpg')}}" --}} {{--
                            alt="avatar" />--}}
            {{-- </div>--}}
            {{-- <div>--}}
            {{-- <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{-- Alfredo Elliott--}}
            {{-- </p>--}}
            {{-- <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">--}}
            {{-- 58% completed--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="relative cursor-pointer">--}}
            {{-- <button--}} {{--
                        class="btn size-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" --}} {{--
                            viewBox="0 0 24 24" stroke="currentColor">--}}
            {{--
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" --}} {{--
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            --}}
            {{--
                        </svg>--}}
            {{-- </button>--}}
            {{-- <div--}} {{--
                            class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                            --}}
            {{-- 3--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{--
    </div>--}}
            {{-- <div class="card p-3">--}}
            {{-- <div class="flex items-center justify-between space-x-2">--}}
            {{-- <div class="flex items-center space-x-3">--}}
            {{-- <div class="avatar size-10">--}}
            {{-- <img class="rounded-full" src="{{asset('backend/images/avatar/avatar-5.jpg')}}" --}} {{--
                        alt="avatar" />--}}
            {{-- <div--}} {{--
                        class="absolute right-0 size-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                        --}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div>--}}
            {{-- <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">--}}
            {{-- Derrick Simmons--}}
            {{-- </p>--}}
            {{-- <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">--}}
            {{-- 65% completed--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- <div class="relative cursor-pointer">--}}
            {{-- <button--}} {{--
                class="btn size-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" --}} {{-- viewBox="0 0 24 24"
                    stroke="currentColor">--}}
            {{--
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" --}} {{--
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    --}}
            {{--
                </svg>--}}
            {{-- </button>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
        </div>
    </div>
</div>




{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const currentDay = today.getDate();
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();

        // Display current month and year
        document.getElementById('currentDate').innerText = today.toLocaleString('default', {
            month: 'long'
        }) + ' ' + currentYear;

        // Calculate the first day of the current month
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
        const startingDayOfWeek = firstDayOfMonth.getDay(); // 0 for Sunday, 1 for Monday, etc.

        // Calculate the number of days in the current month
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Calculate the number of days in the previous month
        const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();

        // Calculate the number of days to display from the previous month
        const daysFromPrevMonth = startingDayOfWeek === 0 ? 6 : startingDayOfWeek - 1; // Adjust for zero-indexed days

        // Populate calendar grid
        const calendarGrid = document.getElementById('calendarGrid');

        // Previous month dates
        for (let i = daysFromPrevMonth; i > 0; i--) {
            const prevMonthDay = daysInPrevMonth - i + 1;
            const button = createCalendarButton(prevMonthDay, 'text-slate-400', 'dark:text-navy-300');
            calendarGrid.appendChild(button);
        }

        // Current month dates
        for (let day = 1; day <= daysInMonth; day++) {
            const button = createCalendarButton(day, 'text-slate-900', 'dark:text-navy-100');
            if (day === currentDay && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
                button.classList.add('bg-primary', 'text-white');
            }
            calendarGrid.appendChild(button);
        }

        // Next month dates
        const totalDaysDisplayed = daysFromPrevMonth + daysInMonth;
        const daysToDisplay = 42 - totalDaysDisplayed; // 42 is the total number of cells in a 7x6 grid
        for (let day = 1; day <= daysToDisplay; day++) {
            const button = createCalendarButton(day, 'text-slate-400', 'dark:text-navy-300');
            calendarGrid.appendChild(button);
        }
    });

    // Function to create a calendar button with given text and classes
    function createCalendarButton(text, textColorClass, darkTextColorClass) {
        const button = document.createElement('button');
        button.classList.add('flex', 'h-7', 'w-9', 'items-center', 'justify-center', 'rounded-xl', 'hover:bg-primary/10', 'hover:text-primary', 'dark:hover:bg-accent-light/10', 'dark:hover:text-accent-light', 'calendar-button');
        button.innerText = text;
        button.classList.add(textColorClass);
        button.classList.add(darkTextColorClass);
        return button;
    }

</script> --}}


<script>
    function showTermsModal(workspaceId) {
        document.getElementById('termsModal').classList.remove('hidden');
        document.querySelector('input[name="workspace_id"]').value = workspaceId;
    }

    function hideTermsModal() {
        document.getElementById('termsModal').classList.add('hidden');
    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const currentDay = today.getDate();
        const currentMonth = today.toLocaleString('default', {
            month: 'long'
        });
        const currentYear = today.getFullYear();

        // Display current date
        document.getElementById('currentDate').innerText = `${currentMonth} ${currentYear}`;

        // Highlight current day
        const buttons = document.querySelectorAll('.calendar-button');
        buttons.forEach(button => {
            if (parseInt(button.innerText) === currentDay) {
                button.classList.add('bg-primary', 'text-white');
            }
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initial setup
        let currentDate = new Date();
        renderCalendar(currentDate);

        // Previous month button click handler
        document.getElementById('prevMonthBtn').addEventListener('click', function() {
            currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
            renderCalendar(currentDate);
        });

        // Next month button click handler
        document.getElementById('nextMonthBtn').addEventListener('click', function() {
            currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
            renderCalendar(currentDate);
        });
    });

    // Function to render the calendar for a given month
    function renderCalendar(date) {
        const currentMonth = date.getMonth();
        const currentYear = date.getFullYear();

        // Display current month and year
        document.getElementById('currentDate').innerText = date.toLocaleString('default', {
            month: 'long'
        }) + ' ' + currentYear;

        // Calculate the first day of the current month
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
        const startingDayOfWeek = firstDayOfMonth.getDay(); // 0 for Sunday, 1 for Monday, etc.

        // Calculate the number of days in the current month
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Calculate the number of days to display from the previous month
        const daysInPrevMonth = new Date(currentYear, currentMonth, 0).getDate();
        const daysFromPrevMonth = startingDayOfWeek === 0 ? 6 : startingDayOfWeek - 1; // Adjust for zero-indexed days

        // Calculate the number of days to display from the next month
        const totalDaysDisplayed = daysFromPrevMonth + daysInMonth;
        const daysToDisplay = 42 - totalDaysDisplayed; // 42 is the total number of cells in a 7x6 grid

        // Populate calendar grid
        const calendarGrid = document.getElementById('calendarGrid');
        calendarGrid.innerHTML = '';

        // Previous month dates
        for (let i = daysFromPrevMonth; i > 0; i--) {
            const prevMonthDay = daysInPrevMonth - i + 1;
            const button = createCalendarButton(prevMonthDay, 'text-slate-400', 'dark:text-navy-300');
            calendarGrid.appendChild(button);
        }

        // Current month dates
        for (let day = 1; day <= daysInMonth; day++) {
            const button = createCalendarButton(day, 'text-slate-900', 'dark:text-navy-100');
            if (day === new Date().getDate() && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear()) {
                button.classList.add('bg-primary', 'text-white');
            }
            calendarGrid.appendChild(button);
        }

        // Next month dates
        for (let day = 1; day <= daysToDisplay; day++) {
            const button = createCalendarButton(day, 'text-slate-400', 'dark:text-navy-300');
            calendarGrid.appendChild(button);
        }
    }

    // Function to create a calendar button with given text and classes
    function createCalendarButton(text, textColorClass, darkTextColorClass) {
        const button = document.createElement('button');
        button.classList.add('flex', 'h-7', 'w-9', 'items-center', 'justify-center', 'rounded-xl', 'hover:bg-primary/10', 'hover:text-primary', 'dark:hover:bg-accent-light/10', 'dark:hover:text-accent-light', 'calendar-button');
        button.innerText = text;
        button.classList.add(textColorClass);
        button.classList.add(darkTextColorClass);
        return button;
    }

</script>



@endsection
