@extends('layouts.master_dashboard_layout')
@section('main_content')

<div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    <div class="card col-span-12 pb-4">
        <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                Report Management System
            </h2>

            <div class="flex items-center space-x-4">
                {{-- <div class="hidden cursor-pointer items-center space-x-2 sm:flex">
                    <div class="size-3 rounded-full bg-accent"></div>
                    <p>Current Period</p>
                </div> --}}
                {{-- <div class="hidden cursor-pointer items-center space-x-2 sm:flex">
                    <div class="size-3 rounded-full bg-warning"></div>
                    <p>Previous Period</p>
                </div> --}}
                <select class="form-select h-8 rounded-full border border-slate-300 bg-white px-2.5 pr-9 text-xs+ hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                    <option>Last week</option>
                    <option>Last month</option>
                    <option>Last year</option>
                </select>
            </div>
        </div>
        <div class="mt-3 grid grid-cols-12">
            <div class="col-span-12 px-4 sm:col-span-6 sm:px-5 lg:col-span-4">
                <select class="mt-1.5 w-full tomselected ts-hidden-accessible" x-init="$el._x_tom = new Tom($el,{sortField: {field: 'text',direction: 'asc'}})" id="tomselect-1" tabindex="-1">

                    <option>Courses Page</option>
                    <option>Grammar Page</option>
                    <option>Sport Page</option>
                    <option>Jobs Page</option>
                    <option>Server Status Page</option>
                    <option>Travel Blog Page</option>
                </select>
                <div class="ts-wrapper mt-1.5 w-full single full has-items input-hidden">
                    <div class="ts-control">
                        <div data-value="Travel Blog Page" class="item" data-ts-item="">Travel Blog Page</div><input type="text" autocomplete="off" size="1" tabindex="0" role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-controls="tomselect-1-ts-dropdown" id="tomselect-1-ts-control" aria-activedescendant="tomselect-1-opt-1">
                    </div>
                    <div class="ts-dropdown single" style="display: none; visibility: visible;">
                        <div role="listbox" tabindex="-1" class="ts-dropdown-content" id="tomselect-1-ts-dropdown">
                            <div data-selectable="" data-value="Courses Page" class="option" role="option" id="tomselect-1-opt-2">Courses Page</div>
                            <div data-selectable="" data-value="Grammar Page" class="option" role="option" id="tomselect-1-opt-3">Grammar Page</div>
                            <div data-selectable="" data-value="Jobs Page" class="option" role="option" id="tomselect-1-opt-5">Jobs Page</div>
                            <div data-selectable="" data-value="Server Status Page" class="option" role="option" id="tomselect-1-opt-6">Server Status Page</div>
                            <div data-selectable="" data-value="Sport Page" class="option" role="option" id="tomselect-1-opt-4">Sport Page</div>
                            <div data-selectable="" data-value="Travel Blog Page" class="option selected active" role="option" id="tomselect-1-opt-1" aria-selected="true">Travel Blog Page</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-8">
                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total User Points
                        </p>
                        <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                            {{ $totalPoints }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total SMME points
                        </p>
                        <p class="mt-1">
                            <span class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                16,146
                            </span>
                            <span class="text-xs text-success">+3%</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total Corporate Points
                        </p>
                        <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                            469
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total Development Partner Points
                        </p>
                        <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                            1,559
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total Help Desk Queries
                        </p>
                        <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                            198
                        </p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Total Number of Blogs
                        </p>
                        <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                            49
                        </p>
                    </div>
                </div>
            </div>
            <div class="ax-transparent-gridline col-span-12 px-2 sm:col-span-6 lg:col-span-8">
                <div style="min-height: 280px;">
                   {{-- <div id="chart"></div> --}}
                   <div id="donut-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-7">
        <div class="card">
            <div class="grid grid-cols-1 divide-y divide-slate-150 dark:divide-navy-500 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                <div class="p-4 sm:p-5">
                    <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Broken images
                    </h3>
                    <p class="mt-1 text-xs+ text-slate-400 dark:text-navy-300">
                        01 - 30 Oct, 2022
                    </p>
                    <p class="mt-4">
                        <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                            236
                        </span>
                        <span class="text-xs text-success">+3%</span>
                    </p>
                    <div class="mt-4 flex justify-between">
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Blog name
                        </p>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            images
                        </p>
                    </div>
                    <div class="mt-2 space-y-2.5">
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">What is Tailwind CSS?</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                12
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">What is PHP?</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                18
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">Top Design Systems</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                17
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Broken links
                    </h3>
                    <p class="mt-1 text-xs+ text-slate-400 dark:text-navy-300">
                        01 - 30 Oct, 2022
                    </p>
                    <p class="mt-4">
                        <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                            648
                        </span>
                        <span class="text-xs text-success">+2.6%</span>
                    </p>
                    <div class="mt-4 flex justify-between">
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Blog name
                        </p>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            link
                        </p>
                    </div>
                    <div class="mt-2 space-y-2.5">
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">313 Pattern and Color ideas</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                33
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">What is Tailwind CSS?</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                25
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">NodeJS Design Patterns</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                19
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Comments
                    </h3>
                    <p class="mt-1 text-xs+ text-slate-400 dark:text-navy-300">
                        01 - 30 Oct, 2022
                    </p>
                    <p class="mt-4">
                        <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                            238
                        </span>
                        <span class="text-xs text-success">+6.2%</span>
                    </p>
                    <div class="mt-4 flex justify-between">
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Blog name
                        </p>
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                            Comments
                        </p>
                    </div>
                    <div class="mt-2 space-y-2.5">
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">What is PHP?</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                21
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">Tailwind CSS Card Example</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                46
                            </p>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <p class="line-clamp-1">Top Design Systems</p>
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                19
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 -mt-1 sm:col-span-5 lg:col-span-4 xl:col-span-5">
                <div class="flex items-center justify-between">
                    <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Top Writers
                    </h2>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>

                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-945px, 770px);" data-popper-placement="bottom-end">
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

                <div class="card mt-3">
                    <div>
                        <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" x-init="$nextTick(()=>$el._x_swiper = new Swiper($el,{pagination: {el: '.swiper-pagination',clickable: true}}))">
                            <div class="swiper-wrapper" id="swiper-wrapper-c310d5e84aed8f57e" aria-live="polite">
                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3" style="width: 259px;">
                                    <div class="h-20 rounded-t-lg bg-primary dark:bg-accent">
                                        <img class="h-full w-full rounded-t-lg object-cover object-center" src="images/object/object-2.jpg" alt="image">
                                    </div>
                                    <div class="px-4 py-2 sm:px-5">
                                        <div class="flex justify-between space-x-4">
                                            <div class="avatar -mt-12 size-20">
                                                <img class="rounded-full border-2 border-white dark:border-navy-700" src="images/avatar/avatar-4.jpg" alt="avatar">
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-instagram text-base"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <h3 class="pt-2 text-base font-medium text-slate-700 dark:text-navy-100">
                                            Konnor Guzman
                                        </h3>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            USA, Washington DC
                                        </p>
                                        <div class="mt-2 flex items-center space-x-4">
                                            <div class="w-9/12">
                                                <div class="ax-transparent-gridline" x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.blogAuthors1); $el._x_chart.render() });" style="min-height: 85px;">
                                                    <div id="apexcharts2opyrz8x" class="apexcharts-canvas apexcharts2opyrz8x apexcharts-theme-light" style="width: 152px; height: 85px;"><svg id="SvgjsSvg2039" width="152" height="85" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="152" height="85">
                                                                <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 42.5px;"></div>
                                                            </foreignObject>
                                                            <g id="SvgjsG2086" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG2087" class="apexcharts-yaxis-texts-g"></g>
                                                            </g>
                                                            <g id="SvgjsG2041" class="apexcharts-inner apexcharts-graphical" transform="translate(13.600000000000001, 0)">
                                                                <defs id="SvgjsDefs2040">
                                                                    <linearGradient id="SvgjsLinearGradient2043" x1="0" y1="0" x2="0" y2="1">
                                                                        <stop id="SvgjsStop2044" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                                        <stop id="SvgjsStop2045" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                        <stop id="SvgjsStop2046" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                    </linearGradient>
                                                                    <clipPath id="gridRectMask2opyrz8x">
                                                                        <rect id="SvgjsRect2048" width="164" height="74" x="-19.6" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMask2opyrz8x"></clipPath>
                                                                    <clipPath id="nonForecastMask2opyrz8x"></clipPath>
                                                                    <clipPath id="gridRectMarkerMask2opyrz8x">
                                                                        <rect id="SvgjsRect2049" width="128.8" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <rect id="SvgjsRect2047" width="13.728" height="70" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient2043)" class="apexcharts-xcrosshairs" y2="70" filter="none" fill-opacity="0.9"></rect>
                                                                <g id="SvgjsG2067" class="apexcharts-grid">
                                                                    <g id="SvgjsG2068" class="apexcharts-gridlines-horizontal"></g>
                                                                    <g id="SvgjsG2069" class="apexcharts-gridlines-vertical"></g>
                                                                    <line id="SvgjsLine2074" x1="0" y1="70" x2="124.8" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    <line id="SvgjsLine2073" x1="0" y1="1" x2="0" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                </g>
                                                                <g id="SvgjsG2070" class="apexcharts-grid-borders">
                                                                    <line id="SvgjsLine2071" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine2072" x1="-17.6" y1="70" x2="142.4" y2="70" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG2050" class="apexcharts-bar-series apexcharts-plot-series">
                                                                    <g id="SvgjsG2051" class="apexcharts-series" rel="1" seriesName="Posts" data:realIndex="0">
                                                                        <path id="SvgjsPath2056" d="M -6.864 62.001000000000005 L -6.864 50.54544444444445 C -6.864 46.54544444444445 -2.864 42.54544444444445 1.1360000000000001 42.54544444444445 L 1.1360000000000001 42.54544444444445 C 4 42.54544444444445 6.864 46.54544444444445 6.864 50.54544444444445 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M -6.864 62.001000000000005 L -6.864 50.54544444444445 C -6.864 46.54544444444445 -2.864 42.54544444444445 1.1360000000000001 42.54544444444445 L 1.1360000000000001 42.54544444444445 C 4 42.54544444444445 6.864 46.54544444444445 6.864 50.54544444444445 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " pathFrom="M -6.864 70.001 L -6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L -6.864 70.001 Z" cy="42.54444444444445" cx="6.864" j="0" val="1765" barHeight="27.455555555555552" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2058" d="M 18.095999999999997 62.001000000000005 L 18.095999999999997 41.336555555555556 C 18.095999999999997 37.336555555555556 22.095999999999997 33.336555555555556 26.095999999999997 33.336555555555556 L 26.095999999999997 33.336555555555556 C 28.959999999999997 33.336555555555556 31.823999999999998 37.336555555555556 31.823999999999998 41.336555555555556 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M 18.095999999999997 62.001000000000005 L 18.095999999999997 41.336555555555556 C 18.095999999999997 37.336555555555556 22.095999999999997 33.336555555555556 26.095999999999997 33.336555555555556 L 26.095999999999997 33.336555555555556 C 28.959999999999997 33.336555555555556 31.823999999999998 37.336555555555556 31.823999999999998 41.336555555555556 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " pathFrom="M 18.095999999999997 70.001 L 18.095999999999997 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 18.095999999999997 70.001 Z" cy="33.33555555555556" cx="31.823999999999998" j="1" val="2357" barHeight="36.66444444444444" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2060" d="M 43.056 62.001000000000005 L 43.056 12.434333333333338 C 43.056 8.434333333333338 47.056 4.4343333333333375 51.056 4.4343333333333375 L 51.056 4.4343333333333375 C 53.92 4.4343333333333375 56.784 8.434333333333338 56.784 12.434333333333338 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M 43.056 62.001000000000005 L 43.056 12.434333333333338 C 43.056 8.434333333333338 47.056 4.4343333333333375 51.056 4.4343333333333375 L 51.056 4.4343333333333375 C 53.92 4.4343333333333375 56.784 8.434333333333338 56.784 12.434333333333338 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " pathFrom="M 43.056 70.001 L 43.056 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 43.056 70.001 Z" cy="4.433333333333337" cx="56.784" j="2" val="4215" barHeight="65.56666666666666" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2062" d="M 68.01599999999999 62.001000000000005 L 68.01599999999999 16.229888888888894 C 68.01599999999999 12.229888888888894 72.01599999999999 8.229888888888896 76.01599999999999 8.229888888888896 L 76.01599999999999 8.229888888888896 C 78.88 8.229888888888896 81.74399999999999 12.229888888888894 81.74399999999999 16.229888888888894 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M 68.01599999999999 62.001000000000005 L 68.01599999999999 16.229888888888894 C 68.01599999999999 12.229888888888894 72.01599999999999 8.229888888888896 76.01599999999999 8.229888888888896 L 76.01599999999999 8.229888888888896 C 78.88 8.229888888888896 81.74399999999999 12.229888888888894 81.74399999999999 16.229888888888894 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " pathFrom="M 68.01599999999999 70.001 L 68.01599999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 68.01599999999999 70.001 Z" cy="8.228888888888896" cx="81.74399999999999" j="3" val="3971" barHeight="61.771111111111104" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2064" d="M 92.97599999999998 62.001000000000005 L 92.97599999999998 18.252111111111113 C 92.97599999999998 14.252111111111113 96.97599999999998 10.252111111111114 100.97599999999998 10.252111111111114 L 100.97599999999998 10.252111111111114 C 103.83999999999997 10.252111111111114 106.70399999999998 14.252111111111113 106.70399999999998 18.252111111111113 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M 92.97599999999998 62.001000000000005 L 92.97599999999998 18.252111111111113 C 92.97599999999998 14.252111111111113 96.97599999999998 10.252111111111114 100.97599999999998 10.252111111111114 L 100.97599999999998 10.252111111111114 C 103.83999999999997 10.252111111111114 106.70399999999998 14.252111111111113 106.70399999999998 18.252111111111113 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " pathFrom="M 92.97599999999998 70.001 L 92.97599999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 92.97599999999998 70.001 Z" cy="10.251111111111115" cx="106.70399999999998" j="4" val="3841" barHeight="59.748888888888885" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2066" d="M 117.93599999999998 62.001000000000005 L 117.93599999999998 12.341000000000005 C 117.93599999999998 8.341000000000005 121.93599999999998 4.341000000000004 125.93599999999998 4.341000000000004 L 125.93599999999998 4.341000000000004 C 128.79999999999998 4.341000000000004 131.664 8.341000000000005 131.664 12.341000000000005 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " fill="rgba(68,103,239,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask2opyrz8x)" pathTo="M 117.93599999999998 62.001000000000005 L 117.93599999999998 12.341000000000005 C 117.93599999999998 8.341000000000005 121.93599999999998 4.341000000000004 125.93599999999998 4.341000000000004 L 125.93599999999998 4.341000000000004 C 128.79999999999998 4.341000000000004 131.664 8.341000000000005 131.664 12.341000000000005 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " pathFrom="M 117.93599999999998 70.001 L 117.93599999999998 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 117.93599999999998 70.001 Z" cy="4.340000000000003" cx="131.664" j="5" val="4221" barHeight="65.66" barWidth="13.728"></path>
                                                                        <g id="SvgjsG2053" class="apexcharts-bar-goals-markers">
                                                                            <g id="SvgjsG2055" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                            <g id="SvgjsG2057" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                            <g id="SvgjsG2059" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                            <g id="SvgjsG2061" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                            <g id="SvgjsG2063" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                            <g id="SvgjsG2065" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask2opyrz8x)"></g>
                                                                        </g>
                                                                        <g id="SvgjsG2054" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                                                    </g>
                                                                    <g id="SvgjsG2052" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine2075" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine2076" x1="-17.6" y1="0" x2="142.4" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG2077" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                    <g id="SvgjsG2078" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG2088" class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG2089" class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG2090" class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect2091" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                                <rect id="SvgjsRect2092" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(68, 103, 239);"></span>
                                                                <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-3/12 text-center">
                                                <p class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                                    24
                                                </p>
                                                <p class="text-xs+">Posts</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex justify-between">
                                            <div class="flex -space-x-2">
                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar">
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                        jd
                                                    </div>
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar">
                                                </div>
                                            </div>
                                            <button class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="h-8"></div>
                                </div>

                                <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 3" style="width: 259px;">
                                    <div class="h-20 rounded-t-lg bg-primary dark:bg-accent">
                                        <img class="h-full w-full rounded-t-lg object-cover object-center" src="images/object/object-13.jpg" alt="image">
                                    </div>
                                    <div class="px-4 py-2 sm:px-5">
                                        <div class="flex justify-between space-x-4">
                                            <div class="avatar -mt-12 size-20">
                                                <img class="rounded-full border-2 border-white dark:border-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar">
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-instagram text-base"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <h3 class="pt-2 text-base font-medium text-slate-700 dark:text-navy-100">
                                            Travis Fuller
                                        </h3>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            UK, London
                                        </p>
                                        <div class="mt-3 flex items-center space-x-4">
                                            <div class="w-9/12">
                                                <div class="ax-transparent-gridline" x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.blogAuthors2); $el._x_chart.render() });" style="min-height: 85px;">
                                                    <div id="apexcharts67xxjzwyh" class="apexcharts-canvas apexcharts67xxjzwyh apexcharts-theme-light" style="width: 152px; height: 85px;"><svg id="SvgjsSvg2093" width="152" height="85" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="152" height="85">
                                                                <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 42.5px;"></div>
                                                            </foreignObject>
                                                            <g id="SvgjsG2140" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG2141" class="apexcharts-yaxis-texts-g"></g>
                                                            </g>
                                                            <g id="SvgjsG2095" class="apexcharts-inner apexcharts-graphical" transform="translate(13.600000000000001, 0)">
                                                                <defs id="SvgjsDefs2094">
                                                                    <linearGradient id="SvgjsLinearGradient2097" x1="0" y1="0" x2="0" y2="1">
                                                                        <stop id="SvgjsStop2098" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                                        <stop id="SvgjsStop2099" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                        <stop id="SvgjsStop2100" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                    </linearGradient>
                                                                    <clipPath id="gridRectMask67xxjzwyh">
                                                                        <rect id="SvgjsRect2102" width="164" height="74" x="-19.6" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMask67xxjzwyh"></clipPath>
                                                                    <clipPath id="nonForecastMask67xxjzwyh"></clipPath>
                                                                    <clipPath id="gridRectMarkerMask67xxjzwyh">
                                                                        <rect id="SvgjsRect2103" width="128.8" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <rect id="SvgjsRect2101" width="13.728" height="70" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient2097)" class="apexcharts-xcrosshairs" y2="70" filter="none" fill-opacity="0.9"></rect>
                                                                <g id="SvgjsG2121" class="apexcharts-grid">
                                                                    <g id="SvgjsG2122" class="apexcharts-gridlines-horizontal"></g>
                                                                    <g id="SvgjsG2123" class="apexcharts-gridlines-vertical"></g>
                                                                    <line id="SvgjsLine2128" x1="0" y1="70" x2="124.8" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    <line id="SvgjsLine2127" x1="0" y1="1" x2="0" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                </g>
                                                                <g id="SvgjsG2124" class="apexcharts-grid-borders">
                                                                    <line id="SvgjsLine2125" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine2126" x1="-17.6" y1="70" x2="142.4" y2="70" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG2104" class="apexcharts-bar-series apexcharts-plot-series">
                                                                    <g id="SvgjsG2105" class="apexcharts-series" rel="1" seriesName="Posts" data:realIndex="0">
                                                                        <path id="SvgjsPath2110" d="M -6.864 62.001000000000005 L -6.864 50.50266666666666 C -6.864 46.50266666666666 -2.864 42.50266666666666 1.1360000000000001 42.50266666666666 L 1.1360000000000001 42.50266666666666 C 4 42.50266666666666 6.864 46.50266666666666 6.864 50.50266666666666 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M -6.864 62.001000000000005 L -6.864 50.50266666666666 C -6.864 46.50266666666666 -2.864 42.50266666666666 1.1360000000000001 42.50266666666666 L 1.1360000000000001 42.50266666666666 C 4 42.50266666666666 6.864 46.50266666666666 6.864 50.50266666666666 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " pathFrom="M -6.864 70.001 L -6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L -6.864 70.001 Z" cy="42.501666666666665" cx="6.864" j="0" val="2357" barHeight="27.498333333333335" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2112" d="M 18.095999999999997 62.001000000000005 L 18.095999999999997 28.825999999999997 C 18.095999999999997 24.825999999999997 22.095999999999997 20.825999999999997 26.095999999999997 20.825999999999997 L 26.095999999999997 20.825999999999997 C 28.959999999999997 20.825999999999997 31.823999999999998 24.825999999999997 31.823999999999998 28.825999999999997 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M 18.095999999999997 62.001000000000005 L 18.095999999999997 28.825999999999997 C 18.095999999999997 24.825999999999997 22.095999999999997 20.825999999999997 26.095999999999997 20.825999999999997 L 26.095999999999997 20.825999999999997 C 28.959999999999997 20.825999999999997 31.823999999999998 24.825999999999997 31.823999999999998 28.825999999999997 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " pathFrom="M 18.095999999999997 70.001 L 18.095999999999997 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 18.095999999999997 70.001 Z" cy="20.824999999999996" cx="31.823999999999998" j="1" val="4215" barHeight="49.175000000000004" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2114" d="M 43.056 62.001000000000005 L 43.056 57.40933333333333 C 43.056 53.40933333333333 47.056 49.40933333333333 51.056 49.40933333333333 L 51.056 49.40933333333333 C 53.92 49.40933333333333 56.784 53.40933333333333 56.784 57.40933333333333 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M 43.056 62.001000000000005 L 43.056 57.40933333333333 C 43.056 53.40933333333333 47.056 49.40933333333333 51.056 49.40933333333333 L 51.056 49.40933333333333 C 53.92 49.40933333333333 56.784 53.40933333333333 56.784 57.40933333333333 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " pathFrom="M 43.056 70.001 L 43.056 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 43.056 70.001 Z" cy="49.40833333333333" cx="56.784" j="2" val="1765" barHeight="20.59166666666667" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2116" d="M 68.01599999999999 62.001000000000005 L 68.01599999999999 28.755999999999997 C 68.01599999999999 24.755999999999997 72.01599999999999 20.755999999999997 76.01599999999999 20.755999999999997 L 76.01599999999999 20.755999999999997 C 78.88 20.755999999999997 81.74399999999999 24.755999999999997 81.74399999999999 28.755999999999997 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M 68.01599999999999 62.001000000000005 L 68.01599999999999 28.755999999999997 C 68.01599999999999 24.755999999999997 72.01599999999999 20.755999999999997 76.01599999999999 20.755999999999997 L 76.01599999999999 20.755999999999997 C 78.88 20.755999999999997 81.74399999999999 24.755999999999997 81.74399999999999 28.755999999999997 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " pathFrom="M 68.01599999999999 70.001 L 68.01599999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 68.01599999999999 70.001 Z" cy="20.754999999999995" cx="81.74399999999999" j="3" val="4221" barHeight="49.245000000000005" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2118" d="M 92.97599999999998 62.001000000000005 L 92.97599999999998 33.18933333333333 C 92.97599999999998 29.18933333333333 96.97599999999998 25.189333333333334 100.97599999999998 25.189333333333334 L 100.97599999999998 25.189333333333334 C 103.83999999999997 25.189333333333334 106.70399999999998 29.18933333333333 106.70399999999998 33.18933333333333 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M 92.97599999999998 62.001000000000005 L 92.97599999999998 33.18933333333333 C 92.97599999999998 29.18933333333333 96.97599999999998 25.189333333333334 100.97599999999998 25.189333333333334 L 100.97599999999998 25.189333333333334 C 103.83999999999997 25.189333333333334 106.70399999999998 29.18933333333333 106.70399999999998 33.18933333333333 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " pathFrom="M 92.97599999999998 70.001 L 92.97599999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 92.97599999999998 70.001 Z" cy="25.188333333333333" cx="106.70399999999998" j="4" val="3841" barHeight="44.81166666666667" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2120" d="M 117.93599999999998 62.001000000000005 L 117.93599999999998 11.90933333333333 C 117.93599999999998 7.909333333333331 121.93599999999998 3.9093333333333313 125.93599999999998 3.9093333333333313 L 125.93599999999998 3.9093333333333313 C 128.79999999999998 3.9093333333333313 131.664 7.909333333333331 131.664 11.90933333333333 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " fill="rgba(240,0,185,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask67xxjzwyh)" pathTo="M 117.93599999999998 62.001000000000005 L 117.93599999999998 11.90933333333333 C 117.93599999999998 7.909333333333331 121.93599999999998 3.9093333333333313 125.93599999999998 3.9093333333333313 L 125.93599999999998 3.9093333333333313 C 128.79999999999998 3.9093333333333313 131.664 7.909333333333331 131.664 11.90933333333333 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " pathFrom="M 117.93599999999998 70.001 L 117.93599999999998 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 117.93599999999998 70.001 Z" cy="3.9083333333333314" cx="131.664" j="5" val="5665" barHeight="66.09166666666667" barWidth="13.728"></path>
                                                                        <g id="SvgjsG2107" class="apexcharts-bar-goals-markers">
                                                                            <g id="SvgjsG2109" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                            <g id="SvgjsG2111" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                            <g id="SvgjsG2113" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                            <g id="SvgjsG2115" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                            <g id="SvgjsG2117" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                            <g id="SvgjsG2119" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask67xxjzwyh)"></g>
                                                                        </g>
                                                                        <g id="SvgjsG2108" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                                                    </g>
                                                                    <g id="SvgjsG2106" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine2129" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine2130" x1="-17.6" y1="0" x2="142.4" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG2131" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                    <g id="SvgjsG2132" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG2142" class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG2143" class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG2144" class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect2145" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                                <rect id="SvgjsRect2146" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(240, 0, 185);"></span>
                                                                <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-3/12 text-center">
                                                <p class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                                    168
                                                </p>
                                                <p class="text-xs+">Posts</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex justify-between">
                                            <div class="flex -space-x-2">
                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar">
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <div class="is-initial rounded-full bg-warning text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                        qe
                                                    </div>
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-17.jpg" alt="avatar">
                                                </div>
                                            </div>
                                            <button class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="h-9"></div>
                                </div>

                                <div class="swiper-slide" role="group" aria-label="3 / 3" style="width: 259px;">
                                    <div class="h-20 rounded-t-lg bg-primary dark:bg-accent">
                                        <img class="h-full w-full rounded-t-lg object-cover object-center" src="images/object/object-17.jpg" alt="image">
                                    </div>
                                    <div class="px-4 py-2 sm:px-5">
                                        <div class="flex justify-between space-x-4">
                                            <div class="avatar -mt-12 size-20">
                                                <img class="rounded-full border-2 border-white dark:border-navy-700" src="images/avatar/avatar-18.jpg" alt="avatar">
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-instagram text-base"></i>
                                                </button>
                                                <button class="btn size-7 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <h3 class="pt-2 text-base font-medium text-slate-700 dark:text-navy-100">
                                            Alfredo Elliott
                                        </h3>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            Australia, Sydney
                                        </p>
                                        <div class="mt-3 flex items-center space-x-4">
                                            <div class="w-9/12">
                                                <div class="ax-transparent-gridline" x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.blogAuthors3); $el._x_chart.render() });" style="min-height: 85px;">
                                                    <div id="apexchartsyfsb7pg3" class="apexcharts-canvas apexchartsyfsb7pg3 apexcharts-theme-light" style="width: 152px; height: 85px;"><svg id="SvgjsSvg2147" width="152" height="85" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="152" height="85">
                                                                <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 42.5px;"></div>
                                                            </foreignObject>
                                                            <g id="SvgjsG2194" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG2195" class="apexcharts-yaxis-texts-g"></g>
                                                            </g>
                                                            <g id="SvgjsG2149" class="apexcharts-inner apexcharts-graphical" transform="translate(13.600000000000001, 0)">
                                                                <defs id="SvgjsDefs2148">
                                                                    <linearGradient id="SvgjsLinearGradient2151" x1="0" y1="0" x2="0" y2="1">
                                                                        <stop id="SvgjsStop2152" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                                        <stop id="SvgjsStop2153" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                        <stop id="SvgjsStop2154" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                    </linearGradient>
                                                                    <clipPath id="gridRectMaskyfsb7pg3">
                                                                        <rect id="SvgjsRect2156" width="164" height="74" x="-19.6" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMaskyfsb7pg3"></clipPath>
                                                                    <clipPath id="nonForecastMaskyfsb7pg3"></clipPath>
                                                                    <clipPath id="gridRectMarkerMaskyfsb7pg3">
                                                                        <rect id="SvgjsRect2157" width="128.8" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <rect id="SvgjsRect2155" width="13.728" height="70" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient2151)" class="apexcharts-xcrosshairs" y2="70" filter="none" fill-opacity="0.9"></rect>
                                                                <g id="SvgjsG2175" class="apexcharts-grid">
                                                                    <g id="SvgjsG2176" class="apexcharts-gridlines-horizontal"></g>
                                                                    <g id="SvgjsG2177" class="apexcharts-gridlines-vertical"></g>
                                                                    <line id="SvgjsLine2182" x1="0" y1="70" x2="124.8" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    <line id="SvgjsLine2181" x1="0" y1="1" x2="0" y2="70" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                </g>
                                                                <g id="SvgjsG2178" class="apexcharts-grid-borders">
                                                                    <line id="SvgjsLine2179" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine2180" x1="-17.6" y1="70" x2="142.4" y2="70" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG2158" class="apexcharts-bar-series apexcharts-plot-series">
                                                                    <g id="SvgjsG2159" class="apexcharts-series" rel="1" seriesName="Posts" data:realIndex="0">
                                                                        <path id="SvgjsPath2164" d="M -6.864 62.001000000000005 L -6.864 24.162250000000004 C -6.864 20.162250000000004 -2.864 16.162250000000004 1.1360000000000001 16.162250000000004 L 1.1360000000000001 16.162250000000004 C 4 16.162250000000004 6.864 20.162250000000004 6.864 24.162250000000004 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M -6.864 62.001000000000005 L -6.864 24.162250000000004 C -6.864 20.162250000000004 -2.864 16.162250000000004 1.1360000000000001 16.162250000000004 L 1.1360000000000001 16.162250000000004 C 4 16.162250000000004 6.864 20.162250000000004 6.864 24.162250000000004 L 6.864 62.001000000000005 C 6.864 66.001 2.864 70.001 -1.1360000000000001 70.001 L -1.1360000000000001 70.001 C -4 70.001 -6.864 66.001 -6.864 62.001000000000005 Z " pathFrom="M -6.864 70.001 L -6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L 6.864 70.001 L -6.864 70.001 Z" cy="16.161250000000003" cx="6.864" j="0" val="6153" barHeight="53.83875" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2166" d="M 18.095999999999997 62.001000000000005 L 18.095999999999997 16.576 C 18.095999999999997 12.576 22.095999999999997 8.576000000000002 26.095999999999997 8.576000000000002 L 26.095999999999997 8.576000000000002 C 28.959999999999997 8.576000000000002 31.823999999999998 12.576 31.823999999999998 16.576 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M 18.095999999999997 62.001000000000005 L 18.095999999999997 16.576 C 18.095999999999997 12.576 22.095999999999997 8.576000000000002 26.095999999999997 8.576000000000002 L 26.095999999999997 8.576000000000002 C 28.959999999999997 8.576000000000002 31.823999999999998 12.576 31.823999999999998 16.576 L 31.823999999999998 62.001000000000005 C 31.823999999999998 66.001 27.823999999999998 70.001 23.823999999999998 70.001 L 23.823999999999998 70.001 C 20.959999999999997 70.001 18.095999999999997 66.001 18.095999999999997 62.001000000000005 Z " pathFrom="M 18.095999999999997 70.001 L 18.095999999999997 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 31.823999999999998 70.001 L 18.095999999999997 70.001 Z" cy="8.575000000000003" cx="31.823999999999998" j="1" val="7020" barHeight="61.425" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2168" d="M 43.056 62.001000000000005 L 43.056 28.484750000000002 C 43.056 24.484750000000002 47.056 20.484750000000002 51.056 20.484750000000002 L 51.056 20.484750000000002 C 53.92 20.484750000000002 56.784 24.484750000000002 56.784 28.484750000000002 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M 43.056 62.001000000000005 L 43.056 28.484750000000002 C 43.056 24.484750000000002 47.056 20.484750000000002 51.056 20.484750000000002 L 51.056 20.484750000000002 C 53.92 20.484750000000002 56.784 24.484750000000002 56.784 28.484750000000002 L 56.784 62.001000000000005 C 56.784 66.001 52.784 70.001 48.784 70.001 L 48.784 70.001 C 45.92 70.001 43.056 66.001 43.056 62.001000000000005 Z " pathFrom="M 43.056 70.001 L 43.056 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 56.784 70.001 L 43.056 70.001 Z" cy="20.48375" cx="56.784" j="2" val="5659" barHeight="49.51625" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2170" d="M 68.01599999999999 62.001000000000005 L 68.01599999999999 48.0585 C 68.01599999999999 44.0585 72.01599999999999 40.0585 76.01599999999999 40.0585 L 76.01599999999999 40.0585 C 78.88 40.0585 81.74399999999999 44.0585 81.74399999999999 48.0585 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M 68.01599999999999 62.001000000000005 L 68.01599999999999 48.0585 C 68.01599999999999 44.0585 72.01599999999999 40.0585 76.01599999999999 40.0585 L 76.01599999999999 40.0585 C 78.88 40.0585 81.74399999999999 44.0585 81.74399999999999 48.0585 L 81.74399999999999 62.001000000000005 C 81.74399999999999 66.001 77.74399999999999 70.001 73.74399999999999 70.001 L 73.74399999999999 70.001 C 70.88 70.001 68.01599999999999 66.001 68.01599999999999 62.001000000000005 Z " pathFrom="M 68.01599999999999 70.001 L 68.01599999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 81.74399999999999 70.001 L 68.01599999999999 70.001 Z" cy="40.057500000000005" cx="81.74399999999999" j="3" val="3422" barHeight="29.9425" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2172" d="M 92.97599999999998 62.001000000000005 L 92.97599999999998 30.409750000000006 C 92.97599999999998 26.409750000000006 96.97599999999998 22.409750000000006 100.97599999999998 22.409750000000006 L 100.97599999999998 22.409750000000006 C 103.83999999999997 22.409750000000006 106.70399999999998 26.409750000000006 106.70399999999998 30.409750000000006 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M 92.97599999999998 62.001000000000005 L 92.97599999999998 30.409750000000006 C 92.97599999999998 26.409750000000006 96.97599999999998 22.409750000000006 100.97599999999998 22.409750000000006 L 100.97599999999998 22.409750000000006 C 103.83999999999997 22.409750000000006 106.70399999999998 26.409750000000006 106.70399999999998 30.409750000000006 L 106.70399999999998 62.001000000000005 C 106.70399999999998 66.001 102.70399999999998 70.001 98.70399999999998 70.001 L 98.70399999999998 70.001 C 95.83999999999997 70.001 92.97599999999998 66.001 92.97599999999998 62.001000000000005 Z " pathFrom="M 92.97599999999998 70.001 L 92.97599999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 106.70399999999998 70.001 L 92.97599999999998 70.001 Z" cy="22.408750000000005" cx="106.70399999999998" j="4" val="5439" barHeight="47.591249999999995" barWidth="13.728"></path>
                                                                        <path id="SvgjsPath2174" d="M 117.93599999999998 62.001000000000005 L 117.93599999999998 24.792250000000006 C 117.93599999999998 20.792250000000006 121.93599999999998 16.792250000000006 125.93599999999998 16.792250000000006 L 125.93599999999998 16.792250000000006 C 128.79999999999998 16.792250000000006 131.664 20.792250000000006 131.664 24.792250000000006 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " fill="rgba(16,185,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskyfsb7pg3)" pathTo="M 117.93599999999998 62.001000000000005 L 117.93599999999998 24.792250000000006 C 117.93599999999998 20.792250000000006 121.93599999999998 16.792250000000006 125.93599999999998 16.792250000000006 L 125.93599999999998 16.792250000000006 C 128.79999999999998 16.792250000000006 131.664 20.792250000000006 131.664 24.792250000000006 L 131.664 62.001000000000005 C 131.664 66.001 127.66399999999999 70.001 123.66399999999999 70.001 L 123.66399999999999 70.001 C 120.79999999999998 70.001 117.93599999999998 66.001 117.93599999999998 62.001000000000005 Z " pathFrom="M 117.93599999999998 70.001 L 117.93599999999998 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 131.664 70.001 L 117.93599999999998 70.001 Z" cy="16.791250000000005" cx="131.664" j="5" val="6081" barHeight="53.208749999999995" barWidth="13.728"></path>
                                                                        <g id="SvgjsG2161" class="apexcharts-bar-goals-markers">
                                                                            <g id="SvgjsG2163" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                            <g id="SvgjsG2165" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                            <g id="SvgjsG2167" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                            <g id="SvgjsG2169" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                            <g id="SvgjsG2171" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                            <g id="SvgjsG2173" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskyfsb7pg3)"></g>
                                                                        </g>
                                                                        <g id="SvgjsG2162" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                                                    </g>
                                                                    <g id="SvgjsG2160" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine2183" x1="-17.6" y1="0" x2="142.4" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine2184" x1="-17.6" y1="0" x2="142.4" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG2185" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                                    <g id="SvgjsG2186" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG2196" class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG2197" class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG2198" class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect2199" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                                <rect id="SvgjsRect2200" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(16, 185, 129);"></span>
                                                                <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-3/12 text-center">
                                                <p class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                                    426
                                                </p>
                                                <p class="text-xs+">Posts</p>
                                            </div>
                                        </div>
                                        <div class="mt-3 flex justify-between">
                                            <div class="flex -space-x-2">
                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-11.jpg" alt="avatar">
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <div class="is-initial rounded-full bg-error text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                        za
                                                    </div>
                                                </div>

                                                <div class="avatar size-7 hover:z-10">
                                                    <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-10.jpg" alt="avatar">
                                                </div>
                                            </div>
                                            <button class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="h-9"></div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-span-12 sm:col-span-7 lg:col-span-8 xl:col-span-7">
                <div class="my-3 flex items-center justify-between px-4">
                    <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Site Overview
                    </h2>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>

                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-559px, 786px);" data-popper-placement="bottom-end">
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
                <div class="grid grid-cols-2 gap-3 px-4">
                    <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                        <div class="flex justify-between space-x-1">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                11.3M
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="size-5 text-primary dark:text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Total Views</p>
                    </div>
                    <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                4,566
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Avg Post View</p>
                    </div>
                </div>
                <div class="mt-3 px-3">
                    <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsSiteOverview); $el._x_chart.render() });" style="min-height: 249px;">
                        <div id="apexcharts6fdrmuxo" class="apexcharts-canvas apexcharts6fdrmuxo apexcharts-theme-light" style="width: 348px; height: 249px;"><svg id="SvgjsSvg1770" width="348" height="249" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="348" height="249">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 124.5px;"></div>
                                </foreignObject>
                                <rect id="SvgjsRect1775" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                <g id="SvgjsG1842" class="apexcharts-yaxis" rel="0" transform="translate(-1.140625, 0)">
                                    <g id="SvgjsG1843" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1845" font-family="Helvetica, Arial, sans-serif" x="20" y="21.8" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1846">60</tspan>
                                            <title>60</title>
                                        </text><text id="SvgjsText1848" font-family="Helvetica, Arial, sans-serif" x="20" y="44.51625" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1849">55</tspan>
                                            <title>55</title>
                                        </text><text id="SvgjsText1851" font-family="Helvetica, Arial, sans-serif" x="20" y="67.2325" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1852">50</tspan>
                                            <title>50</title>
                                        </text><text id="SvgjsText1854" font-family="Helvetica, Arial, sans-serif" x="20" y="89.94875" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1855">45</tspan>
                                            <title>45</title>
                                        </text><text id="SvgjsText1857" font-family="Helvetica, Arial, sans-serif" x="20" y="112.665" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1858">40</tspan>
                                            <title>40</title>
                                        </text><text id="SvgjsText1860" font-family="Helvetica, Arial, sans-serif" x="20" y="135.38125000000002" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1861">35</tspan>
                                            <title>35</title>
                                        </text><text id="SvgjsText1863" font-family="Helvetica, Arial, sans-serif" x="20" y="158.09750000000003" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1864">30</tspan>
                                            <title>30</title>
                                        </text><text id="SvgjsText1866" font-family="Helvetica, Arial, sans-serif" x="20" y="180.81375000000003" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1867">25</tspan>
                                            <title>25</title>
                                        </text><text id="SvgjsText1869" font-family="Helvetica, Arial, sans-serif" x="20" y="203.53000000000003" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1870">20</tspan>
                                            <title>20</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1772" class="apexcharts-inner apexcharts-graphical" transform="translate(28.859375, 20)">
                                    <defs id="SvgjsDefs1771">
                                        <clipPath id="gridRectMask6fdrmuxo">
                                            <rect id="SvgjsRect1777" width="312.9375" height="187.73" x="-3" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMask6fdrmuxo"></clipPath>
                                        <clipPath id="nonForecastMask6fdrmuxo"></clipPath>
                                        <clipPath id="gridRectMarkerMask6fdrmuxo">
                                            <rect id="SvgjsRect1778" width="310.9375" height="185.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1783" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1784" stop-opacity="0.35" stop-color="rgba(14,165,233,0.35)" offset="0.2"></stop>
                                            <stop id="SvgjsStop1785" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop>
                                            <stop id="SvgjsStop1786" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop>
                                            <stop id="SvgjsStop1787" stop-opacity="0.35" stop-color="rgba(14,165,233,0.35)" offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <line id="SvgjsLine1776" x1="0" y1="0" x2="0" y2="181.73" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="181.73" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <line id="SvgjsLine1794" x1="0" y1="182.73" x2="0" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1795" x1="43.848214285714285" y1="182.73" x2="43.848214285714285" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1796" x1="87.69642857142857" y1="182.73" x2="87.69642857142857" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1797" x1="131.54464285714286" y1="182.73" x2="131.54464285714286" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1798" x1="175.39285714285714" y1="182.73" x2="175.39285714285714" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1799" x1="219.24107142857142" y1="182.73" x2="219.24107142857142" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1800" x1="263.0892857142857" y1="182.73" x2="263.0892857142857" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <line id="SvgjsLine1801" x1="306.9375" y1="182.73" x2="306.9375" y2="188.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                    <g id="SvgjsG1790" class="apexcharts-grid">
                                        <g id="SvgjsG1791" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1803" x1="0" y1="22.71625" x2="306.9375" y2="22.71625" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1804" x1="0" y1="45.4325" x2="306.9375" y2="45.4325" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1805" x1="0" y1="68.14874999999999" x2="306.9375" y2="68.14874999999999" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1806" x1="0" y1="90.865" x2="306.9375" y2="90.865" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1807" x1="0" y1="113.58125" x2="306.9375" y2="113.58125" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1808" x1="0" y1="136.29749999999999" x2="306.9375" y2="136.29749999999999" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1809" x1="0" y1="159.01375" x2="306.9375" y2="159.01375" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1792" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1812" x1="0" y1="181.73" x2="306.9375" y2="181.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1811" x1="0" y1="1" x2="0" y2="181.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1793" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1802" x1="0" y1="0" x2="306.9375" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1810" x1="0" y1="181.73" x2="306.9375" y2="181.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1841" x1="0" y1="182.73" x2="306.9375" y2="182.73" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1779" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1780" class="apexcharts-series" zIndex="0" seriesName="High" data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1788" d="M 0 145.38399999999996C 15.346875 145.38399999999996 28.50133928571429 68.14874999999998 43.84821428571429 68.14874999999998C 59.19508928571429 68.14874999999998 72.34955357142859 113.58124999999998 87.69642857142858 113.58124999999998C 103.04330357142858 113.58124999999998 116.19776785714286 45.432499999999976 131.54464285714286 45.432499999999976C 146.89151785714287 45.432499999999976 160.04598214285716 127.21099999999998 175.39285714285717 127.21099999999998C 190.73973214285715 127.21099999999998 203.89419642857146 22.716249999999974 219.24107142857144 22.716249999999974C 234.58794642857143 22.716249999999974 247.74241071428574 168.10024999999996 263.0892857142857 168.10024999999996C 278.43616071428573 168.10024999999996 291.590625 0 306.9375 0C 306.9375 0 306.9375 0 306.9375 181.73 L 0 181.73z" fill="url(#SvgjsLinearGradient1783)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask6fdrmuxo)" pathTo="M 0 145.38399999999996C 15.346875 145.38399999999996 28.50133928571429 68.14874999999998 43.84821428571429 68.14874999999998C 59.19508928571429 68.14874999999998 72.34955357142859 113.58124999999998 87.69642857142858 113.58124999999998C 103.04330357142858 113.58124999999998 116.19776785714286 45.432499999999976 131.54464285714286 45.432499999999976C 146.89151785714287 45.432499999999976 160.04598214285716 127.21099999999998 175.39285714285717 127.21099999999998C 190.73973214285715 127.21099999999998 203.89419642857146 22.716249999999974 219.24107142857144 22.716249999999974C 234.58794642857143 22.716249999999974 247.74241071428574 168.10024999999996 263.0892857142857 168.10024999999996C 278.43616071428573 168.10024999999996 291.590625 0 306.9375 0C 306.9375 0 306.9375 0 306.9375 181.73 L 0 181.73z" pathFrom="M -1 272.59499999999997 L -1 272.59499999999997 L 43.84821428571429 272.59499999999997 L 87.69642857142858 272.59499999999997 L 131.54464285714286 272.59499999999997 L 175.39285714285717 272.59499999999997 L 219.24107142857144 272.59499999999997 L 263.0892857142857 272.59499999999997 L 306.9375 272.59499999999997"></path>
                                            <path id="SvgjsPath1789" d="M 0 145.38399999999996C 15.346875 145.38399999999996 28.50133928571429 68.14874999999998 43.84821428571429 68.14874999999998C 59.19508928571429 68.14874999999998 72.34955357142859 113.58124999999998 87.69642857142858 113.58124999999998C 103.04330357142858 113.58124999999998 116.19776785714286 45.432499999999976 131.54464285714286 45.432499999999976C 146.89151785714287 45.432499999999976 160.04598214285716 127.21099999999998 175.39285714285717 127.21099999999998C 190.73973214285715 127.21099999999998 203.89419642857146 22.716249999999974 219.24107142857144 22.716249999999974C 234.58794642857143 22.716249999999974 247.74241071428574 168.10024999999996 263.0892857142857 168.10024999999996C 278.43616071428573 168.10024999999996 291.590625 0 306.9375 0M 306.9375 0" fill="none" fill-opacity="1" stroke="#0ea5e9" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask6fdrmuxo)" pathTo="M 0 145.38399999999996C 15.346875 145.38399999999996 28.50133928571429 68.14874999999998 43.84821428571429 68.14874999999998C 59.19508928571429 68.14874999999998 72.34955357142859 113.58124999999998 87.69642857142858 113.58124999999998C 103.04330357142858 113.58124999999998 116.19776785714286 45.432499999999976 131.54464285714286 45.432499999999976C 146.89151785714287 45.432499999999976 160.04598214285716 127.21099999999998 175.39285714285717 127.21099999999998C 190.73973214285715 127.21099999999998 203.89419642857146 22.716249999999974 219.24107142857144 22.716249999999974C 234.58794642857143 22.716249999999974 247.74241071428574 168.10024999999996 263.0892857142857 168.10024999999996C 278.43616071428573 168.10024999999996 291.590625 0 306.9375 0M 306.9375 0" pathFrom="M -1 272.59499999999997 L -1 272.59499999999997 L 43.84821428571429 272.59499999999997 L 87.69642857142858 272.59499999999997 L 131.54464285714286 272.59499999999997 L 175.39285714285717 272.59499999999997 L 219.24107142857144 272.59499999999997 L 263.0892857142857 272.59499999999997 L 306.9375 272.59499999999997" fill-rule="evenodd"></path>
                                            <g id="SvgjsG1781" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1874" r="0" cx="0" cy="0" class="apexcharts-marker wyi43b7ti no-pointer-events" stroke="#ffffff" fill="#0ea5e9" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1782" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1813" x1="0" y1="0" x2="306.9375" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1814" x1="0" y1="0" x2="306.9375" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1815" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1816" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1818" font-family="Helvetica, Arial, sans-serif" x="0" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1819">Jan</tspan>
                                                <title>Jan</title>
                                            </text><text id="SvgjsText1821" font-family="Helvetica, Arial, sans-serif" x="43.84821428571429" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1822">Feb</tspan>
                                                <title>Feb</title>
                                            </text><text id="SvgjsText1824" font-family="Helvetica, Arial, sans-serif" x="87.69642857142858" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1825">Mar</tspan>
                                                <title>Mar</title>
                                            </text><text id="SvgjsText1827" font-family="Helvetica, Arial, sans-serif" x="131.54464285714286" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1828">Apr</tspan>
                                                <title>Apr</title>
                                            </text><text id="SvgjsText1830" font-family="Helvetica, Arial, sans-serif" x="175.39285714285714" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1831">May</tspan>
                                                <title>May</title>
                                            </text><text id="SvgjsText1833" font-family="Helvetica, Arial, sans-serif" x="219.24107142857142" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1834">Jun</tspan>
                                                <title>Jun</title>
                                            </text><text id="SvgjsText1836" font-family="Helvetica, Arial, sans-serif" x="263.08928571428567" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1837">Jul</tspan>
                                                <title>Jul</title>
                                            </text><text id="SvgjsText1839" font-family="Helvetica, Arial, sans-serif" x="306.93749999999994" y="210.73" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1840">Aug</tspan>
                                                <title>Aug</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1871" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1872" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1873" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1875" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1876" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(14, 165, 233);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                            </div>
                            <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-5">
        <div class="-mt-1 flex items-center justify-between">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                SMME Rankings
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
                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-64px, 492px);" data-popper-placement="bottom-end">
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
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="is-hoverable w-full text-left">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                                Rank
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Post Title
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                View
                            </th>

                            <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Position
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    01.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-3.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">25 Surprising Facts About Chair
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                1,994
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        2
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    02.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-17.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">What is Tailwind CSS?
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                1,719
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        3
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    03.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-19.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">Tailwind CSS Card Example
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                1,621
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        1
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    04.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-2.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">What is PHP?
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                1,411
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        1
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    05.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-1.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">Top Design Systems
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                1,269
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        2
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    06.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-3.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">313 Pattern and Color ideas
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                894
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        1
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    07.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-9.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">NodeJS Design Patterns
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                636
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        2
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-y border-transparent">
                            <td class="whitespace-nowrap rounded-bl-lg px-4 py-3">
                                <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                    08.
                                </p>
                            </td>
                            <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-12">
                                        <img class="rounded-lg object-cover object-center" src="images/object/object-14.jpg" alt="avatar">
                                    </div>

                                    <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">Tailwind CSS Card Example
                                    </span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                411
                            </td>
                            <td class="whitespace-nowrap rounded-br-lg px-4 py-3 sm:px-5">
                                <div class="flex items-center justify-end space-x-1">
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        1
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const getChartOptions = () => {
        return {
            series: @json($pointsData->pluck('total_points')),
            colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
            chart: {
                height: 320,
                width: "100%",
                type: "donut",
            },
            stroke: {
                colors: ["transparent"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: 20,
                            },
                            total: {
                                showAlways: true,
                                show: true,
                                label: "Total Points",
                                fontFamily: "Inter, sans-serif",
                                formatter: function (w) {
                                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b;
                                    }, 0);
                                    return sum;
                                },
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                formatter: function (value) {
                                    return value;
                                },
                            },
                        },
                        size: "80%",
                    },
                },
            },
            grid: {
                padding: {
                    top: -2,
                },
            },
            labels: @json($pointsData->pluck('action')),
            dataLabels: {
                enabled: false,
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return value;
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value;
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
        chart.render();

        // Get all the checkboxes by their class name
        const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

        // Function to handle the checkbox change event
        function handleCheckboxChange(event, chart) {
            const checkbox = event.target;
            if (checkbox.checked) {
                switch(checkbox.value) {
                    case 'desktop':
                        chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                        break;
                    case 'tablet':
                        chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                        break;
                    case 'mobile':
                        chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                        break;
                    default:
                        chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                }
            } else {
                chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
            }
        }

        // Attach the event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
        });
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            series: @json($pointsData->pluck('total_points')),
            chart: {
                type: 'pie',
                height: 350
            },
            labels: @json($pointsData->pluck('action')),
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script> --}}
@endsection
