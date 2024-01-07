@extends('layouts.app')

@section('content')
    <div class="navbar">
        <div class="search-container">
            <input type="text" class="search-input" id="searchInput" placeholder="Hotel Name or Location">
            <input type="date" class="date-input" placeholder="Check-in Date">
            <input type="date" class="date-input" placeholder="Check-out Date">
            <button class="search-btn">Search</button>
        </div>
    </div>

    <div class="hotel-list">
        <!-- Daftar hotel akan ditampilkan di sini -->
        @foreach($hotels as $hotel)


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
                    <h3>Fasilitas</h3>
                    <div class="facility-container">
                        @foreach($hotel->facilities as $facility)
                            <div class="facility-item">
                                <div class="facility-icon">
                                    @if(str($facility->icon)->startsWith('bi'))
                                        <i class="{{ $facility->icon }}"></i>
                                    @else
                                        <img src="{{ asset($facility->icon) }}" alt="icon" style="width: 20px; height: 20px;">
                                    @endif
                                </div>
                                <div class="facility-text">
                                    <span>{{ $facility->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
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

 <!-- Script -->
@push('script')
    <script src="{{ asset('assets/js/pages/home/script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', performSearch);

            $('.search-btn').on('click', filterRooms);
        });

        function performSearch() {
            var searchQuery = document.getElementById('searchInput').value.toLowerCase();
            var hotels = document.querySelectorAll('.hotel-info h2');

            hotels.forEach(function (hotel) {
                var hotelName = hotel.textContent.toLowerCase();
                var parentHotel = hotel.closest('.hotel');
                var isVisible = hotelName.includes(searchQuery);

                parentHotel.style.display = isVisible ? 'block' : 'none';
            });
        }

        function filterRooms() {
            var selectedNeeds = $('input[data-need]:checked').map(function () {
                return $(this).data('need');
            }).get();

            $('.room-info-table tr').hide();

            if (selectedNeeds.length > 0) {
                selectedNeeds.forEach(function (need) {
                    $('.room-info-table tr[data-needs*="' + need + '"]').show();
                });
            } else {
                $('.room-info-table tr').show();
            }
        }
    </script>
@endpush
