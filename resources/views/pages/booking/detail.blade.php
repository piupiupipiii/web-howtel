@extends('layouts.app')

@section('content')
    <p>Booking berhasil!</p>

    <div>
        Informasi booking:

        <ul>
            <li>Hotel: {{ $order->room->hotel->name }} ({{ $order->room->hotel->address }})</li>
            <li>Kamar: {{ $order->room->name }}</li>
            <li>Check-in: {{ $order->check_in }}</li>
            <li>Check-out: {{ $order->check_out }}</li>
            <li>Check-out: {{ $order->name ?: auth()->user()->name }}</li>
            <li>Harga: Rp{{ number_format($order->payment->price, 0, ',', '.') }}</li>
        </ul>

        <div>
            <img src="{!! $qr !!}" alt="QR">
        </div>
    </div>

    @if(str($order->check_in)->toDate() > now()->addDays(3))
        <form action="{{ route('booking.cancel') }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $order->id }}">
            <button type="submit">Batalkan</button>
        </form>
    @endif
@endsection
