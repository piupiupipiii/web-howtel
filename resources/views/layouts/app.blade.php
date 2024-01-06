<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    @stack('style')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" async></script>

    <title>Hotel Booking</title>
</head>
<body>
@yield('content')
@stack('script')
</body>
</html>
