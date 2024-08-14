<x-admin-master>
    @section('content')
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <h4 class="m-0 font-weight-bold text-primary">User Profile </h4>
                        </div>
                        <div class="card-body">
                            <div class="p-2" >
                                <form method="post" action="{{route('user.update', $user)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">Full Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger" >
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="email" class="font-weight-bold">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger" >
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="password" class="font-weight-bold">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" >
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger" >
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="form-group mt-3">
                                        <label for="password_confirmation" class="font-weight-bold">Confirm password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    @error('password_confirmation')
                                    <div class="alert alert-danger" >
                                        {{ $message }}
                                    </div>
                                    @enderror


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>


                        </div>
                </div>
    @endsection
</x-admin-master>
