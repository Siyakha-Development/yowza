@extends('layouts.master_dashboard_layout')

@section('main_content')
    <div class="mt-5 grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 sm:col-span-6 lg:col-span-8">
            <div
                class="swiper"
                x-init="$nextTick(()=>$el._x_swiper= new Swiper($el,{  slidesPerView: 'auto', spaceBetween: 14,navigation:{nextEl:'.next-btn',prevEl:'.prev-btn'}}))"
            >
                <div class="flex items-center justify-between">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">Categories </p>
                    <div class="flex">
                        <button
                            class="btn prev-btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slatea-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
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
                                    stroke-width="1.5"
                                    d="M15 19l-7-7 7-7"
                                />
                            </svg>
                        </button>
                        <button
                            class="btn next-btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
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
                                    stroke-width="1.5"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="swiper-wrapper mt-5" x-data="{selected:'slide-1'}">
                    @foreach($categories as $item=>$category)
                    <div class="card swiper-slide w-24 shrink-0 cursor-pointer" @click="selected = 'slide-{{$item+1}}'">
                        <div class="flex flex-col items-center rounded-lg px-1 py-2" :class="selected === 'slide-{{$item+1}}' ? 'text-secondary bg-secondary/10  dark:bg-secondary-light/10 dark:text-secondary-light' : 'text-slate-600 dark:text-navy-100' ">
                            <img
                                class="size-16 rounded-lg object-cover object-center"
                                src="https://img.freepik.com/free-photo/full-shot-man-experiencing-virtual-reality_23-2149548139.jpg"
                                alt="image"
                            />
                            <h3 class="pt-2 font-medium tracking-wide line-clamp-1">
                                {{$category->name}}
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-4 sm:mt-5 sm:grid-cols-2 sm:gap-5 lg:mt-6 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($listings as $list)
                    @php
                        $images = json_decode($list->product_image, true);
                    @endphp
                    <div class="card p-2">
                        @php
                            // Ensure $images is an array
                            if (!is_array($images)) {
                                $images = json_decode($images, true) ?? [];
                            }
                            // Shuffle the images array
                            shuffle($images);
                        @endphp

                        @if (!empty($images))
                            <img
                                class="rounded-lg"
                                src="{{ asset('storage/' . $images[0]) }}"
                                alt="image"
                            />
                        @endif
                        <div x-data="{showModal:false}" class="pt-2"  >
                            <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">{{$list->title}}</p>
                            <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">{{$list->user->mobile_number}}</p>
                            <p class="text-right font-medium text-primary dark:text-accent-light">
                                R{{$list->price}}</p>
                            <!-- Display edit button only if the authenticated user is the owner -->
                            @if (Auth::id() == $list->user_id)
                                <a href="{{ route('marketplace.listings.edit', $list->id) }}"><i class="fas fa-edit"></i></a>
                            @else
                                <button @click="showModal = true" id="fetchDataBtn"><i class='fas fa-comment' style='font-size:28px;color: #000000'></i></button>

                                <template x-teleport="#x-teleport-target">
                                    <div
                                        class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                        x-show="showModal"
                                        role="dialog"
                                        @keydown.window.escape="showModal = false"
                                    >
                                        <div
                                            class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                            @click="showModal = false"
                                            x-show="showModal"
                                            x-transition:enter="ease-out"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                        ></div>
                                        <form action="{{ route('inquiries.store', $list->id) }}" method="post" id="inquiryForm">
                                            @csrf
                                            <div
                                                class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                                x-show="showModal"
                                                x-transition:enter="easy-out"
                                                x-transition:enter-start="opacity-0 scale-95"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="easy-in"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-95"
                                            >
                                                <div
                                                    class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5"
                                                >
                                                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                        Message {{$list->user->name}}
                                                    </h3>
                                                    <button
                                                        @click="showModal = !showModal"
                                                        class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="size-4.5"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div class="px-4 py-4 sm:px-5">
                                                    <div class="card flex-row justify-between space-x-2 p-2.5">
                                                        <div class="flex flex-1 flex-col justify-between">
                                                            <div class="line-clamp-3">
                                                                <a href="#" class="font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">{{$list->title}}</a>
                                                                <p>{{$list->description}}</p>
                                                            </div>
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex items-center space-x-2">
                                                                </div>
                                                                <div class="flex">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (!empty($images))
                                                            <img src="{{ asset('storage/' . $images[0]) }}" class="size-28 rounded-lg object-cover object-center" alt="image">
                                                        @endif
                                                    </div>
                                                    <div class="mt-4 space-y-4">
                                                        <label class="block">
                                                            <span>Please type your message to seller:</span>
                                                            <textarea
                                                                name="message"
                                                                rows="4"
                                                                placeholder=" Enter Message"
                                                                class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent tinymce-exclude"
                                                            ></textarea>
                                                        </label>
                                                        <div class="space-x-2 text-right">
                                                            <button
                                                                type="reset"
                                                                @click="showModal = false"
                                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                                                            >
                                                                Cancel
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                                            >
                                                                Send Message
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </template>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="hidden sm:col-span-6 sm:block lg:col-span-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-1">
                    <p><span class="text-base font-medium text-slate-700 dark:text-navy-100"  style="font-size: 1.5rem;">MarketPlace</span></p>
                </div>

                <div class="flex space-x-1">
                    <button
                        class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
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
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                    </button>
                    <button
                        class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 hover:text-error focus:bg-slate-300/20 focus:text-error active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>
                    </button>
                    <div
                        x-data="usePopper({placement:'bottom-end',offset:4})"
                        @click.outside="isShowPopper && (isShowPopper = false)"
                        class="inline-flex"
                    >
                        <button
                            x-ref="popperRef"
                            @click="isShowPopper = !isShowPopper"
                            class="btn size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
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
            </div>
            <div class="card mt-5 p-4 sm:p-5">
                <!-- Menu List Example 1 -->
                    <div class="p-4 sm:px-5">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#"
                                   x-tooltip.duration.1000="'Click to see all  our products'"
                                >
                                    <img src="{{asset('backend/images/marketplace/marketplace.png')}}" class=" avatar size-6" alt="">
                                    <span style="color: black;">Browse All</span>
                                </a>
                            </li>
                            <li>
                                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    href="#"   x-tooltip.duration.1000="'Click to see all notifications'">
                                    <img src="{{asset('backend/images/marketplace/bell.png')}}" class=" avatar size-6" alt="">
                                    <span style="color: black;">Notifications</span>
                                </a>
                            </li>
                              <li>
                                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    href="#"   x-tooltip.duration.1000="'Click to see all messages that been sent buy potential buyers'">
                                    <img src="{{asset('backend/images/marketplace/inbox.png')}}" class=" avatar size-6" alt="">
                                    <span style="color: black;">Inbox</span>
                                </a>
                            </li>
                            <li>
                                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    href="#">
                                    <img src="{{asset('backend/images/marketplace/cart.png')}}" class=" avatar size-6" alt="">
                                    <span style="color: black;">Buying</span>
                                </a>
                            </li>

                            <li>
                                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    href="#">
                                    <img src="{{asset('backend/images/marketplace/tag.png')}}" class=" avatar size-6" alt="">
                                    <span style="color: black;">Selling</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <!-- Menu List Example 2 -->
                    <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    </div>
                    <div class="p-4 sm:px-5">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <div class=" px-4 pb-5 sm:px-5">
                                    <div class="flex items-center justify-between py-3">
                                        <h2
                                            class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100"
                                        >
                                            Trending Items
                                        </h2>
                                    </div>

                                    <div class="space-y-4">
                                        @foreach ($listings as $listing)
                                        <div class="flex items-center justify-between space-x-2">
                                            @if ($listing->product_image)
                                                @php
                                                    $images = json_decode($listing->product_image);
                                                    shuffle($images);
                                                    $randomImage = $images[array_rand($images)];
                                                @endphp
                                            <div class="flex items-center space-x-4">

                                                <img
                                                    class="size-12 rounded-lg object-cover object-center"
                                                    src="{{ asset('storage/' . $randomImage) }}"
                                                    alt="image"
                                                />
                                                @endif
                                                <div class="space-y-1">
                                                    <a
                                                        href="#"
                                                        class="font-medium text-slate-600 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                                    >{{ $listing->title }}</a
                                                    >
                                                    <div class="flex items-center space-x-3 text-xs">
                                                        <p class="flex items-center space-x-1">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="size-3.5 text-slate-400 dark:text-navy-300"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                            >
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                                />
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                                />
                                                            </svg>
                                                            <span class="line-clamp-1">{{$listing->location}}</span>
                                                        </p>
                                                        @if ($listing->ratings->count() > 0)
                                                        <p class="flex shrink-0 items-center space-x-1">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                stroke="currentColor"
                                                                class="size-3.5 text-slate-400 dark:text-navy-300"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                            >
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="M13.948 4.29l1.643 3.169c.224.44.82.864 1.325.945l2.977.477c1.905.306 2.353 1.639.98 2.953l-2.314 2.233c-.392.378-.607 1.107-.486 1.63l.663 2.763c.523 2.188-.681 3.034-2.688 1.89l-2.791-1.593c-.504-.288-1.335-.288-1.848 0l-2.791 1.594c-1.997 1.143-3.21.288-2.688-1.89l.663-2.765c.12-.522-.094-1.251-.486-1.63l-2.315-2.232c-1.362-1.314-.924-2.647.98-2.953l2.978-.477c.495-.081 1.092-.504 1.316-.945l1.643-3.17c.896-1.719 2.352-1.719 3.239 0z"
                                                                />
                                                            </svg>
                                                            <span>{{$listing->average_rating}}</span>
                                                        </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="shrink-0">
                    <span class="text-base font-medium text-slate-700 dark:text-navy-100">R{{ $listing->price }}</span>
                                            </p>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
            </div>
                <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
            </div>
        </div>
    </div>
@endsection
