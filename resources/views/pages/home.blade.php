@extends('layouts.app')

@section('content')
    @foreach($hotels as $hotel)
        <div class="hotel">
            <div class="hotel-details">
                <div class="hotel-info">
                    <h2>{{ $hotel->name }}</h2>
                    <p>Hotel Bintang {{ $hotel->stars }}</p>
                    <p>{{ $hotel->address }}</p>
                </div>
            </div>
            <div class="hotel-imager">
                <img src="{{ $hotel->images->first()->path }}" alt="{{ $hotel->images->first()->alt }}">
            </div>

            <div class="facilities">
                <table>
                    <tr>
                        <td>
                            <h3>Fasilitas</h3>
                            @foreach($hotel->facilities as $facility)
                                <div class="{{ str($facility->name)->slug() }}-container">
                                    @if(str($facility->icon)->startsWith('bi'))
                                        <i class="{{ $facility->icon }}"></i>
                                    @else
                                        <img
                                            src="{{ asset($facility->icon) }}"
                                            alt="icon"
                                            style="width: 20px; height: 20px;"
                                        >
                                    @endif
                                    <span>{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>

            <a href="{{ route('hotel', ['id' => $hotel->id]) }}">Detail</a>
        </div>
    @endforeach
@endsection

