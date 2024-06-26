@extends('layouts.master_dashboard_layout')
@section('main_content')
<div class="flex items-center justify-between py-5 lg:py-6">
    <div class="flex items-center space-x-1">
        <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
            Yowza Community
        </h2>
        <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <i class="fas fa-chevron-down"></i>
            </button>

            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(268px, 122px);" data-popper-placement="bottom-start">
                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                    <ul>
                        <li>
                            <a href="{{ route('smme.yowza-community-groups.index', ['prefix' => 'admin'])}}" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span> Join a Group</span></a>
                        </li>
                        <li>
                            <a href="{{ route('smme.yowza-community-groups.create', ['prefix' => 'admin'])}}" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span>Create a Group</span></a>
                        </li>
                        <li>
                            <a href="#" class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Setting</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="mb-8">

    <h3 class="font-extrabold text-2xl  text-black dark:text-white hidden"> Stories</h3>

    <div class="relative uk-slider" tabindex="-1" uk-slider="auto play: true;finite: true" uk-lightbox="">

        <div class="py-5 uk-slider-container">

            <ul id="story-list" class="uk-slider-items w-[calc(100%+14px)]" uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 20;repeat:true" style="transform: translate3d(0px, 0px, 0px);">
                <li class="md:pr-3 uk-active uk-scrollspy-inview " uk-scrollspy-class="uk-animation-fade" tabindex="-1" style="">
                    <div class="md:w-16 md:h-16 w-12 h-12 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2 shrink-0" uk-toggle="target: #create-story" tabindex="0" aria-expanded="false">
                        <ion-icon name="camera" class="text-2xl md hydrated" role="img" aria-label="camera"></ion-icon>
                    </div>
                </li>

                @forelse($stories->groupBy('user_id') as $userStories)
                @php
                $latestStory = $userStories->first();
                @endphp
                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300 uk-active uk-scrollspy-inview" tabindex="-1" data-user-id="{{ $latestStory->user_id }}" onclick="openStoryModal('{{ $latestStory->user_id }}')">
                    <div class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                        <img src="{{ asset('images/community_stories/' . $latestStory->image) }}" alt="Story Image" class="absolute w-full h-full object-cover">
                    </div>
                </li>
                @empty
                <li class="md:pr-3 pr-2" tabindex="-1" style="opacity: 0;">
                    <div class="md:w-16 md:h-16 w-12 h-12 bg-slate-200/60 rounded-full dark:bg-dark2 animate-pulse"></div>
                </li>
                @endforelse

                <!-- Modal for Story View -->
                <div id="storyModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
                    <div class="bg-white rounded-lg p-4 max-w-md w-full overflow-y-auto" style="max-height: 80vh;">
                        <div id="storyModalContent">
                            <img id="modalStoryImage" src="" alt="Story Image" class="w-full h-auto rounded">
                            <p id="modalStoryCaption" class="mt-2"></p>
                        </div>
                        <button onclick="closeStoryModal()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Close</button>
                    </div>
                </div>
                {{-- <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300 uk-active uk-scrollspy-inview " tabindex="-1" style="">
                            <a href="assets/images/avatars/avatar-lg-1.jpg" data-caption="Caption 1">
                                <div class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                    <img src="assets/images/avatars/avatar-2.jpg" alt="" class="absolute w-full h-full object-cover">
                                </div>
                            </a>
                        </li>
                        
                        <li class="md:pr-3 pr-2" tabindex="-1" style="opacity: 0;">
                            <div class="md:w-16 md:h-16 w-12 h-12 bg-slate-200/60 rounded-full dark:bg-dark2 animate-pulse"></div>
                        </li> --}}
            </ul>

        </div>

        <div class="max-md:hidden">

            <button type="button" class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3 uk-invisible" uk-slider-item="previous">
                <ion-icon name="chevron-back" class="text-2xl md hydrated" role="img" aria-label="chevron back"></ion-icon>
            </button>
            <button type="button" class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3" uk-slider-item="next">
                <ion-icon name="chevron-forward" class="text-2xl md hydrated" role="img" aria-label="chevron forward"></ion-icon>
            </button>

        </div>


    </div>

</div>
<div class="grid grid-cols-12 lg:gap-6">
    <div class="col-span-12 pt-6 lg:col-span-8 lg:pb-6">
        <div class="card p-4 lg:p-6 bg-white rounded-xl shadow-sm md:p-4 p-2 space-y-4 text-sm font-medium border1 dark:bg-dark2">

            <div class="flex items-center md:gap-3 gap-1">
                <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status" tabindex="0" aria-expanded="false">
                    <div class="py-2.5 text-center dark:text-white"> What do you have in mind? </div>
                </div>
                <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-pink-100/60 hover:bg-pink-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status" tabindex="0" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-pink-600 fill-pink-200/70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8h.01"></path>
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                        <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5"></path>
                    </svg>
                </div>
                <div class="cursor-pointer hover:bg-opacity-80 p-1 px-1.5 rounded-xl transition-all bg-sky-100/60 hover:bg-sky-100 dark:bg-white/10 dark:hover:bg-white/20" uk-toggle="target: #create-status" tabindex="0" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 stroke-sky-600 fill-sky-200/70 " viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z"></path>
                        <path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"></path>
                    </svg>
                </div>
            </div>

        </div>
        <br>


        <!--  post image-->
        @if($posts->isEmpty())
        <p>No posts available.</p>
        <div class="rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">

            <div class="flex gap-3">
                <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                <div class="flex-1 space-y-3">
                    <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                    <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                </div>
                <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
            </div>

            <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"> </div>

            <div class="flex gap-3">

                <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>

                <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>

                <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                <div class="w-6 h-6 rounded-full bg-slate-300/20  "></div>
            </div>

        </div>
        @else
        @foreach($posts as $post)
        <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

            <!-- post heading -->
            <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                @if($post->user && $post->user->profileImage)
                <a href=""> <img src="{{ asset('profile_pictures/' . $post->user->profileImage->profile_picture) }}" alt="" class="w-9 h-9 rounded-full"> </a>
                @else
                <a href=""> <img src="{{ asset('backend/images/avatar/black-afro.png') }}" alt="" class="w-9 h-9 rounded-full"> </a>
                @endif
                <div class="flex-1">
                    <a href="">
                        <h4 class="text-black dark:text-white"> {{ $post->user ? $post->user->name : 'No User' }} </h4>
                    </a>
                    <div class="text-xs text-gray-500 dark:text-white/80"> {{ $post->created_at->format('M d, Y') }}</div>
                </div>



                <div class="-mr-1">
                    <button type="button" class="button-icon w-8 h-8" aria-haspopup="true" aria-expanded="false">
                        <ion-icon class="text-xl md hydrated" name="ellipsis-horizontal" role="img" aria-label="ellipsis horizontal"></ion-icon>
                    </button>
                    <div class="w-[245px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                        <nav>
                            <a href="#">
                                <ion-icon class="text-xl shrink-0 md hydrated" name="bookmark-outline" role="img" aria-label="bookmark outline"></ion-icon> Add to favorites
                            </a>
                            <a href="#">
                                <ion-icon class="text-xl shrink-0 md hydrated" name="notifications-off-outline" role="img" aria-label="notifications off outline"></ion-icon> Mute Notification
                            </a>
                            <a href="#">
                                <ion-icon class="text-xl shrink-0 md hydrated" name="flag-outline" role="img" aria-label="flag outline"></ion-icon> Report this post
                            </a>
                            <a href="#">
                                <ion-icon class="text-xl shrink-0 md hydrated" name="share-outline" role="img" aria-label="share outline"></ion-icon> Share your profile
                            </a>
                            <hr>
                            <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                <ion-icon class="text-xl shrink-0 md hydrated" name="stop-circle-outline" role="img" aria-label="stop circle outline"></ion-icon> Unfollow
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="sm:px-4 p-2.5 pt-0">
                <p class="font-normal"> {{ $post->content }}</p>
            </div>

            <!-- post image -->
            <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                @if($post->post_image)
                <div class="relative w-full lg:h-96 h-full sm:px-4">
                    <img src="{{ Storage::url($post->post_image) }}" alt="" class="sm:rounded-lg w-full h-full object-cover">
                </div>
                @endif
            </a>

            <!-- post icons -->
            <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                <div>
                    <div class="flex items-center gap-2.5" tabindex="0" aria-haspopup="true" aria-expanded="false">
                        <form id="like-form-{{ $post->id }}" action="{{ route('smme.community-likes.store', ['prefix' => 'admin']) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="likeable_id" value="{{ $post->id }}">
                            <input type="hidden" name="likeable_type" value="{{ get_class($post) }}">
                            <button onclick="document.getElementById('like-form-{{ $post->id }}').submit();" type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                                <ion-icon class="text-lg md hydrated" name="heart" role="img" aria-label="heart"></ion-icon>
                            </button>
                        </form>
                        <a href="#">{{ $post->likes->count() }}</a>
                    </div>
                    <div class="p-1 px-2 bg-white rounded-full drop-shadow-md w-[212px] dark:bg-slate-700 text-2xl uk-drop" uk-drop="offset:10;pos: top-left; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left">

                        <div class="flex gap-2" uk-scrollspy="target: > button; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                            <button type="button" class="text-red-600 hover:scale-125 duration-300" style="opacity: 0;"> <span> 👍 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300" style="opacity: 0;"> <span> ❤️ </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300" style="opacity: 0;"> <span> 😂 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300" style="opacity: 0;"> <span> 😯 </span></button>
                            <button type="button" class="text-red-600 hover:scale-125 duration-300" style="opacity: 0;"> <span> 😢 </span></button>
                        </div>

                        <div class="w-2.5 h-2.5 absolute -bottom-1 left-3 bg-white rotate-45 hidden"></div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700">
                        <ion-icon class="text-lg md hydrated" name="chatbubble-ellipses" role="img" aria-label="chatbubble ellipses"></ion-icon>
                    </button>
                    <span>{{ $post->comments()->count() }}</span>
                </div>
                <button type="button" class="button-icon ml-auto">
                    <ion-icon class="text-xl md hydrated" name="paper-plane-outline" role="img" aria-label="paper plane outline"></ion-icon>
                </button>
                <button type="button" class="button-icon">
                    <ion-icon class="text-xl md hydrated" name="share-outline" role="img" aria-label="share outline"></ion-icon>
                </button>
            </div>

            <!-- comments -->
            @if($post->comments)
            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                @if($post->comments->isNotEmpty())
                @foreach($post->comments as $comment)
                <div class="flex items-start gap-3 relative">
                    @if($comment->user && $comment->user->profileImage)
                    <a href=""> <img src="{{ asset('profile_pictures/' . $comment->user->profileImage->profile_picture) }}" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                    @else
                    <a href=""> <img src="{{ asset('backend/images/avatar/black-afro.png') }}" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>

                    @endif

                    <div class="flex-1">
                        <a href="" class="text-black font-medium inline-block dark:text-white"> {{ $comment->user->name }} </a>
                        <p class="mt-0.5">{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                    <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180 md hydrated" role="img" aria-label="chevron down outline"></ion-icon>
                    No comments yet.
                </button>
                @endif


                <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                    <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180 md hydrated" role="img" aria-label="chevron down outline"></ion-icon>
                    More Comment
                </button>

            </div>
            @else
            <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">
                <div class="spinner size-7 animate-spin rounded-full border-[3px] border-slate-500 border-r-transparent dark:border-navy-300 dark:border-r-transparent"> </div>
                <p>No comments yet.</p>
            </div>
            @endif

            <!-- add comment -->
            <form action="{{ route('smme.community-comments.store', ['prefix' => 'admin', 'postId' => $post->id]) }}" method="POST">
                @csrf
                <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                    <img src="{{ $profileImage ? asset('profile_pictures/' . $profileImage) : asset('backend/images/avatar/black-afro.png') }}" alt="" class="w-6 h-6 rounded-full">


                    <div class="flex-1 relative overflow-hidden h-10">

                        <input class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text" name="content" placeholder="Add a comment..." value="{{ old('content') }}">


                        {{-- <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent" aria-haspopup="true" aria-expanded="false"></textarea> --}}
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="!top-2 pr-2 uk-drop" uk-drop="pos: bottom-right; mode: click">


                            <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600" style="opacity: 0;">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600" style="opacity: 0;">
                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z"></path>
                                </svg>
                            </div>
                        </div>




                    </div>


                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Reply</button>

                </div>
            </form>

        </div>
        <br>
        <br>
        @endforeach
        @endif


    </div>
    <div class="col-span-12 py-6 lg:sticky lg:bottom-0 lg:col-span-4 lg:self-end">
        <div class="flex-1">

            <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6 uk-sticky uk-active uk-sticky-fixed" uk-sticky="media: 1024; end: #js-oversized; offset: 80" style="position: fixed; top: 80px; width: 321px;">

                <div class="box p-5 px-6">

                    <div class="flex items-baseline justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> People you may know </h3>
                        <a href="#" class="text-sm text-blue-500">See all</a>
                    </div>

                    <div class="side-list">

                        <div class="side-list-item">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="side-list-image rounded-full">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="side-list-title"> John Michael </h4>
                                </a>
                                <div class="side-list-info"> 125k Following </div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>

                        <div class="side-list-item">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-3.jpg" alt="" class="side-list-image rounded-full">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="side-list-title"> Monroe Parker </h4>
                                </a>
                                <div class="side-list-info"> 320k Following </div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>

                        <div class="side-list-item">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="side-list-image rounded-full">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="side-list-title"> James Lewis</h4>
                                </a>
                                <div class="side-list-info"> 125k Following </div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>

                        <div class="side-list-item">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-6.jpg" alt="" class="side-list-image rounded-full">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="side-list-title"> Alexa stella </h4>
                                </a>
                                <div class="side-list-info"> 192k Following </div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>

                        <div class="side-list-item">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="side-list-image rounded-full">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="side-list-title"> John Michael </h4>
                                </a>
                                <div class="side-list-info"> 320k Following </div>
                            </div>
                            <button class="button bg-primary-soft text-primary dark:text-white">follow</button>
                        </div>

                        <button class="bg-secondery button w-full mt-2 hidden">See all</button>

                    </div>

                </div>

                <!-- peaple you might know -->
                <div class="box p-5 px-6 border1 dark:bg-dark2 hidden">

                    <div class="flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> Peaple You might know </h3>
                        <button type="button">
                            <ion-icon name="sync-outline" class="text-xl md hydrated" role="img" aria-label="sync outline"></ion-icon>
                        </button>
                    </div>

                    <div class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80">

                        <div class="flex items-center gap-3">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-7.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="font-semibold text-sm text-black dark:text-white"> Johnson smith</h4>
                                </a>
                                <div class="mt-0.5"> Suggested For You </div>
                            </div>
                            <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="font-semibold text-sm text-black dark:text-white"> James Lewis</h4>
                                </a>
                                <div class="mt-0.5"> Followed by Johnson </div>
                            </div>
                            <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="font-semibold text-sm text-black dark:text-white"> John Michael</h4>
                                </a>
                                <div class="mt-0.5"> Followed by Monroe </div>
                            </div>
                            <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-3.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="font-semibold text-sm text-black dark:text-white"> Monroe Parker</h4>
                                </a>
                                <div class="mt-0.5"> Suggested For You </div>
                            </div>
                            <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="timeline.html">
                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1">
                                <a href="timeline.html">
                                    <h4 class="font-semibold text-sm text-black dark:text-white"> Martin Gray</h4>
                                </a>
                                <div class="mt-0.5"> Suggested For You </div>
                            </div>
                            <button type="button" class="text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Follow </button>
                        </div>
                    </div>

                </div>


                <!-- latest marketplace items -->
                <div class="box p-5 px-6 border1 dark:bg-dark2">

                    <div class="flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> Marketplace </h3>
                        <button type="button">
                            <ion-icon name="sync-outline" class="text-xl md hydrated" role="img" aria-label="sync outline"></ion-icon>
                        </button>
                    </div>

                    <div class="relative capitalize font-medium text-sm text-center mt-4 mb-2 uk-slider" tabindex="-1" uk-slider="autoplay: true;finite: true">

                        <div class="overflow-hidden uk-slider-container">

                            <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]" style="transform: translate3d(-139.7px, 0px, 0px);">

                                <li class="w-1/2 pr-2" tabindex="-1">

                                    <a href="#">
                                        <div class="relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="assets/images/product/product-1.jpg" alt="" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $12 </div>
                                        </div>
                                        <div class="mt-3 w-full"> Chill Lotion </div>
                                    </a>
                                </li>
                                <li class="w-1/2 pr-2 uk-active" tabindex="-1">

                                    <a href="#">
                                        <div class="relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="assets/images/product/product-3.jpg" alt="" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $18 </div>
                                        </div>
                                        <div class="mt-3 w-full"> Gaming mouse </div>
                                    </a>

                                </li>
                                <li class="w-1/2 pr-2 uk-active" tabindex="-1">

                                    <a href="#">
                                        <div class="relative overflow-hidden rounded-lg">
                                            <div class="relative w-full h-40">
                                                <img src="assets/images/product/product-5.jpg" alt="" class="object-cover w-full h-full inset-0">
                                            </div>
                                            <div class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60"> $12 </div>
                                        </div>
                                        <div class="mt-3 w-full"> Herbal Shampoo </div>
                                    </a>

                                </li>

                            </ul>

                            <button type="button" class="absolute bg-white rounded-full top-16 -left-4 grid w-9 h-9 place-items-center shadow dark:bg-dark3" uk-slider-item="previous">
                                <ion-icon name="chevron-back" class="text-2xl md hydrated" role="img" aria-label="chevron back"></ion-icon>
                            </button>
                            <button type="button" class="absolute -right-4 bg-white rounded-full top-16 grid w-9 h-9 place-items-center shadow dark:bg-dark3 uk-invisible" uk-slider-item="next">
                                <ion-icon name="chevron-forward" class="text-2xl md hydrated" role="img" aria-label="chevron forward"></ion-icon>
                            </button>

                        </div>

                    </div>


                </div>

                <!-- online friends -->
                <div class="box p-5 px-6 border1 dark:bg-dark2">

                    <div class="flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> Online Friends </h3>
                        <button type="button">
                            <ion-icon name="sync-outline" class="text-xl md hydrated" role="img" aria-label="sync outline"></ion-icon>
                        </button>
                    </div>

                    <div class="grid grid-cols-6 gap-3 mt-4">

                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-6.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>
                        <a href="timeline.html">
                            <div class="w-10 h-10 relative">
                                <img src="assets/images/avatars/avatar-7.jpg" alt="" class="w-full h-full absolute inset-0 rounded-full">
                                <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2"></div>
                            </div>
                        </a>

                    </div>


                </div>

                <!-- Pro Members -->
                <div class="box p-5 px-6 border1 dark:bg-dark2">

                    <div class="flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> SMME Groups </h3>
                    </div>

                    <div class="relative capitalize font-normal text-sm mt-4 mb-2 uk-slider" tabindex="-1" uk-slider="autoplay: true;finite: true">

                        <div class="overflow-hidden uk-slider-container">

                            <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]" style="transform: translate3d(-139.7px, 0px, 0px);">

                                <li class="w-1/2 pr-2" tabindex="-1">
                                    <a href="timeline.html">
                                    </a>
                                    <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1"><a href="timeline.html">
                                        </a><a href="timeline.html">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="assets/images/avatars/avatar-5.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="timeline.html">
                                                <h5 class="font-semibold"> Martin Gray</h5>
                                            </a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium"> 12K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                                        </div>
                                    </div>

                                </li>
                                <li class="w-1/2 pr-2 uk-active" tabindex="-1">
                                    <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                        <a href="timeline.html">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="timeline.html">
                                                <h5 class="font-semibold"> Alexa Park</h5>
                                            </a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium"> 12K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="w-1/2 pr-2 uk-active" tabindex="-1">
                                    <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                        <a href="timeline.html">
                                            <div class="relative w-16 h-16 mx-auto mt-2">
                                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="h-full object-cover rounded-full shadow w-full">
                                            </div>
                                        </a>
                                        <div class="mt-5 text-center w-full">
                                            <a href="timeline.html">
                                                <h5 class="font-semibold"> James Lewis</h5>
                                            </a>
                                            <div class="text-xs text-gray-400 mt-0.5 font-medium"> 15K Followers</div>
                                            <button type="button" class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1"> Follow </button>
                                        </div>
                                    </div>
                                </li>


                            </ul>

                            <button type="button" class="absolute -translate-y-1/2 bg-slate-100 rounded-full top-1/2 -left-4 grid w-9 h-9 place-items-center dark:bg-dark3" uk-slider-item="previous">
                                <ion-icon name="chevron-back" class="text-2xl md hydrated" role="img" aria-label="chevron back"></ion-icon>
                            </button>
                            <button type="button" class="absolute -right-4 -translate-y-1/2 bg-slate-100 rounded-full top-1/2 grid w-9 h-9 place-items-center dark:bg-dark3 uk-invisible" uk-slider-item="next">
                                <ion-icon name="chevron-forward" class="text-2xl md hydrated" role="img" aria-label="chevron forward"></ion-icon>
                            </button>

                        </div>

                    </div>


                </div>

                <!-- Trends -->
                <div class="box p-5 px-6 border1 dark:bg-dark2">

                    <div class="flex justify-between text-black dark:text-white">
                        <h3 class="font-bold text-base"> Trends for you </h3>
                        <button type="button">
                            <ion-icon name="sync-outline" class="text-xl md hydrated" role="img" aria-label="sync outline"></ion-icon>
                        </button>
                    </div>

                    <div class="space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                        <a href="#">
                            <div class="flex items-center gap-3 p">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> artificial intelligence </h4>
                                    <div class="mt-0.5"> 1,245,62 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> Web developers</h4>
                                    <div class="mt-0.5"> 1,624 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> Ui Designers</h4>
                                    <div class="mt-0.5"> 820 post </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                                </svg>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-black dark:text-white text-sm"> affiliate marketing </h4>
                                    <div class="mt-0.5"> 480 post </div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>

            </div>
            <div class="uk-sticky-placeholder" style="height: 1428.8px; width: 321px; margin: 0px;"></div>
        </div>

    </div>
</div>



<div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto" id="js-oversized">

    <div class="max-w-[680px] mx-auto">

        <!-- stories -->



        <!-- feed story -->
        <div class="md:max-w-[580px] mx-auto flex-1 xl:space-y-6 space-y-3 ">

            <!-- add story -->






        </div>

    </div>



</div>



<style>
    @media (min-width: 1024px) {
        .lg\:flex {
            display: flex;
        }
    }

    .gap-12 {
        gap: 3rem;
    }

    .max-w-\[1065px\] {
        max-width: 1065px;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .max-w-\[680px\] {
        max-width: 680px;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .mb-8 {
        margin-bottom: 2rem;
    }

    .text-black {
        --tw-text-opacity: 1;
        color: rgb(0 0 0 / 1 !important);
    }

    .font-extrabold {
        font-weight: 800;
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .hidden {
        display: none;
    }

    /*  Prevent tab highlighting on iOS. */
    .uk-slider,
    .uk-slideshow {
        -webkit-tap-highlight-color: transparent;
    }

    .uk-slider-items,
    .uk-slideshow-items {
        touch-action: pan-y;
    }

    /*  Prevent displaying the callout information on iOS.*/
    .uk-slider-items,
    .uk-slideshow-items {
        -webkit-touch-callout: none;
    }

    @media (min-width: 1024px) {
        .lg\:visible {
            visibility: visible;
        }

        .lg\:\!top-24 {
            top: 6rem !important;
        }

        .lg\:order-1 {
            order: 1;
        }

        .lg\:order-2 {
            order: 2;
        }

        .lg\:col-span-3 {
            grid-column: span 3 / span 3;
        }

        .lg\:my-0 {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .lg\:-mt-10 {
            margin-top: -2.5rem;
        }

        .lg\:-mt-48 {
            margin-top: -12rem;
        }

        .lg\:mb-5 {
            margin-bottom: 1.25rem;
        }

        .lg\:mt-1 {
            margin-top: 0.25rem;
        }

        .lg\:mt-10 {
            margin-top: 2.5rem;
        }

        .lg\:mt-12 {
            margin-top: 3rem;
        }

        .lg\:mt-2 {
            margin-top: 0.5rem;
        }

        .lg\:mt-20 {
            margin-top: 5rem;
        }

        .lg\:mt-36 {
            margin-top: 9rem;
        }

        .lg\:line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .lg\:block {
            display: block;
        }

        .lg\:inline-block {
            display: inline-block;
        }

        .lg\:flex {
            display: flex;
        }

        .lg\:hidden {
            display: none;
        }

        .lg\:\!h-\[460px\] {
            height: 460px !important;
        }

        .lg\:h-48 {
            height: 12rem;
        }

        .lg\:h-60 {
            height: 15rem;
        }

        .lg\:h-72 {
            height: 18rem;
        }

        .lg\:h-80 {
            height: 20rem;
        }

        .lg\:h-96 {
            height: 24rem;
        }

        .lg\:h-\[80px\] {
            height: 80px;
        }

        .lg\:h-\[80vh\] {
            height: 80vh;
        }

        .lg\:h-\[85vh\] {
            height: 85vh;
        }

        .lg\:h-\[calc\(100vh-141px\)\] {
            height: calc(100vh - 141px);
        }

        .lg\:h-\[calc\(100vh-180px\)\] {
            height: calc(100vh - 180px);
        }

        .lg\:h-full {
            height: 100%;
        }

        .lg\:w-1\/2 {
            width: 50%;
        }

        .lg\:w-1\/3 {
            width: 33.333333%;
        }

        .lg\:w-1\/4 {
            width: 25%;
        }

        .lg\:w-1\/5 {
            width: 20%;
        }

        .lg\:w-48 {
            width: 12rem;
        }

        .lg\:w-64 {
            width: 16rem;
        }

        .lg\:w-80 {
            width: 20rem;
        }

        .lg\:w-\[--w-side-sm\] {
            width: var(--w-side-sm);
        }

        .lg\:w-\[130px\] {
            width: 130px;
        }

        .lg\:w-\[330px\] {
            width: 330px;
        }

        .lg\:w-\[350px\] {
            width: 350px;
        }

        .lg\:w-\[400px\] {
            width: 400px;
        }

        .lg\:w-\[580px\] {
            width: 580px;
        }

        .lg\:w-\[600px\] {
            width: 600px;
        }

        .lg\:w-\[694px\] {
            width: 694px;
        }

        .lg\:w-\[calc\(100vw-320px\)\] {
            width: calc(100vw - 320px);
        }

        .lg\:w-\[calc\(100vw-400px\)\] {
            width: calc(100vw - 400px);
        }

        .lg\:max-w-\[680px\] {
            max-width: 680px;
        }

        .lg\:max-w-sm {
            max-width: 24rem;
        }

        .lg\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .lg\:grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .lg\:flex-row {
            flex-direction: row;
        }

        .lg\:items-end {
            align-items: flex-end;
        }

        .lg\:items-center {
            align-items: center;
        }

        .lg\:justify-between {
            justify-content: space-between;
        }

        .lg\:gap-1 {
            gap: 0.25rem;
        }

        .lg\:gap-10 {
            gap: 2.5rem;
        }

        .lg\:space-y-0> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0px * var(--tw-space-y-reverse));
        }

        .lg\:space-y-4> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1rem * var(--tw-space-y-reverse));
        }

        .lg\:space-y-6> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
        }

        .lg\:space-y-8> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(2rem * var(--tw-space-y-reverse));
        }

        .lg\:overflow-hidden {
            overflow: hidden;
        }

        .lg\:rounded-xl {
            border-radius: 0.75rem;
        }

        .lg\:rounded-b-2xl {
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        .lg\:border-4 {
            border-width: 4px;
        }

        .lg\:p-10 {
            padding: 2.5rem;
        }

        .lg\:p-12 {
            padding: 3rem;
        }

        .lg\:p-20 {
            padding: 5rem;
        }

        .lg\:p-5 {
            padding: 1.25rem;
        }

        .lg\:px-10 {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .lg\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .lg\:py-1\.5 {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
        }

        .lg\:py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .lg\:py-20 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .lg\:py-32 {
            padding-top: 8rem;
            padding-bottom: 8rem;
        }

        .lg\:py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .lg\:py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .lg\:pb-3 {
            padding-bottom: 0.75rem;
        }

        .lg\:pb-8 {
            padding-bottom: 2rem;
        }

        .lg\:pl-80 {
            padding-left: 20rem;
        }

        .lg\:pl-\[10\.5rem\] {
            padding-left: 10.5rem;
        }

        .lg\:pt-8 {
            padding-top: 2rem;
        }

        .lg\:text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .lg\:text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .lg\:text-5xl {
            font-size: 3rem;
            line-height: 1;
        }

        .lg\:text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .lg\:text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .lg\:font-bold {
            font-weight: 700;
        }
    }

    .py-5 {
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }

    .uk-slider {
        position: relative;
    }

    .uk-slider-items {
        position: relative;
        margin: 0px !important;
        display: flex;
        --tw-pan-y: pan-y;
        touch-action: var(--tw-pan-x) var(--tw-pan-y) var(--tw-pinch-zoom);
        list-style-type: none;
        padding: 0px !important;
        will-change: transform;
    }

    .uk-slider-items>* {
        position: relative;
        max-width: 100%;
        flex: none;
    }

    .uk-slider-container {
        overflow: hidden;
    }

    .uk-slideshow-items {
        position: relative;
        z-index: 0;
        margin: 0px !important;
        --tw-pan-y: pan-y;
        touch-action: var(--tw-pan-x) var(--tw-pan-y) var(--tw-pinch-zoom);
        list-style-type: none;
        overflow: hidden;
        padding: 0px !important;
    }

    .uk-slideshow-items>* {
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        overflow: hidden;
    }

    .uk-slideshow-items> :not(.uk-active) {
        display: none;
    }


    .uk-slider-items.grid-small {
        width: calc(100% + 0.3rem);
    }

    @media (min-width: 1024px) {
        .uk-slider-items.grid-small {
            width: calc(100% + 0.5rem);
        }
    }

    .uk-slider-items.grid-small>* {
        padding-right: 0.3rem;
    }

    @media (min-width: 1024px) {
        .uk-slider-items.grid-small>* {
            padding-right: 0.5rem;
        }
    }

    .w-\[calc\(100\%\+14px\)\] {
        width: calc(100% + 14px);
    }

    @media (min-width: 768px) {
        .md\:w-16 {
            width: 4rem;
        }
    }

    @media (min-width: 768px) {
        .md\:h-16 {
            height: 4rem;
        }
    }

    .bg-slate-200 {
        --tw-bg-opacity: 1;
        background-color: rgb(226 232 240 / var(--tw-bg-opacity));
    }

    .border-slate-300 {
        --tw-border-opacity: 1;
        border-color: rgb(203 213 225 / var(--tw-border-opacity));
    }

    .border-dashed {
        border-style: dashed;
    }

    .border-2 {
        border-width: 2px;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .place-items-center {
        place-items: center;
    }

    .shrink-0 {
        flex-shrink: 0;
    }

    .w-12 {
        width: 3rem;
    }

    .h-12 {
        height: 3rem;
    }

    .grid {
        display: grid;
    }

    .relative {
        position: relative;
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .hydrated {
        visibility: inherit;
    }

    ion-icon {
        visibility: hidden;
    }

    .icon-inner,
    .ionicon,
    svg {
        display: block;
        height: 100%;
        width: 100%;
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    @media (min-width: 768px) {
        .md\:pr-3 {
            padding-right: 0.75rem;
        }
    }

    .duration-300 {
        transition-duration: 300ms;
    }

    .pr-2 {
        padding-right: 0.5rem;
    }

    @media (min-width: 768px) {
        .md\:border-4 {
            border-width: 4px;
        }
    }

    @media (min-width: 768px) {
        .md\:w-16 {
            width: 4rem;
        }
    }

    @media (min-width: 768px) {
        .md\:h-16 {
            height: 4rem;
        }
    }

    .shadow {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .border-white {
        --tw-border-opacity: 1;
        border-color: rgb(255 255 255 / var(--tw-border-opacity));
    }

    .border-2 {
        border-width: 2px;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .w-12 {
        width: 3rem;
    }

    .h-12 {
        height: 3rem;
    }

    .relative {
        position: relative;
    }

    object-cover {
        -o-object-fit: cover;
        object-fit: cover;
    }

    .w-full {
        width: 100%;
    }

    .h-full {
        height: 100%;
    }

    .absolute {
        position: absolute;
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .place-items-center {
        place-items: center;
    }

    .-translate-y-1\/2 {
        --tw-translate-y: -50%;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .w-8 {
        width: 2rem;
    }

    .h-8 {
        height: 2rem;
    }

    .grid {
        display: grid;
    }

    .top-1\/2 {
        top: 50%;
    }

    .-left-3\.5 {
        left: -0.875rem;
    }

    .absolute {
        position: absolute;
    }

    .uk-invisible {
        display: none !important;
    }

    @media not all and (min-width: 768px) {
        .max-md\:fixed {
            position: fixed;
        }

        .max-md\:left-0 {
            left: 0px;
        }

        .max-md\:top-0 {
            top: 0px;
        }

        .max-md\:z-10 {
            z-index: 10;
        }

        .max-md\:my-20 {
            margin-top: 5rem;
            margin-bottom: 5rem;
        }

        .max-md\:mt-3 {
            margin-top: 0.75rem;
        }

        .max-md\:mt-4 {
            margin-top: 1rem;
        }

        .max-md\:mt-5 {
            margin-top: 1.25rem;
        }

        .max-md\:block {
            display: block;
        }

        .max-md\:flex {
            display: flex;
        }

        .max-md\:\!hidden {
            display: none !important;
        }

        .max-md\:hidden {
            display: none;
        }

        .max-md\:h-screen {
            height: 100vh;
        }

        .max-md\:w-24 {
            width: 6rem;
        }

        .max-md\:w-5\/6 {
            width: 83.333333%;
        }

        .max-md\:w-full {
            width: 100%;
        }

        .max-md\:flex-1 {
            flex: 1 1 0%;
        }

        .max-md\:-translate-x-full {
            --tw-translate-x: -100%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .max-md\:flex-col {
            flex-direction: column;
        }

        .max-md\:items-center {
            align-items: center;
        }

        .max-md\:gap-3 {
            gap: 0.75rem;
        }

        .max-md\:space-y-3> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
        }

        .max-md\:overflow-x-auto {
            overflow-x: auto;
        }

        .max-md\:border-t {
            border-top-width: 1px;
        }

        .max-md\:bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .max-md\:p-5 {
            padding: 1.25rem;
        }

        .max-md\:p-8 {
            padding: 2rem;
        }

        .max-md\:pt-0 {
            padding-top: 0px;
        }

        .max-md\:pt-14 {
            padding-top: 3.5rem;
        }

        .max-md\:pt-2 {
            padding-top: 0.5rem;
        }

        .max-md\:shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .max-md\:shadow-md {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }
    }

    .icon-inner,
    .ionicon,
    svg {
        display: block;
        height: 100%;
        width: 100%;
    }

    :host .ionicon {
        stroke: currentcolor;
    }

    .icon-inner,
    .ionicon,
    svg {
        display: block;
        height: 100%;
        width: 100%;
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    }

    .bg-white\/10 {
        background-color: rgb(255 255 255 / 0.1);
    }

    .bg-white\/20 {
        background-color: rgb(255 255 255 / 0.2);
    }

    .bg-white\/60 {
        background-color: rgb(255 255 255 / 0.6);
    }

    .bg-white\/80 {
        background-color: rgb(255 255 255 / 0.8);
    }

    .bg-white\/95 {
        background-color: rgb(255 255 255 / 0.95);
    }

    @media (min-width: 768px) {
        .md\:max-w-\[580px\] {
            max-width: 680px;
        }
    }

    .flex-1 {
        flex: 1 1 0%;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    @media (min-width: 768px) {
        .md\:p-4 {
            padding: 1rem;
        }
    }

    .shadow-sm {
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .font-medium {
        font-weight: 500;
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .p-2 {
        padding: 0.5rem;
    }

    @media (min-width: 640px) {
        .sm\:p-4 {
            padding: 1rem;
        }
    }

    .flex-1 {
        flex: 1 1 0%;
    }

    .w-\[245px\] {
        width: 245px;
    }

    .uk-dropdown {
        position: absolute;
        z-index: 1020;
        display: none;
        width: 13rem;
        max-width: 200px;
        border-radius: 0.5rem;
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(243 244 246 / var(--tw-border-opacity));
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        padding: 0.5rem;
        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .p-2\.5 {
        padding: 0.625rem;
    }

    .-mr-1 {
        margin-right: -0.25rem;
    }

    .text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem;
    }

    .gap-3 {
        gap: 0.75rem;
    }

    @media (min-width: 1280px) {
        .xl\:space-y-6> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem* calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem* var(--tw-space-y-reverse));
        }
    }

    .space-y-3> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0.75rem* calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0.75rem* var(--tw-space-y-reverse));
    }

    .shadow-sm {
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .font-medium {
        font-weight: 500;
    }

    /* switcher tabs */

    .uk-switcher> :not(.uk-active) {
        display: none;
    }

    /*slider tab*/

    .uk-invisible {
        display: none !important;
    }

    /* tooltip */

    .uk-tooltip {
        position: absolute;
        top: 0px;
        z-index: 1050;
        display: none;
        max-width: 200px;
        border-radius: 0.375rem;
        background-color: rgb(30 41 59 / 0.8);
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.025em;
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity));
        --tw-backdrop-blur: blur(12px);
        -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
        backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
    }

    .uk-tooltip.uk-active {
        display: block;
    }

    /* drop */

    .uk-drop {
        position: absolute;
        z-index: 1020;
        display: none;
    }

    .uk-drop.uk-open {
        display: block !important;
    }

    /* dropdown */

    .uk-dropdown {
        position: absolute;
        z-index: 1020;
        display: none;
        width: 13rem;
        max-width: 200px;
        border-radius: 0.5rem;
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(243 244 246 / var(--tw-border-opacity));
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        padding: 0.5rem;
        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    @media (prefers-color-scheme: dark) {
        .uk-dropdown {
            --tw-bg-opacity: 1;
            background-color: rgb(30 41 59 / var(--tw-bg-opacity));
            border-color: rgb(51 65 85 / 0.4);
        }
    }

    .uk-dropdown.uk-open {
        display: block !important;
    }

    .uk-dropdown nav {
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 500;
        --tw-text-opacity: 1;
        color: rgb(51 65 85 / var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .uk-dropdown nav {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }
    }

    .uk-dropdown nav>a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-radius: 0.375rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0.625rem;
        padding-right: 0.625rem;
    }

    .uk-dropdown nav>a:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(var(--color-secondery) / var(--tw-bg-opacity));
    }

    .uk-dropdown nav>hr {
        margin-top: 0.375rem;
        margin-bottom: 0.375rem;
        margin-left: -0.5rem;
        margin-right: -0.5rem;
        --tw-border-opacity: 1;
        border-color: rgb(243 244 246 / var(--tw-border-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .uk-dropdown nav>hr {
            border-color: rgb(51 65 85 / 0.4);
        }
    }

</style>



<div class="hidden lg:p-20 max-lg:!items-start uk-modal" id="preview_modal" uk-modal="">

    <div class="uk-modal-dialog tt relative mx-auto overflow-hidden shadow-xl rounded-lg lg:flex items-center ax-w-[86rem] w-full lg:h-[80vh]">

        <!-- image previewer -->
        <div class="lg:h-full lg:w-[calc(100vw-400px)] w-full h-96 flex justify-center items-center relative">

            <div class="relative z-10 w-full h-full">
                <img src="assets/images/post/post-1.jpg" alt="" class="w-full h-full object-cover absolute">
            </div>

            <!-- close button -->
            <button type="button" class="bg-white rounded-full p-2 absolute right-0 top-0 m-3 uk-animation-slide-right-medium z-10 dark:bg-slate-600 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>

        <!-- right sidebar -->
        <div class="lg:w-[400px] w-full bg-white h-full relative  overflow-y-auto shadow-xl dark:bg-dark2 flex flex-col justify-between">

            <div class="p-5 pb-0">

                <!-- story heading -->
                <div class="flex gap-3 text-sm font-medium">
                    <img src="assets/images/avatars/avatar-5.jpg" alt="" class="w-9 h-9 rounded-full">
                    <div class="flex-1">
                        <h4 class="text-black font-medium dark:text-white"> Steeve </h4>
                        <div class="text-gray-500 text-xs dark:text-white/80"> 2 hours ago</div>
                    </div>

                    <!-- dropdown -->
                    <div class="-m-1">
                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false">
                            <ion-icon class="text-xl md hydrated" name="ellipsis-horizontal" role="img" aria-label="ellipsis horizontal"></ion-icon>
                        </button>
                        <div class="w-[253px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true">
                            <nav>
                                <a href="#">
                                    <ion-icon class="text-xl shrink-0 md hydrated" name="bookmark-outline" role="img" aria-label="bookmark outline"></ion-icon> Add to favorites
                                </a>
                                <a href="#">
                                    <ion-icon class="text-xl shrink-0 md hydrated" name="notifications-off-outline" role="img" aria-label="notifications off outline"></ion-icon> Mute Notification
                                </a>
                                <a href="#">
                                    <ion-icon class="text-xl shrink-0 md hydrated" name="flag-outline" role="img" aria-label="flag outline"></ion-icon> Report this post
                                </a>
                                <a href="#">
                                    <ion-icon class="text-xl shrink-0 md hydrated" name="share-outline" role="img" aria-label="share outline"></ion-icon> Share your profile
                                </a>
                                <hr>
                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                    <ion-icon class="text-xl shrink-0 md hydrated" name="stop-circle-outline" role="img" aria-label="stop circle outline"></ion-icon> Unfollow
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <p class="font-normal text-sm leading-6 mt-4"> Photography is the art of capturing light with a camera. it can be fun, challenging. It can also be a hobby, a passion. 📷 </p>

                <div class="shadow relative -mx-5 px-5 py-3 mt-3">
                    <div class="flex items-center gap-4 text-xs font-semibold">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700">
                                <ion-icon class="text-lg md hydrated" name="heart" role="img" aria-label="heart"></ion-icon>
                            </button>
                            <a href="#">1,300</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" class="button__ico bg-slate-100 dark:bg-slate-700">
                                <ion-icon class="text-lg md hydrated" name="chatbubble-ellipses" role="img" aria-label="chatbubble ellipses"></ion-icon>
                            </button>
                            <span>260</span>
                        </div>
                        <button type="button" class="button__ico ml-auto">
                            <ion-icon class="text-xl md hydrated" name="share-outline" role="img" aria-label="share outline"></ion-icon>
                        </button>
                        <button type="button" class="button__ico">
                            <ion-icon class="text-xl md hydrated" name="bookmark-outline" role="img" aria-label="bookmark outline"></ion-icon>
                        </button>
                    </div>
                </div>

            </div>

            <div class="p-5 h-full overflow-y-auto flex-1">

                <!-- comment list -->
                <div class="relative text-sm font-medium space-y-5">

                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                            <p class="mt-0.5">What a beautiful, I love it. 😍 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                            <p class="mt-0.5"> You captured the moment.😎 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Alexa </a>
                            <p class="mt-0.5"> This photo is amazing! </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> John </a>
                            <p class="mt-0.5"> Wow, You are so talented 😍 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Michael </a>
                            <p class="mt-0.5"> I love taking photos 🌳🐶</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                            <p class="mt-0.5"> Awesome. 😊😢 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Jesse </a>
                            <p class="mt-0.5"> Well done 🎨📸 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                            <p class="mt-0.5">What a beautiful, I love it. 😍 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Alexa </a>
                            <p class="mt-0.5"> This photo is amazing! </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> John </a>
                            <p class="mt-0.5"> Wow, You are so talented 😍 </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Michael </a>
                            <p class="mt-0.5"> I love taking photos 🌳🐶</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 relative">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full">
                        <div class="flex-1">
                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                            <p class="mt-0.5"> Awesome. 😊😢 </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="bg-white p-3 text-sm font-medium flex items-center gap-2">

                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full">

                <div class="flex-1 relative overflow-hidden ">
                    <textarea placeholder="Add Comment...." rows="1" class="w-full resize-  px-4 py-2 focus:!border-transparent focus:!ring-transparent resize-y"></textarea>

                    <div class="flex items-center gap-2 absolute bottom-0.5 right-0 m-3">
                        <ion-icon class="text-xl flex text-blue-700 md hydrated" name="image" role="img" aria-label="image"></ion-icon>
                        <ion-icon class="text-xl flex text-yellow-500 md hydrated" name="happy" role="img" aria-label="happy"></ion-icon>
                    </div>

                </div>

                <button type="submit" class="hidden text-sm rounded-full py-1.5 px-4 font-semibold bg-secondery"> Replay</button>

            </div>

        </div>

    </div>

</div>

<div class="hidden lg:p-20 uk- open uk-modal" id="create-status" uk-modal="" style="" tabindex="-1">

    <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

        <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium text-black"> Create a Post </h2>

            <!-- close button -->
            <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>
        <form action="{{ route('smme.community-posts.store', ['prefix' => 'admin'])}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-5 mt-3 p-2">


                {{-- <div class="form-group">
                    <label class="btn border border-slate-300 font-medium text-slate-600 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        <input tabindex="-1" type="file" class="pointer-events-none absolute inset-0 h-full w-full opacity-0" id="post_image" name="post_image">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </label>
                </div> --}}

                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}">
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input type="file" name="post_image" id="post_image" class="form-control @error('post_image') is-invalid @enderror">
                    @error('post_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- <textarea class="form-control" id="content" name="content" rows="5" required></textarea> --}}


            </div>

            <div class="flex items-center gap-2 text-sm py-2 px-4 font-medium flex-wrap">
                <button type="button" class="flex items-center gap-1.5 bg-sky-50 text-sky-600 rounded-full py-1 px-2 border-2 border-sky-100 dark:bg-sky-950 dark:border-sky-900">
                    <ion-icon name="image" class="text-base md hydrated" role="img" aria-label="image"></ion-icon>
                    Image
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-teal-50 text-teal-600 rounded-full py-1 px-2 border-2 border-teal-100 dark:bg-teal-950 dark:border-teal-900">
                    <ion-icon name="videocam" class="text-base md hydrated" role="img" aria-label="videocam"></ion-icon>
                    Video
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-orange-50 text-orange-600 rounded-full py-1 px-2 border-2 border-orange-100 dark:bg-yellow-950 dark:border-yellow-900">
                    <ion-icon name="happy" class="text-base md hydrated" role="img" aria-label="happy"></ion-icon>
                    Feeling
                </button>
                <button type="button" class="flex items-center gap-1.5 bg-red-50 text-red-600 rounded-full py-1 px-2 border-2 border-rose-100 dark:bg-rose-950 dark:border-rose-900">
                    <ion-icon name="location" class="text-base md hydrated" role="img" aria-label="location"></ion-icon>
                    Check in
                </button>
                <button type="button" class="grid place-items-center w-8 h-8 text-xl rounded-full bg-secondery">
                    <ion-icon name="ellipsis-horizontal" role="img" class="md hydrated" aria-label="ellipsis horizontal"></ion-icon>
                </button>
            </div>

            <div class="p-5 flex justify-between items-center">
                <div>
                    <button class="inline-flex items-center py-1 px-2.5 gap-1 font-medium text-sm rounded-full bg-slate-50 border-2 border-slate-100 group aria-expanded:bg-slate-100 aria-expanded: dark:text-white dark:bg-slate-700 dark:border-slate-600" type="button" aria-haspopup="true" aria-expanded="false">
                        Everyone
                        <ion-icon name="chevron-down-outline" class="text-base duration-500 group-aria-expanded:rotate-180 md hydrated" role="img" aria-label="chevron down outline"></ion-icon>
                    </button>

                    <div class="p-2 bg-white rounded-lg shadow-lg text-black font-medium border border-slate-100 w-60 dark:bg-slate-700 uk-drop" uk-drop="offset:10;pos: bottom-left; reveal-left;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-bottom-left ; mode:click">
                        {{--
                        <form>
                            <label>
                                <input type="radio" name="radio-status" id="monthly1" class="peer appearance-none hidden" checked="">
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&amp;_.active]:block dark:bg-dark3">
                                    <div class="text-sm"> Everyone </div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up md hydrated" role="img" aria-label="checkmark circle"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" id="monthly1" class="peer appearance-none hidden">
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&amp;_.active]:block dark:bg-dark3">
                                    <div class="text-sm"> Friends </div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up md hydrated" role="img" aria-label="checkmark circle"></ion-icon>
                                </div>
                            </label>
                            <label>
                                <input type="radio" name="radio-status" id="monthly" class="peer appearance-none hidden">
                                <div class=" relative flex items-center justify-between cursor-pointer rounded-md p-2 px-3 hover:bg-secondery peer-checked:[&amp;_.active]:block dark:bg-dark3">
                                    <div class="text-sm"> Only me </div>
                                    <ion-icon name="checkmark-circle" class="hidden active absolute -translate-y-1/2 right-2 text-2xl text-blue-600 uk-animation-scale-up md hydrated" role="img" aria-label="checkmark circle"></ion-icon>
                                </div>
                            </label>
                        </form> --}}

                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="button bg-blue-500 text-white py-2 px-12 text-[14px]"> Create</button>
                </div>
            </div>
        </form>



    </div>

</div>

<div class="hidden lg:p-20 uk-modal" id="create-story" uk-modal="" style="" tabindex="-1">

    <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white p-7 shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

        <div class="text-center py-3 border-b -m-7 mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium"> Create Status </h2>

            <!-- close button -->
            <button type="button" class="button__ico absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>

        <div class="space-y-5 mt-7">

            <form method="POST" action="{{ route('smme.yowza-community-stories.store', ['prefix' => 'admin']) }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="caption" class="text-base">What do you have in mind?</label>
                    <input type="text" id="caption" name="caption" class="w-full mt-3">
                </div>

                <div>
                    <div class="w-full h-72 relative border-1 rounded-lg overflow-hidden bg-[url('../images/ad_pattern.png')] bg-repeat">
                        <label for="image" class="flex flex-col justify-center items-center absolute -translate-x-1/2 left-1/2 bottom-0 z-10 w-full pb-6 pt-10 cursor-pointer bg-gradient-to-t from-gray-700/60">
                            <input id="image" name="image" type="file" class="hidden">
                            <ion-icon name="image" class="text-3xl text-teal-600 md hydrated" role="img" aria-label="image"></ion-icon>
                            <span class="text-white mt-2">Browse to Upload image</span>
                        </label>
                        <img id="createStatusImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;" class="w-full h-full absolute object-cover">
                    </div>
                </div>

                <br>

                <div class="flex justify-between items-center">
                    <div class="flex items-start gap-2">
                        <ion-icon name="time-outline" class="text-3xl text-sky-600 rounded-full bg-blue-50 dark:bg-transparent md hydrated" role="img" aria-label="time outline"></ion-icon>
                        <p class="text-sm text-gray-500 font-medium"> Your Status will be available for <span class="text-gray-800">24 Hours</span> </p>
                    </div>

                    <button type="submit" class="button bg-blue-500 text-white px-8">Create</button>
                </div>

            </form>

        </div>

    </div>

</div>



<link rel="stylesheet" href="{{ asset('backend/assets/css/styles.css')}}">
{{-- <link rel="stylesheet" href="https://demo.foxthemes.net/socialite-v3.0/assets/css/style.css"> --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }

    // Whenever the user explicitly chooses light mode
    localStorage.theme = 'light'

    // Whenever the user explicitly chooses dark mode
    localStorage.theme = 'dark'

    // Whenever the user explicitly chooses to respect the OS preference
    localStorage.removeItem('theme')



    // add post upload image 
    document.getElementById('addPostUrl').addEventListener('change', function() {
        if (this.files[0]) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
                document.getElementById('addPostImage').setAttribute('src', event.target.result);
                document.getElementById('addPostImage').style.display = 'block';
            });
        }
    });


    // Create Status upload image 
    document.getElementById('createStatusUrl').addEventListener('change', function() {
        if (this.files[0]) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
                document.getElementById('createStatusImage').setAttribute('src', event.target.result);
                document.getElementById('createStatusImage').style.display = 'block';
            });
        }
    });


    // create product upload image
    document.getElementById('createProductUrl').addEventListener('change', function() {
        if (this.files[0]) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
                document.getElementById('createProductImage').setAttribute('src', event.target.result);
                document.getElementById('createProductImage').style.display = 'block';
            });
        }
    });

</script>

<script>
    /**
     * SimpleBar.js - v3.1.3
     * Scrollbars, simpler.
     * https://grsmto.github.io/simplebar/
     *
     * Made by Adrien Denat from a fork by Jonathan Nicol
     * Under MIT License
     */

    (function(global, factory) {
        typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
            typeof define === 'function' && define.amd ? define(factory) :
            (global = global || self, global.SimpleBar = factory());
    }(this, function() {
        'use strict';

        var _isObject = function(it) {
            return typeof it === 'object' ? it !== null : typeof it === 'function';
        };

        var _anObject = function(it) {
            if (!_isObject(it)) throw TypeError(it + ' is not an object!');
            return it;
        };

        // 7.2.1 RequireObjectCoercible(argument)
        var _defined = function(it) {
            if (it == undefined) throw TypeError("Can't call method on  " + it);
            return it;
        };

        // 7.1.13 ToObject(argument)

        var _toObject = function(it) {
            return Object(_defined(it));
        };

        // 7.1.4 ToInteger
        var ceil = Math.ceil;
        var floor = Math.floor;
        var _toInteger = function(it) {
            return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
        };

        // 7.1.15 ToLength

        var min = Math.min;
        var _toLength = function(it) {
            return it > 0 ? min(_toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
        };

        // true  -> String#at
        // false -> String#codePointAt
        var _stringAt = function(TO_STRING) {
            return function(that, pos) {
                var s = String(_defined(that));
                var i = _toInteger(pos);
                var l = s.length;
                var a, b;
                if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
                a = s.charCodeAt(i);
                return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff ?
                    TO_STRING ? s.charAt(i) : a :
                    TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
            };
        };

        var at = _stringAt(true);

        // `AdvanceStringIndex` abstract operation
        // https://tc39.github.io/ecma262/#sec-advancestringindex
        var _advanceStringIndex = function(S, index, unicode) {
            return index + (unicode ? at(S, index).length : 1);
        };

        var toString = {}.toString;

        var _cof = function(it) {
            return toString.call(it).slice(8, -1);
        };

        var commonjsGlobal = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : typeof self !== 'undefined' ? self : {};

        function createCommonjsModule(fn, module) {
            return module = {
                exports: {}
            }, fn(module, module.exports), module.exports;
        }

        var _core = createCommonjsModule(function(module) {
            var core = module.exports = {
                version: '2.6.2'
            };
            if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef
        });
        var _core_1 = _core.version;

        var _global = createCommonjsModule(function(module) {
            // https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
            var global = module.exports = typeof window != 'undefined' && window.Math == Math ?
                window : typeof self != 'undefined' && self.Math == Math ? self
                // eslint-disable-next-line no-new-func
                :
                Function('return this')();
            if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef
        });

        var _library = false;

        var _shared = createCommonjsModule(function(module) {
            var SHARED = '__core-js_shared__';
            var store = _global[SHARED] || (_global[SHARED] = {});

            (module.exports = function(key, value) {
                return store[key] || (store[key] = value !== undefined ? value : {});
            })('versions', []).push({
                version: _core.version
                , mode: _library ? 'pure' : 'global'
                , copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
            });
        });

        var id = 0;
        var px = Math.random();
        var _uid = function(key) {
            return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
        };

        var _wks = createCommonjsModule(function(module) {
            var store = _shared('wks');

            var Symbol = _global.Symbol;
            var USE_SYMBOL = typeof Symbol == 'function';

            var $exports = module.exports = function(name) {
                return store[name] || (store[name] =
                    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : _uid)('Symbol.' + name));
            };

            $exports.store = store;
        });

        // getting tag from 19.1.3.6 Object.prototype.toString()

        var TAG = _wks('toStringTag');
        // ES3 wrong here
        var ARG = _cof(function() {
            return arguments;
        }()) == 'Arguments';

        // fallback for IE11 Script Access Denied error
        var tryGet = function(it, key) {
            try {
                return it[key];
            } catch (e) {
                /* empty */
            }
        };

        var _classof = function(it) {
            var O, T, B;
            return it === undefined ? 'Undefined' : it === null ? 'Null'
                // @@toStringTag case
                :
                typeof(T = tryGet(O = Object(it), TAG)) == 'string' ? T
                // builtinTag case
                :
                ARG ? _cof(O)
                // ES3 arguments fallback
                :
                (B = _cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
        };

        var builtinExec = RegExp.prototype.exec;

        // `RegExpExec` abstract operation
        // https://tc39.github.io/ecma262/#sec-regexpexec
        var _regexpExecAbstract = function(R, S) {
            var exec = R.exec;
            if (typeof exec === 'function') {
                var result = exec.call(R, S);
                if (typeof result !== 'object') {
                    throw new TypeError('RegExp exec method returned something other than an Object or null');
                }
                return result;
            }
            if (_classof(R) !== 'RegExp') {
                throw new TypeError('RegExp#exec called on incompatible receiver');
            }
            return builtinExec.call(R, S);
        };

        // 21.2.5.3 get RegExp.prototype.flags

        var _flags = function() {
            var that = _anObject(this);
            var result = '';
            if (that.global) result += 'g';
            if (that.ignoreCase) result += 'i';
            if (that.multiline) result += 'm';
            if (that.unicode) result += 'u';
            if (that.sticky) result += 'y';
            return result;
        };

        var nativeExec = RegExp.prototype.exec;
        // This always refers to the native implementation, because the
        // String#replace polyfill uses ./fix-regexp-well-known-symbol-logic.js,
        // which loads this file before patching the method.
        var nativeReplace = String.prototype.replace;

        var patchedExec = nativeExec;

        var LAST_INDEX = 'lastIndex';

        var UPDATES_LAST_INDEX_WRONG = (function() {
            var re1 = /a/
                , re2 = /b*/g;
            nativeExec.call(re1, 'a');
            nativeExec.call(re2, 'a');
            return re1[LAST_INDEX] !== 0 || re2[LAST_INDEX] !== 0;
        })();

        // nonparticipating capturing group, copied from es5-shim's String#split patch.
        var NPCG_INCLUDED = /()??/.exec('')[1] !== undefined;

        var PATCH = UPDATES_LAST_INDEX_WRONG || NPCG_INCLUDED;

        if (PATCH) {
            patchedExec = function exec(str) {
                var re = this;
                var lastIndex, reCopy, match, i;

                if (NPCG_INCLUDED) {
                    reCopy = new RegExp('^' + re.source + '$(?!\\s)', _flags.call(re));
                }
                if (UPDATES_LAST_INDEX_WRONG) lastIndex = re[LAST_INDEX];

                match = nativeExec.call(re, str);

                if (UPDATES_LAST_INDEX_WRONG && match) {
                    re[LAST_INDEX] = re.global ? match.index + match[0].length : lastIndex;
                }
                if (NPCG_INCLUDED && match && match.length > 1) {
                    // Fix browsers whose `exec` methods don't consistently return `undefined`
                    // for NPCG, like IE8. NOTE: This doesn' work for /(.?)?/
                    // eslint-disable-next-line no-loop-func
                    nativeReplace.call(match[0], reCopy, function() {
                        for (i = 1; i < arguments.length - 2; i++) {
                            if (arguments[i] === undefined) match[i] = undefined;
                        }
                    });
                }

                return match;
            };
        }

        var _regexpExec = patchedExec;

        var _fails = function(exec) {
            try {
                return !!exec();
            } catch (e) {
                return true;
            }
        };

        // Thank's IE8 for his funny defineProperty
        var _descriptors = !_fails(function() {
            return Object.defineProperty({}, 'a', {
                get: function() {
                    return 7;
                }
            }).a != 7;
        });

        var document$1 = _global.document;
        // typeof document.createElement is 'object' in old IE
        var is = _isObject(document$1) && _isObject(document$1.createElement);
        var _domCreate = function(it) {
            return is ? document$1.createElement(it) : {};
        };

        var _ie8DomDefine = !_descriptors && !_fails(function() {
            return Object.defineProperty(_domCreate('div'), 'a', {
                get: function() {
                    return 7;
                }
            }).a != 7;
        });

        // 7.1.1 ToPrimitive(input [, PreferredType])

        // instead of the ES6 spec version, we didn't implement @@toPrimitive case
        // and the second argument - flag - preferred type is a string
        var _toPrimitive = function(it, S) {
            if (!_isObject(it)) return it;
            var fn, val;
            if (S && typeof(fn = it.toString) == 'function' && !_isObject(val = fn.call(it))) return val;
            if (typeof(fn = it.valueOf) == 'function' && !_isObject(val = fn.call(it))) return val;
            if (!S && typeof(fn = it.toString) == 'function' && !_isObject(val = fn.call(it))) return val;
            throw TypeError("Can't convert object to primitive value");
        };

        var dP = Object.defineProperty;

        var f = _descriptors ? Object.defineProperty : function defineProperty(O, P, Attributes) {
            _anObject(O);
            P = _toPrimitive(P, true);
            _anObject(Attributes);
            if (_ie8DomDefine) try {
                return dP(O, P, Attributes);
            } catch (e) {
                /* empty */
            }
            if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
            if ('value' in Attributes) O[P] = Attributes.value;
            return O;
        };

        var _objectDp = {
            f: f
        };

        var _propertyDesc = function(bitmap, value) {
            return {
                enumerable: !(bitmap & 1)
                , configurable: !(bitmap & 2)
                , writable: !(bitmap & 4)
                , value: value
            };
        };

        var _hide = _descriptors ? function(object, key, value) {
            return _objectDp.f(object, key, _propertyDesc(1, value));
        } : function(object, key, value) {
            object[key] = value;
            return object;
        };

        var hasOwnProperty = {}.hasOwnProperty;
        var _has = function(it, key) {
            return hasOwnProperty.call(it, key);
        };

        var _redefine = createCommonjsModule(function(module) {
            var SRC = _uid('src');
            var TO_STRING = 'toString';
            var $toString = Function[TO_STRING];
            var TPL = ('' + $toString).split(TO_STRING);

            _core.inspectSource = function(it) {
                return $toString.call(it);
            };

            (module.exports = function(O, key, val, safe) {
                var isFunction = typeof val == 'function';
                if (isFunction) _has(val, 'name') || _hide(val, 'name', key);
                if (O[key] === val) return;
                if (isFunction) _has(val, SRC) || _hide(val, SRC, O[key] ? '' + O[key] : TPL.join(String(key)));
                if (O === _global) {
                    O[key] = val;
                } else if (!safe) {
                    delete O[key];
                    _hide(O, key, val);
                } else if (O[key]) {
                    O[key] = val;
                } else {
                    _hide(O, key, val);
                }
                // add fake Function#toString for correct work wrapped methods / constructors with methods like LoDash isNative
            })(Function.prototype, TO_STRING, function toString() {
                return typeof this == 'function' && this[SRC] || $toString.call(this);
            });
        });

        var _aFunction = function(it) {
            if (typeof it != 'function') throw TypeError(it + ' is not a function!');
            return it;
        };

        // optional / simple context binding

        var _ctx = function(fn, that, length) {
            _aFunction(fn);
            if (that === undefined) return fn;
            switch (length) {
                case 1:
                    return function(a) {
                        return fn.call(that, a);
                    };
                case 2:
                    return function(a, b) {
                        return fn.call(that, a, b);
                    };
                case 3:
                    return function(a, b, c) {
                        return fn.call(that, a, b, c);
                    };
            }
            return function( /* ...args */ ) {
                return fn.apply(that, arguments);
            };
        };

        var PROTOTYPE = 'prototype';

        var $export = function(type, name, source) {
            var IS_FORCED = type & $export.F;
            var IS_GLOBAL = type & $export.G;
            var IS_STATIC = type & $export.S;
            var IS_PROTO = type & $export.P;
            var IS_BIND = type & $export.B;
            var target = IS_GLOBAL ? _global : IS_STATIC ? _global[name] || (_global[name] = {}) : (_global[name] || {})[PROTOTYPE];
            var exports = IS_GLOBAL ? _core : _core[name] || (_core[name] = {});
            var expProto = exports[PROTOTYPE] || (exports[PROTOTYPE] = {});
            var key, own, out, exp;
            if (IS_GLOBAL) source = name;
            for (key in source) {
                // contains in native
                own = !IS_FORCED && target && target[key] !== undefined;
                // export native or passed
                out = (own ? target : source)[key];
                // bind timers to global for call from export context
                exp = IS_BIND && own ? _ctx(out, _global) : IS_PROTO && typeof out == 'function' ? _ctx(Function.call, out) : out;
                // extend global
                if (target) _redefine(target, key, out, type & $export.U);
                // export
                if (exports[key] != out) _hide(exports, key, exp);
                if (IS_PROTO && expProto[key] != out) expProto[key] = out;
            }
        };
        _global.core = _core;
        // type bitmap
        $export.F = 1; // forced
        $export.G = 2; // global
        $export.S = 4; // static
        $export.P = 8; // proto
        $export.B = 16; // bind
        $export.W = 32; // wrap
        $export.U = 64; // safe
        $export.R = 128; // real proto method for `library`
        var _export = $export;

        _export({
            target: 'RegExp'
            , proto: true
            , forced: _regexpExec !== /./.exec
        }, {
            exec: _regexpExec
        });

        var SPECIES = _wks('species');

        var REPLACE_SUPPORTS_NAMED_GROUPS = !_fails(function() {
            // #replace needs built-in support for named groups.
            // #match works fine because it just return the exec results, even if it has
            // a "grops" property.
            var re = /./;
            re.exec = function() {
                var result = [];
                result.groups = {
                    a: '7'
                };
                return result;
            };
            return ''.replace(re, '$<a>') !== '7';
        });

        var SPLIT_WORKS_WITH_OVERWRITTEN_EXEC = (function() {
            // Chrome 51 has a buggy "split" implementation when RegExp#exec !== nativeExec
            var re = /(?:)/;
            var originalExec = re.exec;
            re.exec = function() {
                return originalExec.apply(this, arguments);
            };
            var result = 'ab'.split(re);
            return result.length === 2 && result[0] === 'a' && result[1] === 'b';
        })();

        var _fixReWks = function(KEY, length, exec) {
            var SYMBOL = _wks(KEY);

            var DELEGATES_TO_SYMBOL = !_fails(function() {
                // String methods call symbol-named RegEp methods
                var O = {};
                O[SYMBOL] = function() {
                    return 7;
                };
                return '' [KEY](O) != 7;
            });

            var DELEGATES_TO_EXEC = DELEGATES_TO_SYMBOL ? !_fails(function() {
                // Symbol-named RegExp methods call .exec
                var execCalled = false;
                var re = /a/;
                re.exec = function() {
                    execCalled = true;
                    return null;
                };
                if (KEY === 'split') {
                    // RegExp[@@split] doesn't call the regex's exec method, but first creates
                    // a new one. We need to return the patched regex when creating the new one.
                    re.constructor = {};
                    re.constructor[SPECIES] = function() {
                        return re;
                    };
                }
                re[SYMBOL]('');
                return !execCalled;
            }) : undefined;

            if (
                !DELEGATES_TO_SYMBOL ||
                !DELEGATES_TO_EXEC ||
                (KEY === 'replace' && !REPLACE_SUPPORTS_NAMED_GROUPS) ||
                (KEY === 'split' && !SPLIT_WORKS_WITH_OVERWRITTEN_EXEC)
            ) {
                var nativeRegExpMethod = /./ [SYMBOL];
                var fns = exec(
                    _defined
                    , SYMBOL
                    , '' [KEY]
                    , function maybeCallNative(nativeMethod, regexp, str, arg2, forceStringMethod) {
                        if (regexp.exec === _regexpExec) {
                            if (DELEGATES_TO_SYMBOL && !forceStringMethod) {
                                // The native String method already delegates to @@method (this
                                // polyfilled function), leasing to infinite recursion.
                                // We avoid it by directly calling the native @@method method.
                                return {
                                    done: true
                                    , value: nativeRegExpMethod.call(regexp, str, arg2)
                                };
                            }
                            return {
                                done: true
                                , value: nativeMethod.call(str, regexp, arg2)
                            };
                        }
                        return {
                            done: false
                        };
                    }
                );
                var strfn = fns[0];
                var rxfn = fns[1];

                _redefine(String.prototype, KEY, strfn);
                _hide(RegExp.prototype, SYMBOL, length == 2
                    // 21.2.5.8 RegExp.prototype[@@replace](string, replaceValue)
                    // 21.2.5.11 RegExp.prototype[@@split](string, limit)
                    ?
                    function(string, arg) {
                        return rxfn.call(string, this, arg);
                    }
                    // 21.2.5.6 RegExp.prototype[@@match](string)
                    // 21.2.5.9 RegExp.prototype[@@search](string)
                    :
                    function(string) {
                        return rxfn.call(string, this);
                    }
                );
            }
        };

        var max = Math.max;
        var min$1 = Math.min;
        var floor$1 = Math.floor;
        var SUBSTITUTION_SYMBOLS = /\$([$&`']|\d\d?|<[^>]*>)/g;
        var SUBSTITUTION_SYMBOLS_NO_NAMED = /\$([$&`']|\d\d?)/g;

        var maybeToString = function(it) {
            return it === undefined ? it : String(it);
        };

        // @@replace logic
        _fixReWks('replace', 2, function(defined, REPLACE, $replace, maybeCallNative) {
            return [
                // `String.prototype.replace` method
                // https://tc39.github.io/ecma262/#sec-string.prototype.replace
                function replace(searchValue, replaceValue) {
                    var O = defined(this);
                    var fn = searchValue == undefined ? undefined : searchValue[REPLACE];
                    return fn !== undefined ?
                        fn.call(searchValue, O, replaceValue) :
                        $replace.call(String(O), searchValue, replaceValue);
                },
                // `RegExp.prototype[@@replace]` method
                // https://tc39.github.io/ecma262/#sec-regexp.prototype-@@replace
                function(regexp, replaceValue) {
                    var res = maybeCallNative($replace, regexp, this, replaceValue);
                    if (res.done) return res.value;

                    var rx = _anObject(regexp);
                    var S = String(this);
                    var functionalReplace = typeof replaceValue === 'function';
                    if (!functionalReplace) replaceValue = String(replaceValue);
                    var global = rx.global;
                    if (global) {
                        var fullUnicode = rx.unicode;
                        rx.lastIndex = 0;
                    }
                    var results = [];
                    while (true) {
                        var result = _regexpExecAbstract(rx, S);
                        if (result === null) break;
                        results.push(result);
                        if (!global) break;
                        var matchStr = String(result[0]);
                        if (matchStr === '') rx.lastIndex = _advanceStringIndex(S, _toLength(rx.lastIndex), fullUnicode);
                    }
                    var accumulatedResult = '';
                    var nextSourcePosition = 0;
                    for (var i = 0; i < results.length; i++) {
                        result = results[i];
                        var matched = String(result[0]);
                        var position = max(min$1(_toInteger(result.index), S.length), 0);
                        var captures = [];
                        // NOTE: This is equivalent to
                        //   captures = result.slice(1).map(maybeToString)
                        // but for some reason `nativeSlice.call(result, 1, result.length)` (called in
                        // the slice polyfill when slicing native arrays) "doesn't work" in safari 9 and
                        // causes a crash (https://pastebin.com/N21QzeQA) when trying to debug it.
                        for (var j = 1; j < result.length; j++) captures.push(maybeToString(result[j]));
                        var namedCaptures = result.groups;
                        if (functionalReplace) {
                            var replacerArgs = [matched].concat(captures, position, S);
                            if (namedCaptures !== undefined) replacerArgs.push(namedCaptures);
                            var replacement = String(replaceValue.apply(undefined, replacerArgs));
                        } else {
                            replacement = getSubstitution(matched, S, position, captures, namedCaptures, replaceValue);
                        }
                        if (position >= nextSourcePosition) {
                            accumulatedResult += S.slice(nextSourcePosition, position) + replacement;
                            nextSourcePosition = position + matched.length;
                        }
                    }
                    return accumulatedResult + S.slice(nextSourcePosition);
                }
            ];

            // https://tc39.github.io/ecma262/#sec-getsubstitution
            function getSubstitution(matched, str, position, captures, namedCaptures, replacement) {
                var tailPos = position + matched.length;
                var m = captures.length;
                var symbols = SUBSTITUTION_SYMBOLS_NO_NAMED;
                if (namedCaptures !== undefined) {
                    namedCaptures = _toObject(namedCaptures);
                    symbols = SUBSTITUTION_SYMBOLS;
                }
                return $replace.call(replacement, symbols, function(match, ch) {
                    var capture;
                    switch (ch.charAt(0)) {
                        case '$':
                            return '$';
                        case '&':
                            return matched;
                        case '`':
                            return str.slice(0, position);
                        case "'":
                            return str.slice(tailPos);
                        case '<':
                            capture = namedCaptures[ch.slice(1, -1)];
                            break;
                        default: // \d\d?
                            var n = +ch;
                            if (n === 0) return match;
                            if (n > m) {
                                var f = floor$1(n / 10);
                                if (f === 0) return match;
                                if (f <= m) return captures[f - 1] === undefined ? ch.charAt(1) : captures[f - 1] + ch.charAt(1);
                                return match;
                            }
                            capture = captures[n - 1];
                    }
                    return capture === undefined ? '' : capture;
                });
            }
        });

        var dP$1 = _objectDp.f;
        var FProto = Function.prototype;
        var nameRE = /^\s*function ([^ (]*)/;
        var NAME = 'name';

        // 19.2.4.2 name
        NAME in FProto || _descriptors && dP$1(FProto, NAME, {
            configurable: true
            , get: function() {
                try {
                    return ('' + this).match(nameRE)[1];
                } catch (e) {
                    return '';
                }
            }
        });

        // @@match logic
        _fixReWks('match', 1, function(defined, MATCH, $match, maybeCallNative) {
            return [
                // `String.prototype.match` method
                // https://tc39.github.io/ecma262/#sec-string.prototype.match
                function match(regexp) {
                    var O = defined(this);
                    var fn = regexp == undefined ? undefined : regexp[MATCH];
                    return fn !== undefined ? fn.call(regexp, O) : new RegExp(regexp)[MATCH](String(O));
                },
                // `RegExp.prototype[@@match]` method
                // https://tc39.github.io/ecma262/#sec-regexp.prototype-@@match
                function(regexp) {
                    var res = maybeCallNative($match, regexp, this);
                    if (res.done) return res.value;
                    var rx = _anObject(regexp);
                    var S = String(this);
                    if (!rx.global) return _regexpExecAbstract(rx, S);
                    var fullUnicode = rx.unicode;
                    rx.lastIndex = 0;
                    var A = [];
                    var n = 0;
                    var result;
                    while ((result = _regexpExecAbstract(rx, S)) !== null) {
                        var matchStr = String(result[0]);
                        A[n] = matchStr;
                        if (matchStr === '') rx.lastIndex = _advanceStringIndex(S, _toLength(rx.lastIndex), fullUnicode);
                        n++;
                    }
                    return n === 0 ? null : A;
                }
            ];
        });

        // 22.1.3.31 Array.prototype[@@unscopables]
        var UNSCOPABLES = _wks('unscopables');
        var ArrayProto = Array.prototype;
        if (ArrayProto[UNSCOPABLES] == undefined) _hide(ArrayProto, UNSCOPABLES, {});
        var _addToUnscopables = function(key) {
            ArrayProto[UNSCOPABLES][key] = true;
        };

        var _iterStep = function(done, value) {
            return {
                value: value
                , done: !!done
            };
        };

        var _iterators = {};

        // fallback for non-array-like ES3 and non-enumerable old V8 strings

        // eslint-disable-next-line no-prototype-builtins
        var _iobject = Object('z').propertyIsEnumerable(0) ? Object : function(it) {
            return _cof(it) == 'String' ? it.split('') : Object(it);
        };

        // to indexed object, toObject with fallback for non-array-like ES3 strings


        var _toIobject = function(it) {
            return _iobject(_defined(it));
        };

        var max$1 = Math.max;
        var min$2 = Math.min;
        var _toAbsoluteIndex = function(index, length) {
            index = _toInteger(index);
            return index < 0 ? max$1(index + length, 0) : min$2(index, length);
        };

        // false -> Array#indexOf
        // true  -> Array#includes



        var _arrayIncludes = function(IS_INCLUDES) {
            return function($this, el, fromIndex) {
                var O = _toIobject($this);
                var length = _toLength(O.length);
                var index = _toAbsoluteIndex(fromIndex, length);
                var value;
                // Array#includes uses SameValueZero equality algorithm
                // eslint-disable-next-line no-self-compare
                if (IS_INCLUDES && el != el)
                    while (length > index) {
                        value = O[index++];
                        // eslint-disable-next-line no-self-compare
                        if (value != value) return true;
                        // Array#indexOf ignores holes, Array#includes - not
                    } else
                        for (; length > index; index++)
                            if (IS_INCLUDES || index in O) {
                                if (O[index] === el) return IS_INCLUDES || index || 0;
                            } return !IS_INCLUDES && -1;
            };
        };

        var shared = _shared('keys');

        var _sharedKey = function(key) {
            return shared[key] || (shared[key] = _uid(key));
        };

        var arrayIndexOf = _arrayIncludes(false);
        var IE_PROTO = _sharedKey('IE_PROTO');

        var _objectKeysInternal = function(object, names) {
            var O = _toIobject(object);
            var i = 0;
            var result = [];
            var key;
            for (key in O)
                if (key != IE_PROTO) _has(O, key) && result.push(key);
            // Don't enum bug & hidden keys
            while (names.length > i)
                if (_has(O, key = names[i++])) {
                    ~arrayIndexOf(result, key) || result.push(key);
                }
            return result;
        };

        // IE 8- don't enum bug keys
        var _enumBugKeys = (
            'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
        ).split(',');

        // 19.1.2.14 / 15.2.3.14 Object.keys(O)



        var _objectKeys = Object.keys || function keys(O) {
            return _objectKeysInternal(O, _enumBugKeys);
        };

        var _objectDps = _descriptors ? Object.defineProperties : function defineProperties(O, Properties) {
            _anObject(O);
            var keys = _objectKeys(Properties);
            var length = keys.length;
            var i = 0;
            var P;
            while (length > i) _objectDp.f(O, P = keys[i++], Properties[P]);
            return O;
        };

        var document$2 = _global.document;
        var _html = document$2 && document$2.documentElement;

        // 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])



        var IE_PROTO$1 = _sharedKey('IE_PROTO');
        var Empty = function() {
            /* empty */
        };
        var PROTOTYPE$1 = 'prototype';

        // Create object with fake `null` prototype: use iframe Object with cleared prototype
        var createDict = function() {
            // Thrash, waste and sodomy: IE GC bug
            var iframe = _domCreate('iframe');
            var i = _enumBugKeys.length;
            var lt = '<';
            var gt = '>';
            var iframeDocument;
            iframe.style.display = 'none';
            _html.appendChild(iframe);
            iframe.src = 'javascript:'; // eslint-disable-line no-script-url
            // createDict = iframe.contentWindow.Object;
            // html.removeChild(iframe);
            iframeDocument = iframe.contentWindow.document;
            iframeDocument.open();
            iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
            iframeDocument.close();
            createDict = iframeDocument.F;
            while (i--) delete createDict[PROTOTYPE$1][_enumBugKeys[i]];
            return createDict();
        };

        var _objectCreate = Object.create || function create(O, Properties) {
            var result;
            if (O !== null) {
                Empty[PROTOTYPE$1] = _anObject(O);
                result = new Empty();
                Empty[PROTOTYPE$1] = null;
                // add "__proto__" for Object.getPrototypeOf polyfill
                result[IE_PROTO$1] = O;
            } else result = createDict();
            return Properties === undefined ? result : _objectDps(result, Properties);
        };

        var def = _objectDp.f;

        var TAG$1 = _wks('toStringTag');

        var _setToStringTag = function(it, tag, stat) {
            if (it && !_has(it = stat ? it : it.prototype, TAG$1)) def(it, TAG$1, {
                configurable: true
                , value: tag
            });
        };

        var IteratorPrototype = {};

        // 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
        _hide(IteratorPrototype, _wks('iterator'), function() {
            return this;
        });

        var _iterCreate = function(Constructor, NAME, next) {
            Constructor.prototype = _objectCreate(IteratorPrototype, {
                next: _propertyDesc(1, next)
            });
            _setToStringTag(Constructor, NAME + ' Iterator');
        };

        // 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)


        var IE_PROTO$2 = _sharedKey('IE_PROTO');
        var ObjectProto = Object.prototype;

        var _objectGpo = Object.getPrototypeOf || function(O) {
            O = _toObject(O);
            if (_has(O, IE_PROTO$2)) return O[IE_PROTO$2];
            if (typeof O.constructor == 'function' && O instanceof O.constructor) {
                return O.constructor.prototype;
            }
            return O instanceof Object ? ObjectProto : null;
        };

        var ITERATOR = _wks('iterator');
        var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
        var FF_ITERATOR = '@@iterator';
        var KEYS = 'keys';
        var VALUES = 'values';

        var returnThis = function() {
            return this;
        };

        var _iterDefine = function(Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
            _iterCreate(Constructor, NAME, next);
            var getMethod = function(kind) {
                if (!BUGGY && kind in proto) return proto[kind];
                switch (kind) {
                    case KEYS:
                        return function keys() {
                            return new Constructor(this, kind);
                        };
                    case VALUES:
                        return function values() {
                            return new Constructor(this, kind);
                        };
                }
                return function entries() {
                    return new Constructor(this, kind);
                };
            };
            var TAG = NAME + ' Iterator';
            var DEF_VALUES = DEFAULT == VALUES;
            var VALUES_BUG = false;
            var proto = Base.prototype;
            var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
            var $default = $native || getMethod(DEFAULT);
            var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
            var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
            var methods, key, IteratorPrototype;
            // Fix native
            if ($anyNative) {
                IteratorPrototype = _objectGpo($anyNative.call(new Base()));
                if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
                    // Set @@toStringTag to native iterators
                    _setToStringTag(IteratorPrototype, TAG, true);
                    // fix for some old engines
                    if (!_library && typeof IteratorPrototype[ITERATOR] != 'function') _hide(IteratorPrototype, ITERATOR, returnThis);
                }
            }
            // fix Array#{values, @@iterator}.name in V8 / FF
            if (DEF_VALUES && $native && $native.name !== VALUES) {
                VALUES_BUG = true;
                $default = function values() {
                    return $native.call(this);
                };
            }
            // Define iterator
            if ((!_library || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
                _hide(proto, ITERATOR, $default);
            }
            // Plug for library
            _iterators[NAME] = $default;
            _iterators[TAG] = returnThis;
            if (DEFAULT) {
                methods = {
                    values: DEF_VALUES ? $default : getMethod(VALUES)
                    , keys: IS_SET ? $default : getMethod(KEYS)
                    , entries: $entries
                };
                if (FORCED)
                    for (key in methods) {
                        if (!(key in proto)) _redefine(proto, key, methods[key]);
                    } else _export(_export.P + _export.F * (BUGGY || VALUES_BUG), NAME, methods);
            }
            return methods;
        };

        // 22.1.3.4 Array.prototype.entries()
        // 22.1.3.13 Array.prototype.keys()
        // 22.1.3.29 Array.prototype.values()
        // 22.1.3.30 Array.prototype[@@iterator]()
        var es6_array_iterator = _iterDefine(Array, 'Array', function(iterated, kind) {
            this._t = _toIobject(iterated); // target
            this._i = 0; // next index
            this._k = kind; // kind
            // 22.1.5.2.1 %ArrayIteratorPrototype%.next()
        }, function() {
            var O = this._t;
            var kind = this._k;
            var index = this._i++;
            if (!O || index >= O.length) {
                this._t = undefined;
                return _iterStep(1);
            }
            if (kind == 'keys') return _iterStep(0, index);
            if (kind == 'values') return _iterStep(0, O[index]);
            return _iterStep(0, [index, O[index]]);
        }, 'values');

        // argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
        _iterators.Arguments = _iterators.Array;

        _addToUnscopables('keys');
        _addToUnscopables('values');
        _addToUnscopables('entries');

        var ITERATOR$1 = _wks('iterator');
        var TO_STRING_TAG = _wks('toStringTag');
        var ArrayValues = _iterators.Array;

        var DOMIterables = {
            CSSRuleList: true, // TODO: Not spec compliant, should be false.
            CSSStyleDeclaration: false
            , CSSValueList: false
            , ClientRectList: false
            , DOMRectList: false
            , DOMStringList: false
            , DOMTokenList: true
            , DataTransferItemList: false
            , FileList: false
            , HTMLAllCollection: false
            , HTMLCollection: false
            , HTMLFormElement: false
            , HTMLSelectElement: false
            , MediaList: true, // TODO: Not spec compliant, should be false.
            MimeTypeArray: false
            , NamedNodeMap: false
            , NodeList: true
            , PaintRequestList: false
            , Plugin: false
            , PluginArray: false
            , SVGLengthList: false
            , SVGNumberList: false
            , SVGPathSegList: false
            , SVGPointList: false
            , SVGStringList: false
            , SVGTransformList: false
            , SourceBufferList: false
            , StyleSheetList: true, // TODO: Not spec compliant, should be false.
            TextTrackCueList: false
            , TextTrackList: false
            , TouchList: false
        };

        for (var collections = _objectKeys(DOMIterables), i = 0; i < collections.length; i++) {
            var NAME$1 = collections[i];
            var explicit = DOMIterables[NAME$1];
            var Collection = _global[NAME$1];
            var proto = Collection && Collection.prototype;
            var key;
            if (proto) {
                if (!proto[ITERATOR$1]) _hide(proto, ITERATOR$1, ArrayValues);
                if (!proto[TO_STRING_TAG]) _hide(proto, TO_STRING_TAG, NAME$1);
                _iterators[NAME$1] = ArrayValues;
                if (explicit)
                    for (key in es6_array_iterator)
                        if (!proto[key]) _redefine(proto, key, es6_array_iterator[key], true);
            }
        }

        var $at = _stringAt(true);

        // 21.1.3.27 String.prototype[@@iterator]()
        _iterDefine(String, 'String', function(iterated) {
            this._t = String(iterated); // target
            this._i = 0; // next index
            // 21.1.5.2.1 %StringIteratorPrototype%.next()
        }, function() {
            var O = this._t;
            var index = this._i;
            var point;
            if (index >= O.length) return {
                value: undefined
                , done: true
            };
            point = $at(O, index);
            this._i += point.length;
            return {
                value: point
                , done: false
            };
        });

        // call something on iterator step with safe closing on error

        var _iterCall = function(iterator, fn, value, entries) {
            try {
                return entries ? fn(_anObject(value)[0], value[1]) : fn(value);
                // 7.4.6 IteratorClose(iterator, completion)
            } catch (e) {
                var ret = iterator['return'];
                if (ret !== undefined) _anObject(ret.call(iterator));
                throw e;
            }
        };

        // check on default Array iterator

        var ITERATOR$2 = _wks('iterator');
        var ArrayProto$1 = Array.prototype;

        var _isArrayIter = function(it) {
            return it !== undefined && (_iterators.Array === it || ArrayProto$1[ITERATOR$2] === it);
        };

        var _createProperty = function(object, index, value) {
            if (index in object) _objectDp.f(object, index, _propertyDesc(0, value));
            else object[index] = value;
        };

        var ITERATOR$3 = _wks('iterator');

        var core_getIteratorMethod = _core.getIteratorMethod = function(it) {
            if (it != undefined) return it[ITERATOR$3] ||
                it['@@iterator'] ||
                _iterators[_classof(it)];
        };

        var ITERATOR$4 = _wks('iterator');
        var SAFE_CLOSING = false;

        try {
            var riter = [7][ITERATOR$4]();
            riter['return'] = function() {
                SAFE_CLOSING = true;
            };
        } catch (e) {
            /* empty */
        }

        var _iterDetect = function(exec, skipClosing) {
            if (!skipClosing && !SAFE_CLOSING) return false;
            var safe = false;
            try {
                var arr = [7];
                var iter = arr[ITERATOR$4]();
                iter.next = function() {
                    return {
                        done: safe = true
                    };
                };
                arr[ITERATOR$4] = function() {
                    return iter;
                };
                exec(arr);
            } catch (e) {
                /* empty */
            }
            return safe;
        };

        _export(_export.S + _export.F * !_iterDetect(function(iter) {}), 'Array', {
            // 22.1.2.1 Array.from(arrayLike, mapfn = undefined, thisArg = undefined)
            from: function from(arrayLike /* , mapfn = undefined, thisArg = undefined */ ) {
                var O = _toObject(arrayLike);
                var C = typeof this == 'function' ? this : Array;
                var aLen = arguments.length;
                var mapfn = aLen > 1 ? arguments[1] : undefined;
                var mapping = mapfn !== undefined;
                var index = 0;
                var iterFn = core_getIteratorMethod(O);
                var length, result, step, iterator;
                if (mapping) mapfn = _ctx(mapfn, aLen > 2 ? arguments[2] : undefined, 2);
                // if object isn't iterable or it's array with default iterator - use simple case
                if (iterFn != undefined && !(C == Array && _isArrayIter(iterFn))) {
                    for (iterator = iterFn.call(O), result = new C(); !(step = iterator.next()).done; index++) {
                        _createProperty(result, index, mapping ? _iterCall(iterator, mapfn, [step.value, index], true) : step.value);
                    }
                } else {
                    length = _toLength(O.length);
                    for (result = new C(length); length > index; index++) {
                        _createProperty(result, index, mapping ? mapfn(O[index], index) : O[index]);
                    }
                }
                result.length = index;
                return result;
            }
        });

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        function _defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || false;
                descriptor.configurable = true;
                if ("value" in descriptor) descriptor.writable = true;
                Object.defineProperty(target, descriptor.key, descriptor);
            }
        }

        function _createClass(Constructor, protoProps, staticProps) {
            if (protoProps) _defineProperties(Constructor.prototype, protoProps);
            if (staticProps) _defineProperties(Constructor, staticProps);
            return Constructor;
        }

        function _defineProperty(obj, key, value) {
            if (key in obj) {
                Object.defineProperty(obj, key, {
                    value: value
                    , enumerable: true
                    , configurable: true
                    , writable: true
                });
            } else {
                obj[key] = value;
            }

            return obj;
        }

        function _objectSpread(target) {
            for (var i = 1; i < arguments.length; i++) {
                var source = arguments[i] != null ? arguments[i] : {};
                var ownKeys = Object.keys(source);

                if (typeof Object.getOwnPropertySymbols === 'function') {
                    ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function(sym) {
                        return Object.getOwnPropertyDescriptor(source, sym).enumerable;
                    }));
                }

                ownKeys.forEach(function(key) {
                    _defineProperty(target, key, source[key]);
                });
            }

            return target;
        }

        var scrollbarWidth = createCommonjsModule(function(module, exports) {
            /*! scrollbarWidth.js v0.1.3 | felixexter | MIT | https://github.com/felixexter/scrollbarWidth */
            (function(root, factory) {
                {
                    module.exports = factory();
                }
            }(commonjsGlobal, function() {

                function scrollbarWidth() {
                    if (typeof document === 'undefined') {
                        return 0
                    }

                    var
                        body = document.body
                        , box = document.createElement('div')
                        , boxStyle = box.style
                        , width;

                    boxStyle.position = 'absolute';
                    boxStyle.top = boxStyle.left = '-9999px';
                    boxStyle.width = boxStyle.height = '100px';
                    boxStyle.overflow = 'scroll';

                    body.appendChild(box);

                    width = box.offsetWidth - box.clientWidth;

                    body.removeChild(box);

                    return width;
                }

                return scrollbarWidth;
            }));
        });

        /**
         * lodash (Custom Build) <https://lodash.com/>
         * Build: `lodash modularize exports="npm" -o ./`
         * Copyright jQuery Foundation and other contributors <https://jquery.org/>
         * Released under MIT license <https://lodash.com/license>
         * Based on Underscore.js 1.8.3 <http://underscorejs.org/LICENSE>
         * Copyright Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
         */

        /** Used as the `TypeError` message for "Functions" methods. */
        var FUNC_ERROR_TEXT = 'Expected a function';

        /** Used as references for various `Number` constants. */
        var NAN = 0 / 0;

        /** `Object#toString` result references. */
        var symbolTag = '[object Symbol]';

        /** Used to match leading and trailing whitespace. */
        var reTrim = /^\s+|\s+$/g;

        /** Used to detect bad signed hexadecimal string values. */
        var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

        /** Used to detect binary string values. */
        var reIsBinary = /^0b[01]+$/i;

        /** Used to detect octal string values. */
        var reIsOctal = /^0o[0-7]+$/i;

        /** Built-in method references without a dependency on `root`. */
        var freeParseInt = parseInt;

        /** Detect free variable `global` from Node.js. */
        var freeGlobal = typeof commonjsGlobal == 'object' && commonjsGlobal && commonjsGlobal.Object === Object && commonjsGlobal;

        /** Detect free variable `self`. */
        var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

        /** Used as a reference to the global object. */
        var root = freeGlobal || freeSelf || Function('return this')();

        /** Used for built-in method references. */
        var objectProto = Object.prototype;

        /**
         * Used to resolve the
         * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
         * of values.
         */
        var objectToString = objectProto.toString;

        /* Built-in method references for those with the same name as other `lodash` methods. */
        var nativeMax = Math.max
            , nativeMin = Math.min;

        /**
         * Gets the timestamp of the number of milliseconds that have elapsed since
         * the Unix epoch (1 January 1970 00:00:00 UTC).
         *
         * @static
         * @memberOf _
         * @since 2.4.0
         * @category Date
         * @returns {number} Returns the timestamp.
         * @example
         *
         * _.defer(function(stamp) {
         *   console.log(_.now() - stamp);
         * }, _.now());
         * // => Logs the number of milliseconds it took for the deferred invocation.
         */
        var now = function() {
            return root.Date.now();
        };

        /**
         * Creates a debounced function that delays invoking `func` until after `wait`
         * milliseconds have elapsed since the last time the debounced function was
         * invoked. The debounced function comes with a `cancel` method to cancel
         * delayed `func` invocations and a `flush` method to immediately invoke them.
         * Provide `options` to indicate whether `func` should be invoked on the
         * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
         * with the last arguments provided to the debounced function. Subsequent
         * calls to the debounced function return the result of the last `func`
         * invocation.
         *
         * **Note:** If `leading` and `trailing` options are `true`, `func` is
         * invoked on the trailing edge of the timeout only if the debounced function
         * is invoked more than once during the `wait` timeout.
         *
         * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
         * until to the next tick, similar to `setTimeout` with a timeout of `0`.
         *
         * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
         * for details over the differences between `_.debounce` and `_.throttle`.
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Function
         * @param {Function} func The function to debounce.
         * @param {number} [wait=0] The number of milliseconds to delay.
         * @param {Object} [options={}] The options object.
         * @param {boolean} [options.leading=false]
         *  Specify invoking on the leading edge of the timeout.
         * @param {number} [options.maxWait]
         *  The maximum time `func` is allowed to be delayed before it's invoked.
         * @param {boolean} [options.trailing=true]
         *  Specify invoking on the trailing edge of the timeout.
         * @returns {Function} Returns the new debounced function.
         * @example
         *
         * // Avoid costly calculations while the window size is in flux.
         * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
         *
         * // Invoke `sendMail` when clicked, debouncing subsequent calls.
         * jQuery(element).on('click', _.debounce(sendMail, 300, {
         *   'leading': true,
         *   'trailing': false
         * }));
         *
         * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
         * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
         * var source = new EventSource('/stream');
         * jQuery(source).on('message', debounced);
         *
         * // Cancel the trailing debounced invocation.
         * jQuery(window).on('popstate', debounced.cancel);
         */
        function debounce(func, wait, options) {
            var lastArgs
                , lastThis
                , maxWait
                , result
                , timerId
                , lastCallTime
                , lastInvokeTime = 0
                , leading = false
                , maxing = false
                , trailing = true;

            if (typeof func != 'function') {
                throw new TypeError(FUNC_ERROR_TEXT);
            }
            wait = toNumber(wait) || 0;
            if (isObject(options)) {
                leading = !!options.leading;
                maxing = 'maxWait' in options;
                maxWait = maxing ? nativeMax(toNumber(options.maxWait) || 0, wait) : maxWait;
                trailing = 'trailing' in options ? !!options.trailing : trailing;
            }

            function invokeFunc(time) {
                var args = lastArgs
                    , thisArg = lastThis;

                lastArgs = lastThis = undefined;
                lastInvokeTime = time;
                result = func.apply(thisArg, args);
                return result;
            }

            function leadingEdge(time) {
                // Reset any `maxWait` timer.
                lastInvokeTime = time;
                // Start the timer for the trailing edge.
                timerId = setTimeout(timerExpired, wait);
                // Invoke the leading edge.
                return leading ? invokeFunc(time) : result;
            }

            function remainingWait(time) {
                var timeSinceLastCall = time - lastCallTime
                    , timeSinceLastInvoke = time - lastInvokeTime
                    , result = wait - timeSinceLastCall;

                return maxing ? nativeMin(result, maxWait - timeSinceLastInvoke) : result;
            }

            function shouldInvoke(time) {
                var timeSinceLastCall = time - lastCallTime
                    , timeSinceLastInvoke = time - lastInvokeTime;

                // Either this is the first call, activity has stopped and we're at the
                // trailing edge, the system time has gone backwards and we're treating
                // it as the trailing edge, or we've hit the `maxWait` limit.
                return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
                    (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
            }

            function timerExpired() {
                var time = now();
                if (shouldInvoke(time)) {
                    return trailingEdge(time);
                }
                // Restart the timer.
                timerId = setTimeout(timerExpired, remainingWait(time));
            }

            function trailingEdge(time) {
                timerId = undefined;

                // Only invoke if we have `lastArgs` which means `func` has been
                // debounced at least once.
                if (trailing && lastArgs) {
                    return invokeFunc(time);
                }
                lastArgs = lastThis = undefined;
                return result;
            }

            function cancel() {
                if (timerId !== undefined) {
                    clearTimeout(timerId);
                }
                lastInvokeTime = 0;
                lastArgs = lastCallTime = lastThis = timerId = undefined;
            }

            function flush() {
                return timerId === undefined ? result : trailingEdge(now());
            }

            function debounced() {
                var time = now()
                    , isInvoking = shouldInvoke(time);

                lastArgs = arguments;
                lastThis = this;
                lastCallTime = time;

                if (isInvoking) {
                    if (timerId === undefined) {
                        return leadingEdge(lastCallTime);
                    }
                    if (maxing) {
                        // Handle invocations in a tight loop.
                        timerId = setTimeout(timerExpired, wait);
                        return invokeFunc(lastCallTime);
                    }
                }
                if (timerId === undefined) {
                    timerId = setTimeout(timerExpired, wait);
                }
                return result;
            }
            debounced.cancel = cancel;
            debounced.flush = flush;
            return debounced;
        }

        /**
         * Creates a throttled function that only invokes `func` at most once per
         * every `wait` milliseconds. The throttled function comes with a `cancel`
         * method to cancel delayed `func` invocations and a `flush` method to
         * immediately invoke them. Provide `options` to indicate whether `func`
         * should be invoked on the leading and/or trailing edge of the `wait`
         * timeout. The `func` is invoked with the last arguments provided to the
         * throttled function. Subsequent calls to the throttled function return the
         * result of the last `func` invocation.
         *
         * **Note:** If `leading` and `trailing` options are `true`, `func` is
         * invoked on the trailing edge of the timeout only if the throttled function
         * is invoked more than once during the `wait` timeout.
         *
         * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
         * until to the next tick, similar to `setTimeout` with a timeout of `0`.
         *
         * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
         * for details over the differences between `_.throttle` and `_.debounce`.
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Function
         * @param {Function} func The function to throttle.
         * @param {number} [wait=0] The number of milliseconds to throttle invocations to.
         * @param {Object} [options={}] The options object.
         * @param {boolean} [options.leading=true]
         *  Specify invoking on the leading edge of the timeout.
         * @param {boolean} [options.trailing=true]
         *  Specify invoking on the trailing edge of the timeout.
         * @returns {Function} Returns the new throttled function.
         * @example
         *
         * // Avoid excessively updating the position while scrolling.
         * jQuery(window).on('scroll', _.throttle(updatePosition, 100));
         *
         * // Invoke `renewToken` when the click event is fired, but not more than once every 5 minutes.
         * var throttled = _.throttle(renewToken, 300000, { 'trailing': false });
         * jQuery(element).on('click', throttled);
         *
         * // Cancel the trailing throttled invocation.
         * jQuery(window).on('popstate', throttled.cancel);
         */
        function throttle(func, wait, options) {
            var leading = true
                , trailing = true;

            if (typeof func != 'function') {
                throw new TypeError(FUNC_ERROR_TEXT);
            }
            if (isObject(options)) {
                leading = 'leading' in options ? !!options.leading : leading;
                trailing = 'trailing' in options ? !!options.trailing : trailing;
            }
            return debounce(func, wait, {
                'leading': leading
                , 'maxWait': wait
                , 'trailing': trailing
            });
        }

        /**
         * Checks if `value` is the
         * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
         * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is an object, else `false`.
         * @example
         *
         * _.isObject({});
         * // => true
         *
         * _.isObject([1, 2, 3]);
         * // => true
         *
         * _.isObject(_.noop);
         * // => true
         *
         * _.isObject(null);
         * // => false
         */
        function isObject(value) {
            var type = typeof value;
            return !!value && (type == 'object' || type == 'function');
        }

        /**
         * Checks if `value` is object-like. A value is object-like if it's not `null`
         * and has a `typeof` result of "object".
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
         * @example
         *
         * _.isObjectLike({});
         * // => true
         *
         * _.isObjectLike([1, 2, 3]);
         * // => true
         *
         * _.isObjectLike(_.noop);
         * // => false
         *
         * _.isObjectLike(null);
         * // => false
         */
        function isObjectLike(value) {
            return !!value && typeof value == 'object';
        }

        /**
         * Checks if `value` is classified as a `Symbol` primitive or object.
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
         * @example
         *
         * _.isSymbol(Symbol.iterator);
         * // => true
         *
         * _.isSymbol('abc');
         * // => false
         */
        function isSymbol(value) {
            return typeof value == 'symbol' ||
                (isObjectLike(value) && objectToString.call(value) == symbolTag);
        }

        /**
         * Converts `value` to a number.
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to process.
         * @returns {number} Returns the number.
         * @example
         *
         * _.toNumber(3.2);
         * // => 3.2
         *
         * _.toNumber(Number.MIN_VALUE);
         * // => 5e-324
         *
         * _.toNumber(Infinity);
         * // => Infinity
         *
         * _.toNumber('3.2');
         * // => 3.2
         */
        function toNumber(value) {
            if (typeof value == 'number') {
                return value;
            }
            if (isSymbol(value)) {
                return NAN;
            }
            if (isObject(value)) {
                var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
                value = isObject(other) ? (other + '') : other;
            }
            if (typeof value != 'string') {
                return value === 0 ? value : +value;
            }
            value = value.replace(reTrim, '');
            var isBinary = reIsBinary.test(value);
            return (isBinary || reIsOctal.test(value)) ?
                freeParseInt(value.slice(2), isBinary ? 2 : 8) :
                (reIsBadHex.test(value) ? NAN : +value);
        }

        var lodash_throttle = throttle;

        /**
         * lodash (Custom Build) <https://lodash.com/>
         * Build: `lodash modularize exports="npm" -o ./`
         * Copyright jQuery Foundation and other contributors <https://jquery.org/>
         * Released under MIT license <https://lodash.com/license>
         * Based on Underscore.js 1.8.3 <http://underscorejs.org/LICENSE>
         * Copyright Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
         */

        /** Used as the `TypeError` message for "Functions" methods. */
        var FUNC_ERROR_TEXT$1 = 'Expected a function';

        /** Used as references for various `Number` constants. */
        var NAN$1 = 0 / 0;

        /** `Object#toString` result references. */
        var symbolTag$1 = '[object Symbol]';

        /** Used to match leading and trailing whitespace. */
        var reTrim$1 = /^\s+|\s+$/g;

        /** Used to detect bad signed hexadecimal string values. */
        var reIsBadHex$1 = /^[-+]0x[0-9a-f]+$/i;

        /** Used to detect binary string values. */
        var reIsBinary$1 = /^0b[01]+$/i;

        /** Used to detect octal string values. */
        var reIsOctal$1 = /^0o[0-7]+$/i;

        /** Built-in method references without a dependency on `root`. */
        var freeParseInt$1 = parseInt;

        /** Detect free variable `global` from Node.js. */
        var freeGlobal$1 = typeof commonjsGlobal == 'object' && commonjsGlobal && commonjsGlobal.Object === Object && commonjsGlobal;

        /** Detect free variable `self`. */
        var freeSelf$1 = typeof self == 'object' && self && self.Object === Object && self;

        /** Used as a reference to the global object. */
        var root$1 = freeGlobal$1 || freeSelf$1 || Function('return this')();

        /** Used for built-in method references. */
        var objectProto$1 = Object.prototype;

        /**
         * Used to resolve the
         * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
         * of values.
         */
        var objectToString$1 = objectProto$1.toString;

        /* Built-in method references for those with the same name as other `lodash` methods. */
        var nativeMax$1 = Math.max
            , nativeMin$1 = Math.min;

        /**
         * Gets the timestamp of the number of milliseconds that have elapsed since
         * the Unix epoch (1 January 1970 00:00:00 UTC).
         *
         * @static
         * @memberOf _
         * @since 2.4.0
         * @category Date
         * @returns {number} Returns the timestamp.
         * @example
         *
         * _.defer(function(stamp) {
         *   console.log(_.now() - stamp);
         * }, _.now());
         * // => Logs the number of milliseconds it took for the deferred invocation.
         */
        var now$1 = function() {
            return root$1.Date.now();
        };

        /**
         * Creates a debounced function that delays invoking `func` until after `wait`
         * milliseconds have elapsed since the last time the debounced function was
         * invoked. The debounced function comes with a `cancel` method to cancel
         * delayed `func` invocations and a `flush` method to immediately invoke them.
         * Provide `options` to indicate whether `func` should be invoked on the
         * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
         * with the last arguments provided to the debounced function. Subsequent
         * calls to the debounced function return the result of the last `func`
         * invocation.
         *
         * **Note:** If `leading` and `trailing` options are `true`, `func` is
         * invoked on the trailing edge of the timeout only if the debounced function
         * is invoked more than once during the `wait` timeout.
         *
         * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
         * until to the next tick, similar to `setTimeout` with a timeout of `0`.
         *
         * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
         * for details over the differences between `_.debounce` and `_.throttle`.
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Function
         * @param {Function} func The function to debounce.
         * @param {number} [wait=0] The number of milliseconds to delay.
         * @param {Object} [options={}] The options object.
         * @param {boolean} [options.leading=false]
         *  Specify invoking on the leading edge of the timeout.
         * @param {number} [options.maxWait]
         *  The maximum time `func` is allowed to be delayed before it's invoked.
         * @param {boolean} [options.trailing=true]
         *  Specify invoking on the trailing edge of the timeout.
         * @returns {Function} Returns the new debounced function.
         * @example
         *
         * // Avoid costly calculations while the window size is in flux.
         * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
         *
         * // Invoke `sendMail` when clicked, debouncing subsequent calls.
         * jQuery(element).on('click', _.debounce(sendMail, 300, {
         *   'leading': true,
         *   'trailing': false
         * }));
         *
         * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
         * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
         * var source = new EventSource('/stream');
         * jQuery(source).on('message', debounced);
         *
         * // Cancel the trailing debounced invocation.
         * jQuery(window).on('popstate', debounced.cancel);
         */
        function debounce$1(func, wait, options) {
            var lastArgs
                , lastThis
                , maxWait
                , result
                , timerId
                , lastCallTime
                , lastInvokeTime = 0
                , leading = false
                , maxing = false
                , trailing = true;

            if (typeof func != 'function') {
                throw new TypeError(FUNC_ERROR_TEXT$1);
            }
            wait = toNumber$1(wait) || 0;
            if (isObject$1(options)) {
                leading = !!options.leading;
                maxing = 'maxWait' in options;
                maxWait = maxing ? nativeMax$1(toNumber$1(options.maxWait) || 0, wait) : maxWait;
                trailing = 'trailing' in options ? !!options.trailing : trailing;
            }

            function invokeFunc(time) {
                var args = lastArgs
                    , thisArg = lastThis;

                lastArgs = lastThis = undefined;
                lastInvokeTime = time;
                result = func.apply(thisArg, args);
                return result;
            }

            function leadingEdge(time) {
                // Reset any `maxWait` timer.
                lastInvokeTime = time;
                // Start the timer for the trailing edge.
                timerId = setTimeout(timerExpired, wait);
                // Invoke the leading edge.
                return leading ? invokeFunc(time) : result;
            }

            function remainingWait(time) {
                var timeSinceLastCall = time - lastCallTime
                    , timeSinceLastInvoke = time - lastInvokeTime
                    , result = wait - timeSinceLastCall;

                return maxing ? nativeMin$1(result, maxWait - timeSinceLastInvoke) : result;
            }

            function shouldInvoke(time) {
                var timeSinceLastCall = time - lastCallTime
                    , timeSinceLastInvoke = time - lastInvokeTime;

                // Either this is the first call, activity has stopped and we're at the
                // trailing edge, the system time has gone backwards and we're treating
                // it as the trailing edge, or we've hit the `maxWait` limit.
                return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
                    (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
            }

            function timerExpired() {
                var time = now$1();
                if (shouldInvoke(time)) {
                    return trailingEdge(time);
                }
                // Restart the timer.
                timerId = setTimeout(timerExpired, remainingWait(time));
            }

            function trailingEdge(time) {
                timerId = undefined;

                // Only invoke if we have `lastArgs` which means `func` has been
                // debounced at least once.
                if (trailing && lastArgs) {
                    return invokeFunc(time);
                }
                lastArgs = lastThis = undefined;
                return result;
            }

            function cancel() {
                if (timerId !== undefined) {
                    clearTimeout(timerId);
                }
                lastInvokeTime = 0;
                lastArgs = lastCallTime = lastThis = timerId = undefined;
            }

            function flush() {
                return timerId === undefined ? result : trailingEdge(now$1());
            }

            function debounced() {
                var time = now$1()
                    , isInvoking = shouldInvoke(time);

                lastArgs = arguments;
                lastThis = this;
                lastCallTime = time;

                if (isInvoking) {
                    if (timerId === undefined) {
                        return leadingEdge(lastCallTime);
                    }
                    if (maxing) {
                        // Handle invocations in a tight loop.
                        timerId = setTimeout(timerExpired, wait);
                        return invokeFunc(lastCallTime);
                    }
                }
                if (timerId === undefined) {
                    timerId = setTimeout(timerExpired, wait);
                }
                return result;
            }
            debounced.cancel = cancel;
            debounced.flush = flush;
            return debounced;
        }

        /**
         * Checks if `value` is the
         * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
         * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is an object, else `false`.
         * @example
         *
         * _.isObject({});
         * // => true
         *
         * _.isObject([1, 2, 3]);
         * // => true
         *
         * _.isObject(_.noop);
         * // => true
         *
         * _.isObject(null);
         * // => false
         */
        function isObject$1(value) {
            var type = typeof value;
            return !!value && (type == 'object' || type == 'function');
        }

        /**
         * Checks if `value` is object-like. A value is object-like if it's not `null`
         * and has a `typeof` result of "object".
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
         * @example
         *
         * _.isObjectLike({});
         * // => true
         *
         * _.isObjectLike([1, 2, 3]);
         * // => true
         *
         * _.isObjectLike(_.noop);
         * // => false
         *
         * _.isObjectLike(null);
         * // => false
         */
        function isObjectLike$1(value) {
            return !!value && typeof value == 'object';
        }

        /**
         * Checks if `value` is classified as a `Symbol` primitive or object.
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
         * @example
         *
         * _.isSymbol(Symbol.iterator);
         * // => true
         *
         * _.isSymbol('abc');
         * // => false
         */
        function isSymbol$1(value) {
            return typeof value == 'symbol' ||
                (isObjectLike$1(value) && objectToString$1.call(value) == symbolTag$1);
        }

        /**
         * Converts `value` to a number.
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to process.
         * @returns {number} Returns the number.
         * @example
         *
         * _.toNumber(3.2);
         * // => 3.2
         *
         * _.toNumber(Number.MIN_VALUE);
         * // => 5e-324
         *
         * _.toNumber(Infinity);
         * // => Infinity
         *
         * _.toNumber('3.2');
         * // => 3.2
         */
        function toNumber$1(value) {
            if (typeof value == 'number') {
                return value;
            }
            if (isSymbol$1(value)) {
                return NAN$1;
            }
            if (isObject$1(value)) {
                var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
                value = isObject$1(other) ? (other + '') : other;
            }
            if (typeof value != 'string') {
                return value === 0 ? value : +value;
            }
            value = value.replace(reTrim$1, '');
            var isBinary = reIsBinary$1.test(value);
            return (isBinary || reIsOctal$1.test(value)) ?
                freeParseInt$1(value.slice(2), isBinary ? 2 : 8) :
                (reIsBadHex$1.test(value) ? NAN$1 : +value);
        }

        var lodash_debounce = debounce$1;

        /**
         * lodash (Custom Build) <https://lodash.com/>
         * Build: `lodash modularize exports="npm" -o ./`
         * Copyright jQuery Foundation and other contributors <https://jquery.org/>
         * Released under MIT license <https://lodash.com/license>
         * Based on Underscore.js 1.8.3 <http://underscorejs.org/LICENSE>
         * Copyright Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
         */

        /** Used as the `TypeError` message for "Functions" methods. */
        var FUNC_ERROR_TEXT$2 = 'Expected a function';

        /** Used to stand-in for `undefined` hash values. */
        var HASH_UNDEFINED = '__lodash_hash_undefined__';

        /** `Object#toString` result references. */
        var funcTag = '[object Function]'
            , genTag = '[object GeneratorFunction]';

        /**
         * Used to match `RegExp`
         * [syntax characters](http://ecma-international.org/ecma-262/7.0/#sec-patterns).
         */
        var reRegExpChar = /[\\^$.*+?()[\]{}|]/g;

        /** Used to detect host constructors (Safari). */
        var reIsHostCtor = /^\[object .+?Constructor\]$/;

        /** Detect free variable `global` from Node.js. */
        var freeGlobal$2 = typeof commonjsGlobal == 'object' && commonjsGlobal && commonjsGlobal.Object === Object && commonjsGlobal;

        /** Detect free variable `self`. */
        var freeSelf$2 = typeof self == 'object' && self && self.Object === Object && self;

        /** Used as a reference to the global object. */
        var root$2 = freeGlobal$2 || freeSelf$2 || Function('return this')();

        /**
         * Gets the value at `key` of `object`.
         *
         * @private
         * @param {Object} [object] The object to query.
         * @param {string} key The key of the property to get.
         * @returns {*} Returns the property value.
         */
        function getValue(object, key) {
            return object == null ? undefined : object[key];
        }

        /**
         * Checks if `value` is a host object in IE < 9.
         *
         * @private
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is a host object, else `false`.
         */
        function isHostObject(value) {
            // Many host objects are `Object` objects that can coerce to strings
            // despite having improperly defined `toString` methods.
            var result = false;
            if (value != null && typeof value.toString != 'function') {
                try {
                    result = !!(value + '');
                } catch (e) {}
            }
            return result;
        }

        /** Used for built-in method references. */
        var arrayProto = Array.prototype
            , funcProto = Function.prototype
            , objectProto$2 = Object.prototype;

        /** Used to detect overreaching core-js shims. */
        var coreJsData = root$2['__core-js_shared__'];

        /** Used to detect methods masquerading as native. */
        var maskSrcKey = (function() {
            var uid = /[^.]+$/.exec(coreJsData && coreJsData.keys && coreJsData.keys.IE_PROTO || '');
            return uid ? ('Symbol(src)_1.' + uid) : '';
        }());

        /** Used to resolve the decompiled source of functions. */
        var funcToString = funcProto.toString;

        /** Used to check objects for own properties. */
        var hasOwnProperty$1 = objectProto$2.hasOwnProperty;

        /**
         * Used to resolve the
         * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
         * of values.
         */
        var objectToString$2 = objectProto$2.toString;

        /** Used to detect if a method is native. */
        var reIsNative = RegExp('^' +
            funcToString.call(hasOwnProperty$1).replace(reRegExpChar, '\\$&')
            .replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, '$1.*?') + '$'
        );

        /** Built-in value references. */
        var splice = arrayProto.splice;

        /* Built-in method references that are verified to be native. */
        var Map$1 = getNative(root$2, 'Map')
            , nativeCreate = getNative(Object, 'create');

        /**
         * Creates a hash object.
         *
         * @private
         * @constructor
         * @param {Array} [entries] The key-value pairs to cache.
         */
        function Hash(entries) {
            var index = -1
                , length = entries ? entries.length : 0;

            this.clear();
            while (++index < length) {
                var entry = entries[index];
                this.set(entry[0], entry[1]);
            }
        }

        /**
         * Removes all key-value entries from the hash.
         *
         * @private
         * @name clear
         * @memberOf Hash
         */
        function hashClear() {
            this.__data__ = nativeCreate ? nativeCreate(null) : {};
        }

        /**
         * Removes `key` and its value from the hash.
         *
         * @private
         * @name delete
         * @memberOf Hash
         * @param {Object} hash The hash to modify.
         * @param {string} key The key of the value to remove.
         * @returns {boolean} Returns `true` if the entry was removed, else `false`.
         */
        function hashDelete(key) {
            return this.has(key) && delete this.__data__[key];
        }

        /**
         * Gets the hash value for `key`.
         *
         * @private
         * @name get
         * @memberOf Hash
         * @param {string} key The key of the value to get.
         * @returns {*} Returns the entry value.
         */
        function hashGet(key) {
            var data = this.__data__;
            if (nativeCreate) {
                var result = data[key];
                return result === HASH_UNDEFINED ? undefined : result;
            }
            return hasOwnProperty$1.call(data, key) ? data[key] : undefined;
        }

        /**
         * Checks if a hash value for `key` exists.
         *
         * @private
         * @name has
         * @memberOf Hash
         * @param {string} key The key of the entry to check.
         * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
         */
        function hashHas(key) {
            var data = this.__data__;
            return nativeCreate ? data[key] !== undefined : hasOwnProperty$1.call(data, key);
        }

        /**
         * Sets the hash `key` to `value`.
         *
         * @private
         * @name set
         * @memberOf Hash
         * @param {string} key The key of the value to set.
         * @param {*} value The value to set.
         * @returns {Object} Returns the hash instance.
         */
        function hashSet(key, value) {
            var data = this.__data__;
            data[key] = (nativeCreate && value === undefined) ? HASH_UNDEFINED : value;
            return this;
        }

        // Add methods to `Hash`.
        Hash.prototype.clear = hashClear;
        Hash.prototype['delete'] = hashDelete;
        Hash.prototype.get = hashGet;
        Hash.prototype.has = hashHas;
        Hash.prototype.set = hashSet;

        /**
         * Creates an list cache object.
         *
         * @private
         * @constructor
         * @param {Array} [entries] The key-value pairs to cache.
         */
        function ListCache(entries) {
            var index = -1
                , length = entries ? entries.length : 0;

            this.clear();
            while (++index < length) {
                var entry = entries[index];
                this.set(entry[0], entry[1]);
            }
        }

        /**
         * Removes all key-value entries from the list cache.
         *
         * @private
         * @name clear
         * @memberOf ListCache
         */
        function listCacheClear() {
            this.__data__ = [];
        }

        /**
         * Removes `key` and its value from the list cache.
         *
         * @private
         * @name delete
         * @memberOf ListCache
         * @param {string} key The key of the value to remove.
         * @returns {boolean} Returns `true` if the entry was removed, else `false`.
         */
        function listCacheDelete(key) {
            var data = this.__data__
                , index = assocIndexOf(data, key);

            if (index < 0) {
                return false;
            }
            var lastIndex = data.length - 1;
            if (index == lastIndex) {
                data.pop();
            } else {
                splice.call(data, index, 1);
            }
            return true;
        }

        /**
         * Gets the list cache value for `key`.
         *
         * @private
         * @name get
         * @memberOf ListCache
         * @param {string} key The key of the value to get.
         * @returns {*} Returns the entry value.
         */
        function listCacheGet(key) {
            var data = this.__data__
                , index = assocIndexOf(data, key);

            return index < 0 ? undefined : data[index][1];
        }

        /**
         * Checks if a list cache value for `key` exists.
         *
         * @private
         * @name has
         * @memberOf ListCache
         * @param {string} key The key of the entry to check.
         * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
         */
        function listCacheHas(key) {
            return assocIndexOf(this.__data__, key) > -1;
        }

        /**
         * Sets the list cache `key` to `value`.
         *
         * @private
         * @name set
         * @memberOf ListCache
         * @param {string} key The key of the value to set.
         * @param {*} value The value to set.
         * @returns {Object} Returns the list cache instance.
         */
        function listCacheSet(key, value) {
            var data = this.__data__
                , index = assocIndexOf(data, key);

            if (index < 0) {
                data.push([key, value]);
            } else {
                data[index][1] = value;
            }
            return this;
        }

        // Add methods to `ListCache`.
        ListCache.prototype.clear = listCacheClear;
        ListCache.prototype['delete'] = listCacheDelete;
        ListCache.prototype.get = listCacheGet;
        ListCache.prototype.has = listCacheHas;
        ListCache.prototype.set = listCacheSet;

        /**
         * Creates a map cache object to store key-value pairs.
         *
         * @private
         * @constructor
         * @param {Array} [entries] The key-value pairs to cache.
         */
        function MapCache(entries) {
            var index = -1
                , length = entries ? entries.length : 0;

            this.clear();
            while (++index < length) {
                var entry = entries[index];
                this.set(entry[0], entry[1]);
            }
        }

        /**
         * Removes all key-value entries from the map.
         *
         * @private
         * @name clear
         * @memberOf MapCache
         */
        function mapCacheClear() {
            this.__data__ = {
                'hash': new Hash
                , 'map': new(Map$1 || ListCache)
                , 'string': new Hash
            };
        }

        /**
         * Removes `key` and its value from the map.
         *
         * @private
         * @name delete
         * @memberOf MapCache
         * @param {string} key The key of the value to remove.
         * @returns {boolean} Returns `true` if the entry was removed, else `false`.
         */
        function mapCacheDelete(key) {
            return getMapData(this, key)['delete'](key);
        }

        /**
         * Gets the map value for `key`.
         *
         * @private
         * @name get
         * @memberOf MapCache
         * @param {string} key The key of the value to get.
         * @returns {*} Returns the entry value.
         */
        function mapCacheGet(key) {
            return getMapData(this, key).get(key);
        }

        /**
         * Checks if a map value for `key` exists.
         *
         * @private
         * @name has
         * @memberOf MapCache
         * @param {string} key The key of the entry to check.
         * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
         */
        function mapCacheHas(key) {
            return getMapData(this, key).has(key);
        }

        /**
         * Sets the map `key` to `value`.
         *
         * @private
         * @name set
         * @memberOf MapCache
         * @param {string} key The key of the value to set.
         * @param {*} value The value to set.
         * @returns {Object} Returns the map cache instance.
         */
        function mapCacheSet(key, value) {
            getMapData(this, key).set(key, value);
            return this;
        }

        // Add methods to `MapCache`.
        MapCache.prototype.clear = mapCacheClear;
        MapCache.prototype['delete'] = mapCacheDelete;
        MapCache.prototype.get = mapCacheGet;
        MapCache.prototype.has = mapCacheHas;
        MapCache.prototype.set = mapCacheSet;

        /**
         * Gets the index at which the `key` is found in `array` of key-value pairs.
         *
         * @private
         * @param {Array} array The array to inspect.
         * @param {*} key The key to search for.
         * @returns {number} Returns the index of the matched value, else `-1`.
         */
        function assocIndexOf(array, key) {
            var length = array.length;
            while (length--) {
                if (eq(array[length][0], key)) {
                    return length;
                }
            }
            return -1;
        }

        /**
         * The base implementation of `_.isNative` without bad shim checks.
         *
         * @private
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is a native function,
         *  else `false`.
         */
        function baseIsNative(value) {
            if (!isObject$2(value) || isMasked(value)) {
                return false;
            }
            var pattern = (isFunction(value) || isHostObject(value)) ? reIsNative : reIsHostCtor;
            return pattern.test(toSource(value));
        }

        /**
         * Gets the data for `map`.
         *
         * @private
         * @param {Object} map The map to query.
         * @param {string} key The reference key.
         * @returns {*} Returns the map data.
         */
        function getMapData(map, key) {
            var data = map.__data__;
            return isKeyable(key) ?
                data[typeof key == 'string' ? 'string' : 'hash'] :
                data.map;
        }

        /**
         * Gets the native function at `key` of `object`.
         *
         * @private
         * @param {Object} object The object to query.
         * @param {string} key The key of the method to get.
         * @returns {*} Returns the function if it's native, else `undefined`.
         */
        function getNative(object, key) {
            var value = getValue(object, key);
            return baseIsNative(value) ? value : undefined;
        }

        /**
         * Checks if `value` is suitable for use as unique object key.
         *
         * @private
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is suitable, else `false`.
         */
        function isKeyable(value) {
            var type = typeof value;
            return (type == 'string' || type == 'number' || type == 'symbol' || type == 'boolean') ?
                (value !== '__proto__') :
                (value === null);
        }

        /**
         * Checks if `func` has its source masked.
         *
         * @private
         * @param {Function} func The function to check.
         * @returns {boolean} Returns `true` if `func` is masked, else `false`.
         */
        function isMasked(func) {
            return !!maskSrcKey && (maskSrcKey in func);
        }

        /**
         * Converts `func` to its source code.
         *
         * @private
         * @param {Function} func The function to process.
         * @returns {string} Returns the source code.
         */
        function toSource(func) {
            if (func != null) {
                try {
                    return funcToString.call(func);
                } catch (e) {}
                try {
                    return (func + '');
                } catch (e) {}
            }
            return '';
        }

        /**
         * Creates a function that memoizes the result of `func`. If `resolver` is
         * provided, it determines the cache key for storing the result based on the
         * arguments provided to the memoized function. By default, the first argument
         * provided to the memoized function is used as the map cache key. The `func`
         * is invoked with the `this` binding of the memoized function.
         *
         * **Note:** The cache is exposed as the `cache` property on the memoized
         * function. Its creation may be customized by replacing the `_.memoize.Cache`
         * constructor with one whose instances implement the
         * [`Map`](http://ecma-international.org/ecma-262/7.0/#sec-properties-of-the-map-prototype-object)
         * method interface of `delete`, `get`, `has`, and `set`.
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Function
         * @param {Function} func The function to have its output memoized.
         * @param {Function} [resolver] The function to resolve the cache key.
         * @returns {Function} Returns the new memoized function.
         * @example
         *
         * var object = { 'a': 1, 'b': 2 };
         * var other = { 'c': 3, 'd': 4 };
         *
         * var values = _.memoize(_.values);
         * values(object);
         * // => [1, 2]
         *
         * values(other);
         * // => [3, 4]
         *
         * object.a = 2;
         * values(object);
         * // => [1, 2]
         *
         * // Modify the result cache.
         * values.cache.set(object, ['a', 'b']);
         * values(object);
         * // => ['a', 'b']
         *
         * // Replace `_.memoize.Cache`.
         * _.memoize.Cache = WeakMap;
         */
        function memoize(func, resolver) {
            if (typeof func != 'function' || (resolver && typeof resolver != 'function')) {
                throw new TypeError(FUNC_ERROR_TEXT$2);
            }
            var memoized = function() {
                var args = arguments
                    , key = resolver ? resolver.apply(this, args) : args[0]
                    , cache = memoized.cache;

                if (cache.has(key)) {
                    return cache.get(key);
                }
                var result = func.apply(this, args);
                memoized.cache = cache.set(key, result);
                return result;
            };
            memoized.cache = new(memoize.Cache || MapCache);
            return memoized;
        }

        // Assign cache to `_.memoize`.
        memoize.Cache = MapCache;

        /**
         * Performs a
         * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
         * comparison between two values to determine if they are equivalent.
         *
         * @static
         * @memberOf _
         * @since 4.0.0
         * @category Lang
         * @param {*} value The value to compare.
         * @param {*} other The other value to compare.
         * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
         * @example
         *
         * var object = { 'a': 1 };
         * var other = { 'a': 1 };
         *
         * _.eq(object, object);
         * // => true
         *
         * _.eq(object, other);
         * // => false
         *
         * _.eq('a', 'a');
         * // => true
         *
         * _.eq('a', Object('a'));
         * // => false
         *
         * _.eq(NaN, NaN);
         * // => true
         */
        function eq(value, other) {
            return value === other || (value !== value && other !== other);
        }

        /**
         * Checks if `value` is classified as a `Function` object.
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is a function, else `false`.
         * @example
         *
         * _.isFunction(_);
         * // => true
         *
         * _.isFunction(/abc/);
         * // => false
         */
        function isFunction(value) {
            // The use of `Object#toString` avoids issues with the `typeof` operator
            // in Safari 8-9 which returns 'object' for typed array and other constructors.
            var tag = isObject$2(value) ? objectToString$2.call(value) : '';
            return tag == funcTag || tag == genTag;
        }

        /**
         * Checks if `value` is the
         * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
         * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
         *
         * @static
         * @memberOf _
         * @since 0.1.0
         * @category Lang
         * @param {*} value The value to check.
         * @returns {boolean} Returns `true` if `value` is an object, else `false`.
         * @example
         *
         * _.isObject({});
         * // => true
         *
         * _.isObject([1, 2, 3]);
         * // => true
         *
         * _.isObject(_.noop);
         * // => true
         *
         * _.isObject(null);
         * // => false
         */
        function isObject$2(value) {
            var type = typeof value;
            return !!value && (type == 'object' || type == 'function');
        }

        var lodash_memoize = memoize;

        /**
         * A collection of shims that provide minimal functionality of the ES6 collections.
         *
         * These implementations are not meant to be used outside of the ResizeObserver
         * modules as they cover only a limited range of use cases.
         */
        /* eslint-disable require-jsdoc, valid-jsdoc */
        var MapShim = (function() {
            if (typeof Map !== 'undefined') {
                return Map;
            }
            /**
             * Returns index in provided array that matches the specified key.
             *
             * @param {Array<Array>} arr
             * @param {*} key
             * @returns {number}
             */
            function getIndex(arr, key) {
                var result = -1;
                arr.some(function(entry, index) {
                    if (entry[0] === key) {
                        result = index;
                        return true;
                    }
                    return false;
                });
                return result;
            }
            return /** @class */ (function() {
                function class_1() {
                    this.__entries__ = [];
                }
                Object.defineProperty(class_1.prototype, "size", {
                    /**
                     * @returns {boolean}
                     */
                    get: function() {
                        return this.__entries__.length;
                    }
                    , enumerable: true
                    , configurable: true
                });
                /**
                 * @param {*} key
                 * @returns {*}
                 */
                class_1.prototype.get = function(key) {
                    var index = getIndex(this.__entries__, key);
                    var entry = this.__entries__[index];
                    return entry && entry[1];
                };
                /**
                 * @param {*} key
                 * @param {*} value
                 * @returns {void}
                 */
                class_1.prototype.set = function(key, value) {
                    var index = getIndex(this.__entries__, key);
                    if (~index) {
                        this.__entries__[index][1] = value;
                    } else {
                        this.__entries__.push([key, value]);
                    }
                };
                /**
                 * @param {*} key
                 * @returns {void}
                 */
                class_1.prototype.delete = function(key) {
                    var entries = this.__entries__;
                    var index = getIndex(entries, key);
                    if (~index) {
                        entries.splice(index, 1);
                    }
                };
                /**
                 * @param {*} key
                 * @returns {void}
                 */
                class_1.prototype.has = function(key) {
                    return !!~getIndex(this.__entries__, key);
                };
                /**
                 * @returns {void}
                 */
                class_1.prototype.clear = function() {
                    this.__entries__.splice(0);
                };
                /**
                 * @param {Function} callback
                 * @param {*} [ctx=null]
                 * @returns {void}
                 */
                class_1.prototype.forEach = function(callback, ctx) {
                    if (ctx === void 0) {
                        ctx = null;
                    }
                    for (var _i = 0, _a = this.__entries__; _i < _a.length; _i++) {
                        var entry = _a[_i];
                        callback.call(ctx, entry[1], entry[0]);
                    }
                };
                return class_1;
            }());
        })();

        /**
         * Detects whether window and document objects are available in current environment.
         */
        var isBrowser = typeof window !== 'undefined' && typeof document !== 'undefined' && window.document === document;

        // Returns global object of a current environment.
        var global$1 = (function() {
            if (typeof global !== 'undefined' && global.Math === Math) {
                return global;
            }
            if (typeof self !== 'undefined' && self.Math === Math) {
                return self;
            }
            if (typeof window !== 'undefined' && window.Math === Math) {
                return window;
            }
            // eslint-disable-next-line no-new-func
            return Function('return this')();
        })();

        /**
         * A shim for the requestAnimationFrame which falls back to the setTimeout if
         * first one is not supported.
         *
         * @returns {number} Requests' identifier.
         */
        var requestAnimationFrame$1 = (function() {
            if (typeof requestAnimationFrame === 'function') {
                // It's required to use a bounded function because IE sometimes throws
                // an "Invalid calling object" error if rAF is invoked without the global
                // object on the left hand side.
                return requestAnimationFrame.bind(global$1);
            }
            return function(callback) {
                return setTimeout(function() {
                    return callback(Date.now());
                }, 1000 / 60);
            };
        })();

        // Defines minimum timeout before adding a trailing call.
        var trailingTimeout = 2;
        /**
         * Creates a wrapper function which ensures that provided callback will be
         * invoked only once during the specified delay period.
         *
         * @param {Function} callback - Function to be invoked after the delay period.
         * @param {number} delay - Delay after which to invoke callback.
         * @returns {Function}
         */
        function throttle$1(callback, delay) {
            var leadingCall = false
                , trailingCall = false
                , lastCallTime = 0;
            /**
             * Invokes the original callback function and schedules new invocation if
             * the "proxy" was called during current request.
             *
             * @returns {void}
             */
            function resolvePending() {
                if (leadingCall) {
                    leadingCall = false;
                    callback();
                }
                if (trailingCall) {
                    proxy();
                }
            }
            /**
             * Callback invoked after the specified delay. It will further postpone
             * invocation of the original function delegating it to the
             * requestAnimationFrame.
             *
             * @returns {void}
             */
            function timeoutCallback() {
                requestAnimationFrame$1(resolvePending);
            }
            /**
             * Schedules invocation of the original function.
             *
             * @returns {void}
             */
            function proxy() {
                var timeStamp = Date.now();
                if (leadingCall) {
                    // Reject immediately following calls.
                    if (timeStamp - lastCallTime < trailingTimeout) {
                        return;
                    }
                    // Schedule new call to be in invoked when the pending one is resolved.
                    // This is important for "transitions" which never actually start
                    // immediately so there is a chance that we might miss one if change
                    // happens amids the pending invocation.
                    trailingCall = true;
                } else {
                    leadingCall = true;
                    trailingCall = false;
                    setTimeout(timeoutCallback, delay);
                }
                lastCallTime = timeStamp;
            }
            return proxy;
        }

        // Minimum delay before invoking the update of observers.
        var REFRESH_DELAY = 20;
        // A list of substrings of CSS properties used to find transition events that
        // might affect dimensions of observed elements.
        var transitionKeys = ['top', 'right', 'bottom', 'left', 'width', 'height', 'size', 'weight'];
        // Check if MutationObserver is available.
        var mutationObserverSupported = typeof MutationObserver !== 'undefined';
        /**
         * Singleton controller class which handles updates of ResizeObserver instances.
         */
        var ResizeObserverController = /** @class */ (function() {
            /**
             * Creates a new instance of ResizeObserverController.
             *
             * @private
             */
            function ResizeObserverController() {
                /**
                 * Indicates whether DOM listeners have been added.
                 *
                 * @private {boolean}
                 */
                this.connected_ = false;
                /**
                 * Tells that controller has subscribed for Mutation Events.
                 *
                 * @private {boolean}
                 */
                this.mutationEventsAdded_ = false;
                /**
                 * Keeps reference to the instance of MutationObserver.
                 *
                 * @private {MutationObserver}
                 */
                this.mutationsObserver_ = null;
                /**
                 * A list of connected observers.
                 *
                 * @private {Array<ResizeObserverSPI>}
                 */
                this.observers_ = [];
                this.onTransitionEnd_ = this.onTransitionEnd_.bind(this);
                this.refresh = throttle$1(this.refresh.bind(this), REFRESH_DELAY);
            }
            /**
             * Adds observer to observers list.
             *
             * @param {ResizeObserverSPI} observer - Observer to be added.
             * @returns {void}
             */
            ResizeObserverController.prototype.addObserver = function(observer) {
                if (!~this.observers_.indexOf(observer)) {
                    this.observers_.push(observer);
                }
                // Add listeners if they haven't been added yet.
                if (!this.connected_) {
                    this.connect_();
                }
            };
            /**
             * Removes observer from observers list.
             *
             * @param {ResizeObserverSPI} observer - Observer to be removed.
             * @returns {void}
             */
            ResizeObserverController.prototype.removeObserver = function(observer) {
                var observers = this.observers_;
                var index = observers.indexOf(observer);
                // Remove observer if it's present in registry.
                if (~index) {
                    observers.splice(index, 1);
                }
                // Remove listeners if controller has no connected observers.
                if (!observers.length && this.connected_) {
                    this.disconnect_();
                }
            };
            /**
             * Invokes the update of observers. It will continue running updates insofar
             * it detects changes.
             *
             * @returns {void}
             */
            ResizeObserverController.prototype.refresh = function() {
                var changesDetected = this.updateObservers_();
                // Continue running updates if changes have been detected as there might
                // be future ones caused by CSS transitions.
                if (changesDetected) {
                    this.refresh();
                }
            };
            /**
             * Updates every observer from observers list and notifies them of queued
             * entries.
             *
             * @private
             * @returns {boolean} Returns "true" if any observer has detected changes in
             *      dimensions of it's elements.
             */
            ResizeObserverController.prototype.updateObservers_ = function() {
                // Collect observers that have active observations.
                var activeObservers = this.observers_.filter(function(observer) {
                    return observer.gatherActive(), observer.hasActive();
                });
                // Deliver notifications in a separate cycle in order to avoid any
                // collisions between observers, e.g. when multiple instances of
                // ResizeObserver are tracking the same element and the callback of one
                // of them changes content dimensions of the observed target. Sometimes
                // this may result in notifications being blocked for the rest of observers.
                activeObservers.forEach(function(observer) {
                    return observer.broadcastActive();
                });
                return activeObservers.length > 0;
            };
            /**
             * Initializes DOM listeners.
             *
             * @private
             * @returns {void}
             */
            ResizeObserverController.prototype.connect_ = function() {
                // Do nothing if running in a non-browser environment or if listeners
                // have been already added.
                if (!isBrowser || this.connected_) {
                    return;
                }
                // Subscription to the "Transitionend" event is used as a workaround for
                // delayed transitions. This way it's possible to capture at least the
                // final state of an element.
                document.addEventListener('transitionend', this.onTransitionEnd_);
                window.addEventListener('resize', this.refresh);
                if (mutationObserverSupported) {
                    this.mutationsObserver_ = new MutationObserver(this.refresh);
                    this.mutationsObserver_.observe(document, {
                        attributes: true
                        , childList: true
                        , characterData: true
                        , subtree: true
                    });
                } else {
                    document.addEventListener('DOMSubtreeModified', this.refresh);
                    this.mutationEventsAdded_ = true;
                }
                this.connected_ = true;
            };
            /**
             * Removes DOM listeners.
             *
             * @private
             * @returns {void}
             */
            ResizeObserverController.prototype.disconnect_ = function() {
                // Do nothing if running in a non-browser environment or if listeners
                // have been already removed.
                if (!isBrowser || !this.connected_) {
                    return;
                }
                document.removeEventListener('transitionend', this.onTransitionEnd_);
                window.removeEventListener('resize', this.refresh);
                if (this.mutationsObserver_) {
                    this.mutationsObserver_.disconnect();
                }
                if (this.mutationEventsAdded_) {
                    document.removeEventListener('DOMSubtreeModified', this.refresh);
                }
                this.mutationsObserver_ = null;
                this.mutationEventsAdded_ = false;
                this.connected_ = false;
            };
            /**
             * "Transitionend" event handler.
             *
             * @private
             * @param {TransitionEvent} event
             * @returns {void}
             */
            ResizeObserverController.prototype.onTransitionEnd_ = function(_a) {
                var _b = _a.propertyName
                    , propertyName = _b === void 0 ? '' : _b;
                // Detect whether transition may affect dimensions of an element.
                var isReflowProperty = transitionKeys.some(function(key) {
                    return !!~propertyName.indexOf(key);
                });
                if (isReflowProperty) {
                    this.refresh();
                }
            };
            /**
             * Returns instance of the ResizeObserverController.
             *
             * @returns {ResizeObserverController}
             */
            ResizeObserverController.getInstance = function() {
                if (!this.instance_) {
                    this.instance_ = new ResizeObserverController();
                }
                return this.instance_;
            };
            /**
             * Holds reference to the controller's instance.
             *
             * @private {ResizeObserverController}
             */
            ResizeObserverController.instance_ = null;
            return ResizeObserverController;
        }());

        /**
         * Defines non-writable/enumerable properties of the provided target object.
         *
         * @param {Object} target - Object for which to define properties.
         * @param {Object} props - Properties to be defined.
         * @returns {Object} Target object.
         */
        var defineConfigurable = (function(target, props) {
            for (var _i = 0, _a = Object.keys(props); _i < _a.length; _i++) {
                var key = _a[_i];
                Object.defineProperty(target, key, {
                    value: props[key]
                    , enumerable: false
                    , writable: false
                    , configurable: true
                });
            }
            return target;
        });

        /**
         * Returns the global object associated with provided element.
         *
         * @param {Object} target
         * @returns {Object}
         */
        var getWindowOf = (function(target) {
            // Assume that the element is an instance of Node, which means that it
            // has the "ownerDocument" property from which we can retrieve a
            // corresponding global object.
            var ownerGlobal = target && target.ownerDocument && target.ownerDocument.defaultView;
            // Return the local global object if it's not possible extract one from
            // provided element.
            return ownerGlobal || global$1;
        });

        // Placeholder of an empty content rectangle.
        var emptyRect = createRectInit(0, 0, 0, 0);
        /**
         * Converts provided string to a number.
         *
         * @param {number|string} value
         * @returns {number}
         */
        function toFloat(value) {
            return parseFloat(value) || 0;
        }
        /**
         * Extracts borders size from provided styles.
         *
         * @param {CSSStyleDeclaration} styles
         * @param {...string} positions - Borders positions (top, right, ...)
         * @returns {number}
         */
        function getBordersSize(styles) {
            var positions = [];
            for (var _i = 1; _i < arguments.length; _i++) {
                positions[_i - 1] = arguments[_i];
            }
            return positions.reduce(function(size, position) {
                var value = styles['border-' + position + '-width'];
                return size + toFloat(value);
            }, 0);
        }
        /**
         * Extracts paddings sizes from provided styles.
         *
         * @param {CSSStyleDeclaration} styles
         * @returns {Object} Paddings box.
         */
        function getPaddings(styles) {
            var positions = ['top', 'right', 'bottom', 'left'];
            var paddings = {};
            for (var _i = 0, positions_1 = positions; _i < positions_1.length; _i++) {
                var position = positions_1[_i];
                var value = styles['padding-' + position];
                paddings[position] = toFloat(value);
            }
            return paddings;
        }
        /**
         * Calculates content rectangle of provided SVG element.
         *
         * @param {SVGGraphicsElement} target - Element content rectangle of which needs
         *      to be calculated.
         * @returns {DOMRectInit}
         */
        function getSVGContentRect(target) {
            var bbox = target.getBBox();
            return createRectInit(0, 0, bbox.width, bbox.height);
        }
        /**
         * Calculates content rectangle of provided HTMLElement.
         *
         * @param {HTMLElement} target - Element for which to calculate the content rectangle.
         * @returns {DOMRectInit}
         */
        function getHTMLElementContentRect(target) {
            // Client width & height properties can't be
            // used exclusively as they provide rounded values.
            var clientWidth = target.clientWidth
                , clientHeight = target.clientHeight;
            // By this condition we can catch all non-replaced inline, hidden and
            // detached elements. Though elements with width & height properties less
            // than 0.5 will be discarded as well.
            //
            // Without it we would need to implement separate methods for each of
            // those cases and it's not possible to perform a precise and performance
            // effective test for hidden elements. E.g. even jQuery's ':visible' filter
            // gives wrong results for elements with width & height less than 0.5.
            if (!clientWidth && !clientHeight) {
                return emptyRect;
            }
            var styles = getWindowOf(target).getComputedStyle(target);
            var paddings = getPaddings(styles);
            var horizPad = paddings.left + paddings.right;
            var vertPad = paddings.top + paddings.bottom;
            // Computed styles of width & height are being used because they are the
            // only dimensions available to JS that contain non-rounded values. It could
            // be possible to utilize the getBoundingClientRect if only it's data wasn't
            // affected by CSS transformations let alone paddings, borders and scroll bars.
            var width = toFloat(styles.width)
                , height = toFloat(styles.height);
            // Width & height include paddings and borders when the 'border-box' box
            // model is applied (except for IE).
            if (styles.boxSizing === 'border-box') {
                // Following conditions are required to handle Internet Explorer which
                // doesn't include paddings and borders to computed CSS dimensions.
                //
                // We can say that if CSS dimensions + paddings are equal to the "client"
                // properties then it's either IE, and thus we don't need to subtract
                // anything, or an element merely doesn't have paddings/borders styles.
                if (Math.round(width + horizPad) !== clientWidth) {
                    width -= getBordersSize(styles, 'left', 'right') + horizPad;
                }
                if (Math.round(height + vertPad) !== clientHeight) {
                    height -= getBordersSize(styles, 'top', 'bottom') + vertPad;
                }
            }
            // Following steps can't be applied to the document's root element as its
            // client[Width/Height] properties represent viewport area of the window.
            // Besides, it's as well not necessary as the <html> itself neither has
            // rendered scroll bars nor it can be clipped.
            if (!isDocumentElement(target)) {
                // In some browsers (only in Firefox, actually) CSS width & height
                // include scroll bars size which can be removed at this step as scroll
                // bars are the only difference between rounded dimensions + paddings
                // and "client" properties, though that is not always true in Chrome.
                var vertScrollbar = Math.round(width + horizPad) - clientWidth;
                var horizScrollbar = Math.round(height + vertPad) - clientHeight;
                // Chrome has a rather weird rounding of "client" properties.
                // E.g. for an element with content width of 314.2px it sometimes gives
                // the client width of 315px and for the width of 314.7px it may give
                // 314px. And it doesn't happen all the time. So just ignore this delta
                // as a non-relevant.
                if (Math.abs(vertScrollbar) !== 1) {
                    width -= vertScrollbar;
                }
                if (Math.abs(horizScrollbar) !== 1) {
                    height -= horizScrollbar;
                }
            }
            return createRectInit(paddings.left, paddings.top, width, height);
        }
        /**
         * Checks whether provided element is an instance of the SVGGraphicsElement.
         *
         * @param {Element} target - Element to be checked.
         * @returns {boolean}
         */
        var isSVGGraphicsElement = (function() {
            // Some browsers, namely IE and Edge, don't have the SVGGraphicsElement
            // interface.
            if (typeof SVGGraphicsElement !== 'undefined') {
                return function(target) {
                    return target instanceof getWindowOf(target).SVGGraphicsElement;
                };
            }
            // If it's so, then check that element is at least an instance of the
            // SVGElement and that it has the "getBBox" method.
            // eslint-disable-next-line no-extra-parens
            return function(target) {
                return (target instanceof getWindowOf(target).SVGElement &&
                    typeof target.getBBox === 'function');
            };
        })();
        /**
         * Checks whether provided element is a document element (<html>).
         *
         * @param {Element} target - Element to be checked.
         * @returns {boolean}
         */
        function isDocumentElement(target) {
            return target === getWindowOf(target).document.documentElement;
        }
        /**
         * Calculates an appropriate content rectangle for provided html or svg element.
         *
         * @param {Element} target - Element content rectangle of which needs to be calculated.
         * @returns {DOMRectInit}
         */
        function getContentRect(target) {
            if (!isBrowser) {
                return emptyRect;
            }
            if (isSVGGraphicsElement(target)) {
                return getSVGContentRect(target);
            }
            return getHTMLElementContentRect(target);
        }
        /**
         * Creates rectangle with an interface of the DOMRectReadOnly.
         * Spec: https://drafts.fxtf.org/geometry/#domrectreadonly
         *
         * @param {DOMRectInit} rectInit - Object with rectangle's x/y coordinates and dimensions.
         * @returns {DOMRectReadOnly}
         */
        function createReadOnlyRect(_a) {
            var x = _a.x
                , y = _a.y
                , width = _a.width
                , height = _a.height;
            // If DOMRectReadOnly is available use it as a prototype for the rectangle.
            var Constr = typeof DOMRectReadOnly !== 'undefined' ? DOMRectReadOnly : Object;
            var rect = Object.create(Constr.prototype);
            // Rectangle's properties are not writable and non-enumerable.
            defineConfigurable(rect, {
                x: x
                , y: y
                , width: width
                , height: height
                , top: y
                , right: x + width
                , bottom: height + y
                , left: x
            });
            return rect;
        }
        /**
         * Creates DOMRectInit object based on the provided dimensions and the x/y coordinates.
         * Spec: https://drafts.fxtf.org/geometry/#dictdef-domrectinit
         *
         * @param {number} x - X coordinate.
         * @param {number} y - Y coordinate.
         * @param {number} width - Rectangle's width.
         * @param {number} height - Rectangle's height.
         * @returns {DOMRectInit}
         */
        function createRectInit(x, y, width, height) {
            return {
                x: x
                , y: y
                , width: width
                , height: height
            };
        }

        /**
         * Class that is responsible for computations of the content rectangle of
         * provided DOM element and for keeping track of it's changes.
         */
        var ResizeObservation = /** @class */ (function() {
            /**
             * Creates an instance of ResizeObservation.
             *
             * @param {Element} target - Element to be observed.
             */
            function ResizeObservation(target) {
                /**
                 * Broadcasted width of content rectangle.
                 *
                 * @type {number}
                 */
                this.broadcastWidth = 0;
                /**
                 * Broadcasted height of content rectangle.
                 *
                 * @type {number}
                 */
                this.broadcastHeight = 0;
                /**
                 * Reference to the last observed content rectangle.
                 *
                 * @private {DOMRectInit}
                 */
                this.contentRect_ = createRectInit(0, 0, 0, 0);
                this.target = target;
            }
            /**
             * Updates content rectangle and tells whether it's width or height properties
             * have changed since the last broadcast.
             *
             * @returns {boolean}
             */
            ResizeObservation.prototype.isActive = function() {
                var rect = getContentRect(this.target);
                this.contentRect_ = rect;
                return (rect.width !== this.broadcastWidth ||
                    rect.height !== this.broadcastHeight);
            };
            /**
             * Updates 'broadcastWidth' and 'broadcastHeight' properties with a data
             * from the corresponding properties of the last observed content rectangle.
             *
             * @returns {DOMRectInit} Last observed content rectangle.
             */
            ResizeObservation.prototype.broadcastRect = function() {
                var rect = this.contentRect_;
                this.broadcastWidth = rect.width;
                this.broadcastHeight = rect.height;
                return rect;
            };
            return ResizeObservation;
        }());

        var ResizeObserverEntry = /** @class */ (function() {
            /**
             * Creates an instance of ResizeObserverEntry.
             *
             * @param {Element} target - Element that is being observed.
             * @param {DOMRectInit} rectInit - Data of the element's content rectangle.
             */
            function ResizeObserverEntry(target, rectInit) {
                var contentRect = createReadOnlyRect(rectInit);
                // According to the specification following properties are not writable
                // and are also not enumerable in the native implementation.
                //
                // Property accessors are not being used as they'd require to define a
                // private WeakMap storage which may cause memory leaks in browsers that
                // don't support this type of collections.
                defineConfigurable(this, {
                    target: target
                    , contentRect: contentRect
                });
            }
            return ResizeObserverEntry;
        }());

        var ResizeObserverSPI = /** @class */ (function() {
            /**
             * Creates a new instance of ResizeObserver.
             *
             * @param {ResizeObserverCallback} callback - Callback function that is invoked
             *      when one of the observed elements changes it's content dimensions.
             * @param {ResizeObserverController} controller - Controller instance which
             *      is responsible for the updates of observer.
             * @param {ResizeObserver} callbackCtx - Reference to the public
             *      ResizeObserver instance which will be passed to callback function.
             */
            function ResizeObserverSPI(callback, controller, callbackCtx) {
                /**
                 * Collection of resize observations that have detected changes in dimensions
                 * of elements.
                 *
                 * @private {Array<ResizeObservation>}
                 */
                this.activeObservations_ = [];
                /**
                 * Registry of the ResizeObservation instances.
                 *
                 * @private {Map<Element, ResizeObservation>}
                 */
                this.observations_ = new MapShim();
                if (typeof callback !== 'function') {
                    throw new TypeError('The callback provided as parameter 1 is not a function.');
                }
                this.callback_ = callback;
                this.controller_ = controller;
                this.callbackCtx_ = callbackCtx;
            }
            /**
             * Starts observing provided element.
             *
             * @param {Element} target - Element to be observed.
             * @returns {void}
             */
            ResizeObserverSPI.prototype.observe = function(target) {
                if (!arguments.length) {
                    throw new TypeError('1 argument required, but only 0 present.');
                }
                // Do nothing if current environment doesn't have the Element interface.
                if (typeof Element === 'undefined' || !(Element instanceof Object)) {
                    return;
                }
                if (!(target instanceof getWindowOf(target).Element)) {
                    throw new TypeError('parameter 1 is not of type "Element".');
                }
                var observations = this.observations_;
                // Do nothing if element is already being observed.
                if (observations.has(target)) {
                    return;
                }
                observations.set(target, new ResizeObservation(target));
                this.controller_.addObserver(this);
                // Force the update of observations.
                this.controller_.refresh();
            };
            /**
             * Stops observing provided element.
             *
             * @param {Element} target - Element to stop observing.
             * @returns {void}
             */
            ResizeObserverSPI.prototype.unobserve = function(target) {
                if (!arguments.length) {
                    throw new TypeError('1 argument required, but only 0 present.');
                }
                // Do nothing if current environment doesn't have the Element interface.
                if (typeof Element === 'undefined' || !(Element instanceof Object)) {
                    return;
                }
                if (!(target instanceof getWindowOf(target).Element)) {
                    throw new TypeError('parameter 1 is not of type "Element".');
                }
                var observations = this.observations_;
                // Do nothing if element is not being observed.
                if (!observations.has(target)) {
                    return;
                }
                observations.delete(target);
                if (!observations.size) {
                    this.controller_.removeObserver(this);
                }
            };
            /**
             * Stops observing all elements.
             *
             * @returns {void}
             */
            ResizeObserverSPI.prototype.disconnect = function() {
                this.clearActive();
                this.observations_.clear();
                this.controller_.removeObserver(this);
            };
            /**
             * Collects observation instances the associated element of which has changed
             * it's content rectangle.
             *
             * @returns {void}
             */
            ResizeObserverSPI.prototype.gatherActive = function() {
                var _this = this;
                this.clearActive();
                this.observations_.forEach(function(observation) {
                    if (observation.isActive()) {
                        _this.activeObservations_.push(observation);
                    }
                });
            };
            /**
             * Invokes initial callback function with a list of ResizeObserverEntry
             * instances collected from active resize observations.
             *
             * @returns {void}
             */
            ResizeObserverSPI.prototype.broadcastActive = function() {
                // Do nothing if observer doesn't have active observations.
                if (!this.hasActive()) {
                    return;
                }
                var ctx = this.callbackCtx_;
                // Create ResizeObserverEntry instance for every active observation.
                var entries = this.activeObservations_.map(function(observation) {
                    return new ResizeObserverEntry(observation.target, observation.broadcastRect());
                });
                this.callback_.call(ctx, entries, ctx);
                this.clearActive();
            };
            /**
             * Clears the collection of active observations.
             *
             * @returns {void}
             */
            ResizeObserverSPI.prototype.clearActive = function() {
                this.activeObservations_.splice(0);
            };
            /**
             * Tells whether observer has active observations.
             *
             * @returns {boolean}
             */
            ResizeObserverSPI.prototype.hasActive = function() {
                return this.activeObservations_.length > 0;
            };
            return ResizeObserverSPI;
        }());

        // Registry of internal observers. If WeakMap is not available use current shim
        // for the Map collection as it has all required methods and because WeakMap
        // can't be fully polyfilled anyway.
        var observers = typeof WeakMap !== 'undefined' ? new WeakMap() : new MapShim();
        /**
         * ResizeObserver API. Encapsulates the ResizeObserver SPI implementation
         * exposing only those methods and properties that are defined in the spec.
         */
        var ResizeObserver = /** @class */ (function() {
            /**
             * Creates a new instance of ResizeObserver.
             *
             * @param {ResizeObserverCallback} callback - Callback that is invoked when
             *      dimensions of the observed elements change.
             */
            function ResizeObserver(callback) {
                if (!(this instanceof ResizeObserver)) {
                    throw new TypeError('Cannot call a class as a function.');
                }
                if (!arguments.length) {
                    throw new TypeError('1 argument required, but only 0 present.');
                }
                var controller = ResizeObserverController.getInstance();
                var observer = new ResizeObserverSPI(callback, controller, this);
                observers.set(this, observer);
            }
            return ResizeObserver;
        }());
        // Expose public methods of ResizeObserver.
        [
            'observe'
            , 'unobserve'
            , 'disconnect'
        ].forEach(function(method) {
            ResizeObserver.prototype[method] = function() {
                var _a;
                return (_a = observers.get(this))[method].apply(_a, arguments);
            };
        });

        var index = (function() {
            // Export existing implementation if available.
            if (typeof global$1.ResizeObserver !== 'undefined') {
                return global$1.ResizeObserver;
            }
            return ResizeObserver;
        })();

        var canUseDOM = !!(
            typeof window !== 'undefined' &&
            window.document &&
            window.document.createElement
        );

        var canUseDom = canUseDOM;

        var SimpleBar =
            /*#__PURE__*/
            function() {
                function SimpleBar(element, options) {
                    var _this = this;

                    _classCallCheck(this, SimpleBar);

                    this.onScroll = function() {
                        if (!_this.scrollXTicking) {
                            window.requestAnimationFrame(_this.scrollX);
                            _this.scrollXTicking = true;
                        }

                        if (!_this.scrollYTicking) {
                            window.requestAnimationFrame(_this.scrollY);
                            _this.scrollYTicking = true;
                        }
                    };

                    this.scrollX = function() {
                        if (_this.axis.x.isOverflowing) {
                            _this.showScrollbar('x');

                            _this.positionScrollbar('x');
                        }

                        _this.scrollXTicking = false;
                    };

                    this.scrollY = function() {
                        if (_this.axis.y.isOverflowing) {
                            _this.showScrollbar('y');

                            _this.positionScrollbar('y');
                        }

                        _this.scrollYTicking = false;
                    };

                    this.onMouseEnter = function() {
                        _this.showScrollbar('x');

                        _this.showScrollbar('y');
                    };

                    this.onMouseMove = function(e) {
                        _this.mouseX = e.clientX;
                        _this.mouseY = e.clientY;

                        if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) {
                            _this.onMouseMoveForAxis('x');
                        }

                        if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) {
                            _this.onMouseMoveForAxis('y');
                        }
                    };

                    this.onMouseLeave = function() {
                        _this.onMouseMove.cancel();

                        if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) {
                            _this.onMouseLeaveForAxis('x');
                        }

                        if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) {
                            _this.onMouseLeaveForAxis('y');
                        }

                        _this.mouseX = -1;
                        _this.mouseY = -1;
                    };

                    this.onWindowResize = function() {
                        // Recalculate scrollbarWidth in case it's a zoom
                        _this.scrollbarWidth = scrollbarWidth();

                        _this.hideNativeScrollbar();
                    };

                    this.hideScrollbars = function() {
                        _this.axis.x.track.rect = _this.axis.x.track.el.getBoundingClientRect();
                        _this.axis.y.track.rect = _this.axis.y.track.el.getBoundingClientRect();

                        if (!_this.isWithinBounds(_this.axis.y.track.rect)) {
                            _this.axis.y.scrollbar.el.classList.remove(_this.classNames.visible);

                            _this.axis.y.isVisible = false;
                        }

                        if (!_this.isWithinBounds(_this.axis.x.track.rect)) {
                            _this.axis.x.scrollbar.el.classList.remove(_this.classNames.visible);

                            _this.axis.x.isVisible = false;
                        }
                    };

                    this.onPointerEvent = function(e) {
                        var isWithinBoundsY, isWithinBoundsX;
                        _this.axis.x.scrollbar.rect = _this.axis.x.scrollbar.el.getBoundingClientRect();
                        _this.axis.y.scrollbar.rect = _this.axis.y.scrollbar.el.getBoundingClientRect();

                        if (_this.axis.x.isOverflowing || _this.axis.x.forceVisible) {
                            isWithinBoundsX = _this.isWithinBounds(_this.axis.x.scrollbar.rect);
                        }

                        if (_this.axis.y.isOverflowing || _this.axis.y.forceVisible) {
                            isWithinBoundsY = _this.isWithinBounds(_this.axis.y.scrollbar.rect);
                        } // If any pointer event is called on the scrollbar


                        if (isWithinBoundsY || isWithinBoundsX) {
                            // Preventing the event's default action stops text being
                            // selectable during the drag.
                            e.preventDefault(); // Prevent event leaking

                            e.stopPropagation();

                            if (e.type === 'mousedown') {
                                if (isWithinBoundsY) {
                                    _this.onDragStart(e, 'y');
                                }

                                if (isWithinBoundsX) {
                                    _this.onDragStart(e, 'x');
                                }
                            }
                        }
                    };

                    this.drag = function(e) {
                        var eventOffset;
                        var track = _this.axis[_this.draggedAxis].track;
                        var trackSize = track.rect[_this.axis[_this.draggedAxis].sizeAttr];
                        var scrollbar = _this.axis[_this.draggedAxis].scrollbar;
                        e.preventDefault();
                        e.stopPropagation();

                        if (_this.draggedAxis === 'y') {
                            eventOffset = e.pageY;
                        } else {
                            eventOffset = e.pageX;
                        } // Calculate how far the user's mouse is from the top/left of the scrollbar (minus the dragOffset).


                        var dragPos = eventOffset - track.rect[_this.axis[_this.draggedAxis].offsetAttr] - _this.axis[_this.draggedAxis].dragOffset; // Convert the mouse position into a percentage of the scrollbar height/width.

                        var dragPerc = dragPos / track.rect[_this.axis[_this.draggedAxis].sizeAttr]; // Scroll the content by the same percentage.

                        var scrollPos = dragPerc * _this.contentEl[_this.axis[_this.draggedAxis].scrollSizeAttr]; // Fix browsers inconsistency on RTL

                        if (_this.draggedAxis === 'x') {
                            scrollPos = _this.isRtl && SimpleBar.getRtlHelpers().isRtlScrollbarInverted ? scrollPos - (trackSize + scrollbar.size) : scrollPos;
                            scrollPos = _this.isRtl && SimpleBar.getRtlHelpers().isRtlScrollingInverted ? -scrollPos : scrollPos;
                        }

                        _this.contentEl[_this.axis[_this.draggedAxis].scrollOffsetAttr] = scrollPos;
                    };

                    this.onEndDrag = function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        document.removeEventListener('mousemove', _this.drag);
                        document.removeEventListener('mouseup', _this.onEndDrag);
                    };

                    this.el = element;
                    this.flashTimeout;
                    this.contentEl;
                    this.offsetEl;
                    this.maskEl;
                    this.globalObserver;
                    this.mutationObserver;
                    this.resizeObserver;
                    this.scrollbarWidth;
                    this.minScrollbarWidth = 20;
                    this.options = _objectSpread({}, SimpleBar.defaultOptions, options);
                    this.classNames = _objectSpread({}, SimpleBar.defaultOptions.classNames, this.options.classNames);
                    this.isRtl;
                    this.axis = {
                        x: {
                            scrollOffsetAttr: 'scrollLeft'
                            , sizeAttr: 'width'
                            , scrollSizeAttr: 'scrollWidth'
                            , offsetAttr: 'left'
                            , overflowAttr: 'overflowX'
                            , dragOffset: 0
                            , isOverflowing: true
                            , isVisible: false
                            , forceVisible: false
                            , track: {}
                            , scrollbar: {}
                        }
                        , y: {
                            scrollOffsetAttr: 'scrollTop'
                            , sizeAttr: 'height'
                            , scrollSizeAttr: 'scrollHeight'
                            , offsetAttr: 'top'
                            , overflowAttr: 'overflowY'
                            , dragOffset: 0
                            , isOverflowing: true
                            , isVisible: false
                            , forceVisible: false
                            , track: {}
                            , scrollbar: {}
                        }
                    };
                    this.recalculate = lodash_throttle(this.recalculate.bind(this), 64);
                    this.onMouseMove = lodash_throttle(this.onMouseMove.bind(this), 64);
                    this.hideScrollbars = lodash_debounce(this.hideScrollbars.bind(this), this.options.timeout);
                    this.onWindowResize = lodash_debounce(this.onWindowResize.bind(this), 64, {
                        leading: true
                    });
                    SimpleBar.getRtlHelpers = lodash_memoize(SimpleBar.getRtlHelpers); // getContentElement is deprecated

                    this.getContentElement = this.getScrollElement;
                    this.init();
                }
                /**
                 * Static properties
                 */

                /**
                 * Helper to fix browsers inconsistency on RTL:
                 *  - Firefox inverts the scrollbar initial position
                 *  - IE11 inverts both scrollbar position and scrolling offset
                 * Directly inspired by @KingSora's OverlayScrollbars https://github.com/KingSora/OverlayScrollbars/blob/master/js/OverlayScrollbars.js#L1634
                 */


                _createClass(SimpleBar, [{
                    key: "init"
                    , value: function init() {
                        // Save a reference to the instance, so we know this DOM node has already been instancied
                        this.el.SimpleBar = this; // We stop here on server-side

                        if (canUseDom) {
                            this.initDOM();
                            this.scrollbarWidth = scrollbarWidth();
                            this.recalculate();
                            this.initListeners();
                        }
                    }
                }, {
                    key: "initDOM"
                    , value: function initDOM() {
                        var _this2 = this;

                        // make sure this element doesn't have the elements yet
                        if (Array.from(this.el.children).filter(function(child) {
                                return child.classList.contains(_this2.classNames.wrapper);
                            }).length) {
                            // assume that element has his DOM already initiated
                            this.wrapperEl = this.el.querySelector(".".concat(this.classNames.wrapper));
                            this.contentEl = this.el.querySelector(".".concat(this.classNames.content));
                            this.offsetEl = this.el.querySelector(".".concat(this.classNames.offset));
                            this.maskEl = this.el.querySelector(".".concat(this.classNames.mask));
                            this.placeholderEl = this.el.querySelector(".".concat(this.classNames.placeholder));
                            this.heightAutoObserverWrapperEl = this.el.querySelector(".".concat(this.classNames.heightAutoObserverWrapperEl));
                            this.heightAutoObserverEl = this.el.querySelector(".".concat(this.classNames.heightAutoObserverEl));
                            this.axis.x.track.el = this.el.querySelector(".".concat(this.classNames.track, ".").concat(this.classNames.horizontal));
                            this.axis.y.track.el = this.el.querySelector(".".concat(this.classNames.track, ".").concat(this.classNames.vertical));
                        } else {
                            // Prepare DOM
                            this.wrapperEl = document.createElement('div');
                            this.contentEl = document.createElement('div');
                            this.offsetEl = document.createElement('div');
                            this.maskEl = document.createElement('div');
                            this.placeholderEl = document.createElement('div');
                            this.heightAutoObserverWrapperEl = document.createElement('div');
                            this.heightAutoObserverEl = document.createElement('div');
                            this.wrapperEl.classList.add(this.classNames.wrapper);
                            this.contentEl.classList.add(this.classNames.content);
                            this.offsetEl.classList.add(this.classNames.offset);
                            this.maskEl.classList.add(this.classNames.mask);
                            this.placeholderEl.classList.add(this.classNames.placeholder);
                            this.heightAutoObserverWrapperEl.classList.add(this.classNames.heightAutoObserverWrapperEl);
                            this.heightAutoObserverEl.classList.add(this.classNames.heightAutoObserverEl);

                            while (this.el.firstChild) {
                                this.contentEl.appendChild(this.el.firstChild);
                            }

                            this.offsetEl.appendChild(this.contentEl);
                            this.maskEl.appendChild(this.offsetEl);
                            this.heightAutoObserverWrapperEl.appendChild(this.heightAutoObserverEl);
                            this.wrapperEl.appendChild(this.heightAutoObserverWrapperEl);
                            this.wrapperEl.appendChild(this.maskEl);
                            this.wrapperEl.appendChild(this.placeholderEl);
                            this.el.appendChild(this.wrapperEl);
                        }

                        if (!this.axis.x.track.el || !this.axis.y.track.el) {
                            var track = document.createElement('div');
                            var scrollbar = document.createElement('div');
                            track.classList.add(this.classNames.track);
                            scrollbar.classList.add(this.classNames.scrollbar);

                            if (!this.options.autoHide) {
                                scrollbar.classList.add(this.classNames.visible);
                            }

                            track.appendChild(scrollbar);
                            this.axis.x.track.el = track.cloneNode(true);
                            this.axis.x.track.el.classList.add(this.classNames.horizontal);
                            this.axis.y.track.el = track.cloneNode(true);
                            this.axis.y.track.el.classList.add(this.classNames.vertical);
                            this.el.appendChild(this.axis.x.track.el);
                            this.el.appendChild(this.axis.y.track.el);
                        }

                        this.axis.x.scrollbar.el = this.axis.x.track.el.querySelector(".".concat(this.classNames.scrollbar));
                        this.axis.y.scrollbar.el = this.axis.y.track.el.querySelector(".".concat(this.classNames.scrollbar));
                        this.el.setAttribute('data-simplebar', 'init');
                    }
                }, {
                    key: "initListeners"
                    , value: function initListeners() {
                        var _this3 = this;

                        // Event listeners
                        if (this.options.autoHide) {
                            this.el.addEventListener('mouseenter', this.onMouseEnter);
                        }

                        ['mousedown', 'click', 'dblclick', 'touchstart', 'touchend', 'touchmove'].forEach(function(e) {
                            _this3.el.addEventListener(e, _this3.onPointerEvent, true);
                        });
                        this.el.addEventListener('mousemove', this.onMouseMove);
                        this.el.addEventListener('mouseleave', this.onMouseLeave);
                        this.contentEl.addEventListener('scroll', this.onScroll); // Browser zoom triggers a window resize

                        window.addEventListener('resize', this.onWindowResize); // MutationObserver is IE11+

                        if (typeof MutationObserver !== 'undefined') {
                            // create an observer instance
                            this.mutationObserver = new MutationObserver(function(mutations) {
                                mutations.forEach(function(mutation) {
                                    if (mutation.target === _this3.el || !_this3.isChildNode(mutation.target) || mutation.addedNodes.length || mutation.removedNodes.length) {
                                        _this3.recalculate();
                                    }
                                });
                            }); // pass in the target node, as well as the observer options

                            this.mutationObserver.observe(this.el, {
                                attributes: true
                                , childList: true
                                , characterData: true
                                , subtree: true
                            });
                        }

                        this.resizeObserver = new index(this.recalculate);
                        this.resizeObserver.observe(this.el);
                    }
                }, {
                    key: "recalculate"
                    , value: function recalculate() {
                        var isHeightAuto = this.heightAutoObserverEl.offsetHeight <= 1;
                        this.elStyles = window.getComputedStyle(this.el);
                        this.isRtl = this.elStyles.direction === 'rtl';
                        this.contentEl.style.padding = "".concat(this.elStyles.paddingTop, " ").concat(this.elStyles.paddingRight, " ").concat(this.elStyles.paddingBottom, " ").concat(this.elStyles.paddingLeft);
                        this.contentEl.style.height = isHeightAuto ? 'auto' : '100%';
                        this.placeholderEl.style.width = "".concat(this.contentEl.scrollWidth, "px");
                        this.placeholderEl.style.height = "".concat(this.contentEl.scrollHeight, "px");
                        this.wrapperEl.style.margin = "-".concat(this.elStyles.paddingTop, " -").concat(this.elStyles.paddingRight, " -").concat(this.elStyles.paddingBottom, " -").concat(this.elStyles.paddingLeft);
                        this.axis.x.track.rect = this.axis.x.track.el.getBoundingClientRect();
                        this.axis.y.track.rect = this.axis.y.track.el.getBoundingClientRect(); // Set isOverflowing to false if scrollbar is not necessary (content is shorter than offset)

                        this.axis.x.isOverflowing = (this.scrollbarWidth ? this.contentEl.scrollWidth : this.contentEl.scrollWidth - this.minScrollbarWidth) > Math.ceil(this.axis.x.track.rect.width);
                        this.axis.y.isOverflowing = (this.scrollbarWidth ? this.contentEl.scrollHeight : this.contentEl.scrollHeight - this.minScrollbarWidth) > Math.ceil(this.axis.y.track.rect.height); // Set isOverflowing to false if user explicitely set hidden overflow

                        this.axis.x.isOverflowing = this.elStyles.overflowX === 'hidden' ? false : this.axis.x.isOverflowing;
                        this.axis.y.isOverflowing = this.elStyles.overflowY === 'hidden' ? false : this.axis.y.isOverflowing;
                        this.axis.x.forceVisible = this.options.forceVisible === "x" || this.options.forceVisible === true;
                        this.axis.y.forceVisible = this.options.forceVisible === "y" || this.options.forceVisible === true;
                        this.axis.x.scrollbar.size = this.getScrollbarSize('x');
                        this.axis.y.scrollbar.size = this.getScrollbarSize('y');
                        this.axis.x.scrollbar.el.style.width = "".concat(this.axis.x.scrollbar.size, "px");
                        this.axis.y.scrollbar.el.style.height = "".concat(this.axis.y.scrollbar.size, "px");
                        this.positionScrollbar('x');
                        this.positionScrollbar('y');
                        this.toggleTrackVisibility('x');
                        this.toggleTrackVisibility('y');
                        this.hideNativeScrollbar();
                    }
                    /**
                     * Calculate scrollbar size
                     */

                }, {
                    key: "getScrollbarSize"
                    , value: function getScrollbarSize() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        var contentSize = this.scrollbarWidth ? this.contentEl[this.axis[axis].scrollSizeAttr] : this.contentEl[this.axis[axis].scrollSizeAttr] - this.minScrollbarWidth;
                        var trackSize = this.axis[axis].track.rect[this.axis[axis].sizeAttr];
                        var scrollbarSize;

                        if (!this.axis[axis].isOverflowing) {
                            return;
                        }

                        var scrollbarRatio = trackSize / contentSize; // Calculate new height/position of drag handle.

                        scrollbarSize = Math.max(~~(scrollbarRatio * trackSize), this.options.scrollbarMinSize);

                        if (this.options.scrollbarMaxSize) {
                            scrollbarSize = Math.min(scrollbarSize, this.options.scrollbarMaxSize);
                        }

                        return scrollbarSize;
                    }
                }, {
                    key: "positionScrollbar"
                    , value: function positionScrollbar() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        var contentSize = this.contentEl[this.axis[axis].scrollSizeAttr];
                        var trackSize = this.axis[axis].track.rect[this.axis[axis].sizeAttr];
                        var hostSize = parseInt(this.elStyles[this.axis[axis].sizeAttr], 10);
                        var scrollbar = this.axis[axis].scrollbar;
                        var scrollOffset = this.contentEl[this.axis[axis].scrollOffsetAttr];
                        scrollOffset = axis === 'x' && this.isRtl && SimpleBar.getRtlHelpers().isRtlScrollingInverted ? -scrollOffset : scrollOffset;
                        var scrollPourcent = scrollOffset / (contentSize - hostSize);
                        var handleOffset = ~~((trackSize - scrollbar.size) * scrollPourcent);
                        handleOffset = axis === 'x' && this.isRtl && SimpleBar.getRtlHelpers().isRtlScrollbarInverted ? handleOffset + (trackSize - scrollbar.size) : handleOffset;
                        scrollbar.el.style.transform = axis === 'x' ? "translate3d(".concat(handleOffset, "px, 0, 0)") : "translate3d(0, ".concat(handleOffset, "px, 0)");
                    }
                }, {
                    key: "toggleTrackVisibility"
                    , value: function toggleTrackVisibility() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        var track = this.axis[axis].track.el;
                        var scrollbar = this.axis[axis].scrollbar.el;

                        if (this.axis[axis].isOverflowing || this.axis[axis].forceVisible) {
                            track.style.visibility = 'visible';
                            this.contentEl.style[this.axis[axis].overflowAttr] = 'scroll';
                        } else {
                            track.style.visibility = 'hidden';
                            this.contentEl.style[this.axis[axis].overflowAttr] = 'hidden';
                        } // Even if forceVisible is enabled, scrollbar itself should be hidden


                        if (this.axis[axis].isOverflowing) {
                            scrollbar.style.visibility = 'visible';
                        } else {
                            scrollbar.style.visibility = 'hidden';
                        }
                    }
                }, {
                    key: "hideNativeScrollbar"
                    , value: function hideNativeScrollbar() {
                        this.offsetEl.style[this.isRtl ? 'left' : 'right'] = this.axis.y.isOverflowing || this.axis.y.forceVisible ? "-".concat(this.scrollbarWidth || this.minScrollbarWidth, "px") : 0;
                        this.offsetEl.style.bottom = this.axis.x.isOverflowing || this.axis.x.forceVisible ? "-".concat(this.scrollbarWidth || this.minScrollbarWidth, "px") : 0; // If floating scrollbar

                        if (!this.scrollbarWidth) {
                            var paddingDirection = [this.isRtl ? 'paddingLeft' : 'paddingRight'];
                            this.contentEl.style[paddingDirection] = this.axis.y.isOverflowing || this.axis.y.forceVisible ? "calc(".concat(this.elStyles[paddingDirection], " + ").concat(this.minScrollbarWidth, "px)") : this.elStyles[paddingDirection];
                            this.contentEl.style.paddingBottom = this.axis.x.isOverflowing || this.axis.x.forceVisible ? "calc(".concat(this.elStyles.paddingBottom, " + ").concat(this.minScrollbarWidth, "px)") : this.elStyles.paddingBottom;
                        }
                    }
                    /**
                     * On scroll event handling
                     */

                }, {
                    key: "onMouseMoveForAxis"
                    , value: function onMouseMoveForAxis() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        this.axis[axis].track.rect = this.axis[axis].track.el.getBoundingClientRect();
                        this.axis[axis].scrollbar.rect = this.axis[axis].scrollbar.el.getBoundingClientRect();
                        var isWithinScrollbarBoundsX = this.isWithinBounds(this.axis[axis].scrollbar.rect);

                        if (isWithinScrollbarBoundsX) {
                            this.axis[axis].scrollbar.el.classList.add(this.classNames.hover);
                        } else {
                            this.axis[axis].scrollbar.el.classList.remove(this.classNames.hover);
                        }

                        if (this.isWithinBounds(this.axis[axis].track.rect)) {
                            this.showScrollbar(axis);
                            this.axis[axis].track.el.classList.add(this.classNames.hover);
                        } else {
                            this.axis[axis].track.el.classList.remove(this.classNames.hover);
                        }
                    }
                }, {
                    key: "onMouseLeaveForAxis"
                    , value: function onMouseLeaveForAxis() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        this.axis[axis].track.el.classList.remove(this.classNames.hover);
                        this.axis[axis].scrollbar.el.classList.remove(this.classNames.hover);
                    }
                }, {
                    key: "showScrollbar",

                    /**
                     * Show scrollbar
                     */
                    value: function showScrollbar() {
                        var axis = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'y';
                        var scrollbar = this.axis[axis].scrollbar.el;

                        if (!this.axis[axis].isVisible) {
                            scrollbar.classList.add(this.classNames.visible);
                            this.axis[axis].isVisible = true;
                        }

                        if (this.options.autoHide) {
                            this.hideScrollbars();
                        }
                    }
                    /**
                     * Hide Scrollbar
                     */

                }, {
                    key: "onDragStart",

                    /**
                     * on scrollbar handle drag movement starts
                     */
                    value: function onDragStart(e) {
                        var axis = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'y';
                        var scrollbar = this.axis[axis].scrollbar.el; // Measure how far the user's mouse is from the top of the scrollbar drag handle.

                        var eventOffset = axis === 'y' ? e.pageY : e.pageX;
                        this.axis[axis].dragOffset = eventOffset - scrollbar.getBoundingClientRect()[this.axis[axis].offsetAttr];
                        this.draggedAxis = axis;
                        document.addEventListener('mousemove', this.drag);
                        document.addEventListener('mouseup', this.onEndDrag);
                    }
                    /**
                     * Drag scrollbar handle
                     */

                }, {
                    key: "getScrollElement",

                    /**
                     * Getter for original scrolling element
                     */
                    value: function getScrollElement() {
                        return this.contentEl;
                    }
                }, {
                    key: "removeListeners"
                    , value: function removeListeners() {
                        var _this4 = this;

                        // Event listeners
                        if (this.options.autoHide) {
                            this.el.removeEventListener('mouseenter', this.onMouseEnter);
                        }

                        ['mousedown', 'click', 'dblclick', 'touchstart', 'touchend', 'touchmove'].forEach(function(e) {
                            _this4.el.removeEventListener(e, _this4.onPointerEvent);
                        });
                        this.el.removeEventListener('mousemove', this.onMouseMove);
                        this.el.removeEventListener('mouseleave', this.onMouseLeave);
                        this.contentEl.removeEventListener('scroll', this.onScroll);
                        window.removeEventListener('resize', this.onWindowResize);
                        this.mutationObserver && this.mutationObserver.disconnect();
                        this.resizeObserver.disconnect(); // Cancel all debounced functions

                        this.recalculate.cancel();
                        this.onMouseMove.cancel();
                        this.hideScrollbars.cancel();
                        this.onWindowResize.cancel();
                    }
                    /**
                     * UnMount mutation observer and delete SimpleBar instance from DOM element
                     */

                }, {
                    key: "unMount"
                    , value: function unMount() {
                        this.removeListeners();
                        this.el.SimpleBar = null;
                    }
                    /**
                     * Recursively walks up the parent nodes looking for this.el
                     */

                }, {
                    key: "isChildNode"
                    , value: function isChildNode(el) {
                        if (el === null) return false;
                        if (el === this.el) return true;
                        return this.isChildNode(el.parentNode);
                    }
                    /**
                     * Check if mouse is within bounds
                     */

                }, {
                    key: "isWithinBounds"
                    , value: function isWithinBounds(bbox) {
                        return this.mouseX >= bbox.left && this.mouseX <= bbox.left + bbox.width && this.mouseY >= bbox.top && this.mouseY <= bbox.top + bbox.height;
                    }
                }], [{
                    key: "getRtlHelpers"
                    , value: function getRtlHelpers() {
                        var dummyDiv = document.createElement('div');
                        dummyDiv.innerHTML = '<div class="hs-dummy-scrollbar-size"><div style="height: 200%; width: 200%; margin: 10px 0;"></div></div>';
                        var scrollbarDummyEl = dummyDiv.firstElementChild;
                        document.body.appendChild(scrollbarDummyEl);
                        var dummyContainerChild = scrollbarDummyEl.firstElementChild;
                        scrollbarDummyEl.scrollLeft = 0;
                        var dummyContainerOffset = SimpleBar.getOffset(scrollbarDummyEl);
                        var dummyContainerChildOffset = SimpleBar.getOffset(dummyContainerChild);
                        scrollbarDummyEl.scrollLeft = 999;
                        var dummyContainerScrollOffsetAfterScroll = SimpleBar.getOffset(dummyContainerChild);
                        return {
                            // determines if the scrolling is responding with negative values
                            isRtlScrollingInverted: dummyContainerOffset.left !== dummyContainerChildOffset.left && dummyContainerChildOffset.left - dummyContainerScrollOffsetAfterScroll.left !== 0,
                            // determines if the origin scrollbar position is inverted or not (positioned on left or right)
                            isRtlScrollbarInverted: dummyContainerOffset.left !== dummyContainerChildOffset.left
                        };
                    }
                }, {
                    key: "initHtmlApi"
                    , value: function initHtmlApi() {
                        this.initDOMLoadedElements = this.initDOMLoadedElements.bind(this); // MutationObserver is IE11+

                        if (typeof MutationObserver !== 'undefined') {
                            // Mutation observer to observe dynamically added elements
                            this.globalObserver = new MutationObserver(function(mutations) {
                                mutations.forEach(function(mutation) {
                                    Array.from(mutation.addedNodes).forEach(function(addedNode) {
                                        if (addedNode.nodeType === 1) {
                                            if (addedNode.hasAttribute('data-simplebar')) {
                                                !addedNode.SimpleBar && new SimpleBar(addedNode, SimpleBar.getElOptions(addedNode));
                                            } else {
                                                Array.from(addedNode.querySelectorAll('[data-simplebar]')).forEach(function(el) {
                                                    !el.SimpleBar && new SimpleBar(el, SimpleBar.getElOptions(el));
                                                });
                                            }
                                        }
                                    });
                                    Array.from(mutation.removedNodes).forEach(function(removedNode) {
                                        if (removedNode.nodeType === 1) {
                                            if (removedNode.hasAttribute('data-simplebar')) {
                                                removedNode.SimpleBar && removedNode.SimpleBar.unMount();
                                            } else {
                                                Array.from(removedNode.querySelectorAll('[data-simplebar]')).forEach(function(el) {
                                                    el.SimpleBar && el.SimpleBar.unMount();
                                                });
                                            }
                                        }
                                    });
                                });
                            });
                            this.globalObserver.observe(document, {
                                childList: true
                                , subtree: true
                            });
                        } // Taken from jQuery `ready` function
                        // Instantiate elements already present on the page


                        if (document.readyState === 'complete' || document.readyState !== 'loading' && !document.documentElement.doScroll) {
                            // Handle it asynchronously to allow scripts the opportunity to delay init
                            window.setTimeout(this.initDOMLoadedElements);
                        } else {
                            document.addEventListener('DOMContentLoaded', this.initDOMLoadedElements);
                            window.addEventListener('load', this.initDOMLoadedElements);
                        }
                    } // Helper function to retrieve options from element attributes

                }, {
                    key: "getElOptions"
                    , value: function getElOptions(el) {
                        var options = Array.from(el.attributes).reduce(function(acc, attribute) {
                            var option = attribute.name.match(/data-simplebar-(.+)/);

                            if (option) {
                                var key = option[1].replace(/\W+(.)/g, function(x, chr) {
                                    return chr.toUpperCase();
                                });

                                switch (attribute.value) {
                                    case 'true':
                                        acc[key] = true;
                                        break;

                                    case 'false':
                                        acc[key] = false;
                                        break;

                                    case undefined:
                                        acc[key] = true;
                                        break;

                                    default:
                                        acc[key] = attribute.value;
                                }
                            }

                            return acc;
                        }, {});
                        return options;
                    }
                }, {
                    key: "removeObserver"
                    , value: function removeObserver() {
                        this.globalObserver.disconnect();
                    }
                }, {
                    key: "initDOMLoadedElements"
                    , value: function initDOMLoadedElements() {
                        document.removeEventListener('DOMContentLoaded', this.initDOMLoadedElements);
                        window.removeEventListener('load', this.initDOMLoadedElements);
                        Array.from(document.querySelectorAll('[data-simplebar]')).forEach(function(el) {
                            if (!el.SimpleBar) new SimpleBar(el, SimpleBar.getElOptions(el));
                        });
                    }
                }, {
                    key: "getOffset"
                    , value: function getOffset(el) {
                        var rect = el.getBoundingClientRect();
                        return {
                            top: rect.top + (window.pageYOffset || document.documentElement.scrollTop)
                            , left: rect.left + (window.pageXOffset || document.documentElement.scrollLeft)
                        };
                    }
                }]);

                return SimpleBar;
            }();
        /**
         * HTML API
         * Called only in a browser env.
         */


        SimpleBar.defaultOptions = {
            autoHide: true
            , forceVisible: false
            , classNames: {
                content: 'simplebar-content'
                , offset: 'simplebar-offset'
                , mask: 'simplebar-mask'
                , wrapper: 'simplebar-wrapper'
                , placeholder: 'simplebar-placeholder'
                , scrollbar: 'simplebar-scrollbar'
                , track: 'simplebar-track'
                , heightAutoObserverWrapperEl: 'simplebar-height-auto-observer-wrapper'
                , heightAutoObserverEl: 'simplebar-height-auto-observer'
                , visible: 'simplebar-visible'
                , horizontal: 'simplebar-horizontal'
                , vertical: 'simplebar-vertical'
                , hover: 'simplebar-hover'
            }
            , scrollbarMinSize: 25
            , scrollbarMaxSize: 0
            , timeout: 1000
        };

        if (canUseDom) {
            SimpleBar.initHtmlApi();
        }

        return SimpleBar;

    }));

</script>

<script>
    /*! UIkit 3.15.14 | https://www.getuikit.com | (c) 2014 - 2022 YOOtheme | MIT License */
    (function(ue, de) {
        typeof exports == "object" && typeof module < "u" ? module.exports = de() : typeof define == "function" && define.amd ? define("uikit", de) : (ue = typeof globalThis < "u" ? globalThis : ue || self
            , ue.UIkit = de())
    })(this, function() {
        "use strict";
        const {
            hasOwnProperty: ue
            , toString: de
        } = Object.prototype;

        function Bt(t, e) {
            return ue.call(t, e)
        }
        const uo = /\B([A-Z])/g
            , Xt = ft(t => t.replace(uo, "-$1").toLowerCase())
            , fo = /-(\w)/g
            , fe = ft(t => t.replace(fo, us))
            , St = ft(t => t.length ? us(null, t.charAt(0)) + t.slice(1) : "");

        function us(t, e) {
            return e ? e.toUpperCase() : ""
        }

        function lt(t, e) {
            return t == null || t.startsWith == null ? void 0 : t.startsWith(e)
        }

        function Gt(t, e) {
            return t == null || t.endsWith == null ? void 0 : t.endsWith(e)
        }

        function p(t, e) {
            return t == null || t.includes == null ? void 0 : t.includes(e)
        }

        function bt(t, e) {
            return t == null || t.findIndex == null ? void 0 : t.findIndex(e)
        }
        const {
            isArray: Q
            , from: xi
        } = Array
        , {
            assign: xt
        } = Object;

        function mt(t) {
            return typeof t == "function"
        }

        function Tt(t) {
            return t !== null && typeof t == "object"
        }

        function yt(t) {
            return de.call(t) === "[object Object]"
        }

        function Jt(t) {
            return Tt(t) && t === t.window
        }

        function De(t) {
            return $i(t) === 9
        }

        function yi(t) {
            return $i(t) >= 1
        }

        function Kt(t) {
            return $i(t) === 1
        }

        function $i(t) {
            return !Jt(t) && Tt(t) && t.nodeType
        }

        function Me(t) {
            return typeof t == "boolean"
        }

        function D(t) {
            return typeof t == "string"
        }

        function Zt(t) {
            return typeof t == "number"
        }

        function Dt(t) {
            return Zt(t) || D(t) && !isNaN(t - parseFloat(t))
        }

        function pe(t) {
            return !(Q(t) ? t.length : Tt(t) ? Object.keys(t).length : !1)
        }

        function R(t) {
            return t === void 0
        }

        function ki(t) {
            return Me(t) ? t : t === "true" || t === "1" || t === "" ? !0 : t === "false" || t === "0" ? !1 : t
        }

        function Ct(t) {
            const e = Number(t);
            return isNaN(e) ? !1 : e
        }

        function v(t) {
            return parseFloat(t) || 0
        }

        function j(t) {
            return y(t)[0]
        }

        function y(t) {
            return t && (yi(t) ? [t] : Array.from(t).filter(yi)) || []
        }

        function Mt(t) {
            var e;
            if (Jt(t))
                return t;
            t = j(t);
            const i = De(t) ? t : (e = t) == null ? void 0 : e.ownerDocument;
            return (i == null ? void 0 : i.defaultView) || window
        }

        function ge(t, e) {
            return t === e || Tt(t) && Tt(e) && Object.keys(t).length === Object.keys(e).length && $t(t, (i, s) => i === e[s])
        }

        function Si(t, e, i) {
            return t.replace(new RegExp(e + "|" + i, "g"), s => s === e ? i : e)
        }

        function Qt(t) {
            return t[t.length - 1]
        }

        function $t(t, e) {
            for (const i in t)
                if (e(t[i], i) === !1)
                    return !1;
            return !0
        }

        function Ne(t, e) {
            return t.slice().sort((i, s) => {
                let {
                    [e]: n = 0
                } = i
                , {
                    [e]: o = 0
                } = s;
                return n > o ? 1 : o > n ? -1 : 0
            })
        }

        function ds(t, e) {
            const i = new Set;
            return t.filter(s => {
                let {
                    [e]: n
                } = s;
                return i.has(n) ? !1 : i.add(n)
            })
        }

        function U(t, e, i) {
            return e === void 0 && (e = 0)
                , i === void 0 && (i = 1)
                , Math.min(Math.max(Ct(t) || 0, e), i)
        }

        function T() {}

        function Ti() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            return [
                ["bottom", "top"]
                , ["right", "left"]
            ].every(s => {
                let [n, o] = s;
                return Math.min(...e.map(r => {
                    let {
                        [n]: a
                    } = r;
                    return a
                })) - Math.max(...e.map(r => {
                    let {
                        [o]: a
                    } = r;
                    return a
                })) > 0
            })
        }

        function ze(t, e) {
            return t.x <= e.right && t.x >= e.left && t.y <= e.bottom && t.y >= e.top
        }

        function Ci(t, e, i) {
            const s = e === "width" ? "height" : "width";
            return {
                [s]: t[e] ? Math.round(i * t[s] / t[e]) : t[s]
                , [e]: i
            }
        }

        function fs(t, e) {
            t = {
                ...t
            };
            for (const i in t)
                t = t[i] > e[i] ? Ci(t, i, e[i]) : t;
            return t
        }

        function po(t, e) {
            t = fs(t, e);
            for (const i in t)
                t = t[i] < e[i] ? Ci(t, i, e[i]) : t;
            return t
        }
        const Fe = {
            ratio: Ci
            , contain: fs
            , cover: po
        };

        function Ut(t, e, i, s) {
            i === void 0 && (i = 0)
                , s === void 0 && (s = !1)
                , e = y(e);
            const {
                length: n
            } = e;
            return n ? (t = Dt(t) ? Ct(t) : t === "next" ? i + 1 : t === "previous" ? i - 1 : e.indexOf(j(t))
                , s ? U(t, 0, n - 1) : (t %= n
                    , t < 0 ? t + n : t)) : -1
        }

        function ft(t) {
            const e = Object.create(null);
            return i => e[i] || (e[i] = t(i))
        }
        class He {
            constructor() {
                this.promise = new Promise((e, i) => {
                    this.reject = i
                        , this.resolve = e
                })
            }
        }

        function w(t, e, i) {
            if (Tt(e)) {
                for (const n in e)
                    w(t, n, e[n]);
                return
            }
            if (R(i)) {
                var s;
                return (s = j(t)) == null ? void 0 : s.getAttribute(e)
            } else
                for (const n of y(t))
                    mt(i) && (i = i.call(n, w(n, e)))
                    , i === null ? me(n, e) : n.setAttribute(e, i)
        }

        function It(t, e) {
            return y(t).some(i => i.hasAttribute(e))
        }

        function me(t, e) {
            const i = y(t);
            for (const s of e.split(" "))
                for (const n of i)
                    n.removeAttribute(s)
        }

        function ot(t, e) {
            for (const i of [e, "data-" + e])
                if (It(t, i))
                    return w(t, i)
        }
        const go = {
            area: !0
            , base: !0
            , br: !0
            , col: !0
            , embed: !0
            , hr: !0
            , img: !0
            , input: !0
            , keygen: !0
            , link: !0
            , meta: !0
            , param: !0
            , source: !0
            , track: !0
            , wbr: !0
        };

        function Ii(t) {
            return y(t).some(e => go[e.tagName.toLowerCase()])
        }

        function q(t) {
            return y(t).some(e => e.offsetWidth || e.offsetHeight || e.getClientRects().length)
        }
        const ve = "input,select,textarea,button";

        function Pi(t) {
            return y(t).some(e => F(e, ve))
        }
        const Le = ve + ",a[href],[tabindex]";

        function We(t) {
            return F(t, Le)
        }

        function E(t) {
            var e;
            return (e = j(t)) == null ? void 0 : e.parentElement
        }

        function Re(t, e) {
            return y(t).filter(i => F(i, e))
        }

        function F(t, e) {
            return y(t).some(i => i.matches(e))
        }

        function et(t, e) {
            return Kt(t) ? t.closest(lt(e, ">") ? e.slice(1) : e) : y(t).map(i => et(i, e)).filter(Boolean)
        }

        function P(t, e) {
            return D(e) ? !!et(t, e) : j(e).contains(j(t))
        }

        function te(t, e) {
            const i = [];
            for (; t = E(t);)
                (!e || F(t, e)) && i.push(t);
            return i
        }

        function O(t, e) {
            t = j(t);
            const i = t ? y(t.children) : [];
            return e ? Re(i, e) : i
        }

        function ee(t, e) {
            return e ? y(t).indexOf(j(e)) : O(E(t)).indexOf(t)
        }

        function ht(t, e) {
            return Ai(t, gs(t, e))
        }

        function we(t, e) {
            return be(t, gs(t, e))
        }

        function Ai(t, e) {
            return j(ms(t, e, "querySelector"))
        }

        function be(t, e) {
            return y(ms(t, e, "querySelectorAll"))
        }
        const mo = /(^|[^\\],)\s*[!>+~-]/
            , ps = ft(t => t.match(mo));

        function gs(t, e) {
            return e === void 0 && (e = document)
                , D(t) && ps(t) || De(e) ? e : e.ownerDocument
        }
        const vo = /([!>+~-])(?=\s+[!>+~-]|\s*$)/g
            , wo = ft(t => t.replace(vo, "$1 *"));

        function ms(t, e, i) {
            if (e === void 0 && (e = document)
                , !t || !D(t))
                return t;
            if (t = wo(t)
                , ps(t)) {
                const s = xo(t);
                t = "";
                for (let n of s) {
                    let o = e;
                    if (n[0] === "!") {
                        const r = n.substr(1).trim().split(" ");
                        if (o = et(E(e), r[0])
                            , n = r.slice(1).join(" ").trim()
                            , !n.length && s.length === 1)
                            return o
                    }
                    if (n[0] === "-") {
                        const r = n.substr(1).trim().split(" ")
                            , a = (o || e).previousElementSibling;
                        o = F(a, n.substr(1)) ? a : null
                            , n = r.slice(1).join(" ")
                    }
                    o && (t += (t ? "," : "") + yo(o) + " " + n)
                }
                e = document
            }
            try {
                return e[i](t)
            } catch {
                return null
            }
        }
        const bo = /.*?[^\\](?:,|$)/g
            , xo = ft(t => t.match(bo).map(e => e.replace(/,$/, "").trim()));

        function yo(t) {
            const e = [];
            for (; t.parentNode;) {
                const i = w(t, "id");
                if (i) {
                    e.unshift("#" + Ei(i));
                    break
                } else {
                    let {
                        tagName: s
                    } = t;
                    s !== "HTML" && (s += ":nth-child(" + (ee(t) + 1) + ")")
                        , e.unshift(s)
                        , t = t.parentNode
                }
            }
            return e.join(" > ")
        }

        function Ei(t) {
            return D(t) ? CSS.escape(t) : ""
        }

        function k() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            let [s, n, o, r, a = !1] = _i(e);
            r.length > 1 && (r = ko(r))
                , a != null && a.self && (r = So(r))
                , o && (r = $o(o, r));
            for (const l of n)
                for (const h of s)
                    h.addEventListener(l, r, a);
            return () => Nt(s, n, r, a)
        }

        function Nt() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            let [s, n, , o, r = !1] = _i(e);
            for (const a of n)
                for (const l of s)
                    l.removeEventListener(a, o, r)
        }

        function N() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++)
                e[i] = arguments[i];
            const [s, n, o, r, a = !1, l] = _i(e)
                , h = k(s, n, o, u => {
                        const d = !l || l(u);
                        d && (h()
                            , r(u, d))
                    }
                    , a);
            return h
        }

        function g(t, e, i) {
            return Oi(t).every(s => s.dispatchEvent(zt(e, !0, !0, i)))
        }

        function zt(t, e, i, s) {
            return e === void 0 && (e = !0)
                , i === void 0 && (i = !1)
                , D(t) && (t = new CustomEvent(t, {
                    bubbles: e
                    , cancelable: i
                    , detail: s
                }))
                , t
        }

        function _i(t) {
            return t[0] = Oi(t[0])
                , D(t[1]) && (t[1] = t[1].split(" "))
                , mt(t[2]) && t.splice(2, 0, !1)
                , t
        }

        function $o(t, e) {
            return i => {
                const s = t[0] === ">" ? be(t, i.currentTarget).reverse().filter(n => P(i.target, n))[0] : et(i.target, t);
                s && (i.current = s
                    , e.call(this, i))
            }
        }

        function ko(t) {
            return e => Q(e.detail) ? t(e, ...e.detail) : t(e)
        }

        function So(t) {
            return function(e) {
                if (e.target === e.currentTarget || e.target === e.current)
                    return t.call(null, e)
            }
        }

        function vs(t) {
            return t && "addEventListener" in t
        }

        function To(t) {
            return vs(t) ? t : j(t)
        }

        function Oi(t) {
            return Q(t) ? t.map(To).filter(Boolean) : D(t) ? be(t) : vs(t) ? [t] : y(t)
        }

        function kt(t) {
            return t.pointerType === "touch" || !!t.touches
        }

        function ie(t) {
            var e, i;
            const {
                clientX: s
                , clientY: n
            } = ((e = t.touches) == null ? void 0 : e[0]) || ((i = t.changedTouches) == null ? void 0 : i[0]) || t;
            return {
                x: s
                , y: n
            }
        }

        function ws(t, e) {
            const i = {
                data: null
                , method: "GET"
                , headers: {}
                , xhr: new XMLHttpRequest
                , beforeSend: T
                , responseType: ""
                , ...e
            };
            return Promise.resolve().then(() => i.beforeSend(i)).then(() => Co(t, i))
        }

        function Co(t, e) {
            return new Promise((i, s) => {
                const {
                    xhr: n
                } = e;
                for (const o in e)
                    if (o in n)
                        try {
                            n[o] = e[o]
                        } catch {}
                n.open(e.method.toUpperCase(), t);
                for (const o in e.headers)
                    n.setRequestHeader(o, e.headers[o]);
                k(n, "load", () => {
                        n.status === 0 || n.status >= 200 && n.status < 300 || n.status === 304 ? i(n) : s(xt(Error(n.statusText), {
                            xhr: n
                            , status: n.status
                        }))
                    })
                    , k(n, "error", () => s(xt(Error("Network Error"), {
                        xhr: n
                    })))
                    , k(n, "timeout", () => s(xt(Error("Network Timeout"), {
                        xhr: n
                    })))
                    , n.send(e.data)
            })
        }

        function bs(t, e, i) {
            return new Promise((s, n) => {
                const o = new Image;
                o.onerror = r => {
                        n(r)
                    }
                    , o.onload = () => {
                        s(o)
                    }
                    , i && (o.sizes = i)
                    , e && (o.srcset = e)
                    , o.src = t
            })
        }
        const Io = {
            "animation-iteration-count": !0
            , "column-count": !0
            , "fill-opacity": !0
            , "flex-grow": !0
            , "flex-shrink": !0
            , "font-weight": !0
            , "line-height": !0
            , opacity: !0
            , order: !0
            , orphans: !0
            , "stroke-dasharray": !0
            , "stroke-dashoffset": !0
            , widows: !0
            , "z-index": !0
            , zoom: !0
        };

        function c(t, e, i, s) {
            s === void 0 && (s = "");
            const n = y(t);
            for (const o of n)
                if (D(e)) {
                    if (e = Bi(e)
                        , R(i))
                        return getComputedStyle(o).getPropertyValue(e);
                    o.style.setProperty(e, Dt(i) && !Io[e] ? i + "px" : i || Zt(i) ? i : "", s)
                } else if (Q(e)) {
                const r = {};
                for (const a of e)
                    r[a] = c(o, a);
                return r
            } else
                Tt(e) && (s = i
                    , $t(e, (r, a) => c(o, a, r, s)));
            return n[0]
        }
        const Bi = ft(t => Po(t));

        function Po(t) {
            if (lt(t, "--"))
                return t;
            t = Xt(t);
            const {
                style: e
            } = document.documentElement;
            if (t in e)
                return t;
            for (const i of ["webkit", "moz"]) {
                const s = "-" + i + "-" + t;
                if (s in e)
                    return s
            }
        }

        function x(t) {
            for (var e = arguments.length, i = new Array(e > 1 ? e - 1 : 0), s = 1; s < e; s++)
                i[s - 1] = arguments[s];
            xs(t, i, "add")
        }

        function B(t) {
            for (var e = arguments.length, i = new Array(e > 1 ? e - 1 : 0), s = 1; s < e; s++)
                i[s - 1] = arguments[s];
            xs(t, i, "remove")
        }

        function Di(t, e) {
            w(t, "class", i => (i || "").replace(new RegExp("\\b" + e + "\\b\\s?", "g"), ""))
        }

        function Mi(t) {
            !(arguments.length <= 1) && arguments[1] && B(t, arguments.length <= 1 ? void 0 : arguments[1])
                , !(arguments.length <= 2) && arguments[2] && x(t, arguments.length <= 2 ? void 0 : arguments[2])
        }

        function _(t, e) {
            return [e] = Ni(e)
                , !!e && y(t).some(i => i.classList.contains(e))
        }

        function H(t, e, i) {
            const s = Ni(e);
            R(i) || (i = !!i);
            for (const n of y(t))
                for (const o of s)
                    n.classList.toggle(o, i)
        }

        function xs(t, e, i) {
            e = e.reduce((s, n) => s.concat(Ni(n)), []);
            for (const s of y(t))
                s.classList[i](...e)
        }

        function Ni(t) {
            return String(t).split(/\s|,/).filter(Boolean)
        }

        function Ao(t, e, i, s) {
            return i === void 0 && (i = 400)
                , s === void 0 && (s = "linear")
                , i = Math.round(i)
                , Promise.all(y(t).map(n => new Promise((o, r) => {
                    for (const l in e) {
                        const h = c(n, l);
                        h === "" && c(n, l, h)
                    }
                    const a = setTimeout(() => g(n, "transitionend"), i);
                    N(n, "transitionend transitioncanceled", l => {
                                let {
                                    type: h
                                } = l;
                                clearTimeout(a)
                                    , B(n, "uk-transition")
                                    , c(n, {
                                        transitionProperty: ""
                                        , transitionDuration: ""
                                        , transitionTimingFunction: ""
                                    })
                                    , h === "transitioncanceled" ? r() : o(n)
                            }
                            , {
                                self: !0
                            })
                        , x(n, "uk-transition")
                        , c(n, {
                            transitionProperty: Object.keys(e).map(Bi).join(",")
                            , transitionDuration: i + "ms"
                            , transitionTimingFunction: s
                            , ...e
                        })
                })))
        }
        const S = {
                start: Ao
                , async stop(t) {
                    g(t, "transitionend")
                        , await Promise.resolve()
                }
                , async cancel(t) {
                    g(t, "transitioncanceled")
                        , await Promise.resolve()
                }
                , inProgress(t) {
                    return _(t, "uk-transition")
                }
            }
            , xe = "uk-animation-";

        function ys(t, e, i, s, n) {
            return i === void 0 && (i = 200)
                , Promise.all(y(t).map(o => new Promise((r, a) => {
                    g(o, "animationcanceled");
                    const l = setTimeout(() => g(o, "animationend"), i);
                    N(o, "animationend animationcanceled", h => {
                                let {
                                    type: u
                                } = h;
                                clearTimeout(l)
                                    , u === "animationcanceled" ? a() : r(o)
                                    , c(o, "animationDuration", "")
                                    , Di(o, xe + "\\S*")
                            }
                            , {
                                self: !0
                            })
                        , c(o, "animationDuration", i + "ms")
                        , x(o, e, xe + (n ? "leave" : "enter"))
                        , lt(e, xe) && (s && x(o, "uk-transform-origin-" + s)
                            , n && x(o, xe + "reverse"))
                })))
        }
        const Eo = new RegExp(xe + "(enter|leave)")
            , pt = {
                in: ys
                , out(t, e, i, s) {
                    return ys(t, e, i, s, !0)
                }
                , inProgress(t) {
                    return Eo.test(w(t, "class"))
                }
                , cancel(t) {
                    g(t, "animationcanceled")
                }
            }
            , Ft = {
                width: ["left", "right"]
                , height: ["top", "bottom"]
            };

        function $(t) {
            const e = Kt(t) ? j(t).getBoundingClientRect() : {
                height: J(t)
                , width: ye(t)
                , top: 0
                , left: 0
            };
            return {
                height: e.height
                , width: e.width
                , top: e.top
                , left: e.left
                , bottom: e.top + e.height
                , right: e.left + e.width
            }
        }

        function C(t, e) {
            const i = $(t);
            if (t) {
                const {
                    scrollY: n
                    , scrollX: o
                } = Mt(t)
                    , r = {
                        height: n
                        , width: o
                    };
                for (const a in Ft)
                    for (const l of Ft[a])
                        i[l] += r[a]
            }
            if (!e)
                return i;
            const s = c(t, "position");
            $t(c(t, ["left", "top"]), (n, o) => c(t, o, e[o] - i[o] + v(s === "absolute" && n === "auto" ? je(t)[o] : n)))
        }

        function je(t) {
            let {
                top: e
                , left: i
            } = C(t);
            const {
                ownerDocument: {
                    body: s
                    , documentElement: n
                }
                , offsetParent: o
            } = j(t);
            let r = o || n;
            for (; r && (r === s || r === n) && c(r, "position") === "static";)
                r = r.parentNode;
            if (Kt(r)) {
                const a = C(r);
                e -= a.top + v(c(r, "borderTopWidth"))
                    , i -= a.left + v(c(r, "borderLeftWidth"))
            }
            return {
                top: e - v(c(t, "marginTop"))
                , left: i - v(c(t, "marginLeft"))
            }
        }

        function Ht(t) {
            t = j(t);
            const e = [t.offsetTop, t.offsetLeft];
            for (; t = t.offsetParent;)
                if (e[0] += t.offsetTop + v(c(t, "borderTopWidth"))
                    , e[1] += t.offsetLeft + v(c(t, "borderLeftWidth"))
                    , c(t, "position") === "fixed") {
                    const i = Mt(t);
                    return e[0] += i.scrollY
                        , e[1] += i.scrollX
                        , e
                }
            return e
        }
        const J = $s("height")
            , ye = $s("width");

        function $s(t) {
            const e = St(t);
            return (i, s) => {
                if (R(s)) {
                    if (Jt(i))
                        return i["inner" + e];
                    if (De(i)) {
                        const n = i.documentElement;
                        return Math.max(n["offset" + e], n["scroll" + e])
                    }
                    return i = j(i)
                        , s = c(i, t)
                        , s = s === "auto" ? i["offset" + e] : v(s) || 0
                        , s - se(i, t)
                } else
                    return c(i, t, !s && s !== 0 ? "" : +s + se(i, t) + "px")
            }
        }

        function se(t, e, i) {
            return i === void 0 && (i = "border-box")
                , c(t, "boxSizing") === i ? Ft[e].map(St).reduce((s, n) => s + v(c(t, "padding" + n)) + v(c(t, "border" + n + "Width")), 0) : 0
        }

        function qe(t) {
            for (const e in Ft)
                for (const i in Ft[e])
                    if (Ft[e][i] === t)
                        return Ft[e][1 - i];
            return t
        }

        function K(t, e, i, s) {
            return e === void 0 && (e = "width")
                , i === void 0 && (i = window)
                , s === void 0 && (s = !1)
                , D(t) ? Oo(t).reduce((n, o) => {
                        const r = Do(o);
                        return r && (o = Mo(r === "vh" ? J(Mt(i)) : r === "vw" ? ye(Mt(i)) : s ? i["offset" + St(e)] : $(i)[e], o))
                            , n + v(o)
                    }
                    , 0) : v(t)
        }
        const _o = /-?\d+(?:\.\d+)?(?:v[wh]|%|px)?/g
            , Oo = ft(t => t.toString().replace(/\s/g, "").match(_o) || [])
            , Bo = /(?:v[hw]|%)$/
            , Do = ft(t => (t.match(Bo) || [])[0]);

        function Mo(t, e) {
            return t * v(e) / 100
        }

        function No(t) {
            if (document.readyState !== "loading") {
                t();
                return
            }
            N(document, "DOMContentLoaded", t)
        }

        function ct(t, e) {
            var i;
            return (t == null || (i = t.tagName) == null ? void 0 : i.toLowerCase()) === e.toLowerCase()
        }

        function ks(t) {
            return t = b(t)
                , t.innerHTML = ""
                , t
        }

        function Pt(t, e) {
            return R(e) ? b(t).innerHTML : L(ks(t), e)
        }
        const zo = Ye("prepend")
            , L = Ye("append")
            , zi = Ye("before")
            , Ve = Ye("after");

        function Ye(t) {
            return function(e, i) {
                var s;
                const n = y(D(i) ? Lt(i) : i);
                return (s = b(e)) == null || s[t](...n)
                    , Ss(n)
            }
        }

        function ut(t) {
            y(t).forEach(e => e.remove())
        }

        function Xe(t, e) {
            for (e = j(zi(t, e)); e.firstChild;)
                e = e.firstChild;
            return L(e, t)
                , e
        }

        function Fi(t, e) {
            return y(y(t).map(i => i.hasChildNodes() ? Xe(y(i.childNodes), e) : L(i, e)))
        }

        function $e(t) {
            y(t).map(E).filter((e, i, s) => s.indexOf(e) === i).forEach(e => e.replaceWith(...e.childNodes))
        }
        const Fo = /^\s*<(\w+|!)[^>]*>/
            , Ho = /^<(\w+)\s*\/?>(?:<\/\1>)?$/;

        function Lt(t) {
            const e = Ho.exec(t);
            if (e)
                return document.createElement(e[1]);
            const i = document.createElement("div");
            return Fo.test(t) ? i.insertAdjacentHTML("beforeend", t.trim()) : i.textContent = t
                , Ss(i.childNodes)
        }

        function Ss(t) {
            return t.length > 1 ? t : t[0]
        }

        function vt(t, e) {
            if (!!Kt(t))
                for (e(t)
                    , t = t.firstElementChild; t;) {
                    const i = t.nextElementSibling;
                    vt(t, e)
                        , t = i
                }
        }

        function b(t, e) {
            return Ts(t) ? j(Lt(t)) : Ai(t, e)
        }

        function M(t, e) {
            return Ts(t) ? y(Lt(t)) : be(t, e)
        }

        function Ts(t) {
            return D(t) && lt(t.trim(), "<")
        }
        const Wt = typeof window < "u"
            , X = Wt && document.dir === "rtl"
            , Rt = Wt && "ontouchstart" in window
            , ne = Wt && window.PointerEvent
            , gt = ne ? "pointerdown" : Rt ? "touchstart" : "mousedown"
            , Ge = ne ? "pointermove" : Rt ? "touchmove" : "mousemove"
            , At = ne ? "pointerup" : Rt ? "touchend" : "mouseup"
            , jt = ne ? "pointerenter" : Rt ? "" : "mouseenter"
            , oe = ne ? "pointerleave" : Rt ? "" : "mouseleave"
            , Je = ne ? "pointercancel" : "touchcancel"
            , G = {
                reads: []
                , writes: []
                , read(t) {
                    return this.reads.push(t)
                        , Li()
                        , t
                }
                , write(t) {
                    return this.writes.push(t)
                        , Li()
                        , t
                }
                , clear(t) {
                    Is(this.reads, t)
                        , Is(this.writes, t)
                }
                , flush: Hi
            };

        function Hi(t) {
            Cs(G.reads)
                , Cs(G.writes.splice(0))
                , G.scheduled = !1
                , (G.reads.length || G.writes.length) && Li(t + 1)
        }
        const Lo = 4;

        function Li(t) {
            G.scheduled || (G.scheduled = !0
                , t && t < Lo ? Promise.resolve().then(() => Hi(t)) : requestAnimationFrame(() => Hi(1)))
        }

        function Cs(t) {
            let e;
            for (; e = t.shift();)
                try {
                    e()
                } catch (i) {
                    console.error(i)
                }
        }

        function Is(t, e) {
            const i = t.indexOf(e);
            return ~i && t.splice(i, 1)
        }

        function Wi() {}
        Wi.prototype = {
            positions: []
            , init() {
                this.positions = [];
                let t;
                this.unbind = k(document, "mousemove", e => t = ie(e))
                    , this.interval = setInterval(() => {
                            !t || (this.positions.push(t)
                                , this.positions.length > 5 && this.positions.shift())
                        }
                        , 50)
            }
            , cancel() {
                var t;
                (t = this.unbind) == null || t.call(this)
                    , this.interval && clearInterval(this.interval)
            }
            , movesTo(t) {
                if (this.positions.length < 2)
                    return !1;
                const e = t.getBoundingClientRect()
                    , {
                        left: i
                        , right: s
                        , top: n
                        , bottom: o
                    } = e
                    , [r] = this.positions
                    , a = Qt(this.positions)
                    , l = [r, a];
                return ze(a, e) ? !1 : [
                    [{
                        x: i
                        , y: n
                    }, {
                        x: s
                        , y: o
                    }]
                    , [{
                        x: i
                        , y: o
                    }, {
                        x: s
                        , y: n
                    }]
                ].some(u => {
                    const d = Wo(l, u);
                    return d && ze(d, e)
                })
            }
        };

        function Wo(t, e) {
            let [{
                x: i
                , y: s
            }, {
                x: n
                , y: o
            }] = t
            , [{
                x: r
                , y: a
            }, {
                x: l
                , y: h
            }] = e;
            const u = (h - a) * (n - i) - (l - r) * (o - s);
            if (u === 0)
                return !1;
            const d = ((l - r) * (s - a) - (h - a) * (i - r)) / u;
            return d < 0 ? !1 : {
                x: i + d * (n - i)
                , y: s + d * (o - s)
            }
        }

        function re(t, e, i, s) {
            s === void 0 && (s = !0);
            const n = new IntersectionObserver(s ? (o, r) => {
                    o.some(a => a.isIntersecting) && e(o, r)
                } :
                e, i);
            for (const o of y(t))
                n.observe(o);
            return n
        }
        const Ro = Wt && window.ResizeObserver;

        function Ke(t, e, i) {
            return i === void 0 && (i = {
                    box: "border-box"
                })
                , Ro ? As(ResizeObserver, t, e, i) : (jo()
                    , ke.add(e), {
                        disconnect() {
                            ke.delete(e)
                        }
                    })
        }
        let ke;

        function jo() {
            if (ke)
                return;
            ke = new Set;
            let t;
            const e = () => {
                if (!t) {
                    t = !0
                        , requestAnimationFrame(() => t = !1);
                    for (const i of ke)
                        i()
                }
            };
            k(window, "load resize", e)
                , k(document, "loadedmetadata load", e, !0)
        }

        function Ps(t, e, i) {
            return As(MutationObserver, t, e, i)
        }

        function As(t, e, i, s) {
            const n = new t(i);
            for (const o of y(e))
                n.observe(o, s);
            return n
        }
        const Z = {};
        Z.events = Z.created = Z.beforeConnect = Z.connected = Z.beforeDisconnect = Z.disconnected = Z.destroy = Ri
            , Z.args = function(t, e) {
                return e !== !1 && Ri(e || t)
            }
            , Z.update = function(t, e) {
                return Ne(Ri(t, mt(e) ? {
                    read: e
                } : e), "order")
            }
            , Z.props = function(t, e) {
                if (Q(e)) {
                    const i = {};
                    for (const s of e)
                        i[s] = String;
                    e = i
                }
                return Z.methods(t, e)
            }
            , Z.computed = Z.methods = function(t, e) {
                return e ? t ? {
                    ...t
                    , ...e
                } : e : t
            }
            , Z.data = function(t, e, i) {
                return i ? Es(t, e, i) : e ? t ? function(s) {
                        return Es(t, e, s)
                    } :
                    e : t
            };

        function Es(t, e, i) {
            return Z.computed(mt(t) ? t.call(i, i) : t, mt(e) ? e.call(i, i) : e)
        }

        function Ri(t, e) {
            return t = t && !Q(t) ? [t] : t
                , e ? t ? t.concat(e) : Q(e) ? e : [e] : t
        }

        function qo(t, e) {
            return R(e) ? t : e
        }

        function ae(t, e, i) {
            const s = {};
            if (mt(e) && (e = e.options)
                , e.extends && (t = ae(t, e.extends, i))
                , e.mixins)
                for (const o of e.mixins)
                    t = ae(t, o, i);
            for (const o in t)
                n(o);
            for (const o in e)
                Bt(t, o) || n(o);

            function n(o) {
                s[o] = (Z[o] || qo)(t[o], e[o], i)
            }
            return s
        }

        function Se(t, e) {
            e === void 0 && (e = []);
            try {
                return t ? lt(t, "{") ? JSON.parse(t) : e.length && !p(t, ":") ? {
                    [e[0]]: t
                } : t.split(";").reduce((i, s) => {
                        const [n, o] = s.split(/:(.*)/);
                        return n && !R(o) && (i[n.trim()] = o.trim())
                            , i
                    }
                    , {}) : {}
            } catch {
                return {}
            }
        }

        function _s(t) {
            if (Qe(t) && ji(t, {
                    func: "playVideo"
                    , method: "play"
                })
                , Ze(t))
                try {
                    t.play().catch(T)
                } catch {}
        }

        function Os(t) {
            Qe(t) && ji(t, {
                    func: "pauseVideo"
                    , method: "pause"
                })
                , Ze(t) && t.pause()
        }

        function Bs(t) {
            Qe(t) && ji(t, {
                    func: "mute"
                    , method: "setVolume"
                    , value: 0
                })
                , Ze(t) && (t.muted = !0)
        }

        function Ds(t) {
            return Ze(t) || Qe(t)
        }

        function Ze(t) {
            return ct(t, "video")
        }

        function Qe(t) {
            return ct(t, "iframe") && (Ms(t) || Ns(t))
        }

        function Ms(t) {
            return !!t.src.match(/\/\/.*?youtube(-nocookie)?\.[a-z]+\/(watch\?v=[^&\s]+|embed)|youtu\.be\/.*/)
        }

        function Ns(t) {
            return !!t.src.match(/vimeo\.com\/video\/.*/)
        }
        async function ji(t, e) {
            await Yo(t)
                , zs(t, e)
        }

        function zs(t, e) {
            try {
                t.contentWindow.postMessage(JSON.stringify({
                    event: "command"
                    , ...e
                }), "*")
            } catch {}
        }
        const qi = "_ukPlayer";
        let Vo = 0;

        function Yo(t) {
            if (t[qi])
                return t[qi];
            const e = Ms(t)
                , i = Ns(t)
                , s = ++Vo;
            let n;
            return t[qi] = new Promise(o => {
                e && N(t, "load", () => {
                        const r = () => zs(t, {
                            event: "listening"
                            , id: s
                        });
                        n = setInterval(r, 100)
                            , r()
                    })
                    , N(window, "message", o, !1, r => {
                        let {
                            data: a
                        } = r;
                        try {
                            return a = JSON.parse(a)
                                , a && (e && a.id === s && a.event === "onReady" || i && Number(a.player_id) === s)
                        } catch {}
                    })
                    , t.src = "" + t.src + (p(t.src, "?") ? "&" : "?") + (e ? "enablejsapi=1" : "api=1&player_id=" + s)
            }).then(() => clearInterval(n))
        }

        function Vi(t, e, i) {
            return e === void 0 && (e = 0)
                , i === void 0 && (i = 0)
                , q(t) ? Ti(...tt(t).map(s => {
                    const {
                        top: n
                        , left: o
                        , bottom: r
                        , right: a
                    } = rt(s);
                    return {
                        top: n - e
                        , left: o - i
                        , bottom: r + e
                        , right: a + i
                    }
                }).concat(C(t))) : !1
        }

        function Fs(t, e) {
            let {
                offset: i = 0
            } = e === void 0 ? {} : e;
            const s = q(t) ? tt(t) : [];
            return s.reduce((a, l, h) => {
                    const {
                        scrollTop: u
                        , scrollHeight: d
                        , offsetHeight: f
                    } = l
                    , m = rt(l)
                        , I = d - m.height
                        , {
                            height: A
                            , top: W
                        } = s[h - 1] ? rt(s[h - 1]) : C(t);
                    let Y = Math.ceil(W - m.top - i + u);
                    return i > 0 && f < A + i ? Y += i : i = 0
                        , Y > I ? (i -= Y - I
                            , Y = I) : Y < 0 && (i -= Y
                            , Y = 0)
                        , () => n(l, Y - u).then(a)
                }
                , () => Promise.resolve())();

            function n(a, l) {
                return new Promise(h => {
                    const u = a.scrollTop
                        , d = o(Math.abs(l))
                        , f = Date.now();
                    (function m() {
                        const I = r(U((Date.now() - f) / d));
                        a.scrollTop = u + l * I
                            , I === 1 ? h() : requestAnimationFrame(m)
                    })()
                })
            }

            function o(a) {
                return 40 * Math.pow(a, .375)
            }

            function r(a) {
                return .5 * (1 - Math.cos(Math.PI * a))
            }
        }

        function Yi(t, e, i) {
            if (e === void 0 && (e = 0)
                , i === void 0 && (i = 0)
                , !q(t))
                return 0;
            const [s] = tt(t, /auto|scroll/, !0)
                , {
                    scrollHeight: n
                    , scrollTop: o
                } = s
                , {
                    height: r
                } = rt(s)
                , a = n - r
                , l = Ht(t)[0] - Ht(s)[0]
                , h = Math.max(0, l - r + e)
                , u = Math.min(a, l + t.offsetHeight - i);
            return U((o - h) / (u - h))
        }

        function tt(t, e, i) {
            e === void 0 && (e = /auto|scroll|hidden|clip/)
                , i === void 0 && (i = !1);
            const s = Hs(t);
            let n = te(t).reverse();
            n = n.slice(n.indexOf(s) + 1);
            const o = bt(n, r => c(r, "position") === "fixed");
            return ~o && (n = n.slice(o))
                , [s].concat(n.filter(r => e.test(c(r, "overflow")) && (!i || r.scrollHeight > rt(r).height))).reverse()
        }

        function rt(t) {
            const e = Mt(t)
                , {
                    document: {
                        documentElement: i
                    }
                } = e;
            let s = t === Hs(t) ? e : t;
            const {
                visualViewport: n
            } = e;
            if (Jt(s) && n) {
                let {
                    height: r
                    , width: a
                    , scale: l
                    , pageTop: h
                    , pageLeft: u
                } = n;
                return r = Math.round(r * l)
                    , a = Math.round(a * l), {
                        height: r
                        , width: a
                        , top: h
                        , left: u
                        , bottom: h + r
                        , right: u + a
                    }
            }
            let o = C(s);
            for (let [r, a, l, h] of [
                    ["width", "x", "left", "right"]
                    , ["height", "y", "top", "bottom"]
                ])
                Jt(s) ? s = i : o[l] += v(c(s, "border-" + l + "-width"))
                , o[r] = o[a] = s["client" + St(r)]
                , o[h] = o[r] + o[l];
            return o
        }

        function Hs(t) {
            return Mt(t).document.scrollingElement
        }
        const at = [
            ["width", "x", "left", "right"]
            , ["height", "y", "top", "bottom"]
        ];

        function Ls(t, e, i) {
            i = {
                    attach: {
                        element: ["left", "top"]
                        , target: ["left", "top"]
                        , ...i.attach
                    }
                    , offset: [0, 0]
                    , placement: []
                    , ...i
                }
                , Q(e) || (e = [e, e])
                , C(t, Ws(t, e, i))
        }

        function Ws(t, e, i) {
            const s = Rs(t, e, i)
                , {
                    boundary: n
                    , viewportOffset: o = 0
                    , placement: r
                } = i;
            let a = s;
            for (const [l, [h, , u, d]] of Object.entries(at)) {
                const f = Xo(t, e[l], o, n, l);
                if (Ue(s, f, l))
                    continue;
                let m = 0;
                if (r[l] === "flip") {
                    const I = i.attach.target[l];
                    if (I === d && s[d] <= f[d] || I === u && s[u] >= f[u])
                        continue;
                    m = Jo(t, e, i, l)[u] - s[u];
                    const A = Go(t, e[l], o, l);
                    if (!Ue(Xi(s, m, l), A, l)) {
                        if (Ue(s, A, l))
                            continue;
                        if (i.recursion)
                            return !1;
                        const W = Ko(t, e, i);
                        if (W && Ue(W, A, 1 - l))
                            return W;
                        continue
                    }
                } else if (r[l] === "shift") {
                    const I = C(e[l])
                        , {
                            offset: A
                        } = i;
                    m = U(U(s[u], f[u], f[d] - s[h]), I[u] - s[h] + A[l], I[d] - A[l]) - s[u]
                }
                a = Xi(a, m, l)
            }
            return a
        }

        function Rs(t, e, i) {
            let {
                attach: s
                , offset: n
            } = {
                attach: {
                    element: ["left", "top"]
                    , target: ["left", "top"]
                    , ...i.attach
                }
                , offset: [0, 0]
                , ...i
            }
            , o = C(t);
            for (const [r, [a, , l, h]] of Object.entries(at)) {
                const u = s.target[r] === s.element[r] ? rt(e[r]) : C(e[r]);
                o = Xi(o, u[l] - o[l] + js(s.target[r], h, u[a]) - js(s.element[r], h, o[a]) + +n[r], r)
            }
            return o
        }

        function Xi(t, e, i) {
            const [, s, n, o] = at[i]
                , r = {
                    ...t
                };
            return r[n] = t[s] = t[n] + e
                , r[o] += e
                , r
        }

        function js(t, e, i) {
            return t === "center" ? i / 2 : t === e ? i : 0
        }

        function Xo(t, e, i, s, n) {
            let o = Vs(...qs(t, e).map(rt));
            return i && (o[at[n][2]] += i
                    , o[at[n][3]] -= i)
                , s && (o = Vs(o, C(Q(s) ? s[n] : s)))
                , o
        }

        function Go(t, e, i, s) {
            const [n, , o, r] = at[s]
                , [a] = qs(t, e)
                , l = rt(a);
            return l[o] -= a["scroll" + St(o)] - i
                , l[r] = l[o] + a["scroll" + St(n)] - i
                , l
        }

        function qs(t, e) {
            return tt(e).filter(i => P(t, i))
        }

        function Vs() {
            let t = {};
            for (var e = arguments.length, i = new Array(e), s = 0; s < e; s++)
                i[s] = arguments[s];
            for (const n of i)
                for (const [, , o, r] of at)
                    t[o] = Math.max(t[o] || 0, n[o])
                    , t[r] = Math.min(...[t[r], n[r]].filter(Boolean));
            return t
        }

        function Ue(t, e, i) {
            const [, , s, n] = at[i];
            return t[s] >= e[s] && t[n] <= e[n]
        }

        function Jo(t, e, i, s) {
            let {
                offset: n
                , attach: o
            } = i;
            return Rs(t, e, {
                attach: {
                    element: Ys(o.element, s)
                    , target: Ys(o.target, s)
                }
                , offset: Zo(n, s)
            })
        }

        function Ko(t, e, i) {
            return Ws(t, e, {
                ...i
                , attach: {
                    element: i.attach.element.map(Xs).reverse()
                    , target: i.attach.target.map(Xs).reverse()
                }
                , offset: i.offset.reverse()
                , placement: i.placement.reverse()
                , recursion: !0
            })
        }

        function Ys(t, e) {
            const i = [...t]
                , s = at[e].indexOf(t[e]);
            return ~s && (i[e] = at[e][1 - s % 2 + 2])
                , i
        }

        function Xs(t) {
            for (let e = 0; e < at.length; e++) {
                const i = at[e].indexOf(t);
                if (~i)
                    return at[1 - e][i % 2 + 2]
            }
        }

        function Zo(t, e) {
            return t = [...t]
                , t[e] *= -1
                , t
        }
        var Qo = Object.freeze({
            __proto__: null
            , ajax: ws
            , getImage: bs
            , Transition: S
            , Animation: pt
            , attr: w
            , hasAttr: It
            , removeAttr: me
            , data: ot
            , addClass: x
            , removeClass: B
            , removeClasses: Di
            , replaceClass: Mi
            , hasClass: _
            , toggleClass: H
            , dimensions: $
            , offset: C
            , position: je
            , offsetPosition: Ht
            , height: J
            , width: ye
            , boxModelAdjust: se
            , flipPosition: qe
            , toPx: K
            , ready: No
            , isTag: ct
            , empty: ks
            , html: Pt
            , prepend: zo
            , append: L
            , before: zi
            , after: Ve
            , remove: ut
            , wrapAll: Xe
            , wrapInner: Fi
            , unwrap: $e
            , fragment: Lt
            , apply: vt
            , $: b
            , $$: M
            , inBrowser: Wt
            , isRtl: X
            , hasTouch: Rt
            , pointerDown: gt
            , pointerMove: Ge
            , pointerUp: At
            , pointerEnter: jt
            , pointerLeave: oe
            , pointerCancel: Je
            , on: k
            , off: Nt
            , once: N
            , trigger: g
            , createEvent: zt
            , toEventTargets: Oi
            , isTouch: kt
            , getEventPos: ie
            , fastdom: G
            , isVoidElement: Ii
            , isVisible: q
            , selInput: ve
            , isInput: Pi
            , selFocusable: Le
            , isFocusable: We
            , parent: E
            , filter: Re
            , matches: F
            , closest: et
            , within: P
            , parents: te
            , children: O
            , index: ee
            , hasOwn: Bt
            , hyphenate: Xt
            , camelize: fe
            , ucfirst: St
            , startsWith: lt
            , endsWith: Gt
            , includes: p
            , findIndex: bt
            , isArray: Q
            , toArray: xi
            , assign: xt
            , isFunction: mt
            , isObject: Tt
            , isPlainObject: yt
            , isWindow: Jt
            , isDocument: De
            , isNode: yi
            , isElement: Kt
            , isBoolean: Me
            , isString: D
            , isNumber: Zt
            , isNumeric: Dt
            , isEmpty: pe
            , isUndefined: R
            , toBoolean: ki
            , toNumber: Ct
            , toFloat: v
            , toNode: j
            , toNodes: y
            , toWindow: Mt
            , isEqual: ge
            , swap: Si
            , last: Qt
            , each: $t
            , sortBy: Ne
            , uniqueBy: ds
            , clamp: U
            , noop: T
            , intersectRect: Ti
            , pointInRect: ze
            , Dimensions: Fe
            , getIndex: Ut
            , memoize: ft
            , Deferred: He
            , MouseTracker: Wi
            , observeIntersection: re
            , observeResize: Ke
            , observeMutation: Ps
            , mergeOptions: ae
            , parseOptions: Se
            , play: _s
            , pause: Os
            , mute: Bs
            , isVideo: Ds
            , positionAt: Ls
            , query: ht
            , queryAll: we
            , find: Ai
            , findAll: be
            , escape: Ei
            , css: c
            , propName: Bi
            , isInView: Vi
            , scrollIntoView: Fs
            , scrolledOver: Yi
            , scrollParents: tt
            , offsetViewport: rt
        });

        function Uo(t) {
            const e = t.data;
            t.use = function(n) {
                    if (!n.installed)
                        return n.call(null, this)
                            , n.installed = !0
                            , this
                }
                , t.mixin = function(n, o) {
                    o = (D(o) ? t.component(o) : o) || this
                        , o.options = ae(o.options, n)
                }
                , t.extend = function(n) {
                    n = n || {};
                    const o = this
                        , r = function(l) {
                            this._init(l)
                        };
                    return r.prototype = Object.create(o.prototype)
                        , r.prototype.constructor = r
                        , r.options = ae(o.options, n)
                        , r.super = o
                        , r.extend = o.extend
                        , r
                }
                , t.update = function(n, o) {
                    n = n ? j(n) : document.body;
                    for (const r of te(n).reverse())
                        s(r[e], o);
                    vt(n, r => s(r[e], o))
                };
            let i;
            Object.defineProperty(t, "container", {
                get() {
                    return i || document.body
                }
                , set(n) {
                    i = b(n)
                }
            });

            function s(n, o) {
                if (!!n)
                    for (const r in n)
                        n[r]._connected && n[r]._callUpdate(o)
            }
        }

        function tr(t) {
            t.prototype._callHook = function(s) {
                    var n;
                    (n = this.$options[s]) == null || n.forEach(o => o.call(this))
                }
                , t.prototype._callConnected = function() {
                    this._connected || (this._data = {}
                        , this._computed = {}
                        , this._initProps()
                        , this._callHook("beforeConnect")
                        , this._connected = !0
                        , this._initEvents()
                        , this._initObservers()
                        , this._callHook("connected")
                        , this._callUpdate())
                }
                , t.prototype._callDisconnected = function() {
                    !this._connected || (this._callHook("beforeDisconnect")
                        , this._disconnectObservers()
                        , this._unbindEvents()
                        , this._callHook("disconnected")
                        , this._connected = !1
                        , delete this._watch)
                }
                , t.prototype._callUpdate = function(s) {
                    s === void 0 && (s = "update")
                        , this._connected && ((s === "update" || s === "resize") && this._callWatches()
                            , this.$options.update && (this._updates || (this._updates = new Set
                                    , G.read(() => {
                                        this._connected && e.call(this, this._updates)
                                            , delete this._updates
                                    }))
                                , this._updates.add(s.type || s)))
                }
                , t.prototype._callWatches = function() {
                    if (this._watch)
                        return;
                    const s = !Bt(this, "_watch");
                    this._watch = G.read(() => {
                        this._connected && i.call(this, s)
                            , this._watch = null
                    })
                };

            function e(s) {
                for (const {
                        read: n
                        , write: o
                        , events: r = []
                    } of this.$options.update) {
                    if (!s.has("update") && !r.some(l => s.has(l)))
                        continue;
                    let a;
                    n && (a = n.call(this, this._data, s)
                            , a && yt(a) && xt(this._data, a))
                        , o && a !== !1 && G.write(() => {
                            this._connected && o.call(this, this._data, s)
                        })
                }
            }

            function i(s) {
                const {
                    $options: {
                        computed: n
                    }
                } = this
                , o = {
                    ...this._computed
                };
                this._computed = {};
                for (const r in n) {
                    const {
                        watch: a
                        , immediate: l
                    } = n[r];
                    a && (s && l || Bt(o, r) && !ge(o[r], this[r])) && a.call(this, this[r], o[r])
                }
            }
        }

        function er(t) {
            let e = 0;
            t.prototype._init = function(i) {
                    i = i || {}
                        , i.data = or(i, this.constructor.options)
                        , this.$options = ae(this.constructor.options, i, this)
                        , this.$el = null
                        , this.$props = {}
                        , this._uid = e++
                        , this._initData()
                        , this._initMethods()
                        , this._initComputeds()
                        , this._callHook("created")
                        , i.el && this.$mount(i.el)
                }
                , t.prototype._initData = function() {
                    const {
                        data: i = {}
                    } = this.$options;
                    for (const s in i)
                        this.$props[s] = this[s] = i[s]
                }
                , t.prototype._initMethods = function() {
                    const {
                        methods: i
                    } = this.$options;
                    if (i)
                        for (const s in i)
                            this[s] = i[s].bind(this)
                }
                , t.prototype._initComputeds = function() {
                    const {
                        computed: i
                    } = this.$options;
                    if (this._computed = {}
                        , i)
                        for (const s in i)
                            ir(this, s, i[s])
                }
                , t.prototype._initProps = function(i) {
                    let s;
                    i = i || Gs(this.$options);
                    for (s in i)
                        R(i[s]) || (this.$props[s] = i[s]);
                    const n = [this.$options.computed, this.$options.methods];
                    for (s in this.$props)
                        s in i && sr(n, s) && (this[s] = this.$props[s])
                }
                , t.prototype._initEvents = function() {
                    this._events = [];
                    for (const i of this.$options.events || [])
                        if (Bt(i, "handler"))
                            ti(this, i);
                        else
                            for (const s in i)
                                ti(this, i[s], s)
                }
                , t.prototype._unbindEvents = function() {
                    this._events.forEach(i => i())
                        , delete this._events
                }
                , t.prototype._initObservers = function() {
                    this._observers = [ar(this), rr(this)]
                }
                , t.prototype.registerObserver = function() {
                    this._observers.push(...arguments)
                }
                , t.prototype._disconnectObservers = function() {
                    this._observers.forEach(i => i == null ? void 0 : i.disconnect())
                }
        }

        function Gs(t) {
            const e = {}
                , {
                    args: i = []
                    , props: s = {}
                    , el: n
                    , id: o
                } = t;
            if (!s)
                return e;
            for (const a in s) {
                const l = Xt(a);
                let h = ot(n, l);
                R(h) || (h = s[a] === Boolean && h === "" ? !0 : Gi(s[a], h)
                    , !(l === "target" && lt(h, "_")) && (e[a] = h))
            }
            const r = Se(ot(n, o), i);
            for (const a in r) {
                const l = fe(a);
                R(s[l]) || (e[l] = Gi(s[l], r[a]))
            }
            return e
        }

        function ir(t, e, i) {
            Object.defineProperty(t, e, {
                enumerable: !0
                , get() {
                    const {
                        _computed: s
                        , $props: n
                        , $el: o
                    } = t;
                    return Bt(s, e) || (s[e] = (i.get || i).call(t, n, o))
                        , s[e]
                }
                , set(s) {
                    const {
                        _computed: n
                    } = t;
                    n[e] = i.set ? i.set.call(t, s) : s
                        , R(n[e]) && delete n[e]
                }
            })
        }

        function ti(t, e, i) {
            yt(e) || (e = {
                name: i
                , handler: e
            });
            let {
                name: s
                , el: n
                , handler: o
                , capture: r
                , passive: a
                , delegate: l
                , filter: h
                , self: u
            } = e;
            if (n = mt(n) ? n.call(t) : n || t.$el
                , Q(n)) {
                n.forEach(d => ti(t, {
                    ...e
                    , el: d
                }, i));
                return
            }!n || h && !h.call(t) || t._events.push(k(n, s, l ? D(l) ? l : l.call(t) : null, D(o) ? t[o] : o.bind(t), {
                passive: a
                , capture: r
                , self: u
            }))
        }

        function sr(t, e) {
            return t.every(i => !i || !Bt(i, e))
        }

        function Gi(t, e) {
            return t === Boolean ? ki(e) : t === Number ? Ct(e) : t === "list" ? nr(e) : t ? t(e) : e
        }

        function nr(t) {
            return Q(t) ? t : D(t) ? t.split(/,(?![^(]*\))/).map(e => Dt(e) ? Ct(e) : ki(e.trim())) : [t]
        }

        function or(t, e) {
            let {
                data: i = {}
            } = t
            , {
                args: s = []
                , props: n = {}
            } = e;
            Q(i) && (i = i.slice(0, s.length).reduce((o, r, a) => (yt(r) ? xt(o, r) : o[s[a]] = r
                , o), {}));
            for (const o in i)
                R(i[o]) ? delete i[o] : n[o] && (i[o] = Gi(n[o], i[o]));
            return i
        }

        function rr(t) {
            let {
                el: e
                , computed: i
            } = t.$options;
            if (!i)
                return;
            for (const n in i)
                if (i[n].document) {
                    e = e.ownerDocument;
                    break
                }
            const s = new MutationObserver(() => t._callWatches());
            return s.observe(e, {
                    childList: !0
                    , subtree: !0
                })
                , s
        }

        function ar(t) {
            const {
                $options: e
                , $props: i
            } = t
            , {
                id: s
                , attrs: n
                , props: o
                , el: r
            } = e;
            if (!o || n === !1)
                return;
            const a = Q(n) ? n : Object.keys(o)
                , l = a.map(u => Xt(u)).concat(s)
                , h = new MutationObserver(u => {
                    const d = Gs(e);
                    u.some(f => {
                        let {
                            attributeName: m
                        } = f;
                        const I = m.replace("data-", "");
                        return (I === s ? a : [fe(I), fe(m)]).some(A => !R(d[A]) && d[A] !== i[A])
                    }) && t.$reset()
                });
            return h.observe(r, {
                    attributes: !0
                    , attributeFilter: l.concat(l.map(u => "data-" + u))
                })
                , h
        }

        function lr(t) {
            const e = t.data;
            t.prototype.$create = function(i, s, n) {
                    return t[i](s, n)
                }
                , t.prototype.$mount = function(i) {
                    const {
                        name: s
                    } = this.$options;
                    i[e] || (i[e] = {})
                        , !i[e][s] && (i[e][s] = this
                            , this.$el = this.$options.el = this.$options.el || i
                            , P(i, document) && this._callConnected())
                }
                , t.prototype.$reset = function() {
                    this._callDisconnected()
                        , this._callConnected()
                }
                , t.prototype.$destroy = function(i) {
                    i === void 0 && (i = !1);
                    const {
                        el: s
                        , name: n
                    } = this.$options;
                    s && this._callDisconnected()
                        , this._callHook("destroy")
                        , s != null && s[e] && (delete s[e][n]
                            , pe(s[e]) || delete s[e]
                            , i && ut(this.$el))
                }
                , t.prototype.$emit = function(i) {
                    this._callUpdate(i)
                }
                , t.prototype.$update = function(i, s) {
                    i === void 0 && (i = this.$el)
                        , t.update(i, s)
                }
                , t.prototype.$getComponent = t.getComponent
                , Object.defineProperty(t.prototype, "$container", Object.getOwnPropertyDescriptor(t, "container"))
        }
        const Et = {};

        function hr(t) {
            const {
                data: e
                , prefix: i
            } = t;
            t.component = function(s, n) {
                    s = Xt(s);
                    const o = i + s;
                    if (!n)
                        return yt(Et[o]) && (Et[o] = Et["data-" + o] = t.extend(Et[o]))
                            , Et[o];
                    s = fe(s)
                        , t[s] = function(a, l) {
                            const h = t.component(s);
                            return h.options.functional ? new h({
                                data: yt(a) ? a : [...arguments]
                            }) : a ? M(a).map(u)[0] : u();

                            function u(d) {
                                const f = t.getComponent(d, s);
                                if (f)
                                    if (l)
                                        f.$destroy();
                                    else
                                        return f;
                                return new h({
                                    el: d
                                    , data: l
                                })
                            }
                        };
                    const r = yt(n) ? {
                        ...n
                    } : n.options;
                    return r.id = o
                        , r.name = s
                        , r.install == null || r.install(t, r, s)
                        , t._initialized && !r.functional && requestAnimationFrame(() => t[s]("[" + o + "],[data-" + o + "]"))
                        , Et[o] = Et["data-" + o] = yt(n) ? r : n
                }
                , t.getComponents = s => (s == null ? void 0 : s[e]) || {}
                , t.getComponent = (s, n) => t.getComponents(s)[n]
                , t.connect = s => {
                    if (s[e])
                        for (const n in s[e])
                            s[e][n]._callConnected();
                    for (const n of s.getAttributeNames()) {
                        const o = Js(n);
                        o && t[o](s)
                    }
                }
                , t.disconnect = s => {
                    for (const n in s[e])
                        s[e][n]._callDisconnected()
                }
        }

        function Js(t) {
            const e = Et[t];
            return e && (yt(e) ? e : e.options).name
        }
        const it = function(t) {
            this._init(t)
        };
        it.util = Qo
            , it.data = "__uikit__"
            , it.prefix = "uk-"
            , it.options = {}
            , it.version = "3.15.14"
            , Uo(it)
            , tr(it)
            , er(it)
            , hr(it)
            , lr(it);

        function cr(t) {
            const {
                connect: e
                , disconnect: i
            } = t;
            if (!Wt || !window.MutationObserver)
                return;
            requestAnimationFrame(function() {
                g(document, "uikit:init", t)
                    , document.body && vt(document.body, e)
                    , new MutationObserver(o => o.forEach(s)).observe(document, {
                        childList: !0
                        , subtree: !0
                    })
                    , new MutationObserver(o => o.forEach(n)).observe(document, {
                        attributes: !0
                        , subtree: !0
                    })
                    , t._initialized = !0
            });

            function s(o) {
                let {
                    addedNodes: r
                    , removedNodes: a
                } = o;
                for (const l of r)
                    vt(l, e);
                for (const l of a)
                    vt(l, i)
            }

            function n(o) {
                let {
                    target: r
                    , attributeName: a
                } = o;
                const l = Js(a);
                if (l) {
                    var h;
                    if (It(r, a)) {
                        t[l](r);
                        return
                    }
                    (h = t.getComponent(r, l)) == null || h.$destroy()
                }
            }
        }
        var st = {
                connected() {
                    x(this.$el, this.$options.id)
                }
            }
            , Te = {
                data: {
                    preload: 5
                }
                , methods: {
                    lazyload(t, e) {
                        t === void 0 && (t = this.$el)
                            , e === void 0 && (e = this.$el)
                            , this.registerObserver(re(t, (i, s) => {
                                for (const n of y(mt(e) ? e() : e))
                                    M('[loading="lazy"]', n).slice(0, this.preload - 1).forEach(o => me(o, "loading"));
                                for (const n of i.filter(o => {
                                        let {
                                            isIntersecting: r
                                        } = o;
                                        return r
                                    }).map(o => {
                                        let {
                                            target: r
                                        } = o;
                                        return r
                                    }))
                                    s.unobserve(n)
                            }))
                    }
                }
            }
            , _t = {
                props: {
                    cls: Boolean
                    , animation: "list"
                    , duration: Number
                    , velocity: Number
                    , origin: String
                    , transition: String
                }
                , data: {
                    cls: !1
                    , animation: [!1]
                    , duration: 200
                    , velocity: .2
                    , origin: !1
                    , transition: "ease"
                    , clsEnter: "uk-togglabe-enter"
                    , clsLeave: "uk-togglabe-leave"
                }
                , computed: {
                    hasAnimation(t) {
                        let {
                            animation: e
                        } = t;
                        return !!e[0]
                    }
                    , hasTransition(t) {
                        let {
                            animation: e
                        } = t;
                        return ["slide", "reveal"].some(i => lt(e[0], i))
                    }
                }
                , methods: {
                    toggleElement(t, e, i) {
                        return new Promise(s => Promise.all(y(t).map(n => {
                            const o = Me(e) ? e : !this.isToggled(n);
                            if (!g(n, "before" + (o ? "show" : "hide"), [this]))
                                return Promise.reject();
                            const r = (mt(i) ? i : i === !1 || !this.hasAnimation ? ur : this.hasTransition ? dr : fr)(n, o, this)
                                , a = o ? this.clsEnter : this.clsLeave;
                            x(n, a)
                                , g(n, o ? "show" : "hide", [this]);
                            const l = () => {
                                B(n, a)
                                    , g(n, o ? "shown" : "hidden", [this])
                            };
                            return r ? r.then(l, () => (B(n, a)
                                , Promise.reject())) : l()
                        })).then(s, T))
                    }
                    , isToggled(t) {
                        return t === void 0 && (t = this.$el)
                            , [t] = y(t)
                            , _(t, this.clsEnter) ? !0 : _(t, this.clsLeave) ? !1 : this.cls ? _(t, this.cls.split(" ")[0]) : q(t)
                    }
                    , _toggle(t, e) {
                        if (!t)
                            return;
                        e = Boolean(e);
                        let i;
                        this.cls ? (i = p(this.cls, " ") || e !== _(t, this.cls)
                                , i && H(t, this.cls, p(this.cls, " ") ? void 0 : e)) : (i = e === t.hidden
                                , i && (t.hidden = !e))
                            , M("[autofocus]", t).some(s => q(s) ? s.focus() || !0 : s.blur())
                            , i && g(t, "toggled", [e, this])
                    }
                }
            };

        function ur(t, e, i) {
            let {
                _toggle: s
            } = i;
            return pt.cancel(t)
                , S.cancel(t)
                , s(t, e)
        }
        async function dr(t, e, i) {
            var s;
            let {
                animation: n
                , duration: o
                , velocity: r
                , transition: a
                , _toggle: l
            } = i;
            const [h = "reveal", u = "top"] = ((s = n[0]) == null ? void 0 : s.split("-")) || []
            , d = [
                    ["left", "right"]
                    , ["top", "bottom"]
                ]
                , f = d[p(d[0], u) ? 0 : 1]
                , m = f[1] === u
                , A = ["width", "height"][d.indexOf(f)]
                , W = "margin-" + f[0]
                , Y = "margin-" + u;
            let Ot = $(t)[A];
            const hs = S.inProgress(t);
            await S.cancel(t)
                , e && l(t, !0);
            const Hl = Object.fromEntries(["padding", "border", "width", "height", "minWidth", "minHeight", "overflowY", "overflowX", W, Y].map(co => [co, t.style[co]]))
                , Be = $(t)
                , cs = v(c(t, W))
                , ao = v(c(t, Y))
                , Yt = Be[A] + ao;
            !hs && !e && (Ot += ao);
            const [bi] = Fi(t, "<div>");
            c(bi, {
                    boxSizing: "border-box"
                    , height: Be.height
                    , width: Be.width
                    , ...c(t, ["overflow", "padding", "borderTop", "borderRight", "borderBottom", "borderLeft", "borderImage", Y])
                })
                , c(t, {
                    padding: 0
                    , border: 0
                    , minWidth: 0
                    , minHeight: 0
                    , [Y]: 0
                    , width: Be.width
                    , height: Be.height
                    , overflow: "hidden"
                    , [A]: Ot
                });
            const lo = Ot / Yt;
            o = (r * Yt + o) * (e ? 1 - lo : lo);
            const ho = {
                [A]: e ? Yt : 0
            };
            m && (c(t, W, Yt - Ot + cs)
                    , ho[W] = e ? cs : Yt + cs)
                , !m ^ h === "reveal" && (c(bi, W, -Yt + Ot)
                    , S.start(bi, {
                        [W]: e ? 0 : -Yt
                    }, o, a));
            try {
                await S.start(t, ho, o, a)
            } finally {
                c(t, Hl)
                    , $e(bi.firstChild)
                    , e || l(t, !1)
            }
        }

        function fr(t, e, i) {
            pt.cancel(t);
            const {
                animation: s
                , duration: n
                , _toggle: o
            } = i;
            return e ? (o(t, !0)
                , pt.in(t, s[0], n, i.origin)) : pt.out(t, s[1] || s[0], n, i.origin).then(() => o(t, !1))
        }
        var Ks = {
            mixins: [st, Te, _t]
            , props: {
                animation: Boolean
                , targets: String
                , active: null
                , collapsible: Boolean
                , multiple: Boolean
                , toggle: String
                , content: String
                , offset: Number
            }
            , data: {
                targets: "> *"
                , active: !1
                , animation: !0
                , collapsible: !0
                , multiple: !1
                , clsOpen: "uk-open"
                , toggle: "> .uk-accordion-title"
                , content: "> .uk-accordion-content"
                , offset: 0
            }
            , computed: {
                items: {
                    get(t, e) {
                        let {
                            targets: i
                        } = t;
                        return M(i, e)
                    }
                    , watch(t, e) {
                        if (e || _(t, this.clsOpen))
                            return;
                        const i = this.active !== !1 && t[Number(this.active)] || !this.collapsible && t[0];
                        i && this.toggle(i, !1)
                    }
                    , immediate: !0
                }
                , toggles(t) {
                    let {
                        toggle: e
                    } = t;
                    return this.items.map(i => b(e, i))
                }
                , contents: {
                    get(t) {
                        let {
                            content: e
                        } = t;
                        return this.items.map(i => b(e, i))
                    }
                    , watch(t) {
                        for (const e of t)
                            ei(e, !_(this.items.find(i => P(e, i)), this.clsOpen))
                    }
                    , immediate: !0
                }
            }
            , connected() {
                this.lazyload()
            }
            , events: [{
                name: "click"
                , delegate() {
                    return this.targets + " " + this.$props.toggle
                }
                , async handler(t) {
                    var e;
                    t.preventDefault()
                        , (e = this._off) == null || e.call(this)
                        , this._off = gr(t.target)
                        , await this.toggle(ee(this.toggles, t.current))
                        , this._off()
                }
            }]
            , methods: {
                async toggle(t, e) {
                    t = this.items[Ut(t, this.items)];
                    let i = [t];
                    const s = Re(this.items, "." + this.clsOpen);
                    !this.multiple && !p(s, i[0]) && (i = i.concat(s))
                        , !(!this.collapsible && s.length < 2 && p(s, t)) && await Promise.all(i.map(n => this.toggleElement(n, !p(s, n), (o, r) => {
                            if (H(o, this.clsOpen, r)
                                , w(b(this.$props.toggle, o), "aria-expanded", r)
                                , e === !1 || !this.animation) {
                                ei(b(this.content, o), !r);
                                return
                            }
                            return pr(o, r, this)
                        })))
                }
            }
        };

        function ei(t, e) {
            t && (t.hidden = e)
        }
        async function pr(t, e, i) {
            var s;
            let {
                content: n
                , duration: o
                , velocity: r
                , transition: a
            } = i;
            n = ((s = t._wrapper) == null ? void 0 : s.firstElementChild) || b(n, t)
                , t._wrapper || (t._wrapper = Xe(n, "<div>"));
            const l = t._wrapper;
            c(l, "overflow", "hidden");
            const h = v(c(l, "height"));
            await S.cancel(l)
                , ei(n, !1);
            const u = v(c(n, "height")) + v(c(n, "marginTop")) + v(c(n, "marginBottom"))
                , d = h / u;
            o = (r * u + o) * (e ? 1 - d : d)
                , c(l, "height", h)
                , await S.start(l, {
                    height: e ? u : 0
                }, o, a)
                , $e(n)
                , delete t._wrapper
                , e || ei(n, !0)
        }

        function gr(t) {
            const e = tt(t)[0];
            let i;
            return function s() {
                    i = requestAnimationFrame(() => {
                        const {
                            top: n
                        } = t.getBoundingClientRect();
                        n < 0 && (e.scrollTop += n)
                            , s()
                    })
                }()
                , () => requestAnimationFrame(() => cancelAnimationFrame(i))
        }
        var mr = {
            mixins: [st, _t]
            , args: "animation"
            , props: {
                animation: Boolean
                , close: String
            }
            , data: {
                animation: !0
                , selClose: ".uk-alert-close"
                , duration: 150
            }
            , events: {
                name: "click"
                , delegate() {
                    return this.selClose
                }
                , handler(t) {
                    t.preventDefault()
                        , this.close()
                }
            }
            , methods: {
                async close() {
                    await this.toggleElement(this.$el, !1, vr)
                        , this.$destroy(!0)
                }
            }
        };

        function vr(t, e, i) {
            let {
                duration: s
                , transition: n
                , velocity: o
            } = i;
            const r = v(c(t, "height"));
            return c(t, "height", r)
                , S.start(t, {
                    height: 0
                    , marginTop: 0
                    , marginBottom: 0
                    , paddingTop: 0
                    , paddingBottom: 0
                    , borderTop: 0
                    , borderBottom: 0
                    , opacity: 0
                }, o * r + s, n)
        }
        var Zs = {
                args: "autoplay"
                , props: {
                    automute: Boolean
                    , autoplay: Boolean
                }
                , data: {
                    automute: !1
                    , autoplay: !0
                }
                , connected() {
                    this.inView = this.autoplay === "inview"
                        , this.inView && !It(this.$el, "preload") && (this.$el.preload = "none")
                        , ct(this.$el, "iframe") && !It(this.$el, "allow") && (this.$el.allow = "autoplay")
                        , this.automute && Bs(this.$el)
                        , this.registerObserver(re(this.$el, () => this.$emit(), {}, !1))
                }
                , update: {
                    read(t) {
                        let {
                            visible: e
                        } = t;
                        return Ds(this.$el) ? {
                            prev: e
                            , visible: q(this.$el) && c(this.$el, "visibility") !== "hidden"
                            , inView: this.inView && Vi(this.$el)
                        } : !1
                    }
                    , write(t) {
                        let {
                            prev: e
                            , visible: i
                            , inView: s
                        } = t;
                        !i || this.inView && !s ? Os(this.$el) : (this.autoplay === !0 && !e || this.inView && s) && _s(this.$el)
                    }
                }
            }
            , wt = {
                connected() {
                    var t;
                    this.registerObserver(Ke(((t = this.$options.resizeTargets) == null ? void 0 : t.call(this)) || this.$el, () => this.$emit("resize")))
                }
            }
            , wr = {
                mixins: [wt, Zs]
                , props: {
                    width: Number
                    , height: Number
                }
                , data: {
                    automute: !0
                }
                , events: {
                    "load loadedmetadata"() {
                        this.$emit("resize")
                    }
                }
                , resizeTargets() {
                    return [this.$el, Qs(this.$el) || E(this.$el)]
                }
                , update: {
                    read() {
                        const {
                            ratio: t
                            , cover: e
                        } = Fe
                        , {
                            $el: i
                            , width: s
                            , height: n
                        } = this;
                        let o = {
                            width: s
                            , height: n
                        };
                        if (!o.width || !o.height) {
                            const h = {
                                width: i.naturalWidth || i.videoWidth || i.clientWidth
                                , height: i.naturalHeight || i.videoHeight || i.clientHeight
                            };
                            o.width ? o = t(h, "width", o.width) : n ? o = t(h, "height", o.height) : o = h
                        }
                        const {
                            offsetHeight: r
                            , offsetWidth: a
                        } = Qs(i) || E(i)
                            , l = e(o, {
                                width: a + (a % 2 ? 1 : 0)
                                , height: r + (r % 2 ? 1 : 0)
                            });
                        return !l.width || !l.height ? !1 : l
                    }
                    , write(t) {
                        let {
                            height: e
                            , width: i
                        } = t;
                        c(this.$el, {
                            height: e
                            , width: i
                        })
                    }
                    , events: ["resize"]
                }
            };

        function Qs(t) {
            for (; t = E(t);)
                if (c(t, "position") !== "static")
                    return t
        }
        var le = {
                props: {
                    container: Boolean
                }
                , data: {
                    container: !0
                }
                , computed: {
                    container(t) {
                        let {
                            container: e
                        } = t;
                        return e === !0 && this.$container || e && b(e)
                    }
                }
            }
            , Us = {
                props: {
                    pos: String
                    , offset: null
                    , flip: Boolean
                    , shift: Boolean
                    , inset: Boolean
                }
                , data: {
                    pos: "bottom-" + (X ? "right" : "left")
                    , offset: !1
                    , flip: !0
                    , shift: !0
                    , inset: !1
                }
                , connected() {
                    this.pos = this.$props.pos.split("-").concat("center").slice(0, 2)
                        , [this.dir, this.align] = this.pos
                        , this.axis = p(["top", "bottom"], this.dir) ? "y" : "x"
                }
                , methods: {
                    positionAt(t, e, i) {
                        let s = [this.getPositionOffset(t), this.getShiftOffset(t)];
                        const n = [this.flip && "flip", this.shift && "shift"]
                            , o = {
                                element: [this.inset ? this.dir : qe(this.dir), this.align]
                                , target: [this.dir, this.align]
                            };
                        if (this.axis === "y") {
                            for (const u in o)
                                o[u].reverse();
                            s.reverse()
                                , n.reverse()
                        }
                        const [r] = tt(t, /auto|scroll/)
                            , {
                                scrollTop: a
                                , scrollLeft: l
                            } = r
                            , h = $(t);
                        c(t, {
                                top: -h.height
                                , left: -h.width
                            })
                            , Ls(t, e, {
                                attach: o
                                , offset: s
                                , boundary: i
                                , placement: n
                                , viewportOffset: this.getViewportOffset(t)
                            })
                            , r.scrollTop = a
                            , r.scrollLeft = l
                    }
                    , getPositionOffset(t) {
                        return K(this.offset === !1 ? c(t, "--uk-position-offset") : this.offset, this.axis === "x" ? "width" : "height", t) * (p(["left", "top"], this.dir) ? -1 : 1) * (this.inset ? -1 : 1)
                    }
                    , getShiftOffset(t) {
                        return this.align === "center" ? 0 : K(c(t, "--uk-position-shift-offset"), this.axis === "y" ? "width" : "height", t) * (p(["left", "top"], this.align) ? 1 : -1)
                    }
                    , getViewportOffset(t) {
                        return K(c(t, "--uk-position-viewport-offset"))
                    }
                }
            }
            , br = {
                beforeConnect() {
                    this._style = w(this.$el, "style")
                }
                , disconnected() {
                    w(this.$el, "style", this._style)
                }
            };
        const nt = [];
        var Ji = {
            mixins: [st, le, _t]
            , props: {
                selPanel: String
                , selClose: String
                , escClose: Boolean
                , bgClose: Boolean
                , stack: Boolean
            }
            , data: {
                cls: "uk-open"
                , escClose: !0
                , bgClose: !0
                , overlay: !0
                , stack: !1
            }
            , computed: {
                panel(t, e) {
                    let {
                        selPanel: i
                    } = t;
                    return b(i, e)
                }
                , transitionElement() {
                    return this.panel
                }
                , bgClose(t) {
                    let {
                        bgClose: e
                    } = t;
                    return e && this.panel
                }
            }
            , beforeDisconnect() {
                p(nt, this) && this.toggleElement(this.$el, !1, !1)
            }
            , events: [{
                name: "click"
                , delegate() {
                    return this.selClose
                }
                , handler(t) {
                    t.preventDefault()
                        , this.hide()
                }
            }, {
                name: "click"
                , delegate() {
                    return 'a[href*="#"]'
                }
                , handler(t) {
                    let {
                        current: e
                        , defaultPrevented: i
                    } = t;
                    const {
                        hash: s
                    } = e;
                    !i && s && Zi(e) && !P(s, this.$el) && b(s, document.body) && this.hide()
                }
            }, {
                name: "toggle"
                , self: !0
                , handler(t) {
                    t.defaultPrevented || (t.preventDefault()
                        , this.isToggled() === p(nt, this) && this.toggle())
                }
            }, {
                name: "beforeshow"
                , self: !0
                , handler(t) {
                    if (p(nt, this))
                        return !1;
                    !this.stack && nt.length ? (Promise.all(nt.map(e => e.hide())).then(this.show)
                        , t.preventDefault()) : nt.push(this)
                }
            }, {
                name: "show"
                , self: !0
                , handler() {
                    N(this.$el, "hide", k(document, "focusin", t => {
                            Qt(nt) === this && !P(t.target, this.$el) && this.$el.focus()
                        }))
                        , this.overlay && (N(this.$el, "hidden", en(this.$el), {
                                self: !0
                            })
                            , N(this.$el, "hidden", sn(), {
                                self: !0
                            }))
                        , this.stack && c(this.$el, "zIndex", v(c(this.$el, "zIndex")) + nt.length)
                        , x(document.documentElement, this.clsPage)
                        , this.bgClose && N(this.$el, "hide", k(document, gt, t => {
                            let {
                                target: e
                            } = t;
                            Qt(nt) !== this || this.overlay && !P(e, this.$el) || P(e, this.panel) || N(document, At + " " + Je + " scroll", i => {
                                    let {
                                        defaultPrevented: s
                                        , type: n
                                        , target: o
                                    } = i;
                                    !s && n === At && e === o && this.hide()
                                }
                                , !0)
                        }), {
                            self: !0
                        })
                        , this.escClose && N(this.$el, "hide", k(document, "keydown", t => {
                            t.keyCode === 27 && Qt(nt) === this && this.hide()
                        }), {
                            self: !0
                        })
                }
            }, {
                name: "shown"
                , self: !0
                , handler() {
                    We(this.$el) || w(this.$el, "tabindex", "-1")
                        , b(":focus", this.$el) || this.$el.focus()
                }
            }, {
                name: "hidden"
                , self: !0
                , handler() {
                    p(nt, this) && nt.splice(nt.indexOf(this), 1)
                        , c(this.$el, "zIndex", "")
                        , nt.some(t => t.clsPage === this.clsPage) || B(document.documentElement, this.clsPage)
                }
            }]
            , methods: {
                toggle() {
                    return this.isToggled() ? this.hide() : this.show()
                }
                , show() {
                    return this.container && E(this.$el) !== this.container ? (L(this.container, this.$el)
                        , new Promise(t => requestAnimationFrame(() => this.show().then(t)))) : this.toggleElement(this.$el, !0, tn)
                }
                , hide() {
                    return this.toggleElement(this.$el, !1, tn)
                }
            }
        };

        function tn(t, e, i) {
            let {
                transitionElement: s
                , _toggle: n
            } = i;
            return new Promise((o, r) => N(t, "show hide", () => {
                t._reject == null || t._reject()
                    , t._reject = r
                    , n(t, e);
                const a = N(s, "transitionstart", () => {
                            N(s, "transitionend transitioncancel", o, {
                                    self: !0
                                })
                                , clearTimeout(l)
                        }
                        , {
                            self: !0
                        })
                    , l = setTimeout(() => {
                            a()
                                , o()
                        }
                        , xr(c(s, "transitionDuration")))
            })).then(() => delete t._reject)
        }

        function xr(t) {
            return t ? Gt(t, "ms") ? v(t) : v(t) * 1e3 : 0
        }

        function en(t) {
            if (CSS.supports("overscroll-behavior", "contain")) {
                const s = yr(t, n => /auto|scroll/.test(c(n, "overflow")));
                return c(s, "overscrollBehavior", "contain")
                    , () => c(s, "overscrollBehavior", "")
            }
            let e;
            const i = [k(t, "touchstart", s => {
                    let {
                        targetTouches: n
                    } = s;
                    n.length === 1 && (e = n[0].clientY)
                }
                , {
                    passive: !0
                }), k(t, "touchmove", s => {
                    if (s.targetTouches.length !== 1)
                        return;
                    let [n] = tt(s.target, /auto|scroll/);
                    P(n, t) || (n = t);
                    const o = s.targetTouches[0].clientY - e
                        , {
                            scrollTop: r
                            , scrollHeight: a
                            , clientHeight: l
                        } = n;
                    (l >= a || r === 0 && o > 0 || a - r <= l && o < 0) && s.cancelable && s.preventDefault()
                }
                , {
                    passive: !1
                })];
            return () => i.forEach(s => s())
        }
        let Ki;

        function sn() {
            if (Ki)
                return T;
            Ki = !0;
            const {
                scrollingElement: t
            } = document;
            return c(t, {
                    overflowY: "hidden"
                    , touchAction: "none"
                    , paddingRight: ye(window) - t.clientWidth
                })
                , () => {
                    Ki = !1
                        , c(t, {
                            overflowY: ""
                            , touchAction: ""
                            , paddingRight: ""
                        })
                }
        }

        function yr(t, e) {
            const i = [];
            return vt(t, s => {
                    e(s) && i.push(s)
                })
                , i
        }

        function Zi(t) {
            return ["origin", "pathname", "search"].every(e => t[e] === location[e])
        }
        let V;
        var nn = {
            mixins: [le, Te, Us, br, _t]
            , args: "pos"
            , props: {
                mode: "list"
                , toggle: Boolean
                , boundary: Boolean
                , boundaryX: Boolean
                , boundaryY: Boolean
                , target: Boolean
                , targetX: Boolean
                , targetY: Boolean
                , stretch: Boolean
                , delayShow: Number
                , delayHide: Number
                , autoUpdate: Boolean
                , clsDrop: String
                , animateOut: Boolean
                , bgScroll: Boolean
            }
            , data: {
                mode: ["click", "hover"]
                , toggle: "- *"
                , boundary: !1
                , boundaryX: !1
                , boundaryY: !1
                , target: !1
                , targetX: !1
                , targetY: !1
                , stretch: !1
                , delayShow: 0
                , delayHide: 800
                , autoUpdate: !0
                , clsDrop: !1
                , animateOut: !1
                , bgScroll: !0
                , animation: ["uk-animation-fade"]
                , cls: "uk-open"
                , container: !1
            }
            , computed: {
                boundary(t, e) {
                    let {
                        boundary: i
                        , boundaryX: s
                        , boundaryY: n
                    } = t;
                    return [ht(s || i, e) || window, ht(n || i, e) || window]
                }
                , target(t, e) {
                    let {
                        target: i
                        , targetX: s
                        , targetY: n
                    } = t;
                    return s = s || i || this.targetEl
                        , n = n || i || this.targetEl
                        , [s === !0 ? window : ht(s, e), n === !0 ? window : ht(n, e)]
                }
            }
            , created() {
                this.tracker = new Wi
            }
            , beforeConnect() {
                this.clsDrop = this.$props.clsDrop || "uk-" + this.$options.name
            }
            , connected() {
                x(this.$el, this.clsDrop)
                    , this.toggle && !this.targetEl && (this.targetEl = this.$create("toggle", ht(this.toggle, this.$el), {
                            target: this.$el
                            , mode: this.mode
                        }).$el
                        , w(this.targetEl, "aria-haspopup", !0)
                        , this.lazyload(this.targetEl))
            }
            , disconnected() {
                this.isActive() && (this.hide(!1)
                    , V = null)
            }
            , events: [{
                name: "click"
                , delegate() {
                    return "." + this.clsDrop + "-close"
                }
                , handler(t) {
                    t.preventDefault()
                        , this.hide(!1)
                }
            }, {
                name: "click"
                , delegate() {
                    return 'a[href*="#"]'
                }
                , handler(t) {
                    let {
                        defaultPrevented: e
                        , current: i
                    } = t;
                    const {
                        hash: s
                    } = i;
                    !e && s && Zi(i) && !P(s, this.$el) && this.hide(!1)
                }
            }, {
                name: "beforescroll"
                , handler() {
                    this.hide(!1)
                }
            }, {
                name: "toggle"
                , self: !0
                , handler(t, e) {
                    t.preventDefault()
                        , this.isToggled() ? this.hide(!1) : this.show(e == null ? void 0 : e.$el, !1)
                }
            }, {
                name: "toggleshow"
                , self: !0
                , handler(t, e) {
                    t.preventDefault()
                        , this.show(e == null ? void 0 : e.$el)
                }
            }, {
                name: "togglehide"
                , self: !0
                , handler(t) {
                    t.preventDefault()
                        , F(this.$el, ":focus,:hover") || this.hide()
                }
            }, {
                name: jt + " focusin"
                , filter() {
                    return p(this.mode, "hover")
                }
                , handler(t) {
                    kt(t) || this.clearTimers()
                }
            }, {
                name: oe + " focusout"
                , filter() {
                    return p(this.mode, "hover")
                }
                , handler(t) {
                    !kt(t) && t.relatedTarget && this.hide()
                }
            }, {
                name: "toggled"
                , self: !0
                , handler(t, e) {
                    !e || (this.clearTimers()
                        , this.position())
                }
            }, {
                name: "show"
                , self: !0
                , handler() {
                    V = this
                        , this.tracker.init();
                    const t = () => this.$emit()
                        , e = [k(document, gt, i => {
                            let {
                                target: s
                            } = i;
                            return !P(s, this.$el) && N(document, At + " " + Je + " scroll", n => {
                                    let {
                                        defaultPrevented: o
                                        , type: r
                                        , target: a
                                    } = n;
                                    !o && r === At && s === a && !(this.targetEl && P(s, this.targetEl)) && this.hide(!1)
                                }
                                , !0)
                        }), k(document, "keydown", i => {
                            i.keyCode === 27 && this.hide(!1)
                        }), k(window, "resize", t), (() => {
                            const i = Ke(tt(this.$el).concat(this.target), t);
                            return () => i.disconnect()
                        })(), ...this.autoUpdate ? [k([document, tt(this.$el)], "scroll", t, {
                            passive: !0
                        })] : [], ...this.bgScroll ? [] : [en(this.$el), sn()]];
                    N(this.$el, "hide", () => e.forEach(i => i()), {
                        self: !0
                    })
                }
            }, {
                name: "beforehide"
                , self: !0
                , handler() {
                    this.clearTimers()
                }
            }, {
                name: "hide"
                , handler(t) {
                    let {
                        target: e
                    } = t;
                    if (this.$el !== e) {
                        V = V === null && P(e, this.$el) && this.isToggled() ? this : V;
                        return
                    }
                    V = this.isActive() ? null : V
                        , this.tracker.cancel()
                }
            }]
            , update: {
                write() {
                    this.isToggled() && !_(this.$el, this.clsEnter) && this.position()
                }
            }
            , methods: {
                show(t, e) {
                    if (t === void 0 && (t = this.targetEl)
                        , e === void 0 && (e = !0)
                        , this.isToggled() && t && this.targetEl && t !== this.targetEl && this.hide(!1, !1)
                        , this.targetEl = t
                        , this.clearTimers()
                        , !this.isActive()) {
                        if (V) {
                            if (e && V.isDelaying) {
                                this.showTimer = setTimeout(() => F(t, ":hover") && this.show(), 10);
                                return
                            }
                            let i;
                            for (; V && i !== V && !P(this.$el, V.$el);)
                                i = V
                                , V.hide(!1, !1)
                        }
                        this.container && E(this.$el) !== this.container && L(this.container, this.$el)
                            , this.showTimer = setTimeout(() => this.toggleElement(this.$el, !0), e && this.delayShow || 0)
                    }
                }
                , hide(t, e) {
                    t === void 0 && (t = !0)
                        , e === void 0 && (e = !0);
                    const i = () => this.toggleElement(this.$el, !1, this.animateOut && e);
                    this.clearTimers()
                        , this.isDelaying = $r(this.$el).some(s => this.tracker.movesTo(s))
                        , t && this.isDelaying ? this.hideTimer = setTimeout(this.hide, 50) : t && this.delayHide ? this.hideTimer = setTimeout(i, this.delayHide) : i()
                }
                , clearTimers() {
                    clearTimeout(this.showTimer)
                        , clearTimeout(this.hideTimer)
                        , this.showTimer = null
                        , this.hideTimer = null
                        , this.isDelaying = !1
                }
                , isActive() {
                    return V === this
                }
                , position() {
                    B(this.$el, this.clsDrop + "-stack")
                        , w(this.$el, "style", this._style)
                        , this.$el.hidden = !0;
                    const t = this.target.map(n => kr(this.$el, n))
                        , e = this.getViewportOffset(this.$el)
                        , i = [
                            [0, ["x", "width", "left", "right"]]
                            , [1, ["y", "height", "top", "bottom"]]
                        ];
                    for (const [n, [o, r]] of i)
                        this.axis !== o && p([o, !0], this.stretch) && c(this.$el, {
                            [r]: Math.min(C(this.boundary[n])[r], t[n][r] - 2 * e)
                            , ["overflow-" + o]: "auto"
                        });
                    const s = t[0].width - 2 * e;
                    this.$el.offsetWidth > s && x(this.$el, this.clsDrop + "-stack")
                        , c(this.$el, "maxWidth", s)
                        , this.$el.hidden = !1
                        , this.positionAt(this.$el, this.target, this.boundary);
                    for (const [n, [o, r, a, l]] of i)
                        if (this.axis === o && p([o, !0], this.stretch)) {
                            const h = Math.abs(this.getPositionOffset(this.$el))
                                , u = C(this.target[n])
                                , d = C(this.$el);
                            c(this.$el, {
                                    [r]: (u[a] > d[a] ? u[a] - Math.max(C(this.boundary[n])[a], t[n][a] + e) : Math.min(C(this.boundary[n])[l], t[n][l] - e) - u[l]) - h
                                    , ["overflow-" + o]: "auto"
                                })
                                , this.positionAt(this.$el, this.target, this.boundary)
                        }
                }
            }
        };

        function $r(t) {
            const e = [];
            return vt(t, i => c(i, "position") !== "static" && e.push(i))
                , e
        }

        function kr(t, e) {
            return rt(tt(e).find(i => P(t, i)))
        }
        var Sr = {
                mixins: [st]
                , args: "target"
                , props: {
                    target: Boolean
                }
                , data: {
                    target: !1
                }
                , computed: {
                    input(t, e) {
                        return b(ve, e)
                    }
                    , state() {
                        return this.input.nextElementSibling
                    }
                    , target(t, e) {
                        let {
                            target: i
                        } = t;
                        return i && (i === !0 && E(this.input) === e && this.input.nextElementSibling || b(i, e))
                    }
                }
                , update() {
                    var t;
                    const {
                        target: e
                        , input: i
                    } = this;
                    if (!e)
                        return;
                    let s;
                    const n = Pi(e) ? "value" : "textContent"
                        , o = e[n]
                        , r = (t = i.files) != null && t[0] ? i.files[0].name : F(i, "select") && (s = M("option", i).filter(a => a.selected)[0]) ? s.textContent : i.value;
                    o !== r && (e[n] = r)
                }
                , events: [{
                    name: "change"
                    , handler() {
                        this.$emit()
                    }
                }, {
                    name: "reset"
                    , el() {
                        return et(this.$el, "form")
                    }
                    , handler() {
                        this.$emit()
                    }
                }]
            }
            , on = {
                mixins: [wt]
                , props: {
                    margin: String
                    , firstColumn: Boolean
                }
                , data: {
                    margin: "uk-margin-small-top"
                    , firstColumn: "uk-first-column"
                }
                , resizeTargets() {
                    return [this.$el, ...xi(this.$el.children)]
                }
                , connected() {
                    this.registerObserver(Ps(this.$el, () => this.$reset(), {
                        childList: !0
                        , attributes: !0
                        , attributeFilter: ["style"]
                    }))
                }
                , update: {
                    read() {
                        const t = Qi(this.$el.children);
                        return {
                            rows: t
                            , columns: Tr(t)
                        }
                    }
                    , write(t) {
                        let {
                            columns: e
                            , rows: i
                        } = t;
                        for (const s of i)
                            for (const n of s)
                                H(n, this.margin, i[0] !== s)
                                , H(n, this.firstColumn, e[0].includes(n))
                    }
                    , events: ["resize"]
                }
            };

        function Qi(t) {
            return rn(t, "top", "bottom")
        }

        function Tr(t) {
            const e = [];
            for (const i of t) {
                const s = rn(i, "left", "right");
                for (let n = 0; n < s.length; n++)
                    e[n] = e[n] ? e[n].concat(s[n]) : s[n]
            }
            return X ? e.reverse() : e
        }

        function rn(t, e, i) {
            const s = [
                []
            ];
            for (const n of t) {
                if (!q(n))
                    continue;
                let o = ii(n);
                for (let r = s.length - 1; r >= 0; r--) {
                    const a = s[r];
                    if (!a[0]) {
                        a.push(n);
                        break
                    }
                    let l;
                    if (a[0].offsetParent === n.offsetParent ? l = ii(a[0]) : (o = ii(n, !0)
                            , l = ii(a[0], !0))
                        , o[e] >= l[i] - 1 && o[e] !== l[e]) {
                        s.push([n]);
                        break
                    }
                    if (o[i] - 1 > l[e] || o[e] === l[e]) {
                        a.push(n);
                        break
                    }
                    if (r === 0) {
                        s.unshift([n]);
                        break
                    }
                }
            }
            return s
        }

        function ii(t, e) {
            e === void 0 && (e = !1);
            let {
                offsetTop: i
                , offsetLeft: s
                , offsetHeight: n
                , offsetWidth: o
            } = t;
            return e && ([i, s] = Ht(t)), {
                top: i
                , left: s
                , bottom: i + n
                , right: s + o
            }
        }
        var si = {
            connected() {
                an(this._uid, () => this.$emit("scroll"))
            }
            , disconnected() {
                ln(this._uid)
            }
        };
        const ni = new Map;
        let Ce;

        function an(t, e) {
            Ce = Ce || k(window, "scroll", () => ni.forEach(i => i()), {
                    passive: !0
                    , capture: !0
                })
                , ni.set(t, e)
        }

        function ln(t) {
            ni.delete(t)
                , Ce && !ni.size && (Ce()
                    , Ce = null)
        }
        var Cr = {
            extends: on
            , mixins: [st]
            , name: "grid"
            , props: {
                masonry: Boolean
                , parallax: Number
            }
            , data: {
                margin: "uk-grid-margin"
                , clsStack: "uk-grid-stack"
                , masonry: !1
                , parallax: 0
            }
            , connected() {
                this.masonry && x(this.$el, "uk-flex-top uk-flex-wrap-top")
                    , this.parallax && an(this._uid, () => this.$emit("scroll"))
            }
            , disconnected() {
                ln(this._uid)
            }
            , update: [{
                write(t) {
                    let {
                        columns: e
                    } = t;
                    H(this.$el, this.clsStack, e.length < 2)
                }
                , events: ["resize"]
            }, {
                read(t) {
                    let {
                        columns: e
                        , rows: i
                    } = t;
                    if (!e.length || !this.masonry && !this.parallax || hn(this.$el))
                        return t.translates = !1
                            , !1;
                    let s = !1;
                    const n = O(this.$el)
                        , o = Ar(e)
                        , r = Pr(n, this.margin) * (i.length - 1)
                        , a = Math.max(...o) + r;
                    this.masonry && (e = e.map(h => Ne(h, "offsetTop"))
                        , s = Ir(i, e));
                    let l = Math.abs(this.parallax);
                    return l && (l = o.reduce((h, u, d) => Math.max(h, u + r + (d % 2 ? l : l / 8) - a), 0)), {
                        padding: l
                        , columns: e
                        , translates: s
                        , height: s ? a : ""
                    }
                }
                , write(t) {
                    let {
                        height: e
                        , padding: i
                    } = t;
                    c(this.$el, "paddingBottom", i || "")
                        , e !== !1 && c(this.$el, "height", e)
                }
                , events: ["resize"]
            }, {
                read() {
                    return this.parallax && hn(this.$el) ? !1 : {
                        scrolled: this.parallax ? Yi(this.$el) * Math.abs(this.parallax) : !1
                    }
                }
                , write(t) {
                    let {
                        columns: e
                        , scrolled: i
                        , translates: s
                    } = t;
                    i === !1 && !s || e.forEach((n, o) => n.forEach((r, a) => c(r, "transform", !i && !s ? "" : "translateY(" + ((s && -s[o][a]) + (i ? o % 2 ? i : i / 8 : 0)) + "px)")))
                }
                , events: ["scroll", "resize"]
            }]
        };

        function hn(t) {
            return O(t).some(e => c(e, "position") === "absolute")
        }

        function Ir(t, e) {
            const i = t.map(s => Math.max(...s.map(n => n.offsetHeight)));
            return e.map(s => {
                let n = 0;
                return s.map((o, r) => n += r ? i[r - 1] - s[r - 1].offsetHeight : 0)
            })
        }

        function Pr(t, e) {
            const [i] = t.filter(s => _(s, e));
            return v(i ? c(i, "marginTop") : c(t[0], "paddingLeft"))
        }

        function Ar(t) {
            return t.map(e => e.reduce((i, s) => i + s.offsetHeight, 0))
        }
        var Er = {
            mixins: [wt]
            , args: "target"
            , props: {
                target: String
                , row: Boolean
            }
            , data: {
                target: "> *"
                , row: !0
            }
            , computed: {
                elements: {
                    get(t, e) {
                        let {
                            target: i
                        } = t;
                        return M(i, e)
                    }
                    , watch() {
                        this.$reset()
                    }
                }
            }
            , resizeTargets() {
                return [this.$el, ...this.elements]
            }
            , update: {
                read() {
                    return {
                        rows: (this.row ? Qi(this.elements) : [this.elements]).map(_r)
                    }
                }
                , write(t) {
                    let {
                        rows: e
                    } = t;
                    for (const {
                            heights: i
                            , elements: s
                        } of e)
                        s.forEach((n, o) => c(n, "minHeight", i[o]))
                }
                , events: ["resize"]
            }
        };

        function _r(t) {
            if (t.length < 2)
                return {
                    heights: [""]
                    , elements: t
                };
            c(t, "minHeight", "");
            let e = t.map(Or);
            const i = Math.max(...e);
            return {
                heights: t.map((s, n) => e[n].toFixed(2) === i.toFixed(2) ? "" : i)
                , elements: t
            }
        }

        function Or(t) {
            let e = !1;
            q(t) || (e = t.style.display
                , c(t, "display", "block", "important"));
            const i = $(t).height - se(t, "height", "content-box");
            return e !== !1 && c(t, "display", e)
                , i
        }
        var Br = {
                mixins: [wt]
                , props: {
                    expand: Boolean
                    , offsetTop: Boolean
                    , offsetBottom: Boolean
                    , minHeight: Number
                }
                , data: {
                    expand: !1
                    , offsetTop: !1
                    , offsetBottom: !1
                    , minHeight: 0
                }
                , resizeTargets() {
                    return [this.$el, ...tt(this.$el, /auto|scroll/)]
                }
                , update: {
                    read(t) {
                        let {
                            minHeight: e
                        } = t;
                        if (!q(this.$el))
                            return !1;
                        let i = "";
                        const s = se(this.$el, "height", "content-box")
                            , {
                                body: n
                                , scrollingElement: o
                            } = document
                            , [r] = tt(this.$el, /auto|scroll/)
                            , {
                                height: a
                            } = rt(r === n ? o : r);
                        if (this.expand)
                            i = Math.max(a - ($(r).height - $(this.$el).height) - s, 0);
                        else {
                            const l = o === r || n === r;
                            if (i = "calc(" + (l ? "100vh" : a + "px")
                                , this.offsetTop)
                                if (l) {
                                    const h = Ht(this.$el)[0] - Ht(r)[0];
                                    i += h > 0 && h < a / 2 ? " - " + h + "px" : ""
                                } else
                                    i += " - " + c(r, "paddingTop");
                            this.offsetBottom === !0 ? i += " - " + $(this.$el.nextElementSibling).height + "px" : Dt(this.offsetBottom) ? i += " - " + this.offsetBottom + "vh" : this.offsetBottom && Gt(this.offsetBottom, "px") ? i += " - " + v(this.offsetBottom) + "px" : D(this.offsetBottom) && (i += " - " + $(ht(this.offsetBottom, this.$el)).height + "px")
                                , i += (s ? " - " + s + "px" : "") + ")"
                        }
                        return {
                            minHeight: i
                            , prev: e
                        }
                    }
                    , write(t) {
                        let {
                            minHeight: e
                        } = t;
                        c(this.$el, {
                                minHeight: e
                            })
                            , this.minHeight && v(c(this.$el, "minHeight")) < this.minHeight && c(this.$el, "minHeight", this.minHeight)
                    }
                    , events: ["resize"]
                }
            }
            , cn = {
                args: "src"
                , props: {
                    id: Boolean
                    , icon: String
                    , src: String
                    , style: String
                    , width: Number
                    , height: Number
                    , ratio: Number
                    , class: String
                    , strokeAnimation: Boolean
                    , attributes: "list"
                }
                , data: {
                    ratio: 1
                    , include: ["style", "class"]
                    , class: ""
                    , strokeAnimation: !1
                }
                , beforeConnect() {
                    this.class += " uk-svg"
                }
                , connected() {
                    !this.icon && p(this.src, "#") && ([this.src, this.icon] = this.src.split("#"))
                        , this.svg = this.getSvg().then(t => {
                                if (this._connected) {
                                    const e = zr(t, this.$el);
                                    return this.svgEl && e !== this.svgEl && ut(this.svgEl)
                                        , this.applyAttributes(e, t)
                                        , this.svgEl = e
                                }
                            }
                            , T)
                        , this.strokeAnimation && this.svg.then(t => {
                            this._connected && (dn(t)
                                , this.registerObserver(re(t, (e, i) => {
                                    dn(t)
                                        , i.disconnect()
                                })))
                        })
                }
                , disconnected() {
                    this.svg.then(t => {
                            this._connected || (Ii(this.$el) && (this.$el.hidden = !1)
                                , ut(t)
                                , this.svgEl = null)
                        })
                        , this.svg = null
                }
                , methods: {
                    async getSvg() {
                        return ct(this.$el, "img") && !this.$el.complete && this.$el.loading === "lazy" ? new Promise(t => N(this.$el, "load", () => t(this.getSvg()))) : Mr(await Dr(this.src), this.icon) || Promise.reject("SVG not found.")
                    }
                    , applyAttributes(t, e) {
                        for (const o in this.$options.props)
                            p(this.include, o) && o in this && w(t, o, this[o]);
                        for (const o in this.attributes) {
                            const [r, a] = this.attributes[o].split(":", 2);
                            w(t, r, a)
                        }
                        this.id || me(t, "id");
                        const i = ["width", "height"];
                        let s = i.map(o => this[o]);
                        s.some(o => o) || (s = i.map(o => w(e, o)));
                        const n = w(e, "viewBox");
                        n && !s.some(o => o) && (s = n.split(" ").slice(2))
                            , s.forEach((o, r) => w(t, i[r], v(o) * this.ratio || null))
                    }
                }
            };
        const Dr = ft(async t => t ? lt(t, "data:") ? decodeURIComponent(t.split(",")[1]) : (await fetch(t)).text() : Promise.reject());

        function Mr(t, e) {
            var i;
            return e && p(t, "<symbol") && (t = Nr(t, e) || t)
                , t = b(t.substr(t.indexOf("<svg")))
                , ((i = t) == null ? void 0 : i.hasChildNodes()) && t
        }
        const un = /<symbol([^]*?id=(['"])(.+?)\2[^]*?<\/)symbol>/g
            , oi = {};

        function Nr(t, e) {
            if (!oi[t]) {
                oi[t] = {}
                    , un.lastIndex = 0;
                let i;
                for (; i = un.exec(t);)
                    oi[t][i[3]] = '<svg xmlns="http://www.w3.org/2000/svg"' + i[1] + "svg>"
            }
            return oi[t][e]
        }

        function dn(t) {
            const e = fn(t);
            e && t.style.setProperty("--uk-animation-stroke", e)
        }

        function fn(t) {
            return Math.ceil(Math.max(0, ...M("[stroke]", t).map(e => {
                try {
                    return e.getTotalLength()
                } catch {
                    return 0
                }
            })))
        }

        function zr(t, e) {
            if (Ii(e) || ct(e, "canvas")) {
                e.hidden = !0;
                const s = e.nextElementSibling;
                return pn(t, s) ? s : Ve(e, t)
            }
            const i = e.lastElementChild;
            return pn(t, i) ? i : L(e, t)
        }

        function pn(t, e) {
            return ct(t, "svg") && ct(e, "svg") && t.innerHTML === e.innerHTML
        }
        var Fr = '<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"/><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"/></svg>'
            , Hr = '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.4" x1="1" y1="1" x2="19" y2="19"/><line fill="none" stroke="#000" stroke-width="1.4" x1="19" y1="1" x2="1" y2="19"/></svg>'
            , Lr = '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><rect x="9" y="4" width="1" height="11"/><rect x="4" y="9" width="11" height="1"/></svg>'
            , Wr = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><polyline fill="none" stroke="#000" stroke-width="1.1" points="1 3.5 6 8.5 11 3.5"/></svg>'
            , Rr = '<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.1" points="1 4 7 10 13 4"/></svg>'
            , jr = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><polyline fill="none" stroke="#000" stroke-width="1.1" points="1 3.5 6 8.5 11 3.5"/></svg>'
            , qr = '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><style>.uk-navbar-toggle-animate svg>[class*=line-]{transition:.2s ease-in-out;transition-property:transform,opacity,;transform-origin:center;opacity:1}.uk-navbar-toggle svg>.line-3{opacity:0}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-3{opacity:1}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-2{transform:rotate(45deg)}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-3{transform:rotate(-45deg)}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-1,.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-4{opacity:0}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-1{transform:translateY(6px) scaleX(0)}.uk-navbar-toggle-animate[aria-expanded=true] svg>.line-4{transform:translateY(-6px) scaleX(0)}</style><rect class="line-1" y="3" width="20" height="2"/><rect class="line-2" y="9" width="20" height="2"/><rect class="line-3" y="9" width="20" height="2"/><rect class="line-4" y="15" width="20" height="2"/></svg>'
            , Vr = '<svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><rect x="19" y="0" width="1" height="40"/><rect x="0" y="19" width="40" height="1"/></svg>'
            , Yr = '<svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"/></svg>'
            , Xr = '<svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.2" points="6 1 1 6 6 11"/></svg>'
            , Gr = '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"/><path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z"/></svg>'
            , Jr = '<svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><circle fill="none" stroke="#000" stroke-width="1.8" cx="17.5" cy="17.5" r="16.5"/><line fill="none" stroke="#000" stroke-width="1.8" x1="38" y1="39" x2="29" y2="30"/></svg>'
            , Kr = '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle fill="none" stroke="#000" stroke-width="1.1" cx="10.5" cy="10.5" r="9.5"/><line fill="none" stroke="#000" stroke-width="1.1" x1="23" y1="23" x2="17" y2="17"/></svg>'
            , Zr = '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "/></svg>'
            , Qr = '<svg width="25" height="40" viewBox="0 0 25 40" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="2" points="4.002,38.547 22.527,20.024 4,1.5 "/></svg>'
            , Ur = '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "/></svg>'
            , ta = '<svg width="25" height="40" viewBox="0 0 25 40" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="2" points="20.527,1.5 2,20.024 20.525,38.547 "/></svg>'
            , ea = '<svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><circle fill="none" stroke="#000" cx="15" cy="15" r="14"/></svg>'
            , ia = '<svg width="18" height="10" viewBox="0 0 18 10" xmlns="http://www.w3.org/2000/svg"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 9 9 1 17 9 "/></svg>';
        const ri = {
                spinner: ea
                , totop: ia
                , marker: Lr
                , "close-icon": Fr
                , "close-large": Hr
                , "nav-parent-icon": Wr
                , "nav-parent-icon-large": Rr
                , "navbar-parent-icon": jr
                , "navbar-toggle-icon": qr
                , "overlay-icon": Vr
                , "pagination-next": Yr
                , "pagination-previous": Xr
                , "search-icon": Gr
                , "search-large": Jr
                , "search-navbar": Kr
                , "slidenav-next": Zr
                , "slidenav-next-large": Qr
                , "slidenav-previous": Ur
                , "slidenav-previous-large": ta
            }
            , Ui = {
                install: aa
                , extends: cn
                , args: "icon"
                , props: ["icon"]
                , data: {
                    include: []
                }
                , isIcon: !0
                , beforeConnect() {
                    x(this.$el, "uk-icon")
                }
                , methods: {
                    async getSvg() {
                        const t = la(this.icon);
                        if (!t)
                            throw "Icon not found.";
                        return t
                    }
                }
            }
            , dt = {
                args: !1
                , extends: Ui
                , data: t => ({
                    icon: Xt(t.constructor.options.name)
                })
                , beforeConnect() {
                    x(this.$el, this.$options.id)
                }
            }
            , sa = {
                extends: dt
                , beforeConnect() {
                    const t = this.$props.icon;
                    this.icon = et(this.$el, ".uk-nav-primary") ? t + "-large" : t
                }
            }
            , gn = {
                extends: dt
                , beforeConnect() {
                    x(this.$el, "uk-slidenav");
                    const t = this.$props.icon;
                    this.icon = _(this.$el, "uk-slidenav-large") ? t + "-large" : t
                }
            }
            , na = {
                extends: dt
                , beforeConnect() {
                    this.icon = _(this.$el, "uk-search-icon") && te(this.$el, ".uk-search-large").length ? "search-large" : te(this.$el, ".uk-search-navbar").length ? "search-navbar" : this.$props.icon
                }
            }
            , oa = {
                extends: dt
                , beforeConnect() {
                    this.icon = "close-" + (_(this.$el, "uk-close-large") ? "large" : "icon")
                }
            }
            , ra = {
                extends: dt
                , methods: {
                    async getSvg() {
                        const t = await Ui.methods.getSvg.call(this);
                        return this.ratio !== 1 && c(b("circle", t), "strokeWidth", 1 / this.ratio)
                            , t
                    }
                }
            }
            , ai = {};

        function aa(t) {
            t.icon.add = (e, i) => {
                const s = D(e) ? {
                    [e]: i
                } : e;
                $t(s, (n, o) => {
                        ri[o] = n
                            , delete ai[o]
                    })
                    , t._initialized && vt(document.body, n => $t(t.getComponents(n), o => {
                        o.$options.isIcon && o.icon in s && o.$reset()
                    }))
            }
        }

        function la(t) {
            return ri[t] ? (ai[t] || (ai[t] = b((ri[ha(t)] || ri[t]).trim()))
                , ai[t].cloneNode(!0)) : null
        }

        function ha(t) {
            return X ? Si(Si(t, "left", "right"), "previous", "next") : t
        }
        const ca = Wt && "loading" in HTMLImageElement.prototype;
        var ua = {
            args: "dataSrc"
            , props: {
                dataSrc: String
                , sources: String
                , offsetTop: String
                , offsetLeft: String
                , target: String
                , loading: String
            }
            , data: {
                dataSrc: ""
                , sources: !1
                , offsetTop: "50vh"
                , offsetLeft: "50vw"
                , target: !1
                , loading: "lazy"
            }
            , connected() {
                if (this.loading !== "lazy") {
                    this.load();
                    return
                }
                const t = [this.$el, ...we(this.$props.target, this.$el)];
                ca && li(this.$el) && (this.$el.loading = "lazy"
                    , ts(this.$el)
                    , t.length === 1) || (ma(this.$el)
                    , this.registerObserver(re(t, (e, i) => {
                            this.load()
                                , i.disconnect()
                        }
                        , {
                            rootMargin: K(this.offsetTop, "height") + "px " + K(this.offsetLeft, "width") + "px"
                        })))
            }
            , disconnected() {
                this._data.image && (this._data.image.onload = "")
            }
            , methods: {
                load() {
                    if (this._data.image)
                        return this._data.image;
                    const t = li(this.$el) ? this.$el : fa(this.$el, this.dataSrc, this.sources);
                    return me(t, "loading")
                        , ts(this.$el, t.currentSrc)
                        , this._data.image = t
                }
            }
        };

        function ts(t, e) {
            if (li(t)) {
                const i = E(t);
                (va(i) ? O(i) : [t]).forEach(n => mn(n, n))
            } else
                e && !p(t.style.backgroundImage, e) && (c(t, "backgroundImage", "url(" + Ei(e) + ")")
                    , g(t, zt("load", !1)))
        }
        const da = ["data-src", "data-srcset", "sizes"];

        function mn(t, e) {
            da.forEach(i => {
                const s = ot(t, i);
                s && w(e, i.replace(/^(data-)+/, ""), s)
            })
        }

        function fa(t, e, i) {
            const s = new Image;
            return pa(s, i)
                , mn(t, s)
                , s.onload = () => {
                    ts(t, s.currentSrc)
                }
                , w(s, "src", e)
                , s
        }

        function pa(t, e) {
            if (e = ga(e)
                , e.length) {
                const i = Lt("<picture>");
                for (const s of e) {
                    const n = Lt("<source>");
                    w(n, s)
                        , L(i, n)
                }
                L(i, t)
            }
        }

        function ga(t) {
            if (!t)
                return [];
            if (lt(t, "["))
                try {
                    t = JSON.parse(t)
                } catch {
                    t = []
                }
            else
                t = Se(t);
            return Q(t) || (t = [t])
                , t.filter(e => !pe(e))
        }

        function ma(t) {
            li(t) && !It(t, "src") && w(t, "src", 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg"></svg>')
        }

        function va(t) {
            return ct(t, "picture")
        }

        function li(t) {
            return ct(t, "img")
        }
        var hi = {
            props: {
                media: Boolean
            }
            , data: {
                media: !1
            }
            , connected() {
                const t = wa(this.media, this.$el);
                if (this.matchMedia = !0
                    , t) {
                    this.mediaObj = window.matchMedia(t);
                    const e = () => {
                        this.matchMedia = this.mediaObj.matches
                            , g(this.$el, zt("mediachange", !1, !0, [this.mediaObj]))
                    };
                    this.offMediaObj = k(this.mediaObj, "change", () => {
                            e()
                                , this.$emit("resize")
                        })
                        , e()
                }
            }
            , disconnected() {
                var t;
                (t = this.offMediaObj) == null || t.call(this)
            }
        };

        function wa(t, e) {
            if (D(t)) {
                if (lt(t, "@"))
                    t = v(c(e, "--uk-breakpoint-" + t.substr(1)));
                else if (isNaN(t))
                    return t
            }
            return t && Dt(t) ? "(min-width: " + t + "px)" : ""
        }
        var ba = {
                mixins: [st, hi, wt]
                , props: {
                    fill: String
                }
                , data: {
                    fill: ""
                    , clsWrapper: "uk-leader-fill"
                    , clsHide: "uk-leader-hide"
                    , attrFill: "data-fill"
                }
                , computed: {
                    fill(t) {
                        let {
                            fill: e
                        } = t;
                        return e || c(this.$el, "--uk-leader-fill-content")
                    }
                }
                , connected() {
                    [this.wrapper] = Fi(this.$el, '<span class="' + this.clsWrapper + '">')
                }
                , disconnected() {
                    $e(this.wrapper.childNodes)
                }
                , update: {
                    read() {
                        return {
                            width: Math.trunc(this.$el.offsetWidth / 2)
                            , fill: this.fill
                            , hide: !this.matchMedia
                        }
                    }
                    , write(t) {
                        let {
                            width: e
                            , fill: i
                            , hide: s
                        } = t;
                        H(this.wrapper, this.clsHide, s)
                            , w(this.wrapper, this.attrFill, new Array(e).join(i))
                    }
                    , events: ["resize"]
                }
            }
            , xa = {
                install: ya
                , mixins: [Ji]
                , data: {
                    clsPage: "uk-modal-page"
                    , selPanel: ".uk-modal-dialog"
                    , selClose: ".uk-modal-close, .uk-modal-close-default, .uk-modal-close-outside, .uk-modal-close-full"
                }
                , events: [{
                    name: "show"
                    , self: !0
                    , handler() {
                        _(this.panel, "uk-margin-auto-vertical") ? x(this.$el, "uk-flex") : c(this.$el, "display", "block")
                            , J(this.$el)
                    }
                }, {
                    name: "hidden"
                    , self: !0
                    , handler() {
                        c(this.$el, "display", "")
                            , B(this.$el, "uk-flex")
                    }
                }]
            };

        function ya(t) {
            let {
                modal: e
            } = t;
            e.dialog = function(s, n) {
                    const o = e('<div class="uk-modal"> <div class="uk-modal-dialog">' + s + "</div> </div>", n);
                    return o.show()
                        , k(o.$el, "hidden", async () => {
                                await Promise.resolve()
                                    , o.$destroy(!0)
                            }
                            , {
                                self: !0
                            })
                        , o
                }
                , e.alert = function(s, n) {
                    return i(o => {
                            let {
                                labels: r
                            } = o;
                            return '<div class="uk-modal-body">' + (D(s) ? s : Pt(s)) + '</div> <div class="uk-modal-footer uk-text-right"> <button class="uk-button uk-button-primary uk-modal-close" autofocus>' + r.ok + "</button> </div>"
                        }
                        , n, o => o.resolve())
                }
                , e.confirm = function(s, n) {
                    return i(o => {
                            let {
                                labels: r
                            } = o;
                            return '<form> <div class="uk-modal-body">' + (D(s) ? s : Pt(s)) + '</div> <div class="uk-modal-footer uk-text-right"> <button class="uk-button uk-button-default uk-modal-close" type="button">' + r.cancel + '</button> <button class="uk-button uk-button-primary" autofocus>' + r.ok + "</button> </div> </form>"
                        }
                        , n, o => o.reject())
                }
                , e.prompt = function(s, n, o) {
                    return i(r => {
                            let {
                                labels: a
                            } = r;
                            return '<form class="uk-form-stacked"> <div class="uk-modal-body"> <label>' + (D(s) ? s : Pt(s)) + '</label> <input class="uk-input" value="' + (n || "") + '" autofocus> </div> <div class="uk-modal-footer uk-text-right"> <button class="uk-button uk-button-default uk-modal-close" type="button">' + a.cancel + '</button> <button class="uk-button uk-button-primary">' + a.ok + "</button> </div> </form>"
                        }
                        , o, r => r.resolve(null), r => b("input", r.$el).value)
                }
                , e.labels = {
                    ok: "Ok"
                    , cancel: "Cancel"
                };

            function i(s, n, o, r) {
                n = {
                    bgClose: !1
                    , escClose: !0
                    , labels: e.labels
                    , ...n
                };
                const a = e.dialog(s(n), n)
                    , l = new He;
                let h = !1;
                return k(a.$el, "submit", "form", u => {
                        u.preventDefault()
                            , l.resolve(r == null ? void 0 : r(a))
                            , h = !0
                            , a.hide()
                    })
                    , k(a.$el, "hide", () => !h && o(l))
                    , l.promise.dialog = a
                    , l.promise
            }
        }
        var $a = {
                extends: Ks
                , data: {
                    targets: "> .uk-parent"
                    , toggle: "> a"
                    , content: "> ul"
                }
            }
            , ka = {
                mixins: [st, le]
                , props: {
                    dropdown: String
                    , align: String
                    , clsDrop: String
                    , boundary: Boolean
                    , dropbar: Boolean
                    , dropbarAnchor: Boolean
                    , duration: Number
                    , mode: Boolean
                    , offset: Boolean
                    , stretch: Boolean
                    , delayShow: Boolean
                    , delayHide: Boolean
                    , target: Boolean
                    , targetX: Boolean
                    , targetY: Boolean
                    , animation: Boolean
                    , animateOut: Boolean
                }
                , data: {
                    dropdown: ".uk-navbar-nav > li > a, .uk-navbar-item, .uk-navbar-toggle"
                    , align: X ? "right" : "left"
                    , clsDrop: "uk-navbar-dropdown"
                    , boundary: !0
                    , dropbar: !1
                    , dropbarAnchor: !1
                    , duration: 200
                    , container: !1
                }
                , computed: {
                    dropbarAnchor(t, e) {
                        let {
                            dropbarAnchor: i
                        } = t;
                        return ht(i, e) || e
                    }
                    , dropbar: {
                        get(t) {
                            let {
                                dropbar: e
                            } = t;
                            return e ? (e = this._dropbar || ht(e, this.$el) || b("+ .uk-navbar-dropbar", this.$el)
                                , e || (this._dropbar = b("<div></div>"))) : null
                        }
                        , watch(t) {
                            x(t, "uk-dropbar", "uk-dropbar-top", "uk-navbar-dropbar")
                        }
                        , immediate: !0
                    }
                    , dropContainer(t, e) {
                        return this.container || e
                    }
                    , dropdowns: {
                        get(t, e) {
                            let {
                                clsDrop: i
                            } = t;
                            const s = M("." + i, e);
                            if (this.dropContainer !== e)
                                for (const o of M("." + i, this.dropContainer)) {
                                    var n;
                                    const r = (n = this.getDropdown(o)) == null ? void 0 : n.targetEl;
                                    !p(s, o) && r && P(r, this.$el) && s.push(o)
                                }
                            return s
                        }
                        , watch(t) {
                            this.$create("drop", t.filter(e => !this.getDropdown(e)), {
                                ...this.$props
                                , flip: !1
                                , shift: !0
                                , pos: "bottom-" + this.align
                                , boundary: this.boundary === !0 ? this.$el : this.boundary
                            })
                        }
                        , immediate: !0
                    }
                    , toggles: {
                        get(t, e) {
                            let {
                                dropdown: i
                            } = t;
                            return M(i, e)
                        }
                        , watch() {
                            const t = _(this.$el, "uk-navbar-justify");
                            for (const e of M(".uk-navbar-nav, .uk-navbar-left, .uk-navbar-right", this.$el))
                                c(e, "flexGrow", t ? M(this.dropdown, e).length : "")
                        }
                        , immediate: !0
                    }
                }
                , disconnected() {
                    this.dropbar && ut(this.dropbar)
                        , delete this._dropbar
                }
                , events: [{
                    name: "mouseover focusin"
                    , delegate() {
                        return this.dropdown
                    }
                    , handler(t) {
                        let {
                            current: e
                        } = t;
                        const i = this.getActive();
                        i && p(i.mode, "hover") && i.targetEl && !P(i.targetEl, e) && !i.isDelaying && i.hide(!1)
                    }
                }, {
                    name: "keydown"
                    , delegate() {
                        return this.dropdown
                    }
                    , handler(t) {
                        const {
                            current: e
                            , keyCode: i
                        } = t
                        , s = this.getActive();
                        i === qt.DOWN && It(e, "aria-expanded") && (t.preventDefault()
                                , !s || s.targetEl !== e ? (e.click()
                                    , N(this.dropContainer, "show", n => {
                                        let {
                                            target: o
                                        } = n;
                                        return wn(o)
                                    })) : wn(s.$el))
                            , vn(t, this.toggles, s)
                    }
                }, {
                    name: "keydown"
                    , el() {
                        return this.dropContainer
                    }
                    , delegate() {
                        return "." + this.clsDrop
                    }
                    , handler(t) {
                        const {
                            current: e
                            , keyCode: i
                        } = t;
                        if (!p(this.dropdowns, e))
                            return;
                        const s = this.getActive()
                            , n = M(Le, e)
                            , o = bt(n, a => F(a, ":focus"));
                        if (i === qt.UP && (t.preventDefault()
                                , o > 0 && n[o - 1].focus())
                            , i === qt.DOWN && (t.preventDefault()
                                , o < n.length - 1 && n[o + 1].focus())
                            , i === qt.ESC) {
                            var r;
                            (r = s.targetEl) == null || r.focus()
                        }
                        vn(t, this.toggles, s)
                    }
                }, {
                    name: "mouseleave"
                    , el() {
                        return this.dropbar
                    }
                    , filter() {
                        return this.dropbar
                    }
                    , handler() {
                        const t = this.getActive();
                        t && p(t.mode, "hover") && !this.dropdowns.some(e => F(e, ":hover")) && t.hide()
                    }
                }, {
                    name: "beforeshow"
                    , el() {
                        return this.dropContainer
                    }
                    , filter() {
                        return this.dropbar
                    }
                    , handler(t) {
                        let {
                            target: e
                        } = t;
                        !this.isDropbarDrop(e) || (this.dropbar.previousElementSibling !== this.dropbarAnchor && Ve(this.dropbarAnchor, this.dropbar)
                            , x(e, this.clsDrop + "-dropbar"))
                    }
                }, {
                    name: "show"
                    , el() {
                        return this.dropContainer
                    }
                    , filter() {
                        return this.dropbar
                    }
                    , handler(t) {
                        let {
                            target: e
                        } = t;
                        if (!this.isDropbarDrop(e))
                            return;
                        const i = this.getDropdown(e);
                        this._observer = Ke([i.$el, ...i.target], () => {
                            const s = te(e, "." + this.clsDrop).concat(e).map(a => C(a))
                                , n = Math.min(...s.map(a => {
                                    let {
                                        top: l
                                    } = a;
                                    return l
                                }))
                                , o = Math.max(...s.map(a => {
                                    let {
                                        bottom: l
                                    } = a;
                                    return l
                                }))
                                , r = C(this.dropbar);
                            c(this.dropbar, "top", this.dropbar.offsetTop - (r.top - n))
                                , this.transitionTo(o - n + v(c(e, "marginBottom")), e)
                        })
                    }
                }, {
                    name: "beforehide"
                    , el() {
                        return this.dropContainer
                    }
                    , filter() {
                        return this.dropbar
                    }
                    , handler(t) {
                        const e = this.getActive();
                        F(this.dropbar, ":hover") && e.$el === t.target && !this.toggles.some(i => e.targetEl !== i && F(i, ":focus")) && t.preventDefault()
                    }
                }, {
                    name: "hide"
                    , el() {
                        return this.dropContainer
                    }
                    , filter() {
                        return this.dropbar
                    }
                    , handler(t) {
                        var e;
                        let {
                            target: i
                        } = t;
                        if (!this.isDropbarDrop(i))
                            return;
                        (e = this._observer) == null || e.disconnect();
                        const s = this.getActive();
                        (!s || s.$el === i) && this.transitionTo(0)
                    }
                }]
                , methods: {
                    getActive() {
                        return p(this.dropdowns, V == null ? void 0 : V.$el) && V
                    }
                    , transitionTo(t, e) {
                        const {
                            dropbar: i
                        } = this
                        , s = J(i);
                        e = s < t && e
                            , c(e, "clipPath", "polygon(0 0,100% 0,100% " + s + "px,0 " + s + "px)")
                            , J(i, s)
                            , S.cancel([e, i])
                            , Promise.all([S.start(i, {
                                height: t
                            }, this.duration), S.start(e, {
                                clipPath: "polygon(0 0,100% 0,100% " + t + "px,0 " + t + "px)"
                            }, this.duration)]).catch(T).then(() => c(e, {
                                clipPath: ""
                            }))
                    }
                    , getDropdown(t) {
                        return this.$getComponent(t, "drop") || this.$getComponent(t, "dropdown")
                    }
                    , isDropbarDrop(t) {
                        return this.getDropdown(t) && _(t, this.clsDrop)
                    }
                }
            };

        function vn(t, e, i) {
            const {
                current: s
                , keyCode: n
            } = t
            , o = i.targetEl || s
                , r = e.indexOf(o);
            n === qt.LEFT && r > 0 && (i.hide == null || i.hide(!1)
                    , e[r - 1].focus())
                , n === qt.RIGHT && r < e.length - 1 && (i.hide == null || i.hide(!1)
                    , e[r + 1].focus())
                , n === qt.TAB && (o.focus()
                    , i.hide == null || i.hide(!1))
        }

        function wn(t) {
            if (!b(":focus", t)) {
                var e;
                (e = b(Le, t)) == null || e.focus()
            }
        }
        const qt = {
            TAB: 9
            , ESC: 27
            , LEFT: 37
            , UP: 38
            , RIGHT: 39
            , DOWN: 40
        };
        var bn = {
            props: {
                swiping: Boolean
            }
            , data: {
                swiping: !0
            }
            , computed: {
                swipeTarget(t, e) {
                    return e
                }
            }
            , connected() {
                !this.swiping || ti(this, {
                    el: this.swipeTarget
                    , name: gt
                    , passive: !0
                    , handler(t) {
                        if (!kt(t))
                            return;
                        const e = ie(t)
                            , i = "tagName" in t.target ? t.target : E(t.target);
                        N(document, At + " " + Je + " scroll", s => {
                            const {
                                x: n
                                , y: o
                            } = ie(s);
                            (s.type !== "scroll" && i && n && Math.abs(e.x - n) > 100 || o && Math.abs(e.y - o) > 100) && setTimeout(() => {
                                g(i, "swipe")
                                    , g(i, "swipe" + Sa(e.x, e.y, n, o))
                            })
                        })
                    }
                })
            }
        };

        function Sa(t, e, i, s) {
            return Math.abs(t - i) >= Math.abs(e - s) ? t - i > 0 ? "Left" : "Right" : e - s > 0 ? "Up" : "Down"
        }
        var Ta = {
            mixins: [Ji, bn]
            , args: "mode"
            , props: {
                mode: String
                , flip: Boolean
                , overlay: Boolean
            }
            , data: {
                mode: "slide"
                , flip: !1
                , overlay: !1
                , clsPage: "uk-offcanvas-page"
                , clsContainer: "uk-offcanvas-container"
                , selPanel: ".uk-offcanvas-bar"
                , clsFlip: "uk-offcanvas-flip"
                , clsContainerAnimation: "uk-offcanvas-container-animation"
                , clsSidebarAnimation: "uk-offcanvas-bar-animation"
                , clsMode: "uk-offcanvas"
                , clsOverlay: "uk-offcanvas-overlay"
                , selClose: ".uk-offcanvas-close"
                , container: !1
            }
            , computed: {
                clsFlip(t) {
                    let {
                        flip: e
                        , clsFlip: i
                    } = t;
                    return e ? i : ""
                }
                , clsOverlay(t) {
                    let {
                        overlay: e
                        , clsOverlay: i
                    } = t;
                    return e ? i : ""
                }
                , clsMode(t) {
                    let {
                        mode: e
                        , clsMode: i
                    } = t;
                    return i + "-" + e
                }
                , clsSidebarAnimation(t) {
                    let {
                        mode: e
                        , clsSidebarAnimation: i
                    } = t;
                    return e === "none" || e === "reveal" ? "" : i
                }
                , clsContainerAnimation(t) {
                    let {
                        mode: e
                        , clsContainerAnimation: i
                    } = t;
                    return e !== "push" && e !== "reveal" ? "" : i
                }
                , transitionElement(t) {
                    let {
                        mode: e
                    } = t;
                    return e === "reveal" ? E(this.panel) : this.panel
                }
            }
            , update: {
                read() {
                    this.isToggled() && !q(this.$el) && this.hide()
                }
                , events: ["resize"]
            }
            , events: [{
                name: "touchmove"
                , self: !0
                , passive: !1
                , filter() {
                    return this.overlay
                }
                , handler(t) {
                    t.cancelable && t.preventDefault()
                }
            }, {
                name: "show"
                , self: !0
                , handler() {
                    this.mode === "reveal" && !_(E(this.panel), this.clsMode) && (Xe(this.panel, "<div>")
                        , x(E(this.panel), this.clsMode));
                    const {
                        body: t
                        , scrollingElement: e
                    } = document;
                    x(t, this.clsContainer, this.clsFlip)
                        , c(t, "touch-action", "pan-y pinch-zoom")
                        , c(this.$el, "display", "block")
                        , c(this.panel, "maxWidth", e.clientWidth)
                        , x(this.$el, this.clsOverlay)
                        , x(this.panel, this.clsSidebarAnimation, this.mode === "reveal" ? "" : this.clsMode)
                        , J(t)
                        , x(t, this.clsContainerAnimation)
                        , this.clsContainerAnimation && Ca()
                }
            }, {
                name: "hide"
                , self: !0
                , handler() {
                    B(document.body, this.clsContainerAnimation)
                        , c(document.body, "touch-action", "")
                }
            }, {
                name: "hidden"
                , self: !0
                , handler() {
                    this.clsContainerAnimation && Ia()
                        , this.mode === "reveal" && $e(this.panel)
                        , B(this.panel, this.clsSidebarAnimation, this.clsMode)
                        , B(this.$el, this.clsOverlay)
                        , c(this.$el, "display", "")
                        , c(this.panel, "maxWidth", "")
                        , B(document.body, this.clsContainer, this.clsFlip)
                }
            }, {
                name: "swipeLeft swipeRight"
                , handler(t) {
                    this.isToggled() && Gt(t.type, "Left") ^ this.flip && this.hide()
                }
            }]
        };

        function Ca() {
            xn().content += ",user-scalable=0"
        }

        function Ia() {
            const t = xn();
            t.content = t.content.replace(/,user-scalable=0$/, "")
        }

        function xn() {
            return b('meta[name="viewport"]', document.head) || L(document.head, '<meta name="viewport">')
        }
        var Pa = {
                mixins: [st, wt]
                , props: {
                    selContainer: String
                    , selContent: String
                    , minHeight: Number
                }
                , data: {
                    selContainer: ".uk-modal"
                    , selContent: ".uk-modal-dialog"
                    , minHeight: 150
                }
                , computed: {
                    container(t, e) {
                        let {
                            selContainer: i
                        } = t;
                        return et(e, i)
                    }
                    , content(t, e) {
                        let {
                            selContent: i
                        } = t;
                        return et(e, i)
                    }
                }
                , resizeTargets() {
                    return [this.container, this.content]
                }
                , update: {
                    read() {
                        return !this.content || !this.container || !q(this.$el) ? !1 : {
                            max: Math.max(this.minHeight, J(this.container) - ($(this.content).height - J(this.$el)))
                        }
                    }
                    , write(t) {
                        let {
                            max: e
                        } = t;
                        c(this.$el, {
                            minHeight: this.minHeight
                            , maxHeight: e
                        })
                    }
                    , events: ["resize"]
                }
            }
            , Aa = {
                mixins: [wt]
                , props: ["width", "height"]
                , resizeTargets() {
                    return [this.$el, E(this.$el)]
                }
                , connected() {
                    x(this.$el, "uk-responsive-width")
                }
                , update: {
                    read() {
                        return q(this.$el) && this.width && this.height ? {
                            width: ye(E(this.$el))
                            , height: this.height
                        } : !1
                    }
                    , write(t) {
                        J(this.$el, Fe.contain({
                            height: this.height
                            , width: this.width
                        }, t).height)
                    }
                    , events: ["resize"]
                }
            }
            , Ea = {
                props: {
                    offset: Number
                }
                , data: {
                    offset: 0
                }
                , connected() {
                    _a(this)
                }
                , disconnected() {
                    Oa(this)
                }
                , methods: {
                    async scrollTo(t) {
                        t = t && b(t) || document.body
                            , g(this.$el, "beforescroll", [this, t]) && (await Fs(t, {
                                    offset: this.offset
                                })
                                , g(this.$el, "scrolled", [this, t]))
                    }
                }
            };
        const Ie = new Set;

        function _a(t) {
            Ie.size || k(document, "click", yn)
                , Ie.add(t)
        }

        function Oa(t) {
            Ie.delete(t)
                , Ie.size || Nt(document, "click", yn)
        }

        function yn(t) {
            if (!t.defaultPrevented)
                for (const e of Ie)
                    P(t.target, e.$el) && (t.preventDefault()
                        , e.scrollTo($n(e.$el)))
        }

        function $n(t) {
            return document.getElementById(decodeURIComponent(t.hash).substring(1))
        }
        var Ba = {
                mixins: [si]
                , args: "cls"
                , props: {
                    cls: String
                    , target: String
                    , hidden: Boolean
                    , offsetTop: Number
                    , offsetLeft: Number
                    , repeat: Boolean
                    , delay: Number
                }
                , data: () => ({
                    cls: ""
                    , target: !1
                    , hidden: !0
                    , offsetTop: 0
                    , offsetLeft: 0
                    , repeat: !1
                    , delay: 0
                    , inViewClass: "uk-scrollspy-inview"
                })
                , computed: {
                    elements: {
                        get(t, e) {
                            let {
                                target: i
                            } = t;
                            return i ? M(i, e) : [e]
                        }
                        , watch(t, e) {
                            this.hidden && c(Re(t, ":not(." + this.inViewClass + ")"), "opacity", 0)
                                , ge(t, e) || this.$reset()
                        }
                        , immediate: !0
                    }
                }
                , connected() {
                    this._data.elements = new Map
                        , this.registerObserver(re(this.elements, t => {
                                const e = this._data.elements;
                                for (const {
                                        target: i
                                        , isIntersecting: s
                                    } of t) {
                                    e.has(i) || e.set(i, {
                                        cls: ot(i, "uk-scrollspy-class") || this.cls
                                    });
                                    const n = e.get(i);
                                    !this.repeat && n.show || (n.show = s)
                                }
                                this.$emit()
                            }
                            , {
                                rootMargin: K(this.offsetTop, "height") - 1 + "px " + (K(this.offsetLeft, "width") - 1) + "px"
                            }, !1))
                }
                , disconnected() {
                    for (const [t, e] of this._data.elements.entries())
                        B(t, this.inViewClass, (e == null ? void 0 : e.cls) || "")
                }
                , update: [{
                    write(t) {
                        for (const [e, i] of t.elements.entries())
                            i.show && !i.inview && !i.queued ? (i.queued = !0
                                , t.promise = (t.promise || Promise.resolve()).then(() => new Promise(s => setTimeout(s, this.delay))).then(() => {
                                    this.toggle(e, !0)
                                        , setTimeout(() => {
                                                i.queued = !1
                                                    , this.$emit()
                                            }
                                            , 300)
                                })) : !i.show && i.inview && !i.queued && this.repeat && this.toggle(e, !1)
                    }
                }]
                , methods: {
                    toggle(t, e) {
                        const i = this._data.elements.get(t);
                        if (!!i) {
                            if (i.off == null || i.off()
                                , c(t, "opacity", !e && this.hidden ? 0 : "")
                                , H(t, this.inViewClass, e)
                                , H(t, i.cls)
                                , /\buk-animation-/.test(i.cls)) {
                                const s = () => Di(t, "uk-animation-[\\w-]+");
                                e ? i.off = N(t, "animationcancel animationend", s) : s()
                            }
                            g(t, e ? "inview" : "outview")
                                , i.inview = e
                                , this.$update(t)
                        }
                    }
                }
            }
            , Da = {
                mixins: [si]
                , props: {
                    cls: String
                    , closest: String
                    , scroll: Boolean
                    , overflow: Boolean
                    , offset: Number
                }
                , data: {
                    cls: "uk-active"
                    , closest: !1
                    , scroll: !1
                    , overflow: !0
                    , offset: 0
                }
                , computed: {
                    links: {
                        get(t, e) {
                            return M('a[href*="#"]', e).filter(i => i.hash && Zi(i))
                        }
                        , watch(t) {
                            this.scroll && this.$create("scroll", t, {
                                offset: this.offset || 0
                            })
                        }
                        , immediate: !0
                    }
                    , elements(t) {
                        let {
                            closest: e
                        } = t;
                        return et(this.links, e || "*")
                    }
                }
                , update: [{
                    read() {
                        const t = this.links.map($n).filter(Boolean)
                            , {
                                length: e
                            } = t;
                        if (!e || !q(this.$el))
                            return !1;
                        const [i] = tt(t, /auto|scroll/, !0)
                            , {
                                scrollTop: s
                                , scrollHeight: n
                            } = i
                            , o = rt(i)
                            , r = n - o.height;
                        let a = !1;
                        if (s === r)
                            a = e - 1;
                        else {
                            for (let l = 0; l < t.length && !(C(t[l]).top - o.top - this.offset > 0); l++)
                                a = +l;
                            a === !1 && this.overflow && (a = 0)
                        }
                        return {
                            active: a
                        }
                    }
                    , write(t) {
                        let {
                            active: e
                        } = t;
                        const i = e !== !1 && !_(this.elements[e], this.cls);
                        this.links.forEach(s => s.blur());
                        for (let s = 0; s < this.elements.length; s++)
                            H(this.elements[s], this.cls, +s === e);
                        i && g(this.$el, "active", [e, this.elements[e]])
                    }
                    , events: ["scroll", "resize"]
                }]
            }
            , Ma = {
                mixins: [st, hi, wt, si]
                , props: {
                    position: String
                    , top: null
                    , bottom: null
                    , start: null
                    , end: null
                    , offset: String
                    , overflowFlip: Boolean
                    , animation: String
                    , clsActive: String
                    , clsInactive: String
                    , clsFixed: String
                    , clsBelow: String
                    , selTarget: String
                    , showOnUp: Boolean
                    , targetOffset: Number
                }
                , data: {
                    position: "top"
                    , top: !1
                    , bottom: !1
                    , start: !1
                    , end: !1
                    , offset: 0
                    , overflowFlip: !1
                    , animation: ""
                    , clsActive: "uk-active"
                    , clsInactive: ""
                    , clsFixed: "uk-sticky-fixed"
                    , clsBelow: "uk-sticky-below"
                    , selTarget: ""
                    , showOnUp: !1
                    , targetOffset: !1
                }
                , computed: {
                    selTarget(t, e) {
                        let {
                            selTarget: i
                        } = t;
                        return i && b(i, e) || e
                    }
                }
                , resizeTargets() {
                    return document.documentElement
                }
                , connected() {
                    this.start = Sn(this.start || this.top)
                        , this.end = Sn(this.end || this.bottom)
                        , this.placeholder = b("+ .uk-sticky-placeholder", this.$el) || b('<div class="uk-sticky-placeholder"></div>')
                        , this.isFixed = !1
                        , this.setActive(!1)
                }
                , disconnected() {
                    this.isFixed && (this.hide()
                            , B(this.selTarget, this.clsInactive))
                        , ut(this.placeholder)
                        , this.placeholder = null
                }
                , events: [{
                    name: "resize"
                    , el() {
                        return window
                    }
                    , handler() {
                        this.$emit("resize")
                    }
                }, {
                    name: "load hashchange popstate"
                    , el() {
                        return window
                    }
                    , filter() {
                        return this.targetOffset !== !1
                    }
                    , handler() {
                        const {
                            scrollingElement: t
                        } = document;
                        !location.hash || t.scrollTop === 0 || setTimeout(() => {
                            const e = C(b(location.hash))
                                , i = C(this.$el);
                            this.isFixed && Ti(e, i) && (t.scrollTop = e.top - i.height - K(this.targetOffset, "height", this.placeholder) - K(this.offset, "height", this.placeholder))
                        })
                    }
                }]
                , update: [{
                    read(t, e) {
                        let {
                            height: i
                            , width: s
                            , margin: n
                        } = t;
                        if (this.inactive = !this.matchMedia || !q(this.$el)
                            , this.inactive)
                            return !1;
                        const o = this.isFixed && e.has("resize");
                        o && (c(this.selTarget, "transition", "0s")
                                , this.hide())
                            , this.active || ({
                                    height: i
                                    , width: s
                                } = C(this.$el)
                                , n = c(this.$el, "margin"))
                            , o && (this.show()
                                , requestAnimationFrame(() => c(this.selTarget, "transition", "")));
                        const r = J(window);
                        let a = this.position;
                        this.overflowFlip && i > r && (a = a === "top" ? "bottom" : "top");
                        const l = this.isFixed ? this.placeholder : this.$el;
                        let h = K(this.offset, "height", l);
                        a === "bottom" && (i < r || this.overflowFlip) && (h += r - i);
                        const u = this.overflowFlip ? 0 : Math.max(0, i + h - r)
                            , d = C(l).top
                            , f = (this.start === !1 ? d : kn(this.start, this.$el, d)) - h
                            , m = this.end === !1 ? document.scrollingElement.scrollHeight - r : kn(this.end, this.$el, d + i, !0) - C(this.$el).height + u - h;
                        return {
                            start: f
                            , end: m
                            , offset: h
                            , overflow: u
                            , topOffset: d
                            , height: i
                            , width: s
                            , margin: n
                            , top: Ht(l)[0]
                        }
                    }
                    , write(t) {
                        let {
                            height: e
                            , width: i
                            , margin: s
                        } = t;
                        const {
                            placeholder: n
                        } = this;
                        c(n, {
                                height: e
                                , width: i
                                , margin: s
                            })
                            , P(n, document) || (Ve(this.$el, n)
                                , n.hidden = !0)
                    }
                    , events: ["resize"]
                }, {
                    read(t) {
                        let {
                            scroll: e = 0
                            , dir: i = "down"
                            , overflow: s
                            , overflowScroll: n = 0
                            , start: o
                            , end: r
                        } = t;
                        const a = document.scrollingElement.scrollTop;
                        return {
                            dir: e <= a ? "down" : "up"
                            , prevDir: i
                            , scroll: a
                            , prevScroll: e
                            , offsetParentTop: C((this.isFixed ? this.placeholder : this.$el).offsetParent).top
                            , overflowScroll: U(n + U(a, o, r) - U(e, o, r), 0, s)
                        }
                    }
                    , write(t, e) {
                        const i = e.has("scroll")
                            , {
                                initTimestamp: s = 0
                                , dir: n
                                , prevDir: o
                                , scroll: r
                                , prevScroll: a = 0
                                , top: l
                                , start: h
                                , topOffset: u
                                , height: d
                            } = t;
                        if (r < 0 || r === a && i || this.showOnUp && !i && !this.isFixed)
                            return;
                        const f = Date.now();
                        if ((f - s > 300 || n !== o) && (t.initScroll = r
                                , t.initTimestamp = f)
                            , !(this.showOnUp && !this.isFixed && Math.abs(t.initScroll - r) <= 30 && Math.abs(a - r) <= 10))
                            if (this.inactive || r < h || this.showOnUp && (r <= h || n === "down" && i || n === "up" && !this.isFixed && r <= u + d)) {
                                if (!this.isFixed) {
                                    pt.inProgress(this.$el) && l > r && (pt.cancel(this.$el)
                                        , this.hide());
                                    return
                                }
                                this.animation && r > u ? (pt.cancel(this.$el)
                                    , pt.out(this.$el, this.animation).then(() => this.hide(), T)) : this.hide()
                            } else
                                this.isFixed ? this.update() : this.animation && r > u ? (pt.cancel(this.$el)
                                    , this.show()
                                    , pt.in(this.$el, this.animation).catch(T)) : this.show()
                    }
                    , events: ["resize", "scroll"]
                }]
                , methods: {
                    show() {
                        this.isFixed = !0
                            , this.update()
                            , this.placeholder.hidden = !1
                    }
                    , hide() {
                        this.setActive(!1)
                            , B(this.$el, this.clsFixed, this.clsBelow)
                            , c(this.$el, {
                                position: ""
                                , top: ""
                                , width: ""
                            })
                            , this.placeholder.hidden = !0
                            , this.isFixed = !1
                    }
                    , update() {
                        let {
                            width: t
                            , scroll: e = 0
                            , overflow: i
                            , overflowScroll: s = 0
                            , start: n
                            , end: o
                            , offset: r
                            , topOffset: a
                            , height: l
                            , offsetParentTop: h
                        } = this._data;
                        const u = n !== 0 || e > n;
                        let d = "fixed";
                        e > o && (r += o - h
                                , d = "absolute")
                            , i && (r -= s)
                            , c(this.$el, {
                                position: d
                                , top: r + "px"
                                , width: t
                            })
                            , this.setActive(u)
                            , H(this.$el, this.clsBelow, e > a + l)
                            , x(this.$el, this.clsFixed)
                    }
                    , setActive(t) {
                        const e = this.active;
                        this.active = t
                            , t ? (Mi(this.selTarget, this.clsInactive, this.clsActive)
                                , e !== t && g(this.$el, "active")) : (Mi(this.selTarget, this.clsActive, this.clsInactive)
                                , e !== t && g(this.$el, "inactive"))
                    }
                }
            };

        function kn(t, e, i, s) {
            if (!t)
                return 0;
            if (Dt(t) || D(t) && t.match(/^-?\d/))
                return i + K(t, "height", e, !0); {
                const n = t === !0 ? E(e) : ht(t, e);
                return C(n).bottom - (s && n && P(e, n) ? v(c(n, "paddingBottom")) : 0)
            }
        }

        function Sn(t) {
            return t === "true" ? !0 : t === "false" ? !1 : t
        }
        var Tn = {
                mixins: [Te, bn, _t]
                , args: "connect"
                , props: {
                    connect: String
                    , toggle: String
                    , itemNav: String
                    , active: Number
                }
                , data: {
                    connect: "~.uk-switcher"
                    , toggle: "> * > :first-child"
                    , itemNav: !1
                    , active: 0
                    , cls: "uk-active"
                    , attrItem: "uk-switcher-item"
                }
                , computed: {
                    connects: {
                        get(t, e) {
                            let {
                                connect: i
                            } = t;
                            return we(i, e)
                        }
                        , watch(t) {
                            this.swiping && c(t, "touchAction", "pan-y pinch-zoom")
                        }
                        , document: !0
                        , immediate: !0
                    }
                    , connectChildren: {
                        get() {
                            return this.connects.map(t => O(t)).flat()
                        }
                        , watch() {
                            const t = this.index();
                            for (const e of this.connects)
                                O(e).forEach((i, s) => H(i, this.cls, s === t))
                                , this.lazyload(this.$el, O(e))
                        }
                        , immediate: !0
                    }
                    , toggles: {
                        get(t, e) {
                            let {
                                toggle: i
                            } = t;
                            return M(i, e).filter(s => !F(s, ".uk-disabled *, .uk-disabled, [disabled]"))
                        }
                        , watch(t) {
                            const e = this.index();
                            this.show(~e ? e : t[this.active] || t[0])
                        }
                        , immediate: !0
                    }
                    , children() {
                        return O(this.$el).filter(t => this.toggles.some(e => P(e, t)))
                    }
                    , swipeTarget() {
                        return this.connects
                    }
                }
                , events: [{
                    name: "click"
                    , delegate() {
                        return this.toggle
                    }
                    , handler(t) {
                        t.preventDefault()
                            , this.show(t.current)
                    }
                }, {
                    name: "click"
                    , el() {
                        return this.connects.concat(this.itemNav ? we(this.itemNav, this.$el) : [])
                    }
                    , delegate() {
                        return "[" + this.attrItem + "],[data-" + this.attrItem + "]"
                    }
                    , handler(t) {
                        t.preventDefault()
                            , this.show(ot(t.current, this.attrItem))
                    }
                }, {
                    name: "swipeRight swipeLeft"
                    , filter() {
                        return this.swiping
                    }
                    , el() {
                        return this.connects
                    }
                    , handler(t) {
                        let {
                            type: e
                        } = t;
                        this.show(Gt(e, "Left") ? "next" : "previous")
                    }
                }]
                , methods: {
                    index() {
                        return bt(this.children, t => _(t, this.cls))
                    }
                    , show(t) {
                        const e = this.index()
                            , i = Ut(t, this.toggles, e)
                            , s = Ut(this.children[i], O(this.$el));
                        O(this.$el).forEach((o, r) => {
                            H(o, this.cls, s === r)
                                , w(this.toggles[r], "aria-expanded", s === r)
                        });
                        const n = e >= 0 && e !== i;
                        this.connects.forEach(async o => {
                            let {
                                children: r
                            } = o;
                            await this.toggleElement(y(r).filter(a => _(a, this.cls)), !1, n)
                                , await this.toggleElement(r[s], !0, n)
                        })
                    }
                }
            }
            , Na = {
                mixins: [st]
                , extends: Tn
                , props: {
                    media: Boolean
                }
                , data: {
                    media: 960
                    , attrItem: "uk-tab-item"
                }
                , connected() {
                    const t = _(this.$el, "uk-tab-left") ? "uk-tab-left" : _(this.$el, "uk-tab-right") ? "uk-tab-right" : !1;
                    t && this.$create("toggle", this.$el, {
                        cls: t
                        , mode: "media"
                        , media: this.media
                    })
                }
            };
        const za = 32;
        var Fa = {
                mixins: [Te, hi, _t]
                , args: "target"
                , props: {
                    href: String
                    , target: null
                    , mode: "list"
                    , queued: Boolean
                }
                , data: {
                    href: !1
                    , target: !1
                    , mode: "click"
                    , queued: !0
                }
                , computed: {
                    target: {
                        get(t, e) {
                            let {
                                href: i
                                , target: s
                            } = t;
                            return s = we(s || i, e)
                                , s.length && s || [e]
                        }
                        , watch() {
                            this.updateAria()
                                , this.lazyload(this.$el, this.target)
                        }
                        , document: !0
                        , immediate: !0
                    }
                }
                , connected() {
                    !p(this.mode, "media") && !We(this.$el) && w(this.$el, "tabindex", "0")
                }
                , events: [{
                    name: gt
                    , filter() {
                        return p(this.mode, "hover")
                    }
                    , handler(t) {
                        this._preventClick = null
                            , !(!kt(t) || this._showState) && (g(this.$el, "focus")
                                , N(document, gt, () => g(this.$el, "blur"), !0, e => !P(e.target, this.$el))
                                , p(this.mode, "click") && (this._preventClick = !0))
                    }
                }, {
                    name: jt + " " + oe + " focus blur"
                    , filter() {
                        return p(this.mode, "hover")
                    }
                    , handler(t) {
                        if (kt(t))
                            return;
                        const e = p([jt, "focus"], t.type)
                            , i = w(this.$el, "aria-expanded");
                        if (!(!e && (t.type === oe && F(this.$el, ":focus") || t.type === "blur" && F(this.$el, ":hover")))) {
                            if (this._showState && e && i !== this._showState) {
                                e || (this._showState = null);
                                return
                            }
                            this._showState = e ? i : null
                                , this.toggle("toggle" + (e ? "show" : "hide"))
                        }
                    }
                }, {
                    name: "keydown"
                    , filter() {
                        return p(this.mode, "click") && !ct(this.$el, "input")
                    }
                    , handler(t) {
                        t.keyCode === za && (t.preventDefault()
                            , this.$el.click())
                    }
                }, {
                    name: "click"
                    , filter() {
                        return ["click", "hover"].some(t => p(this.mode, t))
                    }
                    , handler(t) {
                        let e;
                        (this._preventClick || et(t.target, 'a[href="#"], a[href=""]') || (e = et(t.target, "a[href]")) && (w(this.$el, "aria-expanded") !== "true" || e.hash && F(this.target, e.hash))) && t.preventDefault()
                            , !this._preventClick && p(this.mode, "click") && this.toggle()
                    }
                }, {
                    name: "hide show"
                    , self: !0
                    , el() {
                        return this.target
                    }
                    , handler(t) {
                        let {
                            target: e
                            , type: i
                        } = t;
                        this.updateAria(e === this.target[0] && i === "show")
                    }
                }, {
                    name: "mediachange"
                    , filter() {
                        return p(this.mode, "media")
                    }
                    , el() {
                        return this.target
                    }
                    , handler(t, e) {
                        e.matches ^ this.isToggled(this.target) && this.toggle()
                    }
                }]
                , methods: {
                    async toggle(t) {
                        if (!g(this.target, t || "toggle", [this]))
                            return;
                        if (!this.queued)
                            return this.toggleElement(this.target);
                        const e = this.target.filter(s => _(s, this.clsLeave));
                        if (e.length) {
                            for (const s of this.target) {
                                const n = p(e, s);
                                this.toggleElement(s, n, n)
                            }
                            return
                        }
                        const i = this.target.filter(this.isToggled);
                        await this.toggleElement(i, !1)
                            , await this.toggleElement(this.target.filter(s => !p(i, s)), !0)
                    }
                    , updateAria(t) {
                        p(this.mode, "media") || w(this.$el, "aria-expanded", Me(t) ? t : this.isToggled(this.target))
                    }
                }
            }
            , Ha = Object.freeze({
                __proto__: null
                , Accordion: Ks
                , Alert: mr
                , Cover: wr
                , Drop: nn
                , Dropdown: nn
                , FormCustom: Sr
                , Grid: Cr
                , HeightMatch: Er
                , HeightViewport: Br
                , Icon: Ui
                , Img: ua
                , Leader: ba
                , Margin: on
                , Modal: xa
                , Nav: $a
                , Navbar: ka
                , Offcanvas: Ta
                , OverflowAuto: Pa
                , Responsive: Aa
                , Scroll: Ea
                , Scrollspy: Ba
                , ScrollspyNav: Da
                , Sticky: Ma
                , Svg: cn
                , Switcher: Tn
                , Tab: Na
                , Toggle: Fa
                , Video: Zs
                , Close: oa
                , Spinner: ra
                , NavParentIcon: sa
                , SlidenavNext: gn
                , SlidenavPrevious: gn
                , SearchIcon: na
                , Marker: dt
                , NavbarParentIcon: dt
                , NavbarToggleIcon: dt
                , OverlayIcon: dt
                , PaginationNext: dt
                , PaginationPrevious: dt
                , Totop: dt
            });
        $t(Ha, (t, e) => it.component(e, t))
            , cr(it);
        const La = ["days", "hours", "minutes", "seconds"];
        var Wa = {
            mixins: [st]
            , props: {
                date: String
                , clsWrapper: String
            }
            , data: {
                date: ""
                , clsWrapper: ".uk-countdown-%unit%"
            }
            , connected() {
                this.date = Date.parse(this.$props.date)
                    , this.start()
            }
            , disconnected() {
                this.stop()
            }
            , events: [{
                name: "visibilitychange"
                , el() {
                    return document
                }
                , handler() {
                    document.hidden ? this.stop() : this.start()
                }
            }]
            , methods: {
                start() {
                    this.stop()
                        , this.update()
                        , this.timer = setInterval(this.update, 1e3)
                }
                , stop() {
                    clearInterval(this.timer)
                }
                , update() {
                    const t = Ra(this.date);
                    (!this.date || t.total <= 0) && (this.stop()
                        , t.days = t.hours = t.minutes = t.seconds = 0);
                    for (const e of La) {
                        const i = b(this.clsWrapper.replace("%unit%", e), this.$el);
                        if (!i)
                            continue;
                        let s = String(Math.trunc(t[e]));
                        s = s.length < 2 ? "0" + s : s
                            , i.textContent !== s && (s = s.split("")
                                , s.length !== i.children.length && Pt(i, s.map(() => "<span></span>").join(""))
                                , s.forEach((n, o) => i.children[o].textContent = n))
                    }
                }
            }
        };

        function Ra(t) {
            const e = t - Date.now();
            return {
                total: e
                , seconds: e / 1e3 % 60
                , minutes: e / 1e3 / 60 % 60
                , hours: e / 1e3 / 60 / 60 % 24
                , days: e / 1e3 / 60 / 60 / 24
            }
        }
        const es = "uk-transition-leave"
            , is = "uk-transition-enter";

        function Cn(t, e, i, s) {
            s === void 0 && (s = 0);
            const n = ci(e, !0)
                , o = {
                    opacity: 1
                }
                , r = {
                    opacity: 0
                }
                , a = u => () => n === ci(e) ? u() : Promise.reject()
                , l = a(async () => {
                    x(e, es)
                        , await Promise.all(Pn(e).map((u, d) => new Promise(f => setTimeout(() => S.start(u, r, i / 2, "ease").then(f), d * s))))
                        , B(e, es)
                })
                , h = a(async () => {
                    const u = J(e);
                    x(e, is)
                        , t()
                        , c(O(e), {
                            opacity: 0
                        })
                        , await ja();
                    const d = O(e)
                        , f = J(e);
                    c(e, "alignContent", "flex-start")
                        , J(e, u);
                    const m = Pn(e);
                    c(d, r);
                    const I = m.map(async (A, W) => {
                        await qa(W * s)
                            , await S.start(A, o, i / 2, "ease")
                    });
                    u !== f && I.push(S.start(e, {
                            height: f
                        }, i / 2 + m.length * s, "ease"))
                        , await Promise.all(I).then(() => {
                            B(e, is)
                                , n === ci(e) && (c(e, {
                                        height: ""
                                        , alignContent: ""
                                    })
                                    , c(d, {
                                        opacity: ""
                                    })
                                    , delete e.dataset.transition)
                        })
                });
            return _(e, es) ? In(e).then(h) : _(e, is) ? In(e).then(l).then(h) : l().then(h)
        }

        function ci(t, e) {
            return e && (t.dataset.transition = 1 + ci(t))
                , Ct(t.dataset.transition) || 0
        }

        function In(t) {
            return Promise.all(O(t).filter(S.inProgress).map(e => new Promise(i => N(e, "transitionend transitioncanceled", i))))
        }

        function Pn(t) {
            return Qi(O(t)).reduce((e, i) => e.concat(Ne(i.filter(s => Vi(s)), "offsetLeft")), [])
        }

        function ja() {
            return new Promise(t => requestAnimationFrame(t))
        }

        function qa(t) {
            return new Promise(e => setTimeout(e, t))
        }
        async function Va(t, e, i) {
            await _n();
            let s = O(e);
            const n = s.map(f => An(f, !0))
                , o = {
                    ...c(e, ["height", "padding"])
                    , display: "block"
                };
            await Promise.all(s.concat(e).map(S.cancel))
                , t()
                , s = s.concat(O(e).filter(f => !p(s, f)))
                , await Promise.resolve()
                , G.flush();
            const r = w(e, "style")
                , a = c(e, ["height", "padding"])
                , [l, h] = Ya(e, s, n)
                , u = s.map(f => ({
                    style: w(f, "style")
                }));
            s.forEach((f, m) => h[m] && c(f, h[m]))
                , c(e, o)
                , await _n();
            const d = s.map((f, m) => E(f) === e && S.start(f, l[m], i, "ease")).concat(S.start(e, a, i, "ease"));
            try {
                await Promise.all(d)
                    , s.forEach((f, m) => {
                        w(f, u[m])
                            , E(f) === e && c(f, "display", l[m].opacity === 0 ? "none" : "")
                    })
                    , w(e, "style", r)
            } catch {
                w(s, "style", "")
                    , Xa(e, o)
            }
        }

        function An(t, e) {
            const i = c(t, "zIndex");
            return q(t) ? {
                display: ""
                , opacity: e ? c(t, "opacity") : "0"
                , pointerEvents: "none"
                , position: "absolute"
                , zIndex: i === "auto" ? ee(t) : i
                , ...En(t)
            } : !1
        }

        function Ya(t, e, i) {
            const s = e.map((o, r) => E(o) && r in i ? i[r] ? q(o) ? En(o) : {
                    opacity: 0
                } : {
                    opacity: q(o) ? 1 : 0
                } : !1)
                , n = s.map((o, r) => {
                    const a = E(e[r]) === t && (i[r] || An(e[r]));
                    if (!a)
                        return !1;
                    if (!o)
                        delete a.opacity;
                    else if (!("opacity" in o)) {
                        const {
                            opacity: l
                        } = a;
                        l % 1 ? o.opacity = 1 : delete a.opacity
                    }
                    return a
                });
            return [s, n]
        }

        function Xa(t, e) {
            for (const i in e)
                c(t, i, "")
        }

        function En(t) {
            const {
                height: e
                , width: i
            } = C(t);
            return {
                height: e
                , width: i
                , transform: ""
                , ...je(t)
                , ...c(t, ["marginTop", "marginLeft"])
            }
        }

        function _n() {
            return new Promise(t => requestAnimationFrame(t))
        }
        var On = {
                props: {
                    duration: Number
                    , animation: Boolean
                }
                , data: {
                    duration: 150
                    , animation: "slide"
                }
                , methods: {
                    animate(t, e) {
                        e === void 0 && (e = this.$el);
                        const i = this.animation;
                        return (i === "fade" ? Cn : i === "delayed-fade" ? function() {
                                for (var n = arguments.length, o = new Array(n), r = 0; r < n; r++)
                                    o[r] = arguments[r];
                                return Cn(...o, 40)
                            } :
                            i ? Va : () => (t()
                                , Promise.resolve()))(t, e, this.duration).catch(T)
                    }
                }
            }
            , Ga = {
                mixins: [On]
                , args: "target"
                , props: {
                    target: Boolean
                    , selActive: Boolean
                }
                , data: {
                    target: null
                    , selActive: !1
                    , attrItem: "uk-filter-control"
                    , cls: "uk-active"
                    , duration: 250
                }
                , computed: {
                    toggles: {
                        get(t, e) {
                            let {
                                attrItem: i
                            } = t;
                            return M("[" + i + "],[data-" + i + "]", e)
                        }
                        , watch() {
                            if (this.updateState()
                                , this.selActive !== !1) {
                                const t = M(this.selActive, this.$el);
                                this.toggles.forEach(e => H(e, this.cls, p(t, e)))
                            }
                        }
                        , immediate: !0
                    }
                    , children: {
                        get(t, e) {
                            let {
                                target: i
                            } = t;
                            return M(i + " > *", e)
                        }
                        , watch(t, e) {
                            e && !Qa(t, e) && this.updateState()
                        }
                        , immediate: !0
                    }
                }
                , events: [{
                    name: "click"
                    , delegate() {
                        return "[" + this.attrItem + "],[data-" + this.attrItem + "]"
                    }
                    , handler(t) {
                        t.preventDefault()
                            , this.apply(t.current)
                    }
                }]
                , methods: {
                    apply(t) {
                        const e = this.getState()
                            , i = Dn(t, this.attrItem, this.getState());
                        Ja(e, i) || this.setState(i)
                    }
                    , getState() {
                        return this.toggles.filter(t => _(t, this.cls)).reduce((t, e) => Dn(e, this.attrItem, t), {
                            filter: {
                                "": ""
                            }
                            , sort: []
                        })
                    }
                    , async setState(t, e) {
                        e === void 0 && (e = !0)
                            , t = {
                                filter: {
                                    "": ""
                                }
                                , sort: []
                                , ...t
                            }
                            , g(this.$el, "beforeFilter", [this, t])
                            , this.toggles.forEach(i => H(i, this.cls, !!Za(i, this.attrItem, t)))
                            , await Promise.all(M(this.target, this.$el).map(i => {
                                const s = () => {
                                    Ka(t, i, O(i))
                                        , this.$update(this.$el)
                                };
                                return e ? this.animate(s, i) : s()
                            }))
                            , g(this.$el, "afterFilter", [this])
                    }
                    , updateState() {
                        G.write(() => this.setState(this.getState(), !1))
                    }
                }
            };

        function Bn(t, e) {
            return Se(ot(t, e), ["filter"])
        }

        function Ja(t, e) {
            return ["filter", "sort"].every(i => ge(t[i], e[i]))
        }

        function Ka(t, e, i) {
            const s = Ua(t);
            i.forEach(r => c(r, "display", s && !F(r, s) ? "none" : ""));
            const [n, o] = t.sort;
            if (n) {
                const r = tl(i, n, o);
                ge(r, i) || L(e, r)
            }
        }

        function Dn(t, e, i) {
            const {
                filter: s
                , group: n
                , sort: o
                , order: r = "asc"
            } = Bn(t, e);
            return (s || R(o)) && (n ? s ? (delete i.filter[""]
                    , i.filter[n] = s) : (delete i.filter[n]
                    , (pe(i.filter) || "" in i.filter) && (i.filter = {
                        "": s || ""
                    })) : i.filter = {
                    "": s || ""
                })
                , R(o) || (i.sort = [o, r])
                , i
        }

        function Za(t, e, i) {
            let {
                filter: s = {
                    "": ""
                }
                , sort: [n, o]
            } = i;
            const {
                filter: r = ""
                , group: a = ""
                , sort: l
                , order: h = "asc"
            } = Bn(t, e);
            return R(l) ? a in s && r === s[a] || !r && a && !(a in s) && !s[""] : n === l && o === h
        }

        function Qa(t, e) {
            return t.length === e.length && t.every(i => e.includes(i))
        }

        function Ua(t) {
            let {
                filter: e
            } = t
            , i = "";
            return $t(e, s => i += s || "")
                , i
        }

        function tl(t, e, i) {
            return [...t].sort((s, n) => ot(s, e).localeCompare(ot(n, e), void 0, {
                numeric: !0
            }) * (i === "asc" || -1))
        }
        var ss = {
            slide: {
                show(t) {
                    return [{
                        transform: z(t * -100)
                    }, {
                        transform: z()
                    }]
                }
                , percent(t) {
                    return Pe(t)
                }
                , translate(t, e) {
                    return [{
                        transform: z(e * -100 * t)
                    }, {
                        transform: z(e * 100 * (1 - t))
                    }]
                }
            }
        };

        function Pe(t) {
            return Math.abs(c(t, "transform").split(",")[4] / t.offsetWidth) || 0
        }

        function z(t, e) {
            return t === void 0 && (t = 0)
                , e === void 0 && (e = "%")
                , t += t ? e : ""
                , "translate3d(" + t + ", 0, 0)"
        }

        function he(t) {
            return "scale3d(" + t + ", " + t + ", 1)"
        }
        var Mn = {
            ...ss
            , fade: {
                show() {
                    return [{
                        opacity: 0
                    }, {
                        opacity: 1
                    }]
                }
                , percent(t) {
                    return 1 - c(t, "opacity")
                }
                , translate(t) {
                    return [{
                        opacity: 1 - t
                    }, {
                        opacity: t
                    }]
                }
            }
            , scale: {
                show() {
                    return [{
                        opacity: 0
                        , transform: he(1 - .2)
                    }, {
                        opacity: 1
                        , transform: he(1)
                    }]
                }
                , percent(t) {
                    return 1 - c(t, "opacity")
                }
                , translate(t) {
                    return [{
                        opacity: 1 - t
                        , transform: he(1 - .2 * t)
                    }, {
                        opacity: t
                        , transform: he(1 - .2 + .2 * t)
                    }]
                }
            }
        };

        function el(t, e, i, s) {
            let {
                animation: n
                , easing: o
            } = s;
            const {
                percent: r
                , translate: a
                , show: l = T
            } = n
            , h = l(i)
                , u = new He;
            return {
                dir: i
                , show(d, f, m) {
                    f === void 0 && (f = 0);
                    const I = m ? "linear" : o;
                    return d -= Math.round(d * U(f, -1, 1))
                        , this.translate(f)
                        , ui(e, "itemin", {
                            percent: f
                            , duration: d
                            , timing: I
                            , dir: i
                        })
                        , ui(t, "itemout", {
                            percent: 1 - f
                            , duration: d
                            , timing: I
                            , dir: i
                        })
                        , Promise.all([S.start(e, h[1], d, I), S.start(t, h[0], d, I)]).then(() => {
                                this.reset()
                                    , u.resolve()
                            }
                            , T)
                        , u.promise
                }
                , cancel() {
                    S.cancel([e, t])
                }
                , reset() {
                    for (const d in h[0])
                        c([e, t], d, "")
                }
                , forward(d, f) {
                    return f === void 0 && (f = this.percent())
                        , S.cancel([e, t])
                        , this.show(d, f, !0)
                }
                , translate(d) {
                    this.reset();
                    const f = a(d, i);
                    c(e, f[1])
                        , c(t, f[0])
                        , ui(e, "itemtranslatein", {
                            percent: d
                            , dir: i
                        })
                        , ui(t, "itemtranslateout", {
                            percent: 1 - d
                            , dir: i
                        })
                }
                , percent() {
                    return r(t || e, e, i)
                }
                , getDistance() {
                    return t == null ? void 0 : t.offsetWidth
                }
            }
        }

        function ui(t, e, i) {
            g(t, zt(e, !1, !1, i))
        }
        var il = {
            props: {
                autoplay: Boolean
                , autoplayInterval: Number
                , pauseOnHover: Boolean
            }
            , data: {
                autoplay: !1
                , autoplayInterval: 7e3
                , pauseOnHover: !0
            }
            , connected() {
                this.autoplay && this.startAutoplay()
            }
            , disconnected() {
                this.stopAutoplay()
            }
            , update() {
                w(this.slides, "tabindex", "-1")
            }
            , events: [{
                name: "visibilitychange"
                , el() {
                    return document
                }
                , filter() {
                    return this.autoplay
                }
                , handler() {
                    document.hidden ? this.stopAutoplay() : this.startAutoplay()
                }
            }]
            , methods: {
                startAutoplay() {
                    this.stopAutoplay()
                        , this.interval = setInterval(() => (!this.draggable || !b(":focus", this.$el)) && (!this.pauseOnHover || !F(this.$el, ":hover")) && !this.stack.length && this.show("next"), this.autoplayInterval)
                }
                , stopAutoplay() {
                    this.interval && clearInterval(this.interval)
                }
            }
        };
        const ns = {
                passive: !1
                , capture: !0
            }
            , Nn = {
                passive: !0
                , capture: !0
            }
            , sl = "touchstart mousedown"
            , os = "touchmove mousemove"
            , zn = "touchend touchcancel mouseup click input scroll";
        var nl = {
            props: {
                draggable: Boolean
            }
            , data: {
                draggable: !0
                , threshold: 10
            }
            , created() {
                for (const t of ["start", "move", "end"]) {
                    const e = this[t];
                    this[t] = i => {
                        const s = ie(i).x * (X ? -1 : 1);
                        this.prevPos = s === this.pos ? this.prevPos : this.pos
                            , this.pos = s
                            , e(i)
                    }
                }
            }
            , events: [{
                name: sl
                , passive: !0
                , delegate() {
                    return this.selSlides
                }
                , handler(t) {
                    !this.draggable || !kt(t) && ol(t.target) || et(t.target, ve) || t.button > 0 || this.length < 2 || this.start(t)
                }
            }, {
                name: "dragstart"
                , handler(t) {
                    t.preventDefault()
                }
            }, {
                name: os
                , el() {
                    return this.list
                }
                , handler: T
                , ...ns
            }]
            , methods: {
                start() {
                    this.drag = this.pos
                        , this._transitioner ? (this.percent = this._transitioner.percent()
                            , this.drag += this._transitioner.getDistance() * this.percent * this.dir
                            , this._transitioner.cancel()
                            , this._transitioner.translate(this.percent)
                            , this.dragging = !0
                            , this.stack = []) : this.prevIndex = this.index
                        , k(document, os, this.move, ns)
                        , k(document, zn, this.end, Nn)
                        , c(this.list, "userSelect", "none")
                }
                , move(t) {
                    const e = this.pos - this.drag;
                    if (e === 0 || this.prevPos === this.pos || !this.dragging && Math.abs(e) < this.threshold)
                        return;
                    c(this.list, "pointerEvents", "none")
                        , t.cancelable && t.preventDefault()
                        , this.dragging = !0
                        , this.dir = e < 0 ? 1 : -1;
                    const {
                        slides: i
                    } = this;
                    let {
                        prevIndex: s
                    } = this
                    , n = Math.abs(e)
                        , o = this.getIndex(s + this.dir, s)
                        , r = this._getDistance(s, o) || i[s].offsetWidth;
                    for (; o !== s && n > r;)
                        this.drag -= r * this.dir
                        , s = o
                        , n -= r
                        , o = this.getIndex(s + this.dir, s)
                        , r = this._getDistance(s, o) || i[s].offsetWidth;
                    this.percent = n / r;
                    const a = i[s]
                        , l = i[o]
                        , h = this.index !== o
                        , u = s === o;
                    let d;
                    [this.index, this.prevIndex].filter(f => !p([o, s], f)).forEach(f => {
                            g(i[f], "itemhidden", [this])
                                , u && (d = !0
                                    , this.prevIndex = s)
                        })
                        , (this.index === s && this.prevIndex !== s || d) && g(i[this.index], "itemshown", [this])
                        , h && (this.prevIndex = s
                            , this.index = o
                            , !u && g(a, "beforeitemhide", [this])
                            , g(l, "beforeitemshow", [this]))
                        , this._transitioner = this._translate(Math.abs(this.percent), a, !u && l)
                        , h && (!u && g(a, "itemhide", [this])
                            , g(l, "itemshow", [this]))
                }
                , end() {
                    if (Nt(document, os, this.move, ns)
                        , Nt(document, zn, this.end, Nn)
                        , this.dragging)
                        if (this.dragging = null
                            , this.index === this.prevIndex)
                            this.percent = 1 - this.percent
                            , this.dir *= -1
                            , this._show(!1, this.index, !0)
                            , this._transitioner = null;
                        else {
                            const t = (X ? this.dir * (X ? 1 : -1) : this.dir) < 0 == this.prevPos > this.pos;
                            this.index = t ? this.index : this.prevIndex
                                , t && (this.percent = 1 - this.percent)
                                , this.show(this.dir > 0 && !t || this.dir < 0 && t ? "next" : "previous", !0)
                        }
                    c(this.list, {
                            userSelect: ""
                            , pointerEvents: ""
                        })
                        , this.drag = this.percent = null
                }
            }
        };

        function ol(t) {
            return c(t, "userSelect") !== "none" && y(t.childNodes).some(e => e.nodeType === 3 && e.textContent.trim())
        }
        var rl = {
                data: {
                    selNav: !1
                }
                , computed: {
                    nav(t, e) {
                        let {
                            selNav: i
                        } = t;
                        return b(i, e)
                    }
                    , selNavItem(t) {
                        let {
                            attrItem: e
                        } = t;
                        return "[" + e + "],[data-" + e + "]"
                    }
                    , navItems(t, e) {
                        return M(this.selNavItem, e)
                    }
                }
                , update: {
                    write() {
                        this.nav && this.length !== this.nav.children.length && Pt(this.nav, this.slides.map((t, e) => "<li " + this.attrItem + '="' + e + '"><a href></a></li>').join(""))
                            , this.navItems.concat(this.nav).forEach(t => t && (t.hidden = !this.maxIndex))
                            , this.updateNav()
                    }
                    , events: ["resize"]
                }
                , events: [{
                    name: "click"
                    , delegate() {
                        return this.selNavItem
                    }
                    , handler(t) {
                        t.preventDefault()
                            , this.show(ot(t.current, this.attrItem))
                    }
                }, {
                    name: "itemshow"
                    , handler: "updateNav"
                }]
                , methods: {
                    updateNav() {
                        const t = this.getValidIndex();
                        for (const e of this.navItems) {
                            const i = ot(e, this.attrItem);
                            H(e, this.clsActive, Ct(i) === t)
                                , H(e, "uk-invisible", this.finite && (i === "previous" && t === 0 || i === "next" && t >= this.maxIndex))
                        }
                    }
                }
            }
            , Fn = {
                mixins: [il, nl, rl, wt]
                , props: {
                    clsActivated: Boolean
                    , easing: String
                    , index: Number
                    , finite: Boolean
                    , velocity: Number
                    , selSlides: String
                }
                , data: () => ({
                    easing: "ease"
                    , finite: !1
                    , velocity: 1
                    , index: 0
                    , prevIndex: -1
                    , stack: []
                    , percent: 0
                    , clsActive: "uk-active"
                    , clsActivated: !1
                    , Transitioner: !1
                    , transitionOptions: {}
                })
                , connected() {
                    this.prevIndex = -1
                        , this.index = this.getValidIndex(this.$props.index)
                        , this.stack = []
                }
                , disconnected() {
                    B(this.slides, this.clsActive)
                }
                , computed: {
                    duration(t, e) {
                        let {
                            velocity: i
                        } = t;
                        return Hn(e.offsetWidth / i)
                    }
                    , list(t, e) {
                        let {
                            selList: i
                        } = t;
                        return b(i, e)
                    }
                    , maxIndex() {
                        return this.length - 1
                    }
                    , selSlides(t) {
                        let {
                            selList: e
                            , selSlides: i
                        } = t;
                        return e + " " + (i || "> *")
                    }
                    , slides: {
                        get() {
                            return M(this.selSlides, this.$el)
                        }
                        , watch() {
                            this.$emit("resize")
                        }
                    }
                    , length() {
                        return this.slides.length
                    }
                }
                , methods: {
                    show(t, e) {
                        if (e === void 0 && (e = !1)
                            , this.dragging || !this.length)
                            return;
                        const {
                            stack: i
                        } = this
                        , s = e ? 0 : i.length
                            , n = () => {
                                i.splice(s, 1)
                                    , i.length && this.show(i.shift(), !0)
                            };
                        if (i[e ? "unshift" : "push"](t)
                            , !e && i.length > 1) {
                            i.length === 2 && this._transitioner.forward(Math.min(this.duration, 200));
                            return
                        }
                        const o = this.getIndex(this.index)
                            , r = _(this.slides, this.clsActive) && this.slides[o]
                            , a = this.getIndex(t, this.index)
                            , l = this.slides[a];
                        if (r === l) {
                            n();
                            return
                        }
                        if (this.dir = al(t, o)
                            , this.prevIndex = o
                            , this.index = a
                            , r && !g(r, "beforeitemhide", [this]) || !g(l, "beforeitemshow", [this, r])) {
                            this.index = this.prevIndex
                                , n();
                            return
                        }
                        const h = this._show(r, l, e).then(() => (r && g(r, "itemhidden", [this])
                            , g(l, "itemshown", [this])
                            , new Promise(u => {
                                requestAnimationFrame(() => {
                                    i.shift()
                                        , i.length ? this.show(i.shift(), !0) : this._transitioner = null
                                        , u()
                                })
                            })));
                        return r && g(r, "itemhide", [this])
                            , g(l, "itemshow", [this])
                            , h
                    }
                    , getIndex(t, e) {
                        return t === void 0 && (t = this.index)
                            , e === void 0 && (e = this.index)
                            , U(Ut(t, this.slides, e, this.finite), 0, this.maxIndex)
                    }
                    , getValidIndex(t, e) {
                        return t === void 0 && (t = this.index)
                            , e === void 0 && (e = this.prevIndex)
                            , this.getIndex(t, e)
                    }
                    , _show(t, e, i) {
                        if (this._transitioner = this._getTransitioner(t, e, this.dir, {
                                easing: i ? e.offsetWidth < 600 ? "cubic-bezier(0.25, 0.46, 0.45, 0.94)" : "cubic-bezier(0.165, 0.84, 0.44, 1)" : this.easing
                                , ...this.transitionOptions
                            })
                            , !i && !t)
                            return this._translate(1)
                                , Promise.resolve();
                        const {
                            length: s
                        } = this.stack;
                        return this._transitioner[s > 1 ? "forward" : "show"](s > 1 ? Math.min(this.duration, 75 + 75 / (s - 1)) : this.duration, this.percent)
                    }
                    , _getDistance(t, e) {
                        return this._getTransitioner(t, t !== e && e).getDistance()
                    }
                    , _translate(t, e, i) {
                        e === void 0 && (e = this.prevIndex)
                            , i === void 0 && (i = this.index);
                        const s = this._getTransitioner(e !== i ? e : !1, i);
                        return s.translate(t)
                            , s
                    }
                    , _getTransitioner(t, e, i, s) {
                        return t === void 0 && (t = this.prevIndex)
                            , e === void 0 && (e = this.index)
                            , i === void 0 && (i = this.dir || 1)
                            , s === void 0 && (s = this.transitionOptions)
                            , new this.Transitioner(Zt(t) ? this.slides[t] : t, Zt(e) ? this.slides[e] : e, i * (X ? -1 : 1), s)
                    }
                }
            };

        function al(t, e) {
            return t === "next" ? 1 : t === "previous" || t < e ? -1 : 1
        }

        function Hn(t) {
            return .5 * t + 300
        }
        var Ln = {
                mixins: [Fn]
                , props: {
                    animation: String
                }
                , data: {
                    animation: "slide"
                    , clsActivated: "uk-transition-active"
                    , Animations: ss
                    , Transitioner: el
                }
                , computed: {
                    animation(t) {
                        let {
                            animation: e
                            , Animations: i
                        } = t;
                        return {
                            ...i[e] || i.slide
                            , name: e
                        }
                    }
                    , transitionOptions() {
                        return {
                            animation: this.animation
                        }
                    }
                }
                , events: {
                    beforeitemshow(t) {
                        let {
                            target: e
                        } = t;
                        x(e, this.clsActive)
                    }
                    , itemshown(t) {
                        let {
                            target: e
                        } = t;
                        x(e, this.clsActivated)
                    }
                    , itemhidden(t) {
                        let {
                            target: e
                        } = t;
                        B(e, this.clsActive, this.clsActivated)
                    }
                }
            }
            , Wn = {
                mixins: [le, Ji, _t, Ln]
                , functional: !0
                , props: {
                    delayControls: Number
                    , preload: Number
                    , videoAutoplay: Boolean
                    , template: String
                }
                , data: () => ({
                    preload: 1
                    , videoAutoplay: !1
                    , delayControls: 3e3
                    , items: []
                    , cls: "uk-open"
                    , clsPage: "uk-lightbox-page"
                    , selList: ".uk-lightbox-items"
                    , attrItem: "uk-lightbox-item"
                    , selClose: ".uk-close-large"
                    , selCaption: ".uk-lightbox-caption"
                    , pauseOnHover: !1
                    , velocity: 2
                    , Animations: Mn
                    , template: '<div class="uk-lightbox uk-overflow-hidden"> <ul class="uk-lightbox-items"></ul> <div class="uk-lightbox-toolbar uk-position-top uk-text-right uk-transition-slide-top uk-transition-opaque"> <button class="uk-lightbox-toolbar-icon uk-close-large" type="button" uk-close></button> </div> <a class="uk-lightbox-button uk-position-center-left uk-position-medium uk-transition-fade" href uk-slidenav-previous uk-lightbox-item="previous"></a> <a class="uk-lightbox-button uk-position-center-right uk-position-medium uk-transition-fade" href uk-slidenav-next uk-lightbox-item="next"></a> <div class="uk-lightbox-toolbar uk-lightbox-caption uk-position-bottom uk-text-center uk-transition-slide-bottom uk-transition-opaque"></div> </div>'
                })
                , created() {
                    const t = b(this.template)
                        , e = b(this.selList, t);
                    this.items.forEach(() => L(e, "<li>"))
                        , this.$mount(L(this.container, t))
                }
                , computed: {
                    caption(t, e) {
                        let {
                            selCaption: i
                        } = t;
                        return b(i, e)
                    }
                }
                , events: [{
                    name: Ge + " " + gt + " keydown"
                    , handler: "showControls"
                }, {
                    name: "click"
                    , self: !0
                    , delegate() {
                        return this.selSlides
                    }
                    , handler(t) {
                        t.defaultPrevented || this.hide()
                    }
                }, {
                    name: "shown"
                    , self: !0
                    , handler() {
                        this.showControls()
                    }
                }, {
                    name: "hide"
                    , self: !0
                    , handler() {
                        this.hideControls()
                            , B(this.slides, this.clsActive)
                            , S.stop(this.slides)
                    }
                }, {
                    name: "hidden"
                    , self: !0
                    , handler() {
                        this.$destroy(!0)
                    }
                }, {
                    name: "keyup"
                    , el() {
                        return document
                    }
                    , handler(t) {
                        if (!(!this.isToggled(this.$el) || !this.draggable))
                            switch (t.keyCode) {
                                case 37:
                                    this.show("previous");
                                    break;
                                case 39:
                                    this.show("next");
                                    break
                            }
                    }
                }, {
                    name: "beforeitemshow"
                    , handler(t) {
                        this.isToggled() || (this.draggable = !1
                            , t.preventDefault()
                            , this.toggleElement(this.$el, !0, !1)
                            , this.animation = Mn.scale
                            , B(t.target, this.clsActive)
                            , this.stack.splice(1, 0, this.index))
                    }
                }, {
                    name: "itemshow"
                    , handler() {
                        Pt(this.caption, this.getItem().caption || "");
                        for (let t = -this.preload; t <= this.preload; t++)
                            this.loadItem(this.index + t)
                    }
                }, {
                    name: "itemshown"
                    , handler() {
                        this.draggable = this.$props.draggable
                    }
                }, {
                    name: "itemload"
                    , async handler(t, e) {
                        const {
                            source: i
                            , type: s
                            , alt: n = ""
                            , poster: o
                            , attrs: r = {}
                        } = e;
                        if (this.setItem(e, "<span uk-spinner></span>")
                            , !i)
                            return;
                        let a;
                        const l = {
                            allowfullscreen: ""
                            , style: "max-width: 100%; box-sizing: border-box;"
                            , "uk-responsive": ""
                            , "uk-video": "" + this.videoAutoplay
                        };
                        if (s === "image" || i.match(/\.(avif|jpe?g|jfif|a?png|gif|svg|webp)($|\?)/i))
                            try {
                                const {
                                    width: h
                                    , height: u
                                } = await bs(i, r.srcset, r.size);
                                this.setItem(e, Ae("img", {
                                    src: i
                                    , width: h
                                    , height: u
                                    , alt: n
                                    , ...r
                                }))
                            } catch {
                                this.setError(e)
                            }
                        else if (s === "video" || i.match(/\.(mp4|webm|ogv)($|\?)/i)) {
                            const h = Ae("video", {
                                src: i
                                , poster: o
                                , controls: ""
                                , playsinline: ""
                                , "uk-video": "" + this.videoAutoplay
                            });
                            k(h, "loadedmetadata", () => {
                                    w(h, {
                                            width: h.videoWidth
                                            , height: h.videoHeight
                                            , ...r
                                        })
                                        , this.setItem(e, h)
                                })
                                , k(h, "error", () => this.setError(e))
                        } else if (s === "iframe" || i.match(/\.(html|php)($|\?)/i))
                            this.setItem(e, Ae("iframe", {
                                src: i
                                , allowfullscreen: ""
                                , class: "uk-lightbox-iframe"
                                , ...r
                            }));
                        else if (a = i.match(/\/\/(?:.*?youtube(-nocookie)?\..*?[?&]v=|youtu\.be\/)([\w-]{11})[&?]?(.*)?/))
                            this.setItem(e, Ae("iframe", {
                                src: "https://www.youtube" + (a[1] || "") + ".com/embed/" + a[2] + (a[3] ? "?" + a[3] : "")
                                , width: 1920
                                , height: 1080
                                , ...l
                                , ...r
                            }));
                        else if (a = i.match(/\/\/.*?vimeo\.[a-z]+\/(\d+)[&?]?(.*)?/))
                            try {
                                const {
                                    height: h
                                    , width: u
                                } = await (await fetch("https://vimeo.com/api/oembed.json?maxwidth=1920&url=" + encodeURI(i), {
                                    credentials: "omit"
                                })).json();
                                this.setItem(e, Ae("iframe", {
                                    src: "https://player.vimeo.com/video/" + a[1] + (a[2] ? "?" + a[2] : "")
                                    , width: u
                                    , height: h
                                    , ...l
                                    , ...r
                                }))
                            } catch {
                                this.setError(e)
                            }
                    }
                }]
                , methods: {
                    loadItem(t) {
                        t === void 0 && (t = this.index);
                        const e = this.getItem(t);
                        this.getSlide(e).childElementCount || g(this.$el, "itemload", [e])
                    }
                    , getItem(t) {
                        return t === void 0 && (t = this.index)
                            , this.items[Ut(t, this.slides)]
                    }
                    , setItem(t, e) {
                        g(this.$el, "itemloaded", [this, Pt(this.getSlide(t), e)])
                    }
                    , getSlide(t) {
                        return this.slides[this.items.indexOf(t)]
                    }
                    , setError(t) {
                        this.setItem(t, '<span uk-icon="icon: bolt; ratio: 2"></span>')
                    }
                    , showControls() {
                        clearTimeout(this.controlsTimer)
                            , this.controlsTimer = setTimeout(this.hideControls, this.delayControls)
                            , x(this.$el, "uk-active", "uk-transition-active")
                    }
                    , hideControls() {
                        B(this.$el, "uk-active", "uk-transition-active")
                    }
                }
            };

        function Ae(t, e) {
            const i = Lt("<" + t + ">");
            return w(i, e)
                , i
        }
        var ll = {
            install: hl
            , props: {
                toggle: String
            }
            , data: {
                toggle: "a"
            }
            , computed: {
                toggles: {
                    get(t, e) {
                        let {
                            toggle: i
                        } = t;
                        return M(i, e)
                    }
                    , watch() {
                        this.hide()
                    }
                }
            }
            , disconnected() {
                this.hide()
            }
            , events: [{
                name: "click"
                , delegate() {
                    return this.toggle + ":not(.uk-disabled)"
                }
                , handler(t) {
                    t.preventDefault()
                        , this.show(t.current)
                }
            }]
            , methods: {
                show(t) {
                    const e = ds(this.toggles.map(Rn), "source");
                    if (Kt(t)) {
                        const {
                            source: i
                        } = Rn(t);
                        t = bt(e, s => {
                            let {
                                source: n
                            } = s;
                            return i === n
                        })
                    }
                    return this.panel = this.panel || this.$create("lightboxPanel", {
                            ...this.$props
                            , items: e
                        })
                        , k(this.panel.$el, "hidden", () => this.panel = null)
                        , this.panel.show(t)
                }
                , hide() {
                    var t;
                    return (t = this.panel) == null ? void 0 : t.hide()
                }
            }
        };

        function hl(t, e) {
            t.lightboxPanel || t.component("lightboxPanel", Wn)
                , xt(e.props, t.component("lightboxPanel").options.props)
        }

        function Rn(t) {
            const e = {};
            for (const i of ["href", "caption", "type", "poster", "alt", "attrs"])
                e[i === "href" ? "source" : i] = ot(t, i);
            return e.attrs = Se(e.attrs)
                , e
        }
        var cl = {
            mixins: [le]
            , functional: !0
            , args: ["message", "status"]
            , data: {
                message: ""
                , status: ""
                , timeout: 5e3
                , group: null
                , pos: "top-center"
                , clsContainer: "uk-notification"
                , clsClose: "uk-notification-close"
                , clsMsg: "uk-notification-message"
            }
            , install: ul
            , computed: {
                marginProp(t) {
                    let {
                        pos: e
                    } = t;
                    return "margin" + (lt(e, "top") ? "Top" : "Bottom")
                }
                , startProps() {
                    return {
                        opacity: 0
                        , [this.marginProp]: -this.$el.offsetHeight
                    }
                }
            }
            , created() {
                const t = b("." + this.clsContainer + "-" + this.pos, this.container) || L(this.container, '<div class="' + this.clsContainer + " " + this.clsContainer + "-" + this.pos + '" style="display: block"></div>');
                this.$mount(L(t, '<div class="' + this.clsMsg + (this.status ? " " + this.clsMsg + "-" + this.status : "") + '" role="alert"> <a href class="' + this.clsClose + '" data-uk-close></a> <div>' + this.message + "</div> </div>"))
            }
            , async connected() {
                const t = v(c(this.$el, this.marginProp));
                await S.start(c(this.$el, this.startProps), {
                        opacity: 1
                        , [this.marginProp]: t
                    })
                    , this.timeout && (this.timer = setTimeout(this.close, this.timeout))
            }
            , events: {
                click(t) {
                    et(t.target, 'a[href="#"],a[href=""]') && t.preventDefault()
                        , this.close()
                }
                , [jt]() {
                    this.timer && clearTimeout(this.timer)
                }
                , [oe]() {
                    this.timeout && (this.timer = setTimeout(this.close, this.timeout))
                }
            }
            , methods: {
                async close(t) {
                    const e = i => {
                        const s = E(i);
                        g(i, "close", [this])
                            , ut(i)
                            , s != null && s.hasChildNodes() || ut(s)
                    };
                    this.timer && clearTimeout(this.timer)
                        , t || await S.start(this.$el, this.startProps)
                        , e(this.$el)
                }
            }
        };

        function ul(t) {
            t.notification.closeAll = function(e, i) {
                vt(document.body, s => {
                    const n = t.getComponent(s, "notification");
                    n && (!e || e === n.group) && n.close(i)
                })
            }
        }
        const di = {
                x: fi
                , y: fi
                , rotate: fi
                , scale: fi
                , color: rs
                , backgroundColor: rs
                , borderColor: rs
                , blur: Vt
                , hue: Vt
                , fopacity: Vt
                , grayscale: Vt
                , invert: Vt
                , saturate: Vt
                , sepia: Vt
                , opacity: fl
                , stroke: pl
                , bgx: Vn
                , bgy: Vn
            }
            , {
                keys: jn
            } = Object;
        var qn = {
            mixins: [hi]
            , props: Jn(jn(di), "list")
            , data: Jn(jn(di), void 0)
            , computed: {
                props(t, e) {
                    const i = {};
                    for (const n in t)
                        n in di && !R(t[n]) && (i[n] = t[n].slice());
                    const s = {};
                    for (const n in i)
                        s[n] = di[n](n, e, i[n], i);
                    return s
                }
            }
            , events: {
                load() {
                    this.$emit()
                }
            }
            , methods: {
                reset() {
                    for (const t in this.getCss(0))
                        c(this.$el, t, "")
                }
                , getCss(t) {
                    const e = {
                        transform: ""
                        , filter: ""
                    };
                    for (const i in this.props)
                        this.props[i](e, t);
                    return e
                }
            }
        };

        function fi(t, e, i) {
            let s = gi(i) || {
                    x: "px"
                    , y: "px"
                    , rotate: "deg"
                } [t] || ""
                , n;
            return t === "x" || t === "y" ? (t = "translate" + St(t)
                    , n = o => v(v(o).toFixed(s === "px" ? 0 : 6))) : t === "scale" && (s = ""
                    , n = o => gi([o]) ? K(o, "width", e, !0) / e.offsetWidth : o)
                , i.length === 1 && i.unshift(t === "scale" ? 1 : 0)
                , i = ce(i, n)
                , (o, r) => {
                    o.transform += " " + t + "(" + Ee(i, r) + s + ")"
                }
        }

        function rs(t, e, i) {
            return i.length === 1 && i.unshift(_e(e, t, ""))
                , i = ce(i, s => dl(e, s))
                , (s, n) => {
                    const [o, r, a] = Gn(i, n)
                        , l = o.map((h, u) => (h += a * (r[u] - h)
                            , u === 3 ? v(h) : parseInt(h, 10))).join(",");
                    s[t] = "rgba(" + l + ")"
                }
        }

        function dl(t, e) {
            return _e(t, "color", e).split(/[(),]/g).slice(1, -1).concat(1).slice(0, 4).map(v)
        }

        function Vt(t, e, i) {
            i.length === 1 && i.unshift(0);
            const s = gi(i) || {
                blur: "px"
                , hue: "deg"
            } [t] || "%";
            return t = {
                    fopacity: "opacity"
                    , hue: "hue-rotate"
                } [t] || t
                , i = ce(i)
                , (n, o) => {
                    const r = Ee(i, o);
                    n.filter += " " + t + "(" + (r + s) + ")"
                }
        }

        function fl(t, e, i) {
            return i.length === 1 && i.unshift(_e(e, t, ""))
                , i = ce(i)
                , (s, n) => {
                    s[t] = Ee(i, n)
                }
        }

        function pl(t, e, i) {
            i.length === 1 && i.unshift(0);
            const s = gi(i)
                , n = fn(e);
            return i = ce(i.reverse(), o => (o = v(o)
                    , s === "%" ? o * n / 100 : o))
                , i.some(o => {
                    let [r] = o;
                    return r
                }) ? (c(e, "strokeDasharray", n)
                    , (o, r) => {
                        o.strokeDashoffset = Ee(i, r)
                    }
                ) : T
        }

        function Vn(t, e, i, s) {
            i.length === 1 && i.unshift(0);
            const n = t === "bgy" ? "height" : "width";
            s[t] = ce(i, a => K(a, n, e));
            const o = ["bgx", "bgy"].filter(a => a in s);
            if (o.length === 2 && t === "bgx")
                return T;
            if (_e(e, "backgroundSize", "") === "cover")
                return gl(t, e, i, s);
            const r = {};
            for (const a of o)
                r[a] = Yn(e, a);
            return Xn(o, r, s)
        }

        function gl(t, e, i, s) {
            const n = ml(e);
            if (!n.width)
                return T;
            const o = {
                    width: e.offsetWidth
                    , height: e.offsetHeight
                }
                , r = ["bgx", "bgy"].filter(u => u in s)
                , a = {};
            for (const u of r) {
                const d = s[u].map(W => {
                        let [Y] = W;
                        return Y
                    })
                    , f = Math.min(...d)
                    , m = Math.max(...d)
                    , I = d.indexOf(f) < d.indexOf(m)
                    , A = m - f;
                a[u] = (I ? -A : 0) - (I ? f : m) + "px"
                    , o[u === "bgy" ? "height" : "width"] += A
            }
            const l = Fe.cover(n, o);
            for (const u of r) {
                const d = u === "bgy" ? "height" : "width"
                    , f = l[d] - o[d];
                a[u] = "max(" + Yn(e, u) + ",-" + f + "px) + " + a[u]
            }
            const h = Xn(r, a, s);
            return (u, d) => {
                h(u, d)
                    , u.backgroundSize = l.width + "px " + l.height + "px"
                    , u.backgroundRepeat = "no-repeat"
            }
        }

        function Yn(t, e) {
            return _e(t, "background-position-" + e.substr(-1), "")
        }

        function Xn(t, e, i) {
            return function(s, n) {
                for (const o of t) {
                    const r = Ee(i[o], n);
                    s["background-position-" + o.substr(-1)] = "calc(" + e[o] + " + " + r + "px)"
                }
            }
        }
        const pi = {};

        function ml(t) {
            const e = c(t, "backgroundImage").replace(/^none|url\(["']?(.+?)["']?\)$/, "$1");
            if (pi[e])
                return pi[e];
            const i = new Image;
            return e && (i.src = e
                , !i.naturalWidth) ? (i.onload = () => {
                    pi[e] = as(i)
                        , g(t, zt("load", !1))
                }
                , as(i)) : pi[e] = as(i)
        }

        function as(t) {
            return {
                width: t.naturalWidth
                , height: t.naturalHeight
            }
        }

        function ce(t, e) {
            e === void 0 && (e = v);
            const i = []
                , {
                    length: s
                } = t;
            let n = 0;
            for (let o = 0; o < s; o++) {
                let [r, a] = D(t[o]) ? t[o].trim().split(" ") : [t[o]];
                if (r = e(r)
                    , a = a ? v(a) / 100 : null
                    , o === 0 ? a === null ? a = 0 : a && i.push([r, 0]) : o === s - 1 && (a === null ? a = 1 : a !== 1 && (i.push([r, a])
                        , a = 1))
                    , i.push([r, a])
                    , a === null)
                    n++;
                else if (n) {
                    const l = i[o - n - 1][1]
                        , h = (a - l) / (n + 1);
                    for (let u = n; u > 0; u--)
                        i[o - u][1] = l + h * (n - u + 1);
                    n = 0
                }
            }
            return i
        }

        function Gn(t, e) {
            const i = bt(t.slice(1), s => {
                let [, n] = s;
                return e <= n
            }) + 1;
            return [t[i - 1][0], t[i][0], (e - t[i - 1][1]) / (t[i][1] - t[i - 1][1])]
        }

        function Ee(t, e) {
            const [i, s, n] = Gn(t, e);
            return Zt(i) ? i + Math.abs(i - s) * n * (i < s ? 1 : -1) : +s
        }
        const vl = /^-?\d+(\S+)/;

        function gi(t, e) {
            for (const i of t) {
                const s = i.match == null ? void 0 : i.match(vl);
                if (s)
                    return s[1]
            }
            return e
        }

        function _e(t, e, i) {
            const s = t.style[e]
                , n = c(c(t, e, i), e);
            return t.style[e] = s
                , n
        }

        function Jn(t, e) {
            return t.reduce((i, s) => (i[s] = e
                , i), {})
        }
        var wl = {
            mixins: [qn, wt, si]
            , props: {
                target: String
                , viewport: Number
                , easing: Number
                , start: String
                , end: String
            }
            , data: {
                target: !1
                , viewport: 1
                , easing: 1
                , start: 0
                , end: 0
            }
            , computed: {
                target(t, e) {
                    let {
                        target: i
                    } = t;
                    return Kn(i && ht(i, e) || e)
                }
                , start(t) {
                    let {
                        start: e
                    } = t;
                    return K(e, "height", this.target, !0)
                }
                , end(t) {
                    let {
                        end: e
                        , viewport: i
                    } = t;
                    return K(e || (i = (1 - i) * 100) && i + "vh+" + i + "%", "height", this.target, !0)
                }
            }
            , update: {
                read(t, e) {
                    let {
                        percent: i
                    } = t;
                    if (e.has("scroll") || (i = !1)
                        , !this.matchMedia)
                        return;
                    const s = i;
                    return i = bl(Yi(this.target, this.start, this.end), this.easing), {
                        percent: i
                        , style: s === i ? !1 : this.getCss(i)
                    }
                }
                , write(t) {
                    let {
                        style: e
                    } = t;
                    if (!this.matchMedia) {
                        this.reset();
                        return
                    }
                    e && c(this.$el, e)
                }
                , events: ["scroll", "resize"]
            }
        };

        function bl(t, e) {
            return e >= 0 ? Math.pow(t, e + 1) : 1 - Math.pow(1 - t, 1 - e)
        }

        function Kn(t) {
            return t ? "offsetTop" in t ? t : Kn(E(t)) : document.documentElement
        }
        var Zn = {
                update: {
                    write() {
                        if (this.stack.length || this.dragging)
                            return;
                        const t = this.getValidIndex(this.index);
                        !~this.prevIndex || this.index !== t ? this.show(t) : this._translate(1, this.prevIndex, this.index)
                    }
                    , events: ["resize"]
                }
            }
            , Qn = {
                mixins: [Te]
                , connected() {
                    this.lazyload(this.slides, this.getAdjacentSlides)
                }
            };

        function xl(t, e, i, s) {
            let {
                center: n
                , easing: o
                , list: r
            } = s;
            const a = new He
                , l = t ? Oe(t, r, n) : Oe(e, r, n) + $(e).width * i
                , h = e ? Oe(e, r, n) : l + $(t).width * i * (X ? -1 : 1);
            return {
                dir: i
                , show(u, d, f) {
                    d === void 0 && (d = 0);
                    const m = f ? "linear" : o;
                    return u -= Math.round(u * U(d, -1, 1))
                        , this.translate(d)
                        , d = t ? d : U(d, 0, 1)
                        , ls(this.getItemIn(), "itemin", {
                            percent: d
                            , duration: u
                            , timing: m
                            , dir: i
                        })
                        , t && ls(this.getItemIn(!0), "itemout", {
                            percent: 1 - d
                            , duration: u
                            , timing: m
                            , dir: i
                        })
                        , S.start(r, {
                            transform: z(-h * (X ? -1 : 1), "px")
                        }, u, m).then(a.resolve, T)
                        , a.promise
                }
                , cancel() {
                    S.cancel(r)
                }
                , reset() {
                    c(r, "transform", "")
                }
                , forward(u, d) {
                    return d === void 0 && (d = this.percent())
                        , S.cancel(r)
                        , this.show(u, d, !0)
                }
                , translate(u) {
                    const d = this.getDistance() * i * (X ? -1 : 1);
                    c(r, "transform", z(U(-h + (d - d * u), -mi(r), $(r).width) * (X ? -1 : 1), "px"));
                    const f = this.getActives()
                        , m = this.getItemIn()
                        , I = this.getItemIn(!0);
                    u = t ? U(u, -1, 1) : 0;
                    for (const A of O(r)) {
                        const W = p(f, A)
                            , Y = A === m
                            , Ot = A === I
                            , hs = Y || !Ot && (W || i * (X ? -1 : 1) === -1 ^ vi(A, r) > vi(t || e));
                        ls(A, "itemtranslate" + (hs ? "in" : "out"), {
                            dir: i
                            , percent: Ot ? 1 - u : Y ? u : W ? 1 : 0
                        })
                    }
                }
                , percent() {
                    return Math.abs((c(r, "transform").split(",")[4] * (X ? -1 : 1) + l) / (h - l))
                }
                , getDistance() {
                    return Math.abs(h - l)
                }
                , getItemIn(u) {
                    u === void 0 && (u = !1);
                    let d = this.getActives()
                        , f = to(r, Oe(e || t, r, n));
                    if (u) {
                        const m = d;
                        d = f
                            , f = m
                    }
                    return f[bt(f, m => !p(d, m))]
                }
                , getActives() {
                    return to(r, Oe(t || e, r, n))
                }
            }
        }

        function Oe(t, e, i) {
            const s = vi(t, e);
            return i ? s - yl(t, e) : Math.min(s, Un(e))
        }

        function Un(t) {
            return Math.max(0, mi(t) - $(t).width)
        }

        function mi(t) {
            return O(t).reduce((e, i) => $(i).width + e, 0)
        }

        function yl(t, e) {
            return $(e).width / 2 - $(t).width / 2
        }

        function vi(t, e) {
            return t && (je(t).left + (X ? $(t).width - $(e).width : 0)) * (X ? -1 : 1) || 0
        }

        function to(t, e) {
            e -= 1;
            const i = $(t).width
                , s = e + i + 2;
            return O(t).filter(n => {
                const o = vi(n, t)
                    , r = o + Math.min($(n).width, i);
                return o >= e && r <= s
            })
        }

        function ls(t, e, i) {
            g(t, zt(e, !1, !1, i))
        }
        var $l = {
            mixins: [st, Fn, Zn, Qn]
            , props: {
                center: Boolean
                , sets: Boolean
            }
            , data: {
                center: !1
                , sets: !1
                , attrItem: "uk-slider-item"
                , selList: ".uk-slider-items"
                , selNav: ".uk-slider-nav"
                , clsContainer: "uk-slider-container"
                , Transitioner: xl
            }
            , computed: {
                avgWidth() {
                    return mi(this.list) / this.length
                }
                , finite(t) {
                    let {
                        finite: e
                    } = t;
                    return e || Math.ceil(mi(this.list)) < Math.trunc($(this.list).width + kl(this.list) + this.center)
                }
                , maxIndex() {
                    if (!this.finite || this.center && !this.sets)
                        return this.length - 1;
                    if (this.center)
                        return Qt(this.sets);
                    let t = 0;
                    const e = Un(this.list)
                        , i = bt(this.slides, s => {
                            if (t >= e)
                                return !0;
                            t += $(s).width
                        });
                    return ~i ? i : this.length - 1
                }
                , sets(t) {
                    let {
                        sets: e
                    } = t;
                    if (!e)
                        return;
                    let i = 0;
                    const s = []
                        , n = $(this.list).width;
                    for (let o = 0; o < this.slides.length; o++) {
                        const r = $(this.slides[o]).width;
                        i + r > n && (i = 0)
                            , this.center ? i < n / 2 && i + r + $(this.slides[+o + 1]).width / 2 > n / 2 && (s.push(+o)
                                , i = n / 2 - r / 2) : i === 0 && s.push(Math.min(+o, this.maxIndex))
                            , i += r
                    }
                    if (s.length)
                        return s
                }
                , transitionOptions() {
                    return {
                        center: this.center
                        , list: this.list
                    }
                }
            }
            , connected() {
                H(this.$el, this.clsContainer, !b("." + this.clsContainer, this.$el))
            }
            , update: {
                write() {
                    for (const t of this.navItems) {
                        const e = Ct(ot(t, this.attrItem));
                        e !== !1 && (t.hidden = !this.maxIndex || e > this.maxIndex || this.sets && !p(this.sets, e))
                    }
                    this.length && !this.dragging && !this.stack.length && (this.reorder()
                            , this._translate(1))
                        , this.updateActiveClasses()
                }
                , events: ["resize"]
            }
            , events: {
                beforeitemshow(t) {
                    !this.dragging && this.sets && this.stack.length < 2 && !p(this.sets, this.index) && (this.index = this.getValidIndex());
                    const e = Math.abs(this.index - this.prevIndex + (this.dir > 0 && this.index < this.prevIndex || this.dir < 0 && this.index > this.prevIndex ? (this.maxIndex + 1) * this.dir : 0));
                    if (!this.dragging && e > 1) {
                        for (let s = 0; s < e; s++)
                            this.stack.splice(1, 0, this.dir > 0 ? "next" : "previous");
                        t.preventDefault();
                        return
                    }
                    const i = this.dir < 0 || !this.slides[this.prevIndex] ? this.index : this.prevIndex;
                    this.duration = Hn(this.avgWidth / this.velocity) * ($(this.slides[i]).width / this.avgWidth)
                        , this.reorder()
                }
                , itemshow() {
                    ~this.prevIndex && x(this._getTransitioner().getItemIn(), this.clsActive)
                }
                , itemshown() {
                    this.updateActiveClasses()
                }
            }
            , methods: {
                reorder() {
                    if (this.finite) {
                        c(this.slides, "order", "");
                        return
                    }
                    const t = this.dir > 0 && this.slides[this.prevIndex] ? this.prevIndex : this.index;
                    if (this.slides.forEach((n, o) => c(n, "order", this.dir > 0 && o < t ? 1 : this.dir < 0 && o >= this.index ? -1 : ""))
                        , !this.center)
                        return;
                    const e = this.slides[t];
                    let i = $(this.list).width / 2 - $(e).width / 2
                        , s = 0;
                    for (; i > 0;) {
                        const n = this.getIndex(--s + t, t)
                            , o = this.slides[n];
                        c(o, "order", n > t ? -2 : -1)
                            , i -= $(o).width
                    }
                }
                , updateActiveClasses() {
                    const t = this._getTransitioner(this.index).getActives()
                        , e = [this.clsActive, (!this.sets || p(this.sets, v(this.index))) && this.clsActivated || ""];
                    for (const i of this.slides)
                        H(i, e, p(t, i))
                }
                , getValidIndex(t, e) {
                    if (t === void 0 && (t = this.index)
                        , e === void 0 && (e = this.prevIndex)
                        , t = this.getIndex(t, e)
                        , !this.sets)
                        return t;
                    let i;
                    do {
                        if (p(this.sets, t))
                            return t;
                        i = t
                            , t = this.getIndex(t + this.dir, e)
                    } while (t !== i);
                    return t
                }
                , getAdjacentSlides() {
                    const {
                        width: t
                    } = $(this.list)
                        , e = -t
                        , i = t * 2
                        , s = $(this.slides[this.index]).width
                        , n = this.center ? t / 2 - s / 2 : 0
                        , o = new Set;
                    for (const r of [-1, 1]) {
                        let a = n + (r > 0 ? s : 0)
                            , l = 0;
                        do {
                            const h = this.slides[this.getIndex(this.index + r + l++ * r)];
                            a += $(h).width * r
                                , o.add(h)
                        } while (this.slides.length > l && a > e && a < i)
                    }
                    return Array.from(o)
                }
            }
        };

        function kl(t) {
            return Math.max(0, ...O(t).map(e => $(e).width))
        }
        var eo = {
            mixins: [qn]
            , data: {
                selItem: "!li"
            }
            , beforeConnect() {
                this.item = ht(this.selItem, this.$el)
            }
            , disconnected() {
                this.item = null
            }
            , events: [{
                name: "itemin itemout"
                , self: !0
                , el() {
                    return this.item
                }
                , handler(t) {
                    let {
                        type: e
                        , detail: {
                            percent: i
                            , duration: s
                            , timing: n
                            , dir: o
                        }
                    } = t;
                    G.read(() => {
                        if (!this.matchMedia)
                            return;
                        const r = this.getCss(so(e, o, i))
                            , a = this.getCss(io(e) ? .5 : o > 0 ? 1 : 0);
                        G.write(() => {
                            c(this.$el, r)
                                , S.start(this.$el, a, s, n).catch(T)
                        })
                    })
                }
            }, {
                name: "transitioncanceled transitionend"
                , self: !0
                , el() {
                    return this.item
                }
                , handler() {
                    S.cancel(this.$el)
                }
            }, {
                name: "itemtranslatein itemtranslateout"
                , self: !0
                , el() {
                    return this.item
                }
                , handler(t) {
                    let {
                        type: e
                        , detail: {
                            percent: i
                            , dir: s
                        }
                    } = t;
                    G.read(() => {
                        if (!this.matchMedia) {
                            this.reset();
                            return
                        }
                        const n = this.getCss(so(e, s, i));
                        G.write(() => c(this.$el, n))
                    })
                }
            }]
        };

        function io(t) {
            return Gt(t, "in")
        }

        function so(t, e, i) {
            return i /= 2
                , io(t) ^ e < 0 ? i : 1 - i
        }
        var Sl = {
                ...ss
                , fade: {
                    show() {
                        return [{
                            opacity: 0
                            , zIndex: 0
                        }, {
                            zIndex: -1
                        }]
                    }
                    , percent(t) {
                        return 1 - c(t, "opacity")
                    }
                    , translate(t) {
                        return [{
                            opacity: 1 - t
                            , zIndex: 0
                        }, {
                            zIndex: -1
                        }]
                    }
                }
                , scale: {
                    show() {
                        return [{
                            opacity: 0
                            , transform: he(1 + .5)
                            , zIndex: 0
                        }, {
                            zIndex: -1
                        }]
                    }
                    , percent(t) {
                        return 1 - c(t, "opacity")
                    }
                    , translate(t) {
                        return [{
                            opacity: 1 - t
                            , transform: he(1 + .5 * t)
                            , zIndex: 0
                        }, {
                            zIndex: -1
                        }]
                    }
                }
                , pull: {
                    show(t) {
                        return t < 0 ? [{
                            transform: z(30)
                            , zIndex: -1
                        }, {
                            transform: z()
                            , zIndex: 0
                        }] : [{
                            transform: z(-100)
                            , zIndex: 0
                        }, {
                            transform: z()
                            , zIndex: -1
                        }]
                    }
                    , percent(t, e, i) {
                        return i < 0 ? 1 - Pe(e) : Pe(t)
                    }
                    , translate(t, e) {
                        return e < 0 ? [{
                            transform: z(30 * t)
                            , zIndex: -1
                        }, {
                            transform: z(-100 * (1 - t))
                            , zIndex: 0
                        }] : [{
                            transform: z(-t * 100)
                            , zIndex: 0
                        }, {
                            transform: z(30 * (1 - t))
                            , zIndex: -1
                        }]
                    }
                }
                , push: {
                    show(t) {
                        return t < 0 ? [{
                            transform: z(100)
                            , zIndex: 0
                        }, {
                            transform: z()
                            , zIndex: -1
                        }] : [{
                            transform: z(-30)
                            , zIndex: -1
                        }, {
                            transform: z()
                            , zIndex: 0
                        }]
                    }
                    , percent(t, e, i) {
                        return i > 0 ? 1 - Pe(e) : Pe(t)
                    }
                    , translate(t, e) {
                        return e < 0 ? [{
                            transform: z(t * 100)
                            , zIndex: 0
                        }, {
                            transform: z(-30 * (1 - t))
                            , zIndex: -1
                        }] : [{
                            transform: z(-30 * t)
                            , zIndex: -1
                        }, {
                            transform: z(100 * (1 - t))
                            , zIndex: 0
                        }]
                    }
                }
            }
            , Tl = {
                mixins: [st, Ln, Zn, Qn]
                , props: {
                    ratio: String
                    , minHeight: Number
                    , maxHeight: Number
                }
                , data: {
                    ratio: "16:9"
                    , minHeight: !1
                    , maxHeight: !1
                    , selList: ".uk-slideshow-items"
                    , attrItem: "uk-slideshow-item"
                    , selNav: ".uk-slideshow-nav"
                    , Animations: Sl
                }
                , update: {
                    read() {
                        if (!this.list)
                            return !1;
                        let [t, e] = this.ratio.split(":").map(Number);
                        return e = e * this.list.offsetWidth / t || 0
                            , this.minHeight && (e = Math.max(this.minHeight, e))
                            , this.maxHeight && (e = Math.min(this.maxHeight, e)), {
                                height: e - se(this.list, "height", "content-box")
                            }
                    }
                    , write(t) {
                        let {
                            height: e
                        } = t;
                        e > 0 && c(this.list, "minHeight", e)
                    }
                    , events: ["resize"]
                }
                , methods: {
                    getAdjacentSlides() {
                        return [1, -1].map(t => this.slides[this.getIndex(this.index + t)])
                    }
                }
            }
            , Cl = {
                mixins: [st, On]
                , props: {
                    group: String
                    , threshold: Number
                    , clsItem: String
                    , clsPlaceholder: String
                    , clsDrag: String
                    , clsDragState: String
                    , clsBase: String
                    , clsNoDrag: String
                    , clsEmpty: String
                    , clsCustom: String
                    , handle: String
                }
                , data: {
                    group: !1
                    , threshold: 5
                    , clsItem: "uk-sortable-item"
                    , clsPlaceholder: "uk-sortable-placeholder"
                    , clsDrag: "uk-sortable-drag"
                    , clsDragState: "uk-drag"
                    , clsBase: "uk-sortable"
                    , clsNoDrag: "uk-sortable-nodrag"
                    , clsEmpty: "uk-sortable-empty"
                    , clsCustom: ""
                    , handle: !1
                    , pos: {}
                }
                , created() {
                    for (const t of ["init", "start", "move", "end"]) {
                        const e = this[t];
                        this[t] = i => {
                            xt(this.pos, ie(i))
                                , e(i)
                        }
                    }
                }
                , events: {
                    name: gt
                    , passive: !1
                    , handler: "init"
                }
                , computed: {
                    target() {
                        return (this.$el.tBodies || [this.$el])[0]
                    }
                    , items() {
                        return O(this.target)
                    }
                    , isEmpty: {
                        get() {
                            return pe(this.items)
                        }
                        , watch(t) {
                            H(this.target, this.clsEmpty, t)
                        }
                        , immediate: !0
                    }
                    , handles: {
                        get(t, e) {
                            let {
                                handle: i
                            } = t;
                            return i ? M(i, e) : this.items
                        }
                        , watch(t, e) {
                            c(e, {
                                    touchAction: ""
                                    , userSelect: ""
                                })
                                , c(t, {
                                    touchAction: Rt ? "none" : ""
                                    , userSelect: "none"
                                })
                        }
                        , immediate: !0
                    }
                }
                , update: {
                    write(t) {
                        if (!this.drag || !E(this.placeholder))
                            return;
                        const {
                            pos: {
                                x: e
                                , y: i
                            }
                            , origin: {
                                offsetTop: s
                                , offsetLeft: n
                            }
                            , placeholder: o
                        } = this;
                        c(this.drag, {
                            top: i - s
                            , left: e - n
                        });
                        const r = this.getSortable(document.elementFromPoint(e, i));
                        if (!r)
                            return;
                        const {
                            items: a
                        } = r;
                        if (a.some(S.inProgress))
                            return;
                        const l = El(a, {
                            x: e
                            , y: i
                        });
                        if (a.length && (!l || l === o))
                            return;
                        const h = this.getSortable(o)
                            , u = _l(r.target, l, o, e, i, r === h && t.moved !== l);
                        u !== !1 && (u && o === u || (r !== h ? (h.remove(o)
                                , t.moved = l) : delete t.moved
                            , r.insert(o, u)
                            , this.touched.add(r)))
                    }
                    , events: ["move"]
                }
                , methods: {
                    init(t) {
                        const {
                            target: e
                            , button: i
                            , defaultPrevented: s
                        } = t
                        , [n] = this.items.filter(o => P(e, o));
                        !n || s || i > 0 || Pi(e) || P(e, "." + this.clsNoDrag) || this.handle && !P(e, this.handle) || (t.preventDefault()
                            , this.touched = new Set([this])
                            , this.placeholder = n
                            , this.origin = {
                                target: e
                                , index: ee(n)
                                , ...this.pos
                            }
                            , k(document, Ge, this.move)
                            , k(document, At, this.end)
                            , this.threshold || this.start(t))
                    }
                    , start(t) {
                        this.drag = Al(this.$container, this.placeholder);
                        const {
                            left: e
                            , top: i
                        } = this.placeholder.getBoundingClientRect();
                        xt(this.origin, {
                                offsetLeft: this.pos.x - e
                                , offsetTop: this.pos.y - i
                            })
                            , x(this.drag, this.clsDrag, this.clsCustom)
                            , x(this.placeholder, this.clsPlaceholder)
                            , x(this.items, this.clsItem)
                            , x(document.documentElement, this.clsDragState)
                            , g(this.$el, "start", [this, this.placeholder])
                            , Il(this.pos)
                            , this.move(t)
                    }
                    , move(t) {
                        this.drag ? this.$emit("move") : (Math.abs(this.pos.x - this.origin.x) > this.threshold || Math.abs(this.pos.y - this.origin.y) > this.threshold) && this.start(t)
                    }
                    , end() {
                        if (Nt(document, Ge, this.move)
                            , Nt(document, At, this.end)
                            , !this.drag)
                            return;
                        Pl();
                        const t = this.getSortable(this.placeholder);
                        this === t ? this.origin.index !== ee(this.placeholder) && g(this.$el, "moved", [this, this.placeholder]) : (g(t.$el, "added", [t, this.placeholder])
                                , g(this.$el, "removed", [this, this.placeholder]))
                            , g(this.$el, "stop", [this, this.placeholder])
                            , ut(this.drag)
                            , this.drag = null;
                        for (const {
                                clsPlaceholder: e
                                , clsItem: i
                            } of this.touched)
                            for (const s of this.touched)
                                B(s.items, e, i);
                        this.touched = null
                            , B(document.documentElement, this.clsDragState)
                    }
                    , insert(t, e) {
                        x(this.items, this.clsItem);
                        const i = () => e ? zi(e, t) : L(this.target, t);
                        this.animate(i)
                    }
                    , remove(t) {
                        !P(t, this.target) || this.animate(() => ut(t))
                    }
                    , getSortable(t) {
                        do {
                            const e = this.$getComponent(t, "sortable");
                            if (e && (e === this || this.group !== !1 && e.group === this.group))
                                return e
                        } while (t = E(t))
                    }
                }
            };
        let no;

        function Il(t) {
            let e = Date.now();
            no = setInterval(() => {
                    let {
                        x: i
                        , y: s
                    } = t;
                    s += document.scrollingElement.scrollTop;
                    const n = (Date.now() - e) * .3;
                    e = Date.now()
                        , tt(document.elementFromPoint(i, t.y), /auto|scroll/).reverse().some(o => {
                            let {
                                scrollTop: r
                                , scrollHeight: a
                            } = o;
                            const {
                                top: l
                                , bottom: h
                                , height: u
                            } = rt(o);
                            if (l < s && l + 35 > s)
                                r -= n;
                            else if (h > s && h - 35 < s)
                                r += n;
                            else
                                return;
                            if (r > 0 && r < a - u)
                                return o.scrollTop = r
                                    , !0
                        })
                }
                , 15)
        }

        function Pl() {
            clearInterval(no)
        }

        function Al(t, e) {
            let i;
            if (["li", "tr"].some(s => ct(e, s))) {
                i = b("<div>")
                    , L(i, e.cloneNode(!0).children);
                for (const s of e.getAttributeNames())
                    w(i, s, e.getAttribute(s))
            } else
                i = e.cloneNode(!0);
            return L(t, i)
                , c(i, "margin", "0", "important")
                , c(i, {
                    boxSizing: "border-box"
                    , width: e.offsetWidth
                    , height: e.offsetHeight
                    , padding: c(e, "padding")
                })
                , J(i.firstElementChild, J(e.firstElementChild))
                , i
        }

        function El(t, e) {
            return t[bt(t, i => ze(e, i.getBoundingClientRect()))]
        }

        function _l(t, e, i, s, n, o) {
            if (!O(t).length)
                return;
            const r = e.getBoundingClientRect();
            if (!o)
                return Ol(t, i) || n < r.top + r.height / 2 ? e : e.nextElementSibling;
            const a = i.getBoundingClientRect()
                , l = oo([r.top, r.bottom], [a.top, a.bottom])
                , h = l ? s : n
                , u = l ? "width" : "height"
                , d = l ? "left" : "top"
                , f = l ? "right" : "bottom"
                , m = a[u] < r[u] ? r[u] - a[u] : 0;
            return a[d] < r[d] ? m && h < r[d] + m ? !1 : e.nextElementSibling : m && h > r[f] - m ? !1 : e
        }

        function Ol(t, e) {
            const i = O(t).length === 1;
            i && L(t, e);
            const s = O(t)
                , n = s.some((o, r) => {
                    const a = o.getBoundingClientRect();
                    return s.slice(r + 1).some(l => {
                        const h = l.getBoundingClientRect();
                        return !oo([a.left, a.right], [h.left, h.right])
                    })
                });
            return i && ut(e)
                , n
        }

        function oo(t, e) {
            return t[1] > e[0] && e[1] > t[0]
        }
        var Bl = {
            mixins: [le, _t, Us]
            , args: "title"
            , props: {
                delay: Number
                , title: String
            }
            , data: {
                pos: "top"
                , title: ""
                , delay: 0
                , animation: ["uk-animation-scale-up"]
                , duration: 100
                , cls: "uk-active"
            }
            , beforeConnect() {
                this.id = "uk-tooltip-" + this._uid
                    , this._hasTitle = It(this.$el, "title")
                    , w(this.$el, {
                        title: ""
                        , "aria-describedby": this.id
                    })
                    , Dl(this.$el)
            }
            , disconnected() {
                this.hide()
                    , w(this.$el, "title") || w(this.$el, "title", this._hasTitle ? this.title : null)
            }
            , methods: {
                show() {
                    this.isToggled(this.tooltip || null) || !this.title || (this._unbind = N(document, "keydown " + gt, this.hide, !1, t => t.type === gt && !P(t.target, this.$el) || t.type === "keydown" && t.keyCode === 27)
                        , clearTimeout(this.showTimer)
                        , this.showTimer = setTimeout(this._show, this.delay))
                }
                , async hide() {
                    F(this.$el, "input:focus") || (clearTimeout(this.showTimer)
                        , this.isToggled(this.tooltip || null) && (await this.toggleElement(this.tooltip, !1, !1)
                            , ut(this.tooltip)
                            , this.tooltip = null
                            , this._unbind()))
                }
                , _show() {
                    this.tooltip = L(this.container, '<div id="' + this.id + '" class="uk-' + this.$options.name + '" role="tooltip"> <div class="uk-' + this.$options.name + '-inner">' + this.title + "</div> </div>")
                        , k(this.tooltip, "toggled", (t, e) => {
                            if (!e)
                                return;
                            this.positionAt(this.tooltip, this.$el);
                            const [i, s] = Ml(this.tooltip, this.$el, this.pos);
                            this.origin = this.axis === "y" ? qe(i) + "-" + s : s + "-" + qe(i)
                        })
                        , this.toggleElement(this.tooltip, !0)
                }
            }
            , events: {
                focus: "show"
                , blur: "hide"
                , [jt + " " + oe](t) {
                    kt(t) || this[t.type === jt ? "show" : "hide"]()
                }
                , [gt](t) {
                    kt(t) && this.show()
                }
            }
        };

        function Dl(t) {
            We(t) || w(t, "tabindex", "0")
        }

        function Ml(t, e, i) {
            let [s, n] = i;
            const o = C(t)
                , r = C(e)
                , a = [
                    ["left", "right"]
                    , ["top", "bottom"]
                ];
            for (const h of a) {
                if (o[h[0]] >= r[h[1]]) {
                    s = h[1];
                    break
                }
                if (o[h[1]] <= r[h[0]]) {
                    s = h[0];
                    break
                }
            }
            const l = p(a[0], s) ? a[1] : a[0];
            return o[l[0]] === r[l[0]] ? n = l[0] : o[l[1]] === r[l[1]] ? n = l[1] : n = "center"
                , [s, n]
        }
        var Nl = {
            props: {
                allow: String
                , clsDragover: String
                , concurrent: Number
                , maxSize: Number
                , method: String
                , mime: String
                , msgInvalidMime: String
                , msgInvalidName: String
                , msgInvalidSize: String
                , multiple: Boolean
                , name: String
                , params: Object
                , type: String
                , url: String
            }
            , data: {
                allow: !1
                , clsDragover: "uk-dragover"
                , concurrent: 1
                , maxSize: 0
                , method: "POST"
                , mime: !1
                , msgInvalidMime: "Invalid File Type: %s"
                , msgInvalidName: "Invalid File Name: %s"
                , msgInvalidSize: "Invalid File Size: %s Kilobytes Max"
                , multiple: !1
                , name: "files[]"
                , params: {}
                , type: ""
                , url: ""
                , abort: T
                , beforeAll: T
                , beforeSend: T
                , complete: T
                , completeAll: T
                , error: T
                , fail: T
                , load: T
                , loadEnd: T
                , loadStart: T
                , progress: T
            }
            , events: {
                change(t) {
                    !F(t.target, 'input[type="file"]') || (t.preventDefault()
                        , t.target.files && this.upload(t.target.files)
                        , t.target.value = "")
                }
                , drop(t) {
                    wi(t);
                    const e = t.dataTransfer;
                    !(e != null && e.files) || (B(this.$el, this.clsDragover)
                        , this.upload(e.files))
                }
                , dragenter(t) {
                    wi(t)
                }
                , dragover(t) {
                    wi(t)
                        , x(this.$el, this.clsDragover)
                }
                , dragleave(t) {
                    wi(t)
                        , B(this.$el, this.clsDragover)
                }
            }
            , methods: {
                async upload(t) {
                    if (t = xi(t)
                        , !t.length)
                        return;
                    g(this.$el, "upload", [t]);
                    for (const s of t) {
                        if (this.maxSize && this.maxSize * 1e3 < s.size) {
                            this.fail(this.msgInvalidSize.replace("%s", this.maxSize));
                            return
                        }
                        if (this.allow && !ro(this.allow, s.name)) {
                            this.fail(this.msgInvalidName.replace("%s", this.allow));
                            return
                        }
                        if (this.mime && !ro(this.mime, s.type)) {
                            this.fail(this.msgInvalidMime.replace("%s", this.mime));
                            return
                        }
                    }
                    this.multiple || (t = t.slice(0, 1))
                        , this.beforeAll(this, t);
                    const e = zl(t, this.concurrent)
                        , i = async s => {
                            const n = new FormData;
                            s.forEach(o => n.append(this.name, o));
                            for (const o in this.params)
                                n.append(o, this.params[o]);
                            try {
                                const o = await ws(this.url, {
                                    data: n
                                    , method: this.method
                                    , responseType: this.type
                                    , beforeSend: r => {
                                        const {
                                            xhr: a
                                        } = r;
                                        a.upload && k(a.upload, "progress", this.progress);
                                        for (const l of ["loadStart", "load", "loadEnd", "abort"])
                                            k(a, l.toLowerCase(), this[l]);
                                        return this.beforeSend(r)
                                    }
                                });
                                this.complete(o)
                                    , e.length ? await i(e.shift()) : this.completeAll(o)
                            } catch (o) {
                                this.error(o)
                            }
                        };
                    await i(e.shift())
                }
            }
        };

        function ro(t, e) {
            return e.match(new RegExp("^" + t.replace(/\//g, "\\/").replace(/\*\*/g, "(\\/[^\\/]+)*").replace(/\*/g, "[^\\/]+").replace(/((?!\\))\?/g, "$1.") + "$", "i"))
        }

        function zl(t, e) {
            const i = [];
            for (let s = 0; s < t.length; s += e)
                i.push(t.slice(s, s + e));
            return i
        }

        function wi(t) {
            t.preventDefault()
                , t.stopPropagation()
        }
        var Fl = Object.freeze({
            __proto__: null
            , Countdown: Wa
            , Filter: Ga
            , Lightbox: ll
            , LightboxPanel: Wn
            , Notification: cl
            , Parallax: wl
            , Slider: $l
            , SliderParallax: eo
            , Slideshow: Tl
            , SlideshowParallax: eo
            , Sortable: Cl
            , Tooltip: Bl
            , Upload: Nl
        });
        return $t(Fl, (t, e) => it.component(e, t))
            , it
    });

</script>

 <script>
        function openStoryModal(userId) {
            const storyImage = document.getElementById('modalStoryImage');
            const storyCaption = document.getElementById('modalStoryCaption');

            // Construct the image source path
            storyImage.src = "{{ asset('images/community_stories/') }}/" + userId + ".jpg"; // Adjust file extension if needed

            // Set the caption
            storyCaption.textContent = "Story caption for user ID: " + userId;

            // Show the modal
            const modal = document.getElementById('storyModal');
            modal.classList.remove('hidden');
        }

        function closeStoryModal() {
            const modal = document.getElementById('storyModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
