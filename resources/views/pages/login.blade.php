@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="post">
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
