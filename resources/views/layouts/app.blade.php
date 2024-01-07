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
    @if(!request()->is('booking*') && !request()->is('profile'))
        <div class="navbar">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Hotel Name or Location">
                <input type="date" class="date-input" placeholder="Check-in Date">
                <input type="date" class="date-input" placeholder="Check-out Date">
                <button class="search-btn">Search</button>
            </div>
        </div>
    @endif

    @yield('content')
    @stack('script')
</body>
</html>
