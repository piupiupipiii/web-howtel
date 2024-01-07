<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.profile', ['user' => auth()->user()->with(['orders', 'orders.room.hotel'])->first() ]);
    }
}