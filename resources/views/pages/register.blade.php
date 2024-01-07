@extends('layouts.app')

@section('content')
    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <label>
            <input type="text" name="name" required>
        </label>
        <label>
            <input type="text" name="email" required>
        </label>
        <label>
            <input type="text" name="phone" required>
        </label>
        <label>
            <input type="password" name="password" required>
        </label>
        <button type="submit">Register</button>
    </form>
@endsection
