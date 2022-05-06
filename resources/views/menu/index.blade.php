@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

<style>

.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}
</style>
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Load sidebar component -->
<x-sidebar/>
<!-- Isi Konten Dashboard -->

<div class="container">
<div class="d-flex justify-content-center" style="color:black;margin-top:20px;font-family:
Noto Sans TC;">
 <h3>ATUR MENU</h3>
</div>
<a href="#" class="btn" role="button" data-bs-toggle="button" 
style="background-color:#001D49;color:white;">Tambah Menu</a>
</div>
<hr>

<div class="container">
<div class="card-body" style="margin-left:100px;margin-right:100px;">
<table class="table" data-filter-control="true" data-show-search-clear-button="true" border="1">
<tr style="background-color:#001D49; color:white;">
    <th>Nama Pesanan</th>
    <th>Stok/Porsi</th>
    <th>HPP</th>
    <th>Harga Jual</th>
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
    <th>Rp 5000</th>
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
    <th>Rp 5000</th>
    <th>Rp 12000</th>
</tr>
<th>Jus Jambu</th>
    <th>
    <form id='myform' method='POST' class='quantity' action='#'>
  <input type='button' value='-' class='qtyminus minus' field='quantity' />
  <input type='text' name='quantity' value='1' class='qty' />
  <input type='button' value='+' class='qtyplus plus' field='quantity' />
</form>
</th>
    <th>Rp 5000</th>
    <th>Rp 10000</th>
</tr>
</table>
</div>
</div>

@endsection
@push('scripts')
    <script>
        jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val-1 ).change();
            } 
        });
    });
    </script>

@endpush