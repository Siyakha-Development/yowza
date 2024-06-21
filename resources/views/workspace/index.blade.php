@extends('layouts.master_dashboard_layout')
@section('main_content')
<div
    class="flex items-center justify-between py-5 lg:py-6 mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
    <div>
        <h3 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
            Organization Workspace Board
        </h3>
        <p class="mt-1 hidden sm:block">List of your ongoing projects</p>
    </div>
    <a href="{{ route('smme.organization-workspace.create', ['prefix' => 'admin']) }}"
        class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-indigo-50" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span> New Organization </span>
    </a>
</div>

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">

    @if ($workspaces->isEmpty())
    <p>No workspaces found.</p>
    @else
    @foreach ($workspaces as $workspace)
    <div class="card">
        <div class="p-2 text-right">
            <div x-data="usePopper({placement:'bottom-end',offset:4})"
                @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                        </path>
                    </svg>
                </button>

                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'"
                    style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-946px, 188px);"
                    data-popper-placement="bottom-end">
                    <div
                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <ul>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                    Action</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                    else</a>
                            </li>
                        </ul>
                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                        <ul>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                    Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex grow flex-col items-center px-4 pb-5 sm:px-5">
            @if($workspace->company_logo)
            <div class="avatar size-20">
                <img class="rounded-full" src="{{ Storage::url($workspace->company_logo) }}" alt="avatar">
            </div>
            @else
            <div class="avatar size-20">
                <img class="rounded-full" src="{{ asset('backend/images/Yowza_Icon_400px.png') }}" alt="avatar">
            </div>
            @endif
            <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">
                {{ $workspace->company_trading_name }}
            </h3>
            <p class="text-xs+">{{ $workspace->industry }}</p>

            <div class="mt-6 grid w-full grid-cols-2 gap-2">
                <form method="POST" action="{{ route('smme.workspaces.join', ['prefix' => 'admin', 'workspace' => $workspace]) }}">
                    @csrf
                    <button type="submit"
                        class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:shadow-accent/50 dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">

                        <span>Join Workspace</span>
                    </button>
                </form>
                <button
                    class="btn space-x-2 bg-slate-150 px-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    <span> Chat </span>
                </button>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>
@endsection
