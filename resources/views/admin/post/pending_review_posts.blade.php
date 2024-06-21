@extends('layouts.master_dashboard_layout')

@section('main_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="mt-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 lg:mt-6">
        <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach($pending_review_posts as $post)
                @if(!$post)
                    <span class="text-danger">Hey !!!</span>
                @endif
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="{{url('upload/post_images/',$post->image)}}" alt="image"/>
                    <div class="card -mt-8 grow rounded-2xl p-4 text-center">
                        <div>
                            <a href="{{url('/admin/admin/post',$post->id)}}"
                               class="text-sm+ font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                            >{{$post->title}}</a>
                        </div>
                        <div>
                            @foreach($post->categories as $cat)
                                <a href="{{url('/admin/admin/post',$post->id)}}" class="badge rounded-full bg-navy-700 text-white dark:bg-navy-900 mt-3 text-center uppercase" style="font-size: 6px;font-weight: bold">{{$cat->name}}</a>
                            @endforeach
                        </div>
                        <div class="flex justify-center mt-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="" >{{date('d-m-Y',strtotime($post->created_at))}}</span>
                        </div>

                        <p class="mt-2 grow line-clamp-3"></p>
                        <div >

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <span class="mx-3">{{$pending_review_posts->links('pagination::tailwind')}}</span>

    </div>
@endsection
