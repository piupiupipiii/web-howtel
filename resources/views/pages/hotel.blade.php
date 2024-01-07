@extends('layouts.app')

@section('content')
    <div class="hotel-list">

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
            <h3>Fasilitas</h3>
            <table class="facility-table">
                <tbody>
                    @foreach($hotel->facilities as $index => $facility)
                        @if ($index % 2 == 0)
                            <tr class="facility-row">
                        @endif
                        <td class="facility-item">
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
                        </td>
                        @if ($index % 2 != 0 || $index == count($hotel->facilities) - 1)
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


        <table class="room-info-table">
            @foreach($hotel->rooms as $room)
                <tr class="room">
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
                        <p class="room-price">Harga: Rp{{ $room->price }}/malam</p> <!-- Tambahkan ini -->
                    </td>

                    @auth
                        <td>
                            <form action="{{ route('booking.create') }}">
                                <input type="hidden" name="room" value="{{ $room->id }}">
                                <button type="submit" class="input-button">Pesan Kamar</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
</table>

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

