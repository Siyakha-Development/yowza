@extends('layouts.master_dashboard_layout')

@section('main_content')
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Marketplace
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                   href="#"
                >Item For Sale</a
                >
                <svg
                    x-ignore
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
                        d="M9 5l7 7-7 7"
                    />
                </svg>
            </li>
        </ul>
    </div>

    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">

        <div class="col-span-12 grid lg:col-span-8">
            <div class="card">
                <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                    <div class="flex items-center space-x-2">
                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                            Create Item for Sale
                        </h4>
                    </div>
                </div>
                <form action="{{route('marketplace.listings.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4 p-4 sm:p-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Product name</span>

                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Enter product name"
                                    type="text"
                                    name="title"
                                    value="{{old('title')}}"
                                />
                            </label>
                            <label class="block">
                                <span>Product Description</span>

                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Enter product name"
                                    type="text"
                                    name="description"
                                    value="{{old('description')}}"
                                />
                            </label>
                            <label class="block">
                                <span>Availability</span>
                                <select
                                    class="mt-1.5 w-full"
                                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                                    name="availability"
                                    value="{{old('availability')}}"
                                >
                                    <option value="list as single item">list as single item</option>
                                    <option value="list as in stock">list as in stock</option>
                                </select>
                            </label>
                            <label class="block">
                                <span>Condition</span>
                                <select
                                    class="mt-1.5 w-full"
                                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                                    name="condition"
                                    value="{{old('condition')}}"
                                >
                                    <option value="new">new</option>
                                    <option value="used - like new">used - like new</option>
                                    <option value="used - good">used - good</option>
                                    <option value="used - fair">used - fair</option>
                                </select>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Category</span>
                                <select
                                    class="mt-1.5 w-full"
                                    x-init="$el._x_tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})"
                                    name="category"
                                    value="{{old('category')}}"
                                >
                                    <option value="Digital" >Digital</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Home" >Home</option>
                                    <option value="mobile phone" >mobile phone</option>
                                    <option value="computers/laptop">computers/laptop</option>
                                    <option value="health">health</option>
                                </select>
                            </label>
                            <label class="block">
                                <span>SKU</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="SKU"
                                    type="text"
                                    name="sku"
                                    value="{{old('sku')}}"
                                />
                            </label>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Product Tags</span>
                                <input
                                    class="mt-1.5 w-full"
                                    x-init="$el._tom = new Tom($el,{create:true,plugins: ['caret_position','input_autogrow']})"
                                    placeholder="Enter tags"
                                    type="text"
                                    name="tags"
                                    value="{{old('tags')}}"
                                />
                            </label>
                            <label class="block">
                                <span>Price</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Price"
                                    type="text"
                                    name="price"
                                    value="{{old('price')}}"
                                />
                            </label>

                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Location</span>
                                <input
                                    class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Price"
                                    type="text"
                                    name="location"
                                    value="{{old('location')}}"
                                />
                            </label>

                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <label
                                class="btn relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            >
                                <input
                                    tabindex="-1"
                                    type="file"
                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                    name="product_image[]" multiple
                                />
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-cloud-arrow-up text-base"></i>
                                    <span>Choose File</span>
                                </div>
                            </label>
                        </div>
                        <div>

                        </div>
                        <div class="flex justify-center space-x-2 pt-4">
                            <button class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Create</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-span-12 grid lg:col-span-4 lg:place-items-center">
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
                                    Top 5 Listings
                                </h2>
                            </div>

                            <div class="space-y-4">
                                @foreach($pg_listings as $list)
                                <div class="flex items-center justify-between space-x-2">
                                    <div class="flex items-center space-x-4">
                                        <img
                                            class="size-12 rounded-lg object-cover object-center"
                                            src="{{asset('backend/images/travel/hotel-3.jpg')}}"
                                            alt="image"
                                        />
                                        <div class="space-y-1">
                                            <a
                                                href="#"
                                                class="font-medium text-slate-600 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                            >{{$list->title}}</a
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
                                                    <span class="line-clamp-1">{{$list->location}}</span>
                                                </p>
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
                                                    <span>{{$list->average_rating}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="shrink-0">
                                        <span class="text-base font-medium text-slate-700 dark:text-navy-100">R1{{$list->price}}</span>
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@endsection
