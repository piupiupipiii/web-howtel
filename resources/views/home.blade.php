@extends('layouts.app')

@section('content')
    <div class="navbar">
        <!-- Your existing search container code here -->
    </div>

    <div class="hotel">
        <div class="hotel-details">
            <div class="hotel-info">
                <h2>{{ $hotel->name }}</h2>
                <p>Hotel Bintang {{ $hotel->stars }}</p>
                <p>{{ $hotel->address }}</p>
            </div>
        </div>
        <div class="hotel-content">
            <div class="hotel-image">
                @foreach($hotel->images as $image)
                    <img src="{{ asset($image->path) }}" alt="{{ $image->alt }}" class="hotel-img">
                @endforeach
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
            <div class="detail-button">
                <form action="{{ route('booking.create') }}">
                    <input type="hidden" name="hotel" value="{{ $hotel->id }}">
                    <button type="submit" class="input-button">Detail Hotel</button>
                </form>
            </div>
        </div>
    </div>

    <div class="search-by-need">
        <!-- Your existing search by need code here -->
    </div>
@endsection
