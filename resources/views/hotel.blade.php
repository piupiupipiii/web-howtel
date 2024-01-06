@extends('layouts.app')

@section('content')
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
    </div>

    <div class="hotel">
        <div class="hotel-details">
            <div class="hotel-info">
                <h2>Hotel Santika</h2>
                <p>Hotel Bintang</p>
                <p>LJl. Sumatera No. 52-54, Bandung Wetan, 40115 Bandung, Indonesia</p>
            </div>
        </div>
        <div class="hotel-imager">
            <img src="Hotel Santika Bandung.jpeg" alt="Gambar Hotel">
        </div>

        <div class="facilities">
            <table>
                <tr>
                    <td>
                        <h3>Fasilitas</h3>
                        <div class="wifi-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wifi" viewBox="0 0 16 16">
                                <path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/>
                                <path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z"/>
                            </svg>
                            <span>WiFi</span>
                        </div>
                        <div class="parking-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-p-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.5 4.002V12h1.283V9.164h1.668C10.033 9.164 11 8.08 11 6.586c0-1.482-.955-2.584-2.538-2.584H5.5Zm2.77 4.072c.893 0 1.419-.545 1.419-1.488s-.526-1.482-1.42-1.482H6.778v2.97z"/>
                            </svg>
                            <span>Parkir</span>
                        </div>
                    </td>
                    <td>
                        <div class="hours-container">
                            <img src="24-hours-phone-service.png" alt="hours icon" style="width: 22px; height: 22px;">
                            <span>24 Hours Service</span>
                        </div>
                        <div class="restaurant-container">
                            <img src="restaurant.png" alt="restaurant icon" style="width: 20px; height: 20px;">
                            <span>Restaurant</span>
                        </div>
                    </td>
                    <td>
                        <div class="ac-container">
                            <img src="air-conditioner.png" alt="AC icon" style="width: 22px; height: 22px;">
                            <span>AC</span>
                        </div>
                        <div class="elevator-container">
                            <img src="elevator.png" alt="elevator icon" style="width: 22px; height: 22px;">
                            <span>Elevator</span>
                        </div>
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
                    </td>
                </tr>
                <table class="room-info-table">
                    <tr>
                        <td>
                            <img src="superior_santika.jpeg" alt="Gambar Kamar" style="max-width: 300px;">
                        </td>
                        <td>
                            <h5>Superior Room</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.</p>
                        </td>
                        <td>
                            <input type="button" class="input-button" value="Pesan Kamar">
                        </td>
                    </tr>
                    <table class="room-info-table">
                        <tr>
                            <td>
                                <img src="deluxe_santika.jpeg" alt="Gambar Kamar" style="max-width: 300px;">
                            </td>
                            <td>
                                <h5>Deluxe Room</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.</p>
                            </td>
                            <td>
                                <input type="button" class="input-button" value="Pesan Kamar">
                            </td>
                        </tr>
                        <table class="room-info-table">
                            <tr>
                                <td>
                                    <img src="executive_santika.jpeg" alt="Gambar Kamar" style="max-width: 300px;">
                                </td>
                                <td>
                                    <h5>Executive Room</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.</p>
                                </td>
                                <td>
                                    <input type="button" class="input-button" value="Pesan Kamar">
                                </td>
                            </tr>
                        </table>
                    </table>
                </table>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pages/home/script.js') }}"></script>
@endpush
