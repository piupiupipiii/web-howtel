<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('book.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    <title>Hotel Booking</title>
</head>
<body>

<form action="{{ url('/booking') }}" method="post">
    @csrf <!-- Tambahkan ini untuk perlindungan CSRF -->
    <div class="elem-group">
        <label for="name">Nama</label>
        <input type="text" id="name" name="visitor_name" pattern="[A-Z\sa-z]{3,20}" required>
    </div>
    <div class="elem-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="visitor_email" required>
    </div>
    <div class="elem-group">
        <label for="phone">No Telp</label>
        <input type="tel" id="phone" name="visitor_phone" pattern="(\d{3})-?\s?(\d{3})-?\s?(\d{4})" required> 
    </div>
    <div class="elem-group inlined">
        <label for="adult">Orang Dewasa</label>
        <input type="number" id="adult" name="total_adults" min="1" required> 
    </div>
    <div class="elem-group inlined">
        <label for="child">Anak-Anak</label>
        <input type="number" id="child" name="total_children" min="0" required> 
    </div>
    <div class="elem-group inlined">
        <label for="checkin-date">Check-in</label>
        <input type="date" id="date" name="checkin_date" required> 
    </div>
    <div class="elem-group inlined">
        <label for="checkout-date">Check-out</label>
        <input type="date" id="checkout-date" name="checkout_date" required>
    </div>
    <hr>
    <div class="elem-group">
        <label for="message">Butuh yang lain?</label>
        <textarea id="message" name="visitor_message" placeholder="Beritahu kami jika ada tambahan yang dibutuhkan" required></textarea>
    </div>
    <button type="submit">Booking Room</button>    
</form>
</body>
</html>
