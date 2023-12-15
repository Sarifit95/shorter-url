

@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection
