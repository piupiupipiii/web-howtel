@extends('layouts.app')

@section('content')
    @if(session('login_invalid'))
        <p>Login gagal</p>
    @endif

    <form action="{{ route('login.authenticate') }}" method="post">
        @csrf
        <label>
            <input type="text" name="email" required>
        </label>
        <label>
            <input type="password" name="password" required>
        </label>
        <button type="submit">Login</button>
    </form>
@endsection
