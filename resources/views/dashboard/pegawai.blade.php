@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<script src="{{asset('js/chart.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Bagian Navbar Sidebar Samping -->
<x-sidebar />
<!-- End Bagian Navbar Sidebar Samping -->

<!-- Isi Konten Dashboard -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="mt-4">Daftar Pegawai</h3>
            <div class="d-flex justify-content-between">
                <form action="" method="GET" class="my-3">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                        <button type="button input-group-text" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card">
                @if ($message = Session::get('success'))
                <div class="alert alert-dark" role="alert">
                    {{$message}}
                </div>
                @endif
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Last Created</th>
                                <!-- <th scope="col">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                <!-- <td>
                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>

    @endsection