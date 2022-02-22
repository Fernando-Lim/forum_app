@extends('layouts.app')
@section('title')
    Staff
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            

            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        Staff
                    </div>
                    <div class="card-body">
                        <br>
                        <table class="table text-center table-bordered table-striped" id="SellSummariesTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Divisi ID</th>
                                    <th>Status Level</th>
                                    <th>Hak Akses ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->username}} </td>
                                    <td> {{$user->divisi}} </td>
                                    <td> {{$user->status_level}} </td>
                                    <td> {{$user->hak_akses_fitur}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
