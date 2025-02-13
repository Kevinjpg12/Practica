@extends('layouts.app')


@section('content')

<form action="{{ route('login_submit') }}" method="POST">
    @csrf
    <input type="text" name="email">
     @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <input type="text" name="password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <button type="submit">Login</button>
</form>

@endsection
