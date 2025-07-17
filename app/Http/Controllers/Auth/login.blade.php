@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Login</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <!-- Submit -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
@endsection
