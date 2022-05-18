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
<!-- Isi Konten Dashboard -->

<div class="d-flex justify-content-center bold" style="color:black;margin-top:15px;font-weight: bold;">
 <h2>PEGAWAI</h2>
</div>
<hr>
<div class="d-flex justify-content-center" style="color:black;margin-top:10px;font-family:
Noto Sans TC;">
 <h4>Edit Data</h4>
</div>
<section class="row d-flex align-items-center justify-content-center" style="color:white; margin-top:20px;" >
    <form class="card px-5 py-4 shadow col-12 col-sm-6 col-md-5 col-lg-3 center-this-shit" style="background-color:#001D49;">
   
            <label class="form-label">Nama Pegawai</label>
            <input id="name" class='form-user-input' type='text' name='nama_produk'>

        <div class="my-1">
            <label>Telefon</label>
            <div class="col-sm-20">
            <input id="description" class='form-user-input' type='text' name='decs_produk'>
            </div>
        </div>
        <div class="my-1">
            <label>Shift</label>
            <div class="col-sm-20">
            <input id="stock" class='form-user-input' type='number' name='stok_produk'>
            </div>
        </div>
        
    </form>
    <div class="d-flex align-items-center justify-content-center my-2 mb-5">
            <div class="col-sm-20">
            <button id="btn" type='submit' class="btn btn-primary my-2" style="align-items: center;padding:10px 50px 10px 50px;">ENTER</button>
            </div>
        </div>
</section>

<div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="logo copyright">
        Copyright Kasironald 2022
    </p>
</div>


@endsection
@push('scripts')
    <script>
  
    </script>

@endpush