@extends('layouts.app')

@section('content')
    <div class="navbar">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Hotel Name or Location">
            <input type="date" class="date-input" placeholder="Check-in Date">
            <input type="date" class="date-input" placeholder="Check-out Date">
            <button class="search-btn">Search</button>
        </div>
    </div>
    <div class="hotel">
        <div class="hotel-details">
            <div class="hotel-info">
                <h2>{{ $hotel->name }}</h2>
                <p>Hotel Bintang {{ $hotel->stars }}</p>
                <p>{{ $hotel->address }}</p>
            </div>
        </div>
        <div class="hotel-imager">
            @foreach($hotel->images as $image)
                <img src="{{ asset($image->path) }}" alt="{{ $image->alt }}">
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

        <div class="search-by-need">
            <table>
                <tr>
                    <td>
                        <h4>Search by Need</h4>
                        <label><input type="checkbox" data-need="free-cancellation"> Free Cancellation</label>
                        <label><input type="checkbox" data-need="free-breakfast"> Free Breakfast</label>
                        <label><input type="checkbox" data-need="extra-bed"> Extra Bed</label>
                        <label><input type="checkbox" data-need="large-bed"> Large Bed</label>
                        <button class="search-by-need-btn">Search</button>
                    </td>
                </tr>
            </table>
        </div>

        <table class="room-info-table">
            @foreach($hotel->rooms as $room)
                <tr class="room" data-needs="{{ implode(',', $room->getNeeds()) }}">
                    <td>
                        @foreach($room->images as $image)
                            <img
                                src="{{ asset($image->path) }}"
                                alt="{{ $image->alt }}"
                                style="max-width: 300px;"
                            >
                        @endforeach
                    </td>
                    <td>
                        <h5>{{ $room->name }}</h5>
                        <p class="room-description">{{ $room->description }}</p>
                    </td>
                    <td>
                        <form action="{{ route('booking.create') }}">
                            <input type="hidden" name="room" value="{{ $room->id }}">
                            <button type="submit" class="input-button">Pesan Kamar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pages/home/script.js') }}"></script>
@endpush
