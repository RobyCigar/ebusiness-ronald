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
<style>
.copyright
{
  position: absolute;
  margin-top: 150px;
  right: 16px;
}
</style>
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
                                <th scope="col">ID</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Last Created</th>
                                <th scope="col">Action</th>
                                <!-- <th scope="col">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$user->email}}</td>
                                <td>08.00 - 15.00</td>
                                <td>089652947699</td>
                                <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('pegawai.show', $user->id)}}">Lihat</a>
						<!-- <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
						<button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button> -->
				                </td>
                                <!-- <td>
                                    <form action="" method="POST">
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
    <div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="logo copyright">
        Copyright Kasironald 2022
    </p>
</div>
    @endsection