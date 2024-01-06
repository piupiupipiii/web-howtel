<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::with([
            'images',
            'facilities',
        ])->get();

        return view('home', ['hotels' => $hotels]);
    }
}
