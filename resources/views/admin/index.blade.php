@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div
        class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6"
    >
        <div class="card col-span-12 lg:col-span-8">
            <div
                class="mt-3 flex flex-col justify-between px-4 sm:flex-row sm:items-center sm:px-5"
            >
                <div
                    class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial"
                >
                    <h2
                        class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                       Report Management
                    </h2>
                    <div
                        x-data="usePopper({placement:'bottom-start',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
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
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                            </svg>
                        </button>

                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Another Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Something else</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Separated Link</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="hidden space-x-2 sm:flex"
                    x-data="{activeTab:'tabYearly'}"
                >
                    <button
                        @click="activeTab = 'tabMonthly'"
                        class="btn h-8 rounded-full text-xs font-medium"
                        :class="activeTab === 'tabMonthly' ? 'bg-primary/10 text-primary dark:bg-accent-light/10 dark:text-accent-light' : 'hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 hover:text-slate-800 focus:text-slate-800 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    >
                        Monthly
                    </button>
                    <button
                        @click="activeTab = 'tabYearly'"
                        class="btn h-8 rounded-full text-xs+ font-medium"
                        :class="activeTab === 'tabYearly' ? 'bg-primary/10 text-primary dark:bg-accent-light/10 dark:text-accent-light' : 'hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 hover:text-slate-800 focus:text-slate-800 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    >
                        Yearly
                    </button>
                </div>
            </div>

            <div
                class="mt-4 grid grid-cols-2 gap-3 px-4 sm:mt-5 sm:grid-cols-4 sm:gap-5 sm:px-5 lg:mt-6"
            >
                <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
                    <div class="flex justify-between space-x-1">
                        <p
                            class="text-xl font-semibold text-slate-700 dark:text-navy-100"
                        >
                            {{ $totalPoints }}
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5 text-primary dark:text-accent"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                    <p class="mt-1 text-xs+">User Point System</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
                    <div class="flex justify-between">
                        <p
                            class="text-xl font-semibold text-slate-700 dark:text-navy-100"
                        >
                            12.6K
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5 text-success"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                            />
                        </svg>
                    </div>
                    <p class="mt-1 text-xs+">Courses Completed</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
                    <div class="flex justify-between">
                        <p
                            class="text-xl font-semibold text-slate-700 dark:text-navy-100"
                        >
                            143
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5 text-warning"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                    <p class="mt-1 text-xs+">Documents Downloaded</p>
                </div>
                <div class="rounded-lg bg-slate-100 p-4 dark:bg-navy-600">
                    <div class="flex justify-between">
                        <p
                            class="text-xl font-semibold text-slate-700 dark:text-navy-100"
                        >
                            651
                        </p>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5 text-info"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                            />
                        </svg>
                    </div>
                    <p class="mt-1 text-xs+">Events Hosted</p>
                </div>
            </div>

            <div class="ax-transparent-gridline mt-2 px-2">
                <div
                    x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.ordersOverview); $el._x_chart.render() });"
                ></div>
            </div>
        </div>
        <div
            class="col-span-12 grid grid-cols-2 gap-4 sm:grid-cols-4 sm:gap-5 lg:col-span-4 lg:grid-cols-2 lg:gap-6"
        >
            <div class="card col-span-2 px-4 pb-5 sm:px-5">
                <div class="flex items-center justify-between py-3">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Subscribers
                    </h2>
                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                            </svg>
                        </button>

                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Another Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Something else</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Separated Link</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex grow space-x-5">
                    <div class="flex w-1/2 flex-col">
                        <div class="grow">
                            <p
                                class="text-2xl font-semibold text-slate-700 dark:text-navy-100"
                            >
                                {{ $subscriberCount }}
                            </p>
                            <a
                                href="#"
                                class="border-b border-dotted border-current pb-0.5 text-tiny font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
                            >
                                Subscribers
                            </a>
                        </div>
                        <p class="mt-2 text-xs leading-normal line-clamp-3">
                            20 Emails have been sent
                        </p>
                    </div>

                    <div class="ax-transparent-gridline flex w-1/2 items-end">
                        <div
                            x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderBudget); $el._x_chart.render() });"
                        ></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Income
                    </h2>

                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn -mr-2 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                            </svg>
                        </button>

                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Another Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Something else</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Separated Link</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p
                    class="grow px-4 text-xl font-semibold text-slate-700 dark:text-navy-100 sm:px-5"
                >
                    $169.6k
                </p>
                <div class="ax-transparent-gridline">
                    <div
                        x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderIncome); $el._x_chart.render() });"
                    ></div>
                </div>
            </div>
            <div class="card">
                <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Expense
                    </h2>

                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn -mr-2 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                            </svg>
                        </button>

                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Another Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Something else</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Separated Link</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p
                    class="grow px-4 text-xl font-semibold text-slate-700 dark:text-navy-100 sm:px-5"
                >
                    $34.6k
                </p>
                <div class="ax-transparent-gridline">
                    <div
                        x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.orderExpense); $el._x_chart.render() });"
                    ></div>
                </div>
            </div>
        </div>
        <div class="card col-span-12 pb-2 lg:col-span-5 xl:col-span-6">
            <div class="my-3 flex items-center justify-between px-4 sm:px-5">
                <h2
                    class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                    Top SMMEs
                </h2>
                <div
                    x-data="usePopper({placement:'bottom-end',offset:4})"
                    @click.outside="isShowPopper && (isShowPopper = false)"
                    class="inline-flex"
                >
                    <button
                        x-ref="popperRef"
                        @click="isShowPopper = !isShowPopper"
                        class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                            />
                        </svg>
                    </button>

                    <div
                        x-ref="popperRoot"
                        class="popper-root"
                        :class="isShowPopper && 'show'"
                    >
                        <div
                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                        >
                            <ul>
                                <li>
                                    <a
                                        href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    >Action</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    >Another Action</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    >Something else</a
                                    >
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <a
                                        href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    >Separated Link</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="scrollbar-sm flex space-x-3 overflow-x-auto px-4 pb-3 sm:px-5"
            >
            @if ($workspaces->isEmpty())
                No Workspace avaialable
            @else

            @foreach ($workspaces as $workspace)
                <div
                    class="w-56 shrink-0 rounded-xl bg-slate-50 p-4 dark:bg-navy-600"
                >
                    <div class="flex flex-col items-center space-y-3 text-center">
                        <div
                            class="size-16 rounded-full bg-gradient-to-r from-sky-400 to-blue-600 p-0.5"
                        >
                        @if ($workspace->smme_logo)
                            <img
                                class="h-full w-full rounded-full border-2 border-white object-cover object-center dark:border-navy-700"
                                src="{{ asset('storage/' . $workspace->smme_logo) }}"
                                alt="image"
                            />
                        @endif
                        </div>
                        <div>
                            <p
                                class="text-base font-medium text-slate-700 dark:text-navy-100"
                            >
                                {{ $workspace->name }}
                            </p>
                            <p class="text-xs+ text-slate-400 dark:text-navy-300">
                                {{ $workspace->smme_business_name }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div>
                            <p>Ranking Points</p>
                            <div class="mt-0.5 flex space-x-2">
                                <p
                                    class="text-xl font-semibold text-slate-700 dark:text-navy-100"
                                >
                                    <strong>Points:</strong> {{ $workspace->points }}
                                </p>
                                {{-- <p
                                    class="flex items-center space-x-0.5 text-xs text-success"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 11l5-5m0 0l5 5m-5-5v12"
                                        />
                                    </svg>
                                    <span>4.3%</span>
                                </p> --}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="mt-5 flex justify-center space-x-2">
                        <button
                            class="btn size-8 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                />
                            </svg>
                        </button>
                        <button
                            class="btn size-8 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </button>
                        <button
                            class="btn size-8 rounded-full bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
            @endif  
            </div>
        </div>
        <div
            class="col-span-12 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:col-span-7 lg:gap-6 xl:col-span-6"
        >
            <div class="card px-4 pb-5 sm:px-5">
                <div class="flex items-center justify-between py-3">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Call To Action Report
                    </h2>
                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                                />
                            </svg>
                        </button>

                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Another Action</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Something else</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Separated Link</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                  <span class="text-2xl text-slate-700 dark:text-navy-100"
                  >135K</span
                  >
                        <span class="text-xs text-success">+3.1%</span>
                    </p>
                    <p class="text-xs+">View in this month</p>
                </div>
                <div class="mt-5 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/instagram-round.svg')}}"
                                alt="flag"
                            />
                            <p>Instagram</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                34.3k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/facebook-round.svg')}}"
                                alt="flag"
                            />
                            <p>Facebook</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                17.72k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/youtube-round.svg')}}"
                                alt="flag"
                            />
                            <p>Youtube</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                12.41k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-error"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 13l-5 5m0 0l-5-5m5 5V6"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/pinterest-round.svg')}}"
                                alt="flag"
                            />
                            <p>Pinterest</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                11.89k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/discord-round.svg')}}"
                                alt="flag"
                            />
                            <p>Discord</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                9.47k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/tik_tok-round.svg')}}"
                                alt="flag"
                            />
                            <p>TikTok</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                8.11k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-error"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 13l-5 5m0 0l-5-5m5 5V6"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/twitter-round.svg')}}"
                                alt="flag"
                            />
                            <p>Twitter</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                5.98k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/logos/tumblr-round.svg')}}"
                                alt="flag"
                            />
                            <p>Tumblr</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                2.7k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card px-4 pb-5 sm:px-5">
                <div class="my-3 flex h-8 items-center justify-between">
                    <h2
                        class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                        Top Events
                    </h2>
                    <a
                        href="#"
                        class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
                    >
                        View All
                    </a>
                </div>
                <div>
                    <p>
                  <span class="text-2xl text-slate-700 dark:text-navy-100"
                  >64</span
                  >
                    </p>
                    <p class="text-xs+">Countries</p>
                </div>
                <div class="mt-5 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/australia-round.svg')}}"
                                alt="flag"
                            />
                            <p>Australia</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $6.41k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/brazil-round.svg')}}"
                                alt="flag"
                            />
                            <p>Brazil</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $2.33k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/china-round.svg')}}"
                                alt="flag"
                            />
                            <p>China</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $7.21k
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/india-round.svg')}}"
                                alt="flag"
                            />
                            <p>India</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $754
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-error"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 13l-5 5m0 0l-5-5m5 5V6"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/italy-round.svg')}}"
                                alt="flag"
                            />
                            <p>Italy</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $699
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/japan-round.svg')}}"
                                alt="flag"
                            />
                            <p>Japan</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $624
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/russia-round.svg')}}"
                                alt="flag"
                            />
                            <p>Russia</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $574
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-error"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 13l-5 5m0 0l-5-5m5 5V6"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img
                                class="size-6"
                                src="{{asset('backend/images/flags/spain-round.svg')}}"
                                alt="flag"
                            />
                            <p>Spain</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                $506
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <h2
                    class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
                >
                    User Agent Tracking
                </h2>
                <div class="flex">
                    <div class="flex items-center" x-data="{isInputActive:false}">
                        <label class="block">
                            <input
                                x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                placeholder="Search here..."
                                type="text"
                            />
                        </label>
                        <button
                            @click="isInputActive = !isInputActive"
                            class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                                />
                            </svg>
                        </button>
                        <div
                            x-ref="popperRoot"
                            class="popper-root"
                            :class="isShowPopper && 'show'"
                        >
                            <div
                                class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                            >
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Create New Post</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >All Posts</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >Add New Category</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                                ></div>
                                <ul>
                                    <li>
                                        <a
                                            href="#"
                                            class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                        >All Categories</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:grid-cols-2 lg:gap-6">
            <div>
              <div class="flex h-8 items-center justify-between">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Activity Stats
                </h2>

                <select class="form-select h-8 rounded-full border border-slate-300 bg-slate-50 px-2.5 pr-9 text-xs+ hover:border-slate-400 focus:border-primary dark:border-navy-600 dark:bg-navy-900 dark:hover:border-navy-400 dark:focus:border-accent">
                  <option>05 - 12 May</option>
                  <option>12 - 19 May</option>
                  <option>19 - 26 May</option>
                  <option>26 - 02 June</option>
                  <option>02 - 09 June</option>
                </select>
              </div>

              <div>
                <div style="min-height: 268px;">
                <div id="chart2" class="apexcharts-canvas apexchartssde8dnob apexcharts-theme-light" style="width: 568px; height: 268px;">
                </div>
                </div>
              </div>
            </div>
            <div>
              <div class="flex h-8 items-center justify-between">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  User Track Table
                </h2>

                <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                  View All
                </a>
              </div>

              <table class="w-full">
                <tbody>
                @foreach($activities as $activity)
                  <tr>
                    <td class="whitespace-nowrap pt-4">
                      <div class="flex items-center space-x-3">
                        <div class="avatar size-9">
                          {{ $activity->id }}
                        </div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                          Device: {{ $activity->device }}
                        </h3>
                      </div>
                    </td>
                    <td class="whitespace-nowrap px-2 pt-4">
                      <a href="#" class="font-inter tracking-wide text-slate-400 hover:text-primary focus:text-primary dark:hover:text-accent-light dark:focus:text-accent-light">Browser: {{ $activity->platform }}
                      </a>
                    </td>
                    <td class="whitespace-nowrap pt-4">
                      <p class="text-right font-medium text-slate-700 dark:text-navy-100">
                       Robot: {{ $activity->robot ? 'Yes' : 'No' }}
                      </p>
                    </td>
                    <td class="whitespace-nowrap pt-4">
                      <p class="text-right font-medium text-slate-700 dark:text-navy-100">
                        IP: {{ $activity->ip_address }}
                      </p>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    <div class="flex items-center space-x-2 text-xs+">
                        <span>Show</span>
                        <label class="block">
                            <select
                                class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                onchange="window.location.href='?entries=' + this.value"
                            >
                                <option {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                                <option {{ request('entries') == 30 ? 'selected' : '' }}>30</option>
                                <option {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </label>
                        <span>entries</span>
                    </div>

                    {{ $activities->appends(['entries' => request('entries')])->links('admin.pagination.custom') }}

                    <div class="text-xs+">{{ $activities->firstItem() }} - {{ $activities->lastItem() }} of {{ $activities->total() }} entries</div>
                </div>
            </div>
          </div>
            
           
        </div>
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get data from Blade template
            const deviceCounts = @json($deviceCounts);
            const platformCounts = @json($platformCounts);
            const browserCounts = @json($browserCounts);
            const robotCounts = @json($robotCounts);

            // Prepare data for the chart
            let series = [
                {
                    name: 'Devices',
                    data: Object.values(deviceCounts)
                },
                {
                    name: 'Platforms',
                    data: Object.values(platformCounts)
                },
                {
                    name: 'Browsers',
                    data: Object.values(browserCounts)
                },
                {
                    name: 'Robots',
                    data: Object.values(robotCounts)
                }
            ];

            let labels = [
                ...Object.keys(deviceCounts).map(label => `Device: ${label}`),
                ...Object.keys(platformCounts).map(label => `Platform: ${label}`),
                ...Object.keys(browserCounts).map(label => `Browser: ${label}`),
                ...Object.keys(robotCounts).map(label => `Robot: ${label}`)
            ];

            // Render the Doughnut chart
            var options = {
                chart: {
                    type: 'donut',
                    width: '100%',
                    height: '100%'
                },
                series: series.map(s => s.data).flat(),
                labels: labels,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                legend: {
                    show: true,
                    position: 'right'
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();
        });
    </script>

    <style>
        #chart2 {
            max-width: 1000px;
            margin: 0 auto;
            max-height: 100px
        }
    </style>
@endsection
