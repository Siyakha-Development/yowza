@extends('layouts.master_dashboard_layout')

@section('main_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="col-span-12">
        <div class="flex items-center justify-between">
            <h2
                class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
            >
                ALL POSTS
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
        <div class="card mt-3">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="is-hoverable w-full text-left">
                    <thead>
                    <tr>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold  text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                         Image
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold  text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                           Title
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold  text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                            Category(s)
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold  text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                            Tag(s)
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold  text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                            Status
                        </th>

                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        >
                            Action
                        </th>
                        <th
                            class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                        ></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $key=>$item )
                        <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500 ">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="flex items-center space-x-4">
                                    <div class="avatar size-9">
                                        <img
                                            class="mask is-squircle"
                                            src="{{url('upload/post_images/'.$item->image)}}"
                                            alt="avatar"
                                        />
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <p class="font-medium">{{\Illuminate\Support\Str::limit($item->title,20)}}</p>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @foreach ($item->categories as $cat )
                                    <div class="badge bg-navy-700 text-white dark:bg-navy-900 mt-1">
                                        {{$cat->name}}
                                    </div>
                                    <br/>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @foreach ($item->tags as $tag )
                                    <div class="badge bg-navy-700 text-white dark:bg-navy-900 mt-1">
                                        {{$tag->name}}
                                    </div>
                                    <br/>
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                @if($item->status ==='published')
                                    <div class="badge bg-success text-white mt-1">
                                        {{$item->status}}
                                    </div>
                                @elseif($item->status ==='draft')
                                    <div class="badge bg-warning text-white mt-1">
                                        {{$item->status}}
                                    </div>
                                @else
                                    <div class="badge bg-navy-700 text-white dark:bg-navy-900 mt-1">
                                        {{$item->status}}
                                    </div>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                <div class="badge space-x-2.5 text-xs+ text-warning">
                                    <a href='/admin/admin/post/{{$item->id}}/edit' class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                        <i class="fa fa-edit bg-navy-700 text-white dark:bg-navy-900"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.post.destroy', ['prefix' => 'admin', 'id' => $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa fa-trash-alt text-bg-danger"></i>
                                        </button>
                                    </form>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
