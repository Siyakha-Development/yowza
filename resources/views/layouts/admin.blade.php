<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Community Engagement Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="{{ asset('assets/images/CommunityEngagementPlatform_Icon.png') }}" rel="icon" type="image/png">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>




</head>

<body>

<div id="wrapper" class="is-verticle admin-panel">

    <!--  Header  -->

    <header class="is-transparent is-dark border-none" uk-sticky="cls-inactive:is-transparent is-dark">
        <div class="header_inner">
            <div class="left-side">

                <!-- Logo -->
                <div id="logo" >
                    <a href="{{ route('admin.dashboard.index') }}">
                        <img src="{{ asset('assets/images/CommunityEngagementPlatform_logo.jpg') }}" alt="" style="height: 46px !important; padding-left: 99px;">

                        <img src="{{ asset('assets/images/CommunityEngagementPlatform_logo.jpg') }}" class="logo_mobile" alt="">
                    </a>
                </div>
                <!-- icon menu for mobile -->
                <div class="triger" uk-toggle="target: #wrapper ; cls: is-active">
                </div>

            </div>
            <div class="right-side">

                <!-- Header search box  -->
                <div class="header_search"><i class="uil-search-alt"></i>
                    <input value="" type="text" class="form-control" placeholder=" Quick search for anything.." autocomplete="off">
                    <div uk-drop="mode: click;offset:10" class="header_search_dropdown">

                        <h4 class="search_title"> Recently </h4>
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="../assets/images/avatars/avatar-1.jpg" alt="" class="list-avatar">
                                    <div class="list-name">  Erica Jones </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/images/courses/img-3.jpg" alt="" class="list-avatar">
                                    <div class="list-name">  The Complete JavaScript For Beginners </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/images/courses/img-2.jpg" alt="" class="list-avatar">
                                    <div class="list-name">Learn Angular Fundamentals to Expert </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/images/courses/img-5.jpg" alt="" class="list-avatar">
                                    <div class="list-name"> Property Rent And Sale  </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../assets/images/courses/img-3.jpg" alt="" class="list-avatar">
                                    <div class="list-name">  Build Responsive Real World Websites</div>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div>

                    <!-- search icon for mobile -->
                    <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>


                    <!-- notification -->
                    <a href="#" class="header_widgets">
                        <ion-icon name="mail-outline" class="is-icon"></ion-icon>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown">
                        <div class="drop_headline">
                            <h4>Notifications </h4>
                            <div class="btn_action">
                                <div class="btn_action">
                                    <a href="#">
                                        <ion-icon name="settings-outline" uk-tooltip="title: Notifications settings ; pos: left"></ion-icon>
                                    </a>
                                    <a href="#">
                                        <ion-icon name="checkbox-outline" uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <ul class="dropdown_scrollbar" data-simplebar>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p> <strong>Adrian Mohani</strong> Like Your Comment On Course
                                            <span class="text-link">Javascript Introduction </span>
                                        </p>
                                        <span class="time-ago"> 2 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Stella Johnson</strong> Replay Your Comments in
                                            <span class="text-link">Programming for Games</span>
                                        </p>
                                        <span class="time-ago"> 9 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Alex Dolgove</strong> Added New Review In Course
                                            <span class="text-link">Full Stack PHP Developer</span>
                                        </p>
                                        <span class="time-ago"> 12 hours ago </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <p>
                                            <strong>Jonathan Madano</strong> Shared Your Discussion On Course
                                            <span class="text-link">Css Flex Box </span>
                                        </p>
                                        <span class="time-ago"> Yesterday </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="see-all">See all</a>
                    </div>

                    <!-- messages -->
                    <a href="#" class="header_widgets">
                        <ion-icon name="notifications-outline" class="is-icon"></ion-icon>
                        <span> 2 </span>
                    </a>
                    <div uk-drop="mode: click" class="header_dropdown">
                        <div class="drop_headline">
                            <h4>Messages </h4>
                            <div class="btn_action">
                                <a href="#">
                                    <ion-icon name="settings-outline" uk-tooltip="title: Message settings ; pos: left"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="checkbox-outline" uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <ul class="dropdown_scrollbar" data-simplebar>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> John menathon </strong> <span class="time"> 6:43 PM</span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Zara Ali </strong> <span class="time">12:43 PM</span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Mohamed Ali </strong> <span class="time"> Wed</span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> John menathon </strong> <span class="time"> Sun </span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Zara Ali </strong> <span class="time"> Fri </span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="drop_avatar"> <img src="../assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="drop_content">
                                        <strong> Mohamed Ali </strong> <span class="time">1 Week ago</span>
                                        <p> Lorem ipsum dolor sit amet, consectetur </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="see-all">See all</a>
                    </div>

                    <!-- profile -->
                    <a href="#" class="flex items-center space-x-2" style="color: #bbbbbb !important;">
                        @if($userId)
                            @php
                                $user = \App\Models\User::find($userId);
                            @endphp
                            @if($user && $user->profile_image)
                                <img src="{{ Storage::url($user->profile_image) }}" class="header_widgets_avatar mr-3" alt="">
                            @else
                                <img src="{{ asset('assets/images/avatars/placeholder.png') }}" class="header_widgets_avatar mr-3" alt="">
                            @endif
                        @else
                            <img src="{{ asset('assets/images/avatars/placeholder.png') }}" class="header_widgets_avatar mr-3" alt="">
                        @endif
                        <span class="sm:inline hidden" style="color: #bbbbbb !important;">  {{ Auth::user()->name }} </span>
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
{{--                        <div class="p-4 pb-2">--}}
{{--                            <div class="flex items-center space-x-3">--}}
{{--                                <div>--}}
{{--                                    <span class="text-gray-500 text-sm">Your earning</span>--}}
{{--                                    <div class="font-semibold my-1 text-2xl text-black"> $2,242.00 <div class="inline-flex items-baseline text-green-500 text-xs"> <i class="icon-feather-arrow-up"></i> 4.4% </div> </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a href="create-new-course.html" class="bg-blue-600 block font-bold mt-1 py-2 text-center rounded-md text-sm text-white w-full">Create New Course</a>--}}
{{--                        </div>--}}
                        <ul>
                            <li>
                                <hr>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.profile', ['id' => $userId]) }}">
                                    <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="card-outline" class="is-icon"></ion-icon>
                                    Subscriptions
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="color-wand-outline" class="is-icon"></ion-icon>
                                    My Billing
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <ion-icon name="settings-outline" class="is-icon"></ion-icon>
                                    Account Settings
                                </a>
                            </li>
                            <li>
                                <hr>
                            </li>
                            <li>
                                <a href="#" id="night-mode" class="btn-night-mode" onclick="UIkit.notification({ message: 'Hmm...  <strong> Night mode </strong> feature is not available yet. ' , pos: 'bottom-right'  })">
                                    <ion-icon name="moon-outline" class="is-icon"></ion-icon>
                                    Night mode
                                    <span class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="getElementById('logout-form').submit()">
                                    <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </header>


    <!-- sidebar -->

    <div class="main_content">
    @yield('content')
    <div class="sidebar">
        <div class="sidebar_inner" data-simplebar>

{{--            <div class="border-b flex flex-col items-center mt-8 pb-5 -mb-1.5">--}}
{{--                <div class="h-20 w-20 rounded-full overflow-hidden relative">--}}
{{--                    <img src="../assets/images/avatars/avatar-2.jpg" class="absolute object-cover w-full h-full">--}}
{{--                </div>--}}
{{--                <div class="mt-3">--}}
{{--                    <a href="#" class="capitalize font-semibold text-lg">  </a>--}}
{{--                    <div class="text-gray-500 text-sm"> </div>--}}
{{--                </div>--}}

{{--            </div>--}}

            <ul class="border-transparent">
                <li><a href="{{ route('admin.dashboard.index') }}">
                        <ion-icon name="home-outline" class="side-icon"></ion-icon>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li><a href="#">
                        <ion-icon name="book-outline" class="side-icon"></ion-icon>
                        <span> Resources</span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.blogs.index') }}">News</a></li>
                        <li><a href="{{ route('admin.call-to-actions.index') }}">Call To Actions</a></li>
                        @if (auth()->user()->hasRole('Corporate Customer / Donor / Funder', 'web') || auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                            <li><a href="{{ route('admin.projects.index') }}">Current Projects</a></li>
                        @endif
                        <li><a href="{{ route('admin.library.index') }}">Knowledge Centre</a></li>
                        @if (auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                            <li><a href="{{ route('admin.library.index') }}">Media Manager</a></li>
                        @endif

                    </ul>
                </li>


                @if (auth()->user()->hasRole('Social Enterprises (NPO / NGO / PBO / Schools / etc)', 'web') || auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                <li>
                    <a href="#">
                        <span class="icon-material-outline-face side-icon">
                                 </span>
                        <span> Volunteers</span>
                    </a>
                    <ul>
                        <li><a href="{{ route('admin.volunteers') }}"> View All Requests</a></li>
                        <li><a href="{{ route('admin.volunteers') }}"> View List of Volunteers </a></li>
                        <li><a href="{{ route('admin.rav') }}">
                                <span> Request a Volunteer</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li><a href="{{ route('admin.projects.index') }}">

                        <span class="icon-feather-folder-plus side-icon">

                                </span>
                        <span> Projects</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole('Corporate Customer / Donor / Funder', 'web') || auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                <li><a href="{{ route('admin.social-enterprises.index') }}">
                        <ion-icon name="chatbox-ellipses-outline" class="side-icon"></ion-icon>
                        <span> Social Enterprises</span>
                    </a>
                </li>
                @endif

                <li><a href="{{ route('admin.contact-us') }}">
                        <span class="icon-feather-phone side-icon"></span>
                        <span> Get In Touch</span>
                    </a>
                </li>
{{--                <li><a href="payout.html">--}}
{{--                        <span class="icon-material-outline-contact-support side-icon">--}}

{{--                                 </span>--}}
{{--                        <span> Get in Touch</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li><a href="setting.html">
                        <ion-icon name="settings-outline" class="side-icon"></ion-icon>
                        <span> Setting</span>
                    </a>
                    <ul>
                        <li><a href="setting.html"> General setting </a></li>
                        <li><a href="setting.html"> Notifications </a></li>
                        @if (auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                        <li><a href="{{ route('admin.users.index') }}"> User Management </a></li>
                        <li><a href="{{ route('admin.roles.index') }}"> Role Management </a></li>
                        @endif
                    </ul>
                </li>
            </ul>
            <ul class="side_links" data-sub-title="">
                @if (auth()->user()->hasRole('Social Enterprises (NPO / NGO / PBO / Schools / etc)', 'web') || auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                <li><a href="{{ route('admin.profile') }}">
                        <ion-icon name="person-outline" class="side-icon"></ion-icon>
                        <span> Manage profile </span>
                    </a>
                </li>
                @endif

                    @if (auth()->user()->hasRole('Corporate Customer / Donor / Funder', 'web') || auth()->user()->hasRole('Administrator (can create other users)', 'web'))
                        <li><a href="{{ route('admin.funders-profile.index') }}">
                                <ion-icon name="person-outline" class="side-icon"></ion-icon>
                                <span> Manage profile </span>
                            </a>
                        </li>
                    @endif
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <ion-icon name="log-out-outline" class="side-icon"></ion-icon>
                        <span> logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>

{{--        <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>--}}
    </div>
{{--    <div class="lg:mt-28 mt-10 mb-7 px-12 border-t pt-7" style="position: fixed; bottom: 0; width: 100%;">--}}
{{--        <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">--}}
{{--            <p class="capitalize font-medium"> © copyright 2024 by Siyakha</p>--}}
{{--            <div class="lg:flex space-x-4 text-gray-700 capitalize hidden">--}}

{{--                <a href="{{ route('faq') }}" style="color: #000 !important;"> FAQs</a>--}}
{{--                <a href="{{ route('terms-and-conditions') }}" style="color: #000 !important;"> Terms</a>--}}
{{--                <a href="{{ route('privacy-policy') }}" style="color: #000 !important;"> Privacy</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>


<!-- Javascript
================================================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/uikit.js') }}"></script>
<script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>


<style>
    .to-purple-400 {
        --tw-gradient-to: #000000 !important;
    }

    .from-purple-600 {
        --tw-gradient-from: #000000 !important;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(124, 58, 237, 0)) !important;
    }
</style>

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="{{ asset('assets/js/chart.min.js') }}"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Inter";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            // Information about the dataset
            datasets: [{
                label: "Sales",
                backgroundColor: 'rgba(42,65,232,0.08)',
                borderColor: '#2a41e8',
                borderWidth: "3",
                data: [196,132,215,362,210,252],
                pointRadius: 5,
                pointHoverRadius:5,
                pointHitRadius: 10,
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointBorderWidth: "2",
            }]
        },

        // Configuration options
        options: {

            layout: {
                padding: 10,
            },

            legend: { display: false },
            title:  { display: false },

            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        borderDash: [6, 10],
                        color: "#d8d8d8",
                        lineWidth: 1,
                    },
                }],
                xAxes: [{
                    scaleLabel: { display: false },
                    gridLines:  { display: false },
                }],
            },

            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },


    });

</script>



</body>

</html>
