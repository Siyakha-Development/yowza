@extends('layouts.master_dashboard_layout')

@section('main_content')
    <div class="grid grid-cols-12 lg:gap-6">
        <div class="col-span-12 pt-6 lg:col-span-8 lg:pb-6">
            <div class="card p-4 lg:p-6">
                <!-- Author -->
                <div>
                    <div class="flex items-center justify-between">
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
                <div class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200">
                    <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                       {{$post->title}}
                    </h1>
                    <img
                        class="mt-5 h-80 w-full rounded-lg object-cover object-center"
                        src="{{url('upload/post_images',$post->image)}}"
                        alt="image"
                    />
                    <br />
                    <div
                        class="border-l-4 border-slate-300 pl-4 dark:border-navy-400"
                    >
                    </div>
                    <br />
                    <br />
                    <p>
                        {{strip_tags($post->post_content)}}
                    </p>
                    <br />
                </div>
                <!-- Footer Blog Post -->
                <div class="mt-5 flex space-x-3">
                    <button class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        <i class="fa fa-eye dark:text-navy-100" aria-hidden="true"></i>
                        <span>{{$post->views}}</span>
                    </button>
                </div>
            </div>

            <div class="mt-5">
                <div class="flex items-center justify-between">
                    <p
                        class="text-lg font-medium text-slate-800 dark:text-navy-100"
                    >
                        Recent Articles
                    </p>
                    <a
                        href="#"
                        class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70"
                    >View All</a
                    >
                </div>
                <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
                    @foreach($relatedPosts as $post)
                    <div class="card lg:flex-row">
                        <img
                            class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg"
                            src="{{url('upload/post_images',$post->image)}}"
                            alt="image"
                        />
                        <div class="flex w-full grow flex-col px-4 py-3 sm:px-5">
                            <div class="flex items-center justify-between">
                                <a class="text-xs+ text-info" href="#"></a>
                                <div class="-mr-1.5 flex space-x-1">
                                    <button
                                        class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
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
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <a
                                    href="{{url('admin/admin/post',$post->id)}}"
                                    class="text-lg font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                >{{$post->title}}</a
                                >
                            </div>
                            <p class="mt-1 line-clamp-3">
                              {{strip_tags($post->post_content)}}
                            </p>
                            <div class="grow">
                                <div class="mt-2 flex items-center text-xs">
                                    <a
                                        href="{{url('admin/admin/post/',$post->id)}}"
                                        class="flex items-center space-x-2 hover:text-slate-800 dark:hover:text-navy-100"
                                    >
                                        <div class="avatar size-6">
                                        </div>
                                        <span class="line-clamp-1">Posted by : {{$post->user->name}}</span>
                                    </a>
                                    <div
                                        class="mx-3 my-1 w-px self-stretch bg-slate-200 dark:bg-navy-500"
                                    ></div>
                                    <span class="shrink-0 text-slate-400 dark:text-navy-300">{{$post->created_at->format('F j, Y')}}</span>
                                </div>
                            </div>
                            <div class="mt-1 flex justify-end">
                                <a href="{{url('admin/admin/post',$post->id)}}"
                                    class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25"
                                >
                                    Read Article
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$relatedPosts->links('pagination::tailwind')}}
            </div>
        </div>
        <div class="col-span-12 py-6 lg:sticky lg:bottom-0 lg:col-span-4 lg:self-end">
            <div class="card" style="padding-left: 5px;padding-right: 5px;">
                <div class="mt-5">
                    <p
                        class="border-b border-slate-200 pb-2 text-base text-slate-800 dark:border-navy-600 dark:text-navy-100 px-2.5"
                    >
                        Related by Category
                    </p>
                    <div
                        class="mt-3 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-1"
                    >
                        @foreach($relatedPosts as $post)
                            <div class="flex justify-between space-x-2">
                                <div class="flex flex-1 flex-col justify-between">
                                    <div>
                                        <span class="shrink-0 text-slate-400 dark:text-navy-300 px-2">{{$post->created_at->format('F j, Y')}}</span>
                                        <div
                                            class="mt-1 text-slate-800 line-clamp-3 dark:text-navy-100"
                                        >
                                            <a
                                                href="{{url('admin/admin/post',$post->id)}}"
                                                class="font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light px-2"
                                            >{{$post->title}}</a
                                            >
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between " >

                                        <div class="flex">
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="{{url('upload/post_images',$post->image)}}"
                                    class="size-24 rounded-lg object-cover object-center"
                                    alt="image"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
