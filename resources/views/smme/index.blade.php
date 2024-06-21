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
                                                Edit Pin
                                            </h3>
                                            <button @click="showModal = !showModal" class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="px-4 py-4 sm:px-5">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Assumenda incidunt
                                            </p>
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
                                                        <label class="block">
                                                            <span>Industry:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_industry">
                                                        </label>
                                                        <label class="block">
                                                            <span>Business Registration Number:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_registration_number">
                                                        </label>
                                                    </div>
                                                    <label class="block">
                                                        <span>Company Size:</span>
                                                        <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_company_size">
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
                                                        <label class="block">
                                                            <span>Business Classification:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_business_classification">
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
                                                        <label class="block">
                                                            <span>BBBEE Level:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_b_bbee_level">
                                                        </label>
                                                    </div>
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <label class="block">
                                                            <span>Black Woman Ownership:</span>
                                                            <input type="text" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="smme_black_woman_ownership">
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

                    {{-- <div x-data="usePopper({placement:'bottom-end',offset:4})" --}} {{--
                        @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">--}}
                    {{-- <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" --}} {{--
                            class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                --}} {{-- stroke="currentColor" stroke-width="2">--}}
                    {{-- <path stroke-linecap="round" stroke-linejoin="round" --}} {{--
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    --}}
                    {{-- </path>--}}
                    {{-- </svg>--}}
                    {{-- </button>--}}

                    {{-- <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" --}}
                    {{--
                            style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-78px, 132px);"
                            --}} {{-- data-popper-placement="bottom-end">--}}
                    {{-- <div--}} {{--
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                --}}
                    {{-- <ul>--}}
                    {{-- <li>--}}
                    {{-- <a href="#" --}} {{--
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>--}}
                    {{-- </li>--}}
                    {{-- <li>--}}
                    {{-- <a href="#" --}} {{--
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another--}}
                    {{-- Action</a>--}}
                    {{-- </li>--}}
                    {{-- <li>--}}
                    {{-- <a href="#" --}} {{--
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something--}}
                    {{-- else</a>--}}
                    {{-- </li>--}}
                    {{-- </ul>--}}
                    {{-- <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>--}}
                    {{-- <ul>--}}
                    {{-- <li>--}}
                    {{-- <a href="#" --}} {{--
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated--}}
                    {{-- Link</a>--}}
                    {{-- </li>--}}
                    {{-- </ul>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{--
                </div>--}}
                </div>

                {{-- <div>--}}
                {{-- <div
                    x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.travelAnalytics); $el._x_chart.render() });"
                    --}} {{-- style="min-height: 212.7px;">--}}
                {{-- <div id="apexchartsru2s9fqp"
                        class="apexcharts-canvas apexchartsru2s9fqp apexcharts-theme-light" --}} {{--
                        style="width: 406px; height: 212.7px;"><svg id="SvgjsSvg1159" width="406" --}} {{--
                            height="212.70000000000002" xmlns="http://www.w3.org/2000/svg" version="1.1" --}} {{--
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" --}} {{--
                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" --}} {{--
                            style="background: transparent;">--}}
                {{-- <foreignObject x="0" y="0" width="406" height="212.70000000000002">--}}
                {{-- <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div>--}}
                {{-- </foreignObject>--}}
                {{-- <g id="SvgjsG1161" class="apexcharts-inner apexcharts-graphical" --}} {{--
                                transform="translate(78, -20)">--}}
                {{-- <defs id="SvgjsDefs1160">--}}
                {{-- <clipPath id="gridRectMaskru2s9fqp">--}}
                {{-- <rect id="SvgjsRect1162" width="256" height="296" x="-3" y="-3" rx="0" --}}
                {{-- ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            --}} {{-- fill="#fff"></rect>--}}
                {{-- </clipPath>--}}
                {{-- <clipPath id="forecastMaskru2s9fqp"></clipPath>--}}
                {{-- <clipPath id="nonForecastMaskru2s9fqp"></clipPath>--}}
                {{-- <clipPath id="gridRectMarkerMaskru2s9fqp">--}}
                {{-- <rect id="SvgjsRect1163" width="254" height="294" x="-2" y="-2" rx="0" --}}
                {{-- ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            --}} {{-- fill="#fff"></rect>--}}
                {{-- </clipPath>--}}
                {{-- </defs>--}}
                {{-- <g id="SvgjsG1164" class="apexcharts-radialbar">--}}
                {{-- <g id="SvgjsG1165">--}}
                {{-- <g id="SvgjsG1166" class="apexcharts-tracks">--}}
                {{-- <g id="SvgjsG1167" class="apexcharts-radialbar-track apexcharts-track"
                                                --}} {{-- rel="1">--}}
                {{-- <path id="apexcharts-radialbarTrack-0" --}} {{--
                                                    d="M 125 32.311890243902425 A 92.68810975609757 92.68810975609757 0 1 1 124.98382287315518 32.31189165562306 "
                                                    --}} {{-- fill="none" fill-opacity="1"
                                                    stroke="rgba(242,242,242,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.576810975609758"
                                                    stroke-dasharray="0" --}} {{-- class="apexcharts-radialbar-area"
                                                    --}} {{--
                                                    data:pathOrig="M 125 32.311890243902425 A 92.68810975609757 92.68810975609757 0 1 1 124.98382287315518 32.31189165562306 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- <g id="SvgjsG1169" class="apexcharts-radialbar-track apexcharts-track"
                                                --}} {{-- rel="2">--}}
                {{-- <path id="apexcharts-radialbarTrack-1" --}} {{--
                                                    d="M 125 51.153963414634134 A 73.84603658536587 73.84603658536587 0 1 1 124.9871114352858 51.15396453937359 "
                                                    --}} {{-- fill="none" fill-opacity="1"
                                                    stroke="rgba(242,242,242,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.576810975609758"
                                                    stroke-dasharray="0" --}} {{-- class="apexcharts-radialbar-area"
                                                    --}} {{--
                                                    data:pathOrig="M 125 51.153963414634134 A 73.84603658536587 73.84603658536587 0 1 1 124.9871114352858 51.15396453937359 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- <g id="SvgjsG1171" class="apexcharts-radialbar-track apexcharts-track"
                                                --}} {{-- rel="3">--}}
                {{-- <path id="apexcharts-radialbarTrack-2" --}} {{--
                                                    d="M 125 69.99603658536584 A 55.00396341463416 55.00396341463416 0 1 1 124.9903999974164 69.99603742312411 "
                                                    --}} {{-- fill="none" fill-opacity="1"
                                                    stroke="rgba(242,242,242,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.576810975609758"
                                                    stroke-dasharray="0" --}} {{-- class="apexcharts-radialbar-area"
                                                    --}} {{--
                                                    data:pathOrig="M 125 69.99603658536584 A 55.00396341463416 55.00396341463416 0 1 1 124.9903999974164 69.99603742312411 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- </g>--}}
                {{-- <g id="SvgjsG1173">--}}
                {{-- <g id="SvgjsG1178" class="apexcharts-series apexcharts-radial-series"
                                                --}} {{-- seriesName="Booked" rel="1" data:realIndex="0">--}}
                {{-- <path id="SvgjsPath1179" --}} {{--
                                                    d="M 125 32.311890243902425 A 92.68810975609757 92.68810975609757 0 0 1 159.72157704589188 210.938918876168 "
                                                    --}} {{-- fill="none" fill-opacity="0.85"
                                                    stroke="rgba(74,222,128,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.842073170731709"
                                                    stroke-dasharray="0" --}} {{--
                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" --}}
                {{-- data:angle="158" data:value="44" index="0" j="0" --}} {{--
                                                    data:pathOrig="M 125 32.311890243902425 A 92.68810975609757 92.68810975609757 0 0 1 159.72157704589188 210.938918876168 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- <g id="SvgjsG1180" class="apexcharts-series apexcharts-radial-series"
                                                --}} {{-- seriesName="Cancelled" rel="2" data:realIndex="1">--}}
                {{-- <path id="SvgjsPath1181" --}} {{--
                                                    d="M 125 51.153963414634134 A 73.84603658536587 73.84603658536587 0 1 1 102.18031972788785 195.23175429708252 "
                                                    --}} {{-- fill="none" fill-opacity="0.85"
                                                    stroke="rgba(244,63,94,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.842073170731709"
                                                    stroke-dasharray="0" --}} {{--
                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" --}}
                {{-- data:angle="198" data:value="55" index="0" j="1" --}} {{--
                                                    data:pathOrig="M 125 51.153963414634134 A 73.84603658536587 73.84603658536587 0 1 1 102.18031972788785 195.23175429708252 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- <g id="SvgjsG1182" class="apexcharts-series apexcharts-radial-series"
                                                --}} {{-- seriesName="Unconfirmed" rel="3" data:realIndex="2">--}}
                {{-- <path id="SvgjsPath1183" --}} {{--
                                                    d="M 125 69.99603658536584 A 55.00396341463416 55.00396341463416 0 1 1 76.89244962678663 151.6664506150922 "
                                                    --}} {{-- fill="none" fill-opacity="0.85"
                                                    stroke="rgba(168,85,247,0.85)" --}} {{-- stroke-opacity="1"
                                                    stroke-linecap="round" --}} {{-- stroke-width="8.842073170731709"
                                                    stroke-dasharray="0" --}} {{--
                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" --}}
                {{-- data:angle="241" data:value="67" index="0" j="2" --}} {{--
                                                    data:pathOrig="M 125 69.99603658536584 A 55.00396341463416 55.00396341463416 0 1 1 76.89244962678663 151.6664506150922 ">
                                                    --}}
                {{-- </path>--}}
                {{-- </g>--}}
                {{-- <circle id="SvgjsCircle1174" r="40.71555792682928" cx="125" cy="125"
                                                --}} {{-- class="apexcharts-radialbar-hollow" fill="transparent">
                                            </circle>--}}
                {{-- <g id="SvgjsG1175" class="apexcharts-datalabels-group" --}} {{--
                                                transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                <text--}} {{-- id="SvgjsText1176"
                                                    font-family="Helvetica, Arial, sans-serif" --}} {{-- x="125" y="125"
                                                    text-anchor="middle" dominant-baseline="auto" --}} {{--
                                                    font-size="16px" font-weight="600" fill="#373d3f" --}} {{--
                                                    class="apexcharts-text apexcharts-datalabel-label" --}} {{--
                                                    style="font-family: Helvetica, Arial, sans-serif;">Total</text>
                                                    <text--}} {{-- id="SvgjsText1177"
                                                        font-family="Helvetica, Arial, sans-serif" --}} {{-- x="125"
                                                        y="157" text-anchor="middle" dominant-baseline="auto" --}} {{--
                                                        font-size="16px" font-weight="400" fill="#373d3f" --}} {{--
                                                        class="apexcharts-text apexcharts-datalabel-value" --}} {{--
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        166</text>--}}
                {{--
                                            </g>--}}
                {{-- </g>--}}
                {{-- </g>--}}
                {{-- </g>--}}
                {{-- <line id="SvgjsLine1184" x1="0" y1="0" x2="250" y2="0" stroke="#b6b6b6" --}} {{--
                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" --}} {{--
                                    class="apexcharts-ycrosshairs"></line>--}}
                {{-- <line id="SvgjsLine1185" x1="0" y1="0" x2="250" y2="0" stroke-dasharray="0" --}}
                {{-- stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    --}}
                {{-- </line>--}}
                {{-- </g>--}}
                {{-- </svg></div>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                <div class="mx-auto mt-3 max-w-xs px-4 text-center text-xs+ sm:px-5">
                    <p>Your SMME Busines analytics calculated based on your activities(Feature Coming Soon)</p>
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






@endsection
