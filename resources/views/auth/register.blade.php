
@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <!-- Name Field -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

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

                                <!-- Password Confirmation Field -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
