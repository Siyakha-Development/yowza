@extends('layouts.master_dashboard_layout')
@section('main_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li>All Categories</li>
        </ul>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- From HTML Table -->
        <div class="card pb-4">
            <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
                <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                </h2>
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
                                        href="{{url('/admin/admin/post/create')}}"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                    >Add Category</a
                                    >
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div
                    x-data
                    x-init="$el._x_grid =  new Gridjs.Grid({
                from: $refs.table,
                sort: true,
                search: true,
              }).render($refs.wrapper);"
                >
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table x-ref="table" class="w-full text-left">
                            <thead>
                            <tr>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                >
                                 Category Image
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                >
                                   Category Name
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                                >
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $key=>$item)
                                <tr>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="avatar size-16">
                                            <img
                                                class="rounded-lg"
                                                src="{{asset('upload/category_images/'.$item->category_image)}}"
                                                alt="avatar"
                                            />
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                       {{$item->name}}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="badge space-x-2.5 text-xs+ text-warning">
                                            <a href='/admin/admin/category/{{$item->id}}/edit' class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.category.destroy', ['prefix' => 'admin', 'id' => $item->id]) }}">
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
                    </div>
                    <div><div x-ref="wrapper"></div></div>
                </div>
            </div>
        </div>
    </div>
@endsection
