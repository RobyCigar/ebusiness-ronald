@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<script src="https://kit.fontawesome.com/b1ea2b304c.js" crossorigin="anonymous"></script>

<style>
.copyright
{
  position: absolute;
  margin-top: 100px;
  right: 16px;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}

aside {
    float: right;
}
</style>
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Load sidebar component -->
<x-sidebar/>
<!-- Isi Konten Dashboard -->

<div class="container">
    <div class="row">
        <div class="col-lg-4 px-2 pe-2 mt-2">
        <a class="btn btn-primary btn-lg" href="#" role="button">Pesanan</a>
        <a class="btn btn-primary btn-lg" href="#" role="button">Add Menu</a>
        </div>
        <div class="d-flex justify-content-center bold col-lg-4 px-0 pe-2">
            <div style="color:black;margin-top:15px;font-weight: bold;">
                <h2>TRANSAKSI</h2>
            </div>
        </div>
        <div class="col-lg-2 pe-2 mt-2" style="margin-left:170px;">
        <a class="btn btn-primary btn-lg" href="#" role="button">History</a>
        </div>
   </div>
</div>  

<hr>


</section>
<div class="container">
<div class="card-body" style="margin-right:370px;">
<table class="table" data-filter-control="true" data-show-search-clear-button="true" border="1">
<tr style="background-color:#001D49; color:white;">
    <th>Jenis Pesanan</th>
    <th>QTY</th>
    <th>Harga Per-Unit</th>
    <th>Sub Total</th>
</tr>
<tr>
    <th>Jus Anggur</th>
    <th>
    <form id='myform' method='POST' class='quantity' action='#'>
  <input type='button' value='-' class='qtyminus minus' field='quantity' />
  <input type='text' name='quantity' value='1' class='qty' />
  <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>
</th>
    <th>Rp 10000</th>
    <th>Rp 10000</th>
</tr>
<tr>
    <th>Jus Apel</th>
    <th>
    <form id='myform' method='POST' class='quantity' action='#'>
  <input type='button' value='-' class='qtyminus minus' field='quantity' />
  <input type='text' name='quantity' value='1' class='qty' />
  <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>
</th>
    <th>Rp 10000</th>
    <th>Rp 10000</th>
</tr>
<th>Jus Jambu</th>
    <th>
    <form id='myform' method='POST' class='quantity' action='#'>
  <input type='button' value='-' class='qtyminus minus' field='quantity' />
  <input type='text' name='quantity' value='1' class='qty' />
  <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>
</th>
    <th>Rp 10000</th>
    <th>Rp 10000</th>
</tr>
</table>
</div>
</div>
<div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="logo copyright">
        Copyright Kasironald 2022
    </p>
</div>

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