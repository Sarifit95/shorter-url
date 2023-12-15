<section>
















    <div class="container mt-5">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post">
                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current password</label>
                                    <input type="password" class="form-control" id="current_password"  name="current_password" >
                                    @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"  required>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>






</section>


