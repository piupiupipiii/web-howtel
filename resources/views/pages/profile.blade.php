@extends('layouts.app')

@section('content')
    <ul>
        <li>Nama: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Phone: {{ $user->phone }}</li>
        <li>Mendaftar sejak {{ str($user->created_at)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}</li>
    </ul>

    <ol>
        @foreach($user->orders as $order)
            <li>
                <p>
                    Hotel {{ $order->room->hotel->name }}
                    Check-in {{ str($order->checkin_date)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}
                    Check-out {{ str($order->checkout_date)->toDate()->timezone('Asia/Jakarta')->toFormattedDateString() }}
                </p>

                <a href="{{ route('booking.detail', ['id' => $order->id]) }}">Detail</a>
            </li>
        @endforeach
    </ol>
@endsection

