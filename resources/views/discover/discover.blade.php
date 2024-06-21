@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div class="flex items-center justify-between space-x-6 py-5 lg:py-6">
        <div class="flex items-center space-x-4">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                DISCOVER
            </h2>
            <div class="my-1 hidden w-px self-stretch bg-slate-300 dark:bg-navy-600 sm:flex"></div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Dashboard</a>
                    <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li>Help</li>
            </ul>
        </div>
{{--        <label class="relative flex">--}}
{{--            <input class="form-input peer h-9 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 text-xs+ placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter question..." type="text">--}}
{{--            <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">--}}
{{--                    <path d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"></path>--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--        </label>--}}
    </div>
    <div class="relative flex flex-col items-center justify-center">
        <div class="absolute right-0 top-0 -mt-8 hidden max-w-xs p-4 lg:block">
            <img src="{{ asset('backend/img2.png') }}" alt="image">
        </div>
        <h2 class="mt-8 text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
            Resources to shape your business in your own time and space.
        </h2>
        <div class="relative mt-6 w-full max-w-md">
            <input class="form-input peer h-12 w-full rounded-full border border-slate-300 bg-slate-50 px-4 py-2 pl-9 text-base placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-900 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Search your question" type="text">
            <div class="absolute left-0 top-0 flex h-12 w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div class="inline-space mt-3 flex flex-wrap items-center justify-center">
            <span>Popular searched:</span>
            <div>
                <a href="#" class="tag rounded-full bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                    SMME
                </a>
                <a href="#" class="tag rounded-full bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                    Development Projects
                </a>
                <a href="#" class="tag rounded-full bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                    Funding
                </a>
                <a href="#" class="tag rounded-full bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                    Business Insights
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
        @if (auth()->user()->hasRole('Administrator (can create other users)', 'web') || auth()->user()->hasRole('SMME', 'web'))
        <a href="{{ route('smme.yowza-campus.index', ['prefix' => 'smme']) }}" class="card items-center space-y-2 bg-primary py-10 px-4 text-center dark:bg-accent">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="m2,2.5c0-1.381,1.119-2.5,2.5-2.5s2.5,1.119,2.5,2.5-1.119,2.5-2.5,2.5-2.5-1.119-2.5-2.5Zm13,3.5v2h-7v6H0v-5c0-1.654,1.346-3,3-3h12ZM21,0h-12.76c.479.715.76,1.575.76,2.5,0,.526-.092,1.031-.258,1.5h8.258v6h-7v4h8v-2h4v2h2V3c0-1.657-1.343-3-3-3ZM3.5,20c1.105,0,2-.895,2-2s-.895-2-2-2-2,.895-2,2,.895,2,2,2Zm8.5,0c1.105,0,2-.895,2-2s-.895-2-2-2-2,.895-2,2,.895,2,2,2Zm8.5,0c1.105,0,2-.895,2-2s-.895-2-2-2-2,.895-2,2,.895,2,2,2Zm-13.5,3c0-1.103-.897-2-2-2h-3c-1.103,0-2,.897-2,2v1h7v-1Zm17,0c0-1.103-.897-2-2-2h-3c-1.103,0-2,.897-2,2v1h7v-1Zm-8.5,0c0-1.103-.897-2-2-2h-3c-1.103,0-2,.897-2,2v1h7v-1Z"/>

            </svg>
            <h4 class="text-lg font-medium text-white">Yowza Campus</h4>
            <p class="text-indigo-100">
                Lorem ipsum dolor sit amet, consectetur.
            </p>
        </a>

        <a href="{{ route('smme.document-library.index', ['prefix' => 'smme']) }}" class="card items-center space-y-2 py-10 px-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-primary dark:text-accent-light" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="m20.5,2h-5c-1.93,0-3.5,1.57-3.5,3.5v1.705l-3.143-5.206c-.361-.625-1.009-.999-1.731-.999s-1.37.374-1.733,1.001L.271,10.964c-.363.635-.361,1.392.006,2.025.367.633,1.023,1.011,1.755,1.011h3.26c-.189.634-.292,1.305-.292,2,0,3.86,3.141,7,7,7s7-3.14,7-7c0-.695-.102-1.366-.292-2h1.792c1.93,0,3.5-1.57,3.5-3.5v-5c0-1.93-1.57-3.5-3.5-3.5ZM2.031,13c-.371,0-.704-.191-.89-.513-.187-.321-.188-.705-.003-1.027L6.26,2.5c.363-.626,1.366-.634,1.737.007l3.92,6.494c-2.751.032-5.126,1.66-6.241,3.999h-3.645Zm9.969,9c-3.309,0-6-2.691-6-6s2.691-6,6-6,6,2.691,6,6-2.691,6-6,6Zm11-11.5c0,1.378-1.121,2.5-2.5,2.5h-2.176c-.988-2.075-2.969-3.59-5.324-3.928v-3.572c0-1.378,1.121-2.5,2.5-2.5h5c1.379,0,2.5,1.122,2.5,2.5v5Z"/>
            </svg>
            <h4 class="text-lg font-medium text-slate-600 dark:text-navy-100">
               Resource Hub
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur.</p>
        </a>
        <a href="#" class="card items-center space-y-2 py-10 px-4 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-primary dark:text-accent-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="m23.682,5.966c-.06.023-.121.034-.182.034-.2,0-.389-.121-.466-.318l-1.554-3.983C17.941,10.047,10.93,15.531.616,17.986c-.039.01-.078.014-.116.014-.226,0-.431-.154-.486-.384-.064-.269.102-.539.371-.603,10.052-2.393,16.857-7.732,20.244-15.862l-4.193,1.636c-.255.101-.547-.027-.647-.284s.027-.547.284-.647L20.472.139c.341-.133.713-.127,1.049.021s.595.417.728.759l1.717,4.4c.101.257-.027.547-.284.647Zm-2.182,2.034c-.276,0-.5.224-.5.5v15c0,.276.224.5.5.5s.5-.224.5-.5v-15c0-.276-.224-.5-.5-.5Zm-5,5c-.276,0-.5.224-.5.5v10c0,.276.224.5.5.5s.5-.224.5-.5v-10c0-.276-.224-.5-.5-.5Zm-10,5c-.276,0-.5.224-.5.5v5c0,.276.224.5.5.5s.5-.224.5-.5v-5c0-.276-.224-.5-.5-.5Zm-5,2c-.276,0-.5.224-.5.5v3c0,.276.224.5.5.5s.5-.224.5-.5v-3c0-.276-.224-.5-.5-.5Zm10-4c-.276,0-.5.224-.5.5v7c0,.276.224.5.5.5s.5-.224.5-.5v-7c0-.276-.224-.5-.5-.5ZM0,6C0,2.691,2.691,0,6,0s6,2.691,6,6-2.691,6-6,6S0,9.309,0,6Zm6,5c.717,0,1.396-.158,2.014-.431-.003-.023-.014-.044-.014-.069v-.5c0-1.103-.897-2-2-2s-2,.897-2,2v.5c0,.024-.01.045-.014.069.617.273,1.296.431,2.014.431ZM1,6c0,1.628.794,3.063,2.002,3.976.013-1.643,1.351-2.976,2.998-2.976s2.985,1.333,2.998,2.976c1.208-.914,2.002-2.348,2.002-3.976,0-2.757-2.243-5-5-5S1,3.243,1,6Zm3-2c0-1.103.897-2,2-2s2,.897,2,2-.897,2-2,2-2-.897-2-2Zm1,0c0,.552.449,1,1,1s1-.448,1-1-.449-1-1-1-1,.448-1,1Z"/>
            </svg>
            <h4 class="text-lg font-medium text-slate-600 dark:text-navy-100">
                Business Insight
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur.</p>
        </a>
        @endif
    </div>
    <div class="mt-4  transition-all duration-[.25s] sm:mt-5 lg:mt-6">
        <div class="rounded-l-lg bg-slate-150 pt-4 pb-1 dark:bg-navy-800">
            <h2 class="px-4 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 sm:px-5 lg:text-lg">
                Discover our learning courses
            </h2>
            <div class="scrollbar-sm mt-4 flex space-x-4 overflow-x-auto px-4 pb-4 sm:px-5">
                @foreach($courses as $course)
                    <div class="flex w-72 shrink-0 flex-col">
                        <img class="h-48 w-full rounded-2xl object-cover object-center" src="{{ Storage::url($course->course_image) }}" alt="image">

                        <div class="card mx-2 -mt-8 grow rounded-2xl p-3.5">
                            <div class="flex space-x-2">
                                <div class="badge rounded-full bg-info py-1 uppercase text-white">
                                    Finance
                                </div>
                                <div class="flex flex-wrap items-center font-inter text-xs uppercase">
                                    <p>Badge</p>
                                    <div class="mx-2 my-1 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                                    <p>Easy</p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">{{ $course->title }}</a>
                            </div>
                            <div class="flex items-end justify-between">
                                <p class="mt-2">
                                    <span class="text-base font-medium text-slate-700 dark:text-navy-100">100</span>
                                    <span class="text-xs text-slate-400 dark:text-navy-300">/lessons</span>
                                </p>
                                <p class="flex shrink-0 items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="size-3.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.948 4.29l1.643 3.169c.224.44.82.864 1.325.945l2.977.477c1.905.306 2.353 1.639.98 2.953l-2.314 2.233c-.392.378-.607 1.107-.486 1.63l.663 2.763c.523 2.188-.681 3.034-2.688 1.89l-2.791-1.593c-.504-.288-1.335-.288-1.848 0l-2.791 1.594c-1.997 1.143-3.21.288-2.688-1.89l.663-2.765c.12-.522-.094-1.251-.486-1.63l-2.315-2.232c-1.362-1.314-.924-2.647.98-2.953l2.978-.477c.495-.081 1.092-.504 1.316-.945l1.643-3.17c.896-1.719 2.352-1.719 3.239 0z"></path>
                                    </svg>
                                    <span>4.9</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <div class="mt-4 grid grid-cols-1 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:grid-cols-2 lg:gap-6">
        <div class="space-y-4 sm:space-y-5 lg:space-y-6">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Discover the Resource Hub
                        </h4>
                    </div>
                </div>
                <div x-data="{expandedItem:'item-1'}" class="flex flex-col divide-y divide-slate-150 px-4 dark:divide-navy-500 sm:px-5">
                    <div x-data="accordionItem('item-1')">
                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">
                            <p>01 Document Library</p>
                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div x-collapse="" x-show="expanded" hidden="" style="height: 0px; overflow: hidden; display: none;">
                            <div class="pb-4">
                                <p>
                                    All the information and documentation an SMME needs. Pre-formatted, ready-to-use templates – fill in the blanks and your job is done
                                </p>
                                <div class="flex space-x-2 pt-3">
                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">
                                        Document Library
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="accordionItem('item-2')">
                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">
                            <p>02 Online Tools</p>
                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                            <div class="pb-4">
                                <p>
                                    Use our invoicing and quotation tool to develop professional invoices and quotations straight from the site.
                                </p>
                                <div class="flex space-x-2 pt-3">
                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">
                                       View the Tools
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div x-data="accordionItem('item-3')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 3</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-4')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 4</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
{{--            <div class="card">--}}
{{--                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            Shipping--}}
{{--                        </h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div x-data="{expandedItem:'item-1'}" class="flex flex-col divide-y divide-slate-150 px-4 dark:divide-navy-500 sm:px-5">--}}
{{--                    <div x-data="accordionItem('item-1')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 1</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300 -rotate-180">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-2')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 2</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-3')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 3</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-4')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 4</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="space-y-4 sm:space-y-5 lg:space-y-6">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Discover yowza! Business Insight
                        </h4>
                    </div>
                </div>
                <div x-data="{expandedItem:'item-1'}" class="flex flex-col divide-y divide-slate-150 px-4 dark:divide-navy-500 sm:px-5">
                    <div x-data="accordionItem('item-1')">
                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">
                            <p>Business Insight Tools</p>
                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300 -rotate-180">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div x-collapse="" x-show="expanded">
                            <div class="pb-4">
                                <p>
                                    The best companies in the world are supported by subject matter experts who advise in legal, tax, compliance, operations, strategy and business execution. This seems out of reach and an unaffordable luxury for SMMEs, and this is why we bring you yowza!, giving you insights and tips from experienced coaches, industry experts, other SMMEs and newsletters at a cost that the smallest SMME can afford!
                                </p>
                                <div class="flex space-x-2 pt-3">
                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">
                                        Business Tools
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div x-data="accordionItem('item-2')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 2</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-3')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 3</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-4')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 4</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
{{--            <div class="card">--}}
{{--                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">--}}
{{--                    <div class="flex items-center space-x-2">--}}
{{--                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            Returns--}}
{{--                        </h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div x-data="{expandedItem:'item-1'}" class="flex flex-col divide-y divide-slate-150 px-4 dark:divide-navy-500 sm:px-5">--}}
{{--                    <div x-data="accordionItem('item-1')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 1</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300 -rotate-180">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-2')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 2</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-3')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 3</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div x-data="accordionItem('item-4')">--}}
{{--                        <div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between py-4 text-base font-medium text-slate-700 dark:text-navy-100">--}}
{{--                            <p>Question 4</p>--}}
{{--                            <div :class="expanded &amp;&amp; '-rotate-180'" class="text-sm font-normal leading-none text-slate-400 transition-transform duration-300 dark:text-navy-300">--}}
{{--                                <i class="fas fa-chevron-down"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">--}}
{{--                            <div class="pb-4">--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet, consectetur adipisicing--}}
{{--                                    elit. Commodi earum magni officiis possimus repellendus.--}}
{{--                                    Accusantium adipisci aliquid praesentium quaerat--}}
{{--                                    voluptate.--}}
{{--                                </p>--}}
{{--                                <div class="flex space-x-2 pt-3">--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light">--}}
{{--                                        Tag 2--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>



@endsection
