<html>
<head>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="{{ asset('assets/css/function.js') }}" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:100,200,300,400" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}">
</head>
<body class="loading">

<main>
    @yield('content')
</main>

</body>
</html>
