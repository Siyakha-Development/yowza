<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lineone.piniastudio.com/dashboards-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 14:30:36 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{asset('backend/images/Yowza_Icon_400px.png')}}" />

    <!-- CSS Assets -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/marketplace.css')}}" />


    <!-- Javascript Assets -->
    <script src="{{asset('backend/js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="stylesheet" href="./node_modules/apexcharts/dist/apexcharts.css">

    <script src="./node_modules/lodash/lodash.min.js"></script>
    <script src="./node_modules/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>




    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");

    </script>
    @vite(['resources/js/app.js'])

</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader Removed-->


    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        @include('partials_.sidebar')
        <!--Sidebar ends here -->

        <!-- App Header Wrapper-->
        @include('partials_.header')
        <!-- App Header Wrapper ends here -->

        <!-- Mobile Searchbar -->
        @include('partials_.mobile_search_bar')
        <!-- Mobile Searchbar ends here  -->

        <!-- Right Sidebar -->
        @include('partials_.right_bar')
        <!-- Right Sidebar  ends here -->
        <!-- Main Content Wrapper -->
        <main class="main-content w-full place-items-center px-[var(--margin-x)] pb-12">
            @yield('marketplace_content')
        </main>
    </div>
    <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());

        document.addEventListener('DOMContentLoaded', function() {
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif

            @if($errors -> any())
            var errors = {
                !!json_encode($errors-> all()) !!
            };
            errors.forEach(function(error) {
                toastr.error(error);
            });
            @endif
        });




    </script>

    <style>
        .tox .tox-statusbar__branding a {
    align-items: center;
    display: none !important;
}
    </style>
    <script>
        async function handleCardClick(card, url) {
            // Toggle the dark background
            toggleDarkBackground(card);

            // Redirect to the specified URL
            window.location.href = url;
        }

        function toggleDarkBackground(card) {
            card.classList.toggle('dark');
        }

    </script>
    <script src="https://cdn.tiny.cloud/1/7848drnfikg76o7xgogp561fchodvpdj4rz5aze1ze188tuw/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</body>
<!-- Mirrored from lineone.piniastudio.com/dashboards-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 14:30:37 GMT -->
</html>
