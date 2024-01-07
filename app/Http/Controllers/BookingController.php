<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        if (! $room = Room::with(['hotel'])->find((int) $request->room)) {
            abort(404);
        }

        return view('pages.booking', ['room' => $room]);
    }

    public function store(Request $request)
    {

    }
}
