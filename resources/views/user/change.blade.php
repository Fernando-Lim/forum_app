@extends('layouts.app')
@section('title')
    Change Password
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <h1><strong>Change Password</strong></h1>
                            </div>
                            <hr>
                            <div class="row py-2">
                                <div class="col-md-12">
                                    <label for="">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter a password"
                                            id="password" data-toggle="password" name="password"
                                            value="">
                                            
                                </div>
                                <div class="col-md-12 py-2">
                                    <label for="">Confirm Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter a password"
                                            id="conf_password"  name="conf_password"
                                            value="">
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row p-3">
                                <button class="btn btn-primary col-md-2" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
