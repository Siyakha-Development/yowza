@extends('layouts.master_dashboard_layout')

@section('main_content')
    <div class="grid grid-cols-12 lg:gap-6">
        <div class="col-span-12 pt-6 lg:col-span-10 lg:pb-6">
            <div class="card p-4 lg:p-6">
                <!-- Author -->
                <div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div>
                                <a
                                    href="#"
                                    class="font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                >
                                </a>
                                <div class="mt-1.5 flex items-center text-xs">
                                    <span class="line-clamp-1"></span>
                                    <div
                                        class="mx-2 my-0.5 w-px self-stretch bg-white/20"
                                    ></div>
                                    <p class="shrink-0"></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-3">
                            <div class="hidden sm:flex">
                                <button
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                        ></path>
                                    </svg>
                                </button>
                                <button
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <i class="fab fa-twitter text-base"></i>
                                </button>
                                <button
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <i class="fab fa-linkedin text-base"></i>
                                </button>
                                <button
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <i class="fab fa-instagram text-base"></i>
                                </button>
                                <button
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <i class="fab fa-facebook text-base"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center space-x-3 sm:hidden">
                        <button
                            class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5 text-slate-400 dark:text-navy-300"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                />
                            </svg>

                            <span> Save</span>
                        </button>
                        <div class="flex">
                            <button
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            >
                                <i class="fab fa-twitter text-base"></i>
                            </button>
                            <button
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            >
                                <i class="fab fa-linkedin text-base"></i>
                            </button>
                            <button
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            >
                                <i class="fab fa-instagram text-base"></i>
                            </button>
                            <button
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                            >
                                <i class="fab fa-facebook text-base"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Blog Post -->
                <div
                    class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200"
                >
                    <h1
                        class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl"
                    >
                        {{$event->title}}
                    </h1>
                    <img
                        class="mt-5 h-80 w-full rounded-lg object-cover object-center"
                        src="{{asset('upload/events/'.$event->event_image)}}"
                        alt="image"
                    />
                    <br />
                    <p>{{$event->description}}</p>

                </div>

                <!-- Footer Blog Post -->
                <div class="mt-5 flex space-x-3">
                    <button class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        <span>{{date('d M Y ',strtotime($event->event_date))}}<span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
