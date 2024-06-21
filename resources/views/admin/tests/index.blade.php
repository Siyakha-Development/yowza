@extends('layouts.master_dashboard_layout')
@section('main_content')
    <div class="mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
        <div>
            <h3 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                Test
            </h3>
            <p class="mt-1 hidden sm:block"><a href="{{ route('admin.tests.index', ['prefix' => 'admin']) }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a> | <a href="{{ route('admin.tests.index', ['prefix' => 'admin']) }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></p>
        </div>
        <a href="{{ route('admin.tests.create', ['prefix' => 'admin']) }}" class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-indigo-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span> Create a new test </span>
        </a>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Test/Exam Management
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
                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-64px, 460px);" data-popper-placement="bottom-end">
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
                            <th
                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                            >
                                #
                            </th>

                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Course
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                               Lesson
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Title
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Description
                            </th>
                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                Published
                            {{--                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">--}}
                            {{--                                Free Lesson--}}
                            {{--                            </th>--}}
                            {{--                            <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">--}}
                            {{--                                Published--}}
                            {{--                            </th>--}}

                            <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tests as $test)
                            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500" data-entry-id="{{ $test->id }}">
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $test->id }}</td>

                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <p class="w-48 overflow-hidden text-ellipsis text-xs+">
                                        <span class="badge badge-info">{{ $test->course->title ?? '' }}</span>
                                    </p>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <p class="w-48 overflow-hidden text-ellipsis text-xs+">
                                        <span class="badge badge-info">{{ $test->lesson->title ?? '' }}</span>
                                    </p>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <p class="w-48 overflow-hidden text-ellipsis text-xs+">
                                        {{ $test->title }}
                                    </p>

                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <p class="w-48 overflow-hidden text-ellipsis text-xs+">
                                        {!! Str::limit(strip_tags($test->description), 10) !!}
                                    </p>

                                </td>
                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <p class="w-48 overflow-hidden text-ellipsis text-xs+">
                                        {{ $test->published ? 'Active' : 'InActive' }}
                                    </p>

                                </td>



                                <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                            </svg>
                                        </button>

                                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-151px, 281px);" data-popper-placement="bottom-end">
                                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                                <ul>
                                                    @if( request('show_deleted') == 1 )

                                                        <li>
                                                            <form action="{{ route('admin.tests.restore', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                                                @csrf
                                                                <button type="submit" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Restore</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.tests.perma_del', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Delete</button></form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('admin.tests.edit', ['prefix' => 'admin', 'test' => $test->id]) }}" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.tests.destroy', ['prefix' => 'admin', 'test' => $test->id]) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Delete</button>
                                                            </form>

                                                        </li>
                                                    @endif
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
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="10">Not found !</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    <div class="flex items-center space-x-2 text-xs+">
                        <span>Show</span>
                        <label class="block">
                            <form id="entries-form" method="GET" action="{{ route('admin.courses.index', ['prefix' => 'admin']) }}">
                                <select name="entries" class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" onchange="document.getElementById('entries-form').submit();">
                                    <option value="10"{{ request('entries') == 10 ? ' selected' : '' }}>10</option>
                                    <option value="30"{{ request('entries') == 30 ? ' selected' : '' }}>30</option>
                                    <option value="50"{{ request('entries') == 50 ? ' selected' : '' }}>50</option>
                                </select>
                            </form>
                        </label>
                        <span>entries</span>
                    </div>

                    <div class="pagination">
                        {{ $tests->appends(request()->query())->links('pagination::tailwind') }}
                    </div>

                    <div class="text-xs+">
                        Showing {{ $tests->firstItem() }} to {{ $tests->lastItem() }} of {{ $tests->total() }} entries
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
