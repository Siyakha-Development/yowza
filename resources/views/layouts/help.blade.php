<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Community Engagement Platform</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/images/CommunityEngagementPlatform_Icon.png') }}" rel="icon" type="image/png">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

    <!-- CSS
      ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{--    <script src="resources/js/app.js"></script>--}}
{{--    <link rel="stylesheet" href="resources/sass/app.scss">--}}


    <style>
        input , .bootstrap-select.btn-group button{
            background-color: #f3f4f6  !important;
            height: 44px  !important;
            box-shadow: none  !important;
        }

        .w-32 {
            width: 4rem !important;
        }
    </style>
</head>
<body>
<div id="wrapper" class="horizontal">
    <!--  Header  -->
    <header uk-sticky>
        <div class="header_inner">
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="/">
                        <img src="{{ asset('assets/images/CommunityEngagementPlatform_logo.jpg') }}" alt="">
                        <img src="{{ asset('assets/images/CommunityEngagementPlatform_logo.jpg') }}" class="logo_inverse" alt="">
                        <img src="{{ asset('assets/images/CommunityEngagementPlatform_logo.jpg') }}" class="logo_mobile" alt="">
                    </a>

                </div>
                <!-- icon menu for mobile -->
                <div class="triger" uk-toggle="target: .header_menu ; cls: is-visible"></div>
                <!-- menu bar for mobile -->
                <nav class="header_menu">
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="#">Courses</a>--}}
{{--                            <div uk-drop="mode: click" class="category-dropdown">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="newspaper-outline" class="is-icon"></ion-icon>--}}
{{--                                            Web Development--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="leaf-outline" class="is-icon"></ion-icon>--}}
{{--                                            Mobile App--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="briefcase-outline" class="is-icon"></ion-icon>--}}
{{--                                            Business--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="color-palette-outline" class="is-icon"></ion-icon>--}}
{{--                                            Desings--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="megaphone-outline" class="is-icon"></ion-icon>--}}
{{--                                            Marketing--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="camera-outline" class="is-icon"></ion-icon>--}}
{{--                                            Photography--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="courses.html">--}}
{{--                                            <ion-icon name="accessibility-outline" class="is-icon"></ion-icon>--}}
{{--                                            Life Style--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="categories.html" class="active">Categories </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="episodes.html">Episode  </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="books.html">Book  </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="blog.html">Blog</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Pages</a>--}}
{{--                            <div uk-drop="mode: click" class="menu-dropdown">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-pricing.html">Pricing</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-faq.html">Faq </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-help.html">Help </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-terms.html">Terms </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-setting.html">Setting </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Development </a>--}}
{{--                                        <div class="menu-dropdown" uk-drop="mode: click;pos:right-top;animation: uk-animation-slide-right-small">--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="development-elements.html">Elements  </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="development-components.html">Compounents </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="development-plugins.html">Plugins </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="development-icons.html">Icons </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-cart.html">Shopping cart </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-payment-info.html">Payment methods </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-account-info.html">Account info </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </nav>
                <!-- overly for small devices -->
                <div class="overly" uk-toggle="target: .header_menu ; cls: is-visible"></div>
            </div>
            <div class="right-side">
                <!-- cart -->

                <!-- notification -->
{{--                <a href="#" class="header_widgets">--}}
{{--                    <ion-icon name="mail-outline" class="is-icon"></ion-icon>--}}
{{--                </a>--}}
{{--                <div uk-drop="mode: click" class="header_dropdown">--}}
{{--                    <div class="drop_headline">--}}
{{--                        <h4>Notifications </h4>--}}
{{--                        <div class="btn_action">--}}
{{--                            <div class="btn_action">--}}
{{--                                <a href="#">--}}
{{--                                    <ion-icon name="settings-outline" uk-tooltip="title: Notifications settings ; pos: left"></ion-icon>--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <ion-icon name="checkbox-outline" uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <ul class="dropdown_scrollbar" data-simplebar>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <p>--}}
{{--                                        <strong>Adrian Mohani</strong>--}}
{{--                                        Like Your Comment On Course--}}
{{--                                        <span class="text-link">Javascript Introduction </span>--}}
{{--                                    </p>--}}
{{--                                    <span class="time-ago">2 hours ago </span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-2.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <p>--}}
{{--                                        <strong>Stella Johnson</strong>--}}
{{--                                        Replay Your Comments in--}}
{{--                                        <span class="text-link">Programming for Games</span>--}}
{{--                                    </p>--}}
{{--                                    <span class="time-ago">9 hours ago </span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-3.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <p>--}}
{{--                                        <strong>Alex Dolgove</strong>--}}
{{--                                        Added New Review In Course--}}
{{--                                        <span class="text-link">Full Stack PHP Developer</span>--}}
{{--                                    </p>--}}
{{--                                    <span class="time-ago">12 hours ago </span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <p>--}}
{{--                                        <strong>Jonathan Madano</strong>--}}
{{--                                        Shared Your Discussion On Course--}}
{{--                                        <span class="text-link">Css Flex Box </span>--}}
{{--                                    </p>--}}
{{--                                    <span class="time-ago">Yesterday </span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <a href="#" class="see-all">See all</a>--}}
{{--                </div>--}}
                <!-- messages -->
{{--                <a href="#" class="header_widgets">--}}
{{--                    <ion-icon name="notifications-outline" class="is-icon"></ion-icon>--}}
{{--                    <span>2 </span>--}}
{{--                </a>--}}
{{--                <div uk-drop="mode: click" class="header_dropdown">--}}
{{--                    <div class="drop_headline">--}}
{{--                        <h4>Messages </h4>--}}
{{--                        <div class="btn_action">--}}
{{--                            <a href="#">--}}
{{--                                <ion-icon name="settings-outline" uk-tooltip="title: Message settings ; pos: left"></ion-icon>--}}
{{--                            </a>--}}
{{--                            <a href="#">--}}
{{--                                <ion-icon name="checkbox-outline" uk-tooltip="title: Mark as read all ; pos: left"></ion-icon>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <ul class="dropdown_scrollbar" data-simplebar>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>John menathon </strong>--}}
{{--                                    <span class="time">6:43 PM</span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-2.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>Zara Ali </strong>--}}
{{--                                    <span class="time">12:43 PM</span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-3.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>Mohamed Ali </strong>--}}
{{--                                    <span class="time">Wed</span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>John menathon </strong>--}}
{{--                                    <span class="time">Sun </span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-2.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>Zara Ali </strong>--}}
{{--                                    <span class="time">Fri </span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <div class="drop_avatar">--}}
{{--                                    <img src="../assets/images/avatars/avatar-3.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="drop_content">--}}
{{--                                    <strong>Mohamed Ali </strong>--}}
{{--                                    <span class="time">1 Week ago</span>--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur </p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <a href="#" class="see-all">See all</a>--}}
{{--                </div>--}}
                <!-- profile -->
                @guest
                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="py-3 px-4">Login</a>
                        @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                            @endif
                    </div>
                @else
                <a href="#">
                    <img src="../assets/images/avatars/placeholder.png" class="header_widgets_avatar" alt="">
                </a>
                <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                    <ul>
                        <li>
                            <a href="#" class="user">
                                <div class="user_avatar">
                                    <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                </div>
                                <div class="user_name">
                                    <div>{{ Auth::user()->name }} </div>
                                    <span>{{ Auth::user()->email }} </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr>
                        </li>

                        <li>
                            <hr>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.index') }}">
                                <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                                My Dashboard

                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <ion-icon name="card-outline" class="is-icon"></ion-icon>--}}
{{--                                Subscriptions--}}

{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <ion-icon name="color-wand-outline" class="is-icon"></ion-icon>--}}
{{--                                My Billing--}}

{{--                            </a>--}}
{{--                        </li>--}}
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
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                                Log Out

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @endguest
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <div class="lg:mb-5 py-3 uk-link-reset">
        <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
            <div class="flex space-x-2 text-gray-700 uppercase text-black">
                <a href="{{ route('faq') }}" style="color: #000 !important;"> FAQs</a>
                <a href="{{ route('terms-and-conditions') }}" style="color: #000 !important;"> Terms</a>
                <a href="{{ route('privacy-policy') }}" style="color: #000 !important;"> Privacy</a>
            </div>
            <p class="capitalize"> © copyright 2024 by Siyakha</p>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/uikit.js') }}"></script>
<script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

</body>
</html>
