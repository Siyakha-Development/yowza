@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div class="mt-5  transition-all duration-[.25s]">
        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
            My Courses
        </p>
    </div>

    <div class="flex ">
        <div class="swiper mx-0 mt-4 px-[var(--margin-x)] transition-all duration-[.25s] swiper-initialized swiper-horizontal swiper-backface-hidden" x-init="$nextTick(()=>new Swiper($el,{  slidesPerView: 'auto', spaceBetween: 18}))">
            <div class="swiper-wrapper" id="swiper-wrapper-ac6a6e3f233b47dc" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                @forelse($purchased_courses as $purchased_course)
               <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-primary p-4 swiper-slide-active" role="group" aria-label="1 / 6" style="margin-right: 18px;">
                    <div>
                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">
                            {{ $purchased_course->title }}
                        </p>
                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">
                            @for ($star = 1; $star <= 5; $star++)
                                @if ($purchased_course->rating >= $star)
                                    <i class="badge space-x-2 bx bxs-star"></i>
                                @else
                                    <i class='bx bx-star'></i>
                                @endif
                            @endfor
                        </a>
                    </div>

                    <div class="mt-6">
                        <div x-tooltip.primary="'25% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">
                            <div class="w-4/12 rounded-full bg-primary dark:bg-accent"></div>
                        </div>

                        <div class="mt-2 flex items-center justify-between text-primary dark:text-accent-light">
                            <p class="font-medium">{{ $purchased_course->students()->count() }} Students</p>
                            <a href="{{ url('yowza-campus-courses/' . $purchased_course->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                @empty
                    <h2 style="text-align: center;grid-column: 1/5">You haven't enrolled to a course yet</h2>
                @endforelse
{{--                <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-secondary p-4 swiper-slide-next" role="group" aria-label="2 / 6" style="margin-right: 18px;">--}}
{{--                    <div>--}}
{{--                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">--}}
{{--                            Social Media Marketing--}}
{{--                        </p>--}}
{{--                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Eric Fox</a>--}}
{{--                    </div>--}}

{{--                    <div class="mt-6">--}}
{{--                        <div x-tooltip.secondary="'25% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">--}}
{{--                            <div class="w-4/12 rounded-full bg-secondary"></div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-2 flex items-center justify-between text-secondary dark:text-secondary-light">--}}
{{--                            <p class="font-medium">Beginner</p>--}}
{{--                            <a href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-warning p-4" role="group" aria-label="3 / 6" style="margin-right: 18px;">--}}
{{--                    <div>--}}
{{--                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">--}}
{{--                            Fundamentals of digital marketing--}}
{{--                        </p>--}}
{{--                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Travis Fuller</a>--}}
{{--                    </div>--}}

{{--                    <div class="mt-6">--}}
{{--                        <div x-tooltip.warning="'50% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">--}}
{{--                            <div class="w-6/12 rounded-full bg-warning"></div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-2 flex items-center justify-between text-warning">--}}
{{--                            <p class="font-medium">Intermediate</p>--}}
{{--                            <a href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-primary p-4" role="group" aria-label="4 / 6" style="margin-right: 18px;">--}}
{{--                    <div>--}}
{{--                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">--}}
{{--                            Figma: Create Design System--}}
{{--                        </p>--}}
{{--                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Derrick Simmons</a>--}}
{{--                    </div>--}}

{{--                    <div class="mt-6">--}}
{{--                        <div x-tooltip.primary="'25% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">--}}
{{--                            <div class="w-4/12 rounded-full bg-primary dark:bg-accent"></div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-2 flex items-center justify-between text-primary dark:text-accent-light">--}}
{{--                            <p class="font-medium">Advanced</p>--}}
{{--                            <a href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-secondary p-4" role="group" aria-label="5 / 6" style="margin-right: 18px;">--}}
{{--                    <div>--}}
{{--                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">--}}
{{--                            Getting started with Vue--}}
{{--                        </p>--}}
{{--                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Katrina West</a>--}}
{{--                    </div>--}}

{{--                    <div class="mt-6">--}}
{{--                        <div x-tooltip.secondary="'25% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">--}}
{{--                            <div class="w-4/12 rounded-full bg-secondary"></div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-2 flex items-center justify-between text-secondary dark:text-secondary-light">--}}
{{--                            <p class="font-medium">Beginner</p>--}}
{{--                            <a href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card swiper-slide flex w-72 shrink-0 justify-between rounded-xl border-l-4 border-warning p-4" role="group" aria-label="6 / 6" style="margin-right: 18px;">--}}
{{--                    <div>--}}
{{--                        <p class="font-medium tracking-wide text-slate-700 line-clamp-2 dark:text-navy-100">--}}
{{--                            Object-oriented JavaScript for beginners--}}
{{--                        </p>--}}
{{--                        <a href="#" class="mt-0.5 text-xs+ text-slate-400 hover:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100">Travis Fuller</a>--}}
{{--                    </div>--}}

{{--                    <div class="mt-6">--}}
{{--                        <div x-tooltip.warning="'50% Completed'" class="progress h-1 bg-slate-150 dark:bg-navy-500">--}}
{{--                            <div class="w-6/12 rounded-full bg-warning"></div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-2 flex items-center justify-between text-warning">--}}
{{--                            <p class="font-medium">Intermediate</p>--}}
{{--                            <a href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>

    <br>

    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 ">
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    All Courses
                </h2>
                <div class="flex">
                    <div class="flex items-center" x-data="{isInputActive:false}">
                        <label class="block">
                            <input x-effect="isInputActive === true &amp;&amp; $nextTick(() => { $el.focus()});" :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'" class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200 w-0" placeholder="Search here..." type="text">
                        </label>
                        <button @click="isInputActive = !isInputActive" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-24px, -224px);" data-popper-placement="bottom-end" data-popper-reference-hidden="" data-popper-escaped="">
                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
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
            </div>
            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto" x-data="pages.tables.initExample1">
                    <table class="is-hoverable w-full text-left">
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                #
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Course Image
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                               Course Name
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Rating
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Start Date
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Status
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Student
                            </th>
                            <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5" >{{ $course->id }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="avatar flex size-10">
                                    <img class="mask is-squircle" alt="avatar" src="{{ Storage::url($course->course_image) }}">
                                </div>
                            </td>
                            <td  class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 dark:text-navy-100 lg:px-5">{{ $course->title }}</td>
                            <td  class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @for ($star = 1; $star <= 5; $star++)
                                    @if ($course->rating >= $star)
                                        <i class="bx bxs-star"></i>
                                    @else
                                        <i class='bx bx-star'></i>
                                    @endif
                                @endfor
                            </td>
                            <td  class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $course->start_date }}</td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @if($course->students()->count() > 5)
                                <div   class="badge rounded-full bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light">
                                    Popular
                                </div>
                                @else
                                    <div   class="badge rounded-full bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light">
                                        Not Popular Yet
                                    </div>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                {{ $course->students()->count() }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <span>
                                    <div class="flex justify-center space-x-2">
                            <button  class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                <i class="fa fa-eye"></i>
                            </button>

                        </div>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    <div class="flex items-center space-x-2 text-xs+">
                        <span>Show</span>
                        <label class="block">
                            <select class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option>10</option>
                                <option>30</option>
                                <option>50</option>
                            </select>
                        </label>
                        <span>entries</span>
                    </div>

                    <ol class="pagination">
                        <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">1</a>
                        </li>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">2</a>
                        </li>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">3</a>
                        </li>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">4</a>
                        </li>
                        <li class="bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">5</a>
                        </li>
                        <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
                            <a href="#" class="flex size-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                    </ol>

                    <div class="text-xs+">1 - 10 of 10 entries</div>
                </div>
            </div>
        </div>
    </div>
@endsection
