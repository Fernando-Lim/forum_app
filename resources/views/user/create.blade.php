@extends('layouts.app')
@section('title')
    Create User
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create User
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <h1><strong>Pendaftaran</strong></h1>
                            </div>
                            <hr>
                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter a name"
                                        value="{{ old('name') }}">
                                    <label style="color: gray" for="">Minimal 4 karakter, huruf saja</label>
                                    {{-- @include('layouts.error', ['name' => 'name']) --}}
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter a username" name="username"
                                        value="{{ old('username') }}">
                                    <label style="color: gray" for="">Minimal 3 karakter, huruf dan angka saja</label>
                                    {{-- @include('layouts.error', ['name' => 'name']) --}}
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col-md-12">
                                    <label for="">Password</label>
                                    <div class="input-group py-2">
                                        <input type="password" class="form-control" placeholder="Auto Generate"
                                            id="password" data-toggle="password" name="password"
                                            value="{{ Str::random(8) }}">
                                        <span style="align-self: center" class="px-2">

                                            <input type="checkbox" onclick="myFunction()"> Show Password
                                        </span>
                                    </div>

                                    <label style="color: gray" for="">Auto Generate Password, Setelah login pertama kali
                                        wajib mengganti password</label>
                                    {{-- @include('layouts.error', ['name' => 'name']) --}}
                                </div>

                            </div>

                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter a email"
                                        value="{{ old('email') }}">
                                    <label style="color: gray" for="">Contoh: example@example.com</label>
                                    {{-- @include('layouts.error', ['name' => 'email']) --}}
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Divisi</label>
                                    <select name="divisi_id" class="form-control">
                                        <option value="" selected disabled>Pilih Divisi</option>
                                        <option value="1">808Sports</option>
                                        <option value="2">EyangTG</option>
                                    </select>
                                    {{-- <input type="email" class="form-control" name="email" value="{{ old('email') }}"> --}}
                                    {{-- @include('layouts.error', ['name' => 'email']) --}}
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Level</label>
                                    <select name="level_id" class="form-control">
                                        <option value="" selected disabled>Pilih Level</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Manager</option>
                                        <option value="3">IT</option>
                                        <option value="4">Staff IT</option>
                                        <option value="5">CS</option>
                                        <option value="6">OP</option>
                                        <option value="7">OpinputTG</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col">
                                    <label for="">Hak Akses</label>
                                    <select name="hak_akses_id" class="form-control">
                                        <option value="1" selected>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row p-3">
                                <button class="btn btn-primary col-md-2" type="submit">Create</button>
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
