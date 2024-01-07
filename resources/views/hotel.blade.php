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
    @if(isset($hotels) && count($hotels) > 0)
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
                                            <img src="{{ asset($facility->icon) }}" alt="icon" style="width: 20px; height: 20px;">
                                        @endif
                                        <span>{{ $facility->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>

                <a href="{{ route($name) }}"></a>

                @foreach($hotel->rooms as $room)
                    <div class="room">
                        <img src="{{ $room->image }}" alt="Gambar Kamar" style="max-width: 300px;">
                        <h5>{{ $room->name }}</h5>
                        <p>{{ $room->description }}</p>
                        <a href="{{ route('booking', ['hotel_id' => $hotel->id, 'room_id' => $room->id]) }}">Pesan Kamar</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

        
    @push('script')
        <script src="{{ asset('assets/js/pages/home/script.js') }}"></script>
    @endpush

@endsection