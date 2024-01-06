<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(int $id, Request $request)
    {
        $hotel = Hotel::with(['images', 'facilities', 'rooms'])->find($id);

        return view('hotel', ['hotel' => $hotel]);
    }
}
