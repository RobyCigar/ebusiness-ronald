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

<h1>
    Nama: {{$pegawai->name}}
</h1>

<h1>
    Pegawai: {{$pegawai->email}}
</h1>

<h1>
    Jam kerja: {{$pegawai->start_session}} - {{$pegawai->end_session}}
</h1>

<table>
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
        <td>{{$item->time_end ?? "Lupa logout"}}</td>
    </tr>
    @endforeach
</table>

@endsection