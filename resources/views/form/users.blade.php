@extends('base')

@section('content')
<header>
    <h1>Create New User</h1>
</header>

<section class="container mt-4">
    <form action="{{ url('/users') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-start d-block">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter user's name" required value="{{ old('name') }}">
            @error('name')
                <div class="text-danger text-start d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-start d-block">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter user's email" required autocomplete="new-password" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger text-start d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="referral_code" class="form-label text-start d-block">Referral Code</label>
            <input type="text" name="referral_code" id="referral_code" class="form-control" placeholder="Enter referral code (optional)">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-start d-block">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required autocomplete="new-password" value="{{ old('password') }}">
            @error('password')
                <div class="text-danger text-start d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Create User</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ url('/users') }}'">Cancel</button>
        </div>
    </form>
</section>

@endsection
