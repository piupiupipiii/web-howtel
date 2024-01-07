@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/book.css') }}">
@endpush

@section('content')
    <p>
        Anda akan booking di hotel <b>{{ $room->hotel->name }}</b> ({{ $room->hotel->address }})
        dengan kamar <b>{{ $room->name }}</b>
    </p>

    <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="for_themself" value="0">

        <div class="elem-group">
            <label for="for-themself">Pesan untuk diri sendiri</label>
            <input type="checkbox" id="for-themself" name="for_themself" value="1" checked>
        </div>
        <div class="elem-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="visitor_name" pattern="[A-Z\sa-z]{3,20}" required value="{{ auth()->user()->name }}">
        </div>
        <div class="elem-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="visitor_email" required value="{{ auth()->user()->email }}">
        </div>
        <div class="elem-group">
            <label for="phone">Nomor Telepon</label>
            <input type="tel" id="phone" name="visitor_phone" pattern="(\d{3})-?\s?(\d{3})-?\s?(\d{4})" required value="{{ auth()->user()->phone }}">
        </div>
        <div class="elem-group inlined">
            <label for="adult">Orang Dewasa</label>
            <input type="number" id="adult" name="total_adults" min="1" required value="2">
        </div>
        <div class="elem-group inlined">
            <label for="child">Anak-Anak</label>
            <input type="number" id="child" name="total_children" min="0" required value="0">
        </div>
        <div class="elem-group inlined">
            <label for="date">Check-in</label>
            <input type="date" id="date" name="checkin_date" required value="{{ now()->toDateString() }}">
        </div>
        <div class="elem-group inlined">
            <label for="checkout-date">Check-out</label>
            <input type="date" id="checkout-date" name="checkout_date" required value="{{ now()->addDay()->toDateString() }}">
        </div>
        <hr>
        <div class="elem-group">
            <label for="message">Butuh yang lain?</label>
            <textarea
                id="message"
                name="visitor_message"
                placeholder="Beritahu kami jika ada tambahan yang dibutuhkan"
            ></textarea>
        </div>

        <button type="submit">Booking Room</button>
    </form>
@endsection
