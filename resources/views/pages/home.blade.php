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

            @if($image = $hotel->images->first())
                <div class="hotel-imager">
                    <img src="{{ $image->path }}" alt="{{ $image->alt }}">
                </div>
            @endif

            <div class="facilities">
            <h3>Fasilitas</h3>
                <table class="facility-table">
                    <tr>
                        <td>
                            
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
                        </td>
                    </tr>
                </table>
            </div>


            <a href="{{ route('hotel', ['id' => $hotel->id]) }}" class="button-detail">Detail</a>

        </div>
    @endforeach
@endsection

