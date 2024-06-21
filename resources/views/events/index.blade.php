@extends('layouts.master_dashboard_layout')

@section('main_content')
    @php
        // Retrieve RSVPs for the authenticated user
        $userRSVPs = Auth::user()->rsvps->pluck('event_id')->toArray();
    @endphp
    <div class="mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
        <div>
            <h3 class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                Your Events
            </h3>
            <p class="mt-1 hidden sm:block">Recent Events </p>
        </div>
        <div>
            <p class="font-medium text-slate-700 dark:text-navy-100">
               Event Attendees
            </p>
            <div class="mt-2 flex space-x-2">
                <div class="avatar size-8">
                    <img class="mask is-squircle" src="{{asset('backend/images/avatar/avatar-12.jpg')}}" alt="avatar">
                </div>
                <div class="avatar size-8">
                    <img class="mask is-squircle" src="{{asset('backend/images/avatar/avatar-11.jpg')}}" alt="avatar">
                </div>
                <div class="avatar size-8">
                    <img class="mask is-squircle" src="{{asset('backend/images/avatar/avatar-18.jpg')}}" alt="avatar">
                </div>
                <div class="avatar size-8">
                    <img class="mask is-squircle" src="{{asset('backend/images/avatar/avatar-19.jpg')}}" alt="avatar">
                </div>
                <div class="avatar size-8">
                    <img class="mask is-squircle" src="{{asset('backend/images/avatar/avatar-20.jpg')}}" alt="avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4" id="events-container">
        <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
            All Events
        </h3>
        <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6" id="events-today">
            @foreach($allEvents as $event)
            <div class="card justify-between p-4 sm:p-5">
                <div class="flex items-center space-x-3">
                    <img class="size-16 shrink-0 rounded-lg object-cover" src="{{url('upload/events/'.$event->event_image)}}" alt="image">
                    <div>
                        <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                            {{$event->title}}
                        </h3>
                        <p class="text-xs">{{$event->description}}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-xs+">{{date('d M Y ',strtotime($event->event_date))}}</p>
                    <p class="text-xl font-medium text-slate-700 dark:text-navy-100">
                       {{date('H:i',strtotime($event->start_time))}} - {{date('H:i',strtotime($event->end_time))}}
                    </p>
                    <!-- Assuming you have a loop to display events -->
                    @auth
                        @if ($event->rsvps->where('user_id', Auth::id())->isEmpty())
                            <form action="/rsvp" method="POST">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="badge space-x-2 bg-secondary text-white mt-2">RSVP</button>
                            </form>
                        @else
                            <div class="badge space-x-2 bg-secondary text-white mt-3">
                                @if($event->rsvps->count()<1)
                                    {{ $event->rsvps->count() }} SMME Confirmed
                                @else
                                    {{ $event->rsvps->count() }} SMME(s) Confirmed
                                @endif
                            </div>
                        @endif
                            @if (in_array($event->id, $userRSVPs))
                            <!-- Cancel RSVP Button and Form -->
                            <form action="{{ route('rsvp.cancel') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="badge space-x-2 bg-secondary text-white mt-2">Cancel RSVP</button>
                            </form>
                            @endif
                    @endauth
                    <div class="mt-5 flex items-center justify-between space-x-2">
                        <div class="flex-space-x-3">
                                <div class="avatar size-8 hover:z-10">
                                    <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                        MM
                                    </div>
                                </div>
                        </div>
                        <a href="{{route('events.show',$event->id)}}" class="btn size-8 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <span class="mx-5">{{$allEvents->links('vendor.pagination.custom_pagination')}}</span>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
