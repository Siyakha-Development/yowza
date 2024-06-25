@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center space-x-4 py-5 lg:py-6">
    <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
        Mail Management
    </h2>
    <div class="hidden h-full py-1 sm:flex">
        <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
    </div>
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li>Form Layout 1</li>
    </ul>
</div>

<div class="flex flex-col-reverse py-5 sm:flex-row sm:justify-between">
    <div class="mt-2 flex items-center justify-between space-x-1">
        <div class="flex items-center px-2.5">
            <label class="flex size-8 items-center justify-center" x-tooltip="'Show other'">
               All
            </label>
            <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -ml-1 size-5 rounded p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <i class="fas fa-chevron-down text-tiny+"></i>
                </button>

                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(382px, 118px);" data-popper-placement="bottom-start">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">All</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.all-subs', ['prefix' => 'admin'])}}" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">All Subscribers</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Get In Touch</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Help Desk</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Unread</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Unstarred</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
            <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="flex justify-between">
        <div class="text-lg font-medium text-slate-700 dark:text-navy-100 sm:hidden">
            Inbox
        </div>
        <div class="flex items-center space-x-1">
            <div class="flex items-center space-x-2">
                <span>1 - 25 of 1234</span>
                <div class="flex">
                    <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
<div class="card">
    <div class="flex cursor-pointer flex-col rounded-t-lg border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-3.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Konnor Guzman</h3>
                    <span class="size-2 shrink-0 rounded-full bg-secondary lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Dec 03</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Nemo enim ipsam voluptatem quia voluptas sit
                </span>
                <div class="badge hidden h-6 rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light lg:inline-flex">
                    Work
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Dec 03</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-20.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">John Doe</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 29</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quod.
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 29</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-18.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Travis Fuller</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 24</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa
                    qui officia deserunt mollit anim id est laborum
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 29</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-17.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Alfredo Elliott</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 21</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto
                    beatae vitae dicta sunt explicabo.
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 21</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-15.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Derrick Simmons</h3>
                    <span class="size-2 shrink-0 rounded-full bg-info lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 19</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Ut enim ad minima veniam, quis nostrum exercitationem
                </span>
                <div class="badge hidden h-6 rounded-full border border-info text-info lg:inline-flex">
                    Personal
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 19</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-11.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Katrina West</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 17</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Qis autem vel eum iure reprehenderit qui in ea voluptate velit
                    esse quam nihil molestiae consequatur
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 17</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-12.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Henry Curtis</h3>
                    <span class="size-2 shrink-0 rounded-full bg-secondary lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 16</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    But I must explain to you how all this mistaken idea of
                    denouncing pleasure
                </span>
                <div class="badge hidden h-6 rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light lg:inline-flex">
                    Work
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 16</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-13.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Raul Bradley</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 14</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui
                    blanditiis
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 14</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-7.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Samantha Shelton</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 12</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                    reiciendis voluptatibus
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 12</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-5.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Corey Evans</h3>
                    <span class="size-2 shrink-0 rounded-full bg-info lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 10</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    On the other hand, we denounce with
                </span>
                <div class="badge hidden h-6 rounded-full border border-info text-info lg:inline-flex">
                    Personal
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 10</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-3.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Konnor Guzman</h3>
                    <span class="size-2 shrink-0 rounded-full bg-secondary lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Dec 03</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Nemo enim ipsam voluptatem quia voluptas sit
                </span>
                <div class="badge hidden h-6 rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light lg:inline-flex">
                    Work
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Dec 03</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-20.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">John Doe</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 29</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quod.
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 29</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-18.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Travis Fuller</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 24</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa
                    qui officia deserunt mollit anim id est laborum
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 29</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-17.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Alfredo Elliott</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 21</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto
                    beatae vitae dicta sunt explicabo.
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 21</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-15.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Derrick Simmons</h3>
                    <span class="size-2 shrink-0 rounded-full bg-info lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 19</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Ut enim ad minima veniam, quis nostrum exercitationem
                </span>
                <div class="badge hidden h-6 rounded-full border border-info text-info lg:inline-flex">
                    Personal
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 19</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-11.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Katrina West</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 17</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Qis autem vel eum iure reprehenderit qui in ea voluptate velit
                    esse quam nihil molestiae consequatur
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 17</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 font-semibold text-slate-700 hover:bg-slate-100 dark:border-navy-500 dark:text-navy-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-12.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Henry Curtis</h3>
                    <span class="size-2 shrink-0 rounded-full bg-secondary lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 16</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    But I must explain to you how all this mistaken idea of
                    denouncing pleasure
                </span>
                <div class="badge hidden h-6 rounded-full border border-secondary text-secondary dark:border-secondary-light dark:text-secondary-light lg:inline-flex">
                    Work
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 16</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-13.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Raul Bradley</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 14</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui
                    blanditiis
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 14</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-7.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Samantha Shelton</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 12</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                    reiciendis voluptatibus
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 12</div>
    </div>
    <div class="flex cursor-pointer flex-col border-b p-2.5 hover:bg-slate-100 dark:border-navy-500 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-5.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Corey Evans</h3>
                    <span class="size-2 shrink-0 rounded-full bg-info lg:hidden"></span>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 10</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    On the other hand, we denounce with
                </span>
                <div class="badge hidden h-6 rounded-full border border-info text-info lg:inline-flex">
                    Personal
                </div>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 10</div>
    </div>
    <div class="flex cursor-pointer flex-col rounded-b-lg p-2.5 hover:bg-slate-100 dark:hover:bg-navy-600 sm:flex-row sm:items-center">
        <div class="flex items-center justify-between">
            <div class="flex space-x-2 sm:w-72">
                <div class="flex">
                    <label class="flex size-8 items-center justify-center" x-tooltip="'Select'">
                        <input class="form-checkbox is-outline size-4.5 rounded border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
                    </label>
                    <button x-tooltip="'Starred'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </button>
                    <button x-tooltip="'Actions'" class="btn hidden size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="avatar size-6">
                        <img class="rounded-full" src="images/avatar/avatar-19.jpg" alt="avatar">
                    </div>
                    <h3 class="line-clamp-1">Joe Perkins</h3>
                </div>
            </div>
            <div class="shrink-0 px-1 text-xs sm:hidden">Nov 10</div>
        </div>
        <div class="flex flex-1 items-center justify-between space-x-2">
            <div class="flex items-center space-x-2 px-2">
                <span class="line-clamp-1">
                    Hese cases are perfectly simple and easy to distinguish.
                </span>
            </div>
            <div class="flex sm:hidden">
                <button x-tooltip="'Starred'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </button>
                <button x-tooltip="'Actions'" class="btn size-8 rounded-full p-0 text-slate-400 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-300 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden px-2 text-xs+ sm:flex">Nov 10</div>
    </div>
</div>

@endsection
