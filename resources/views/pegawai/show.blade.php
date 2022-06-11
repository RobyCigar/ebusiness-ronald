@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

<style>
.copyright {
  position: absolute;
  margin-top: 30px;
  right: 16px;
}
</style>
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Load sidebar component -->
<x-sidebar/>

<div class="mx-4 my-5">
    <h1>
        Detail Pegawai
    </h1>

    <h5>
        Nama: {{$pegawai->name}} <br>
        Pegawai: {{$pegawai->email}} <br>
        Jam kerja: {{$pegawai->start_session}}:00 - {{$pegawai->end_session}}:00
    </h5>
</div>


<table class="table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Durasi</th>
        <th>Login pada</th>
        <th>Logout pada</th>
    </tr>
    @foreach($absen as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->day}}</td>
        <td>{{$item->time ?? "-"}}</td>
        <td>{{$item->time_start}}</td>
        <td>{{$item->time_end ?? "-"}}</td>
    </tr>
    @endforeach
</table>

@endsection