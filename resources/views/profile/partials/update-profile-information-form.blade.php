<section>











    <div class="container mt-5">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
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
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{old('name', $user->name)}}" name="name" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('name', $user->email)}}" required>
                                    @error('email')
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
