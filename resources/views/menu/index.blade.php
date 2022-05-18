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

.copyright
{
  position: absolute;
  margin-top: 100px;
  right: 16px;
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

<div class="container" style="font-family:'Noto Sans'">
    <div class="d-flex justify-content-center" style="color:black;margin-top:20px;;">
    <h2>ATUR MENU</h2>
    </div>
        <a href="{{route('aturmenu')}}" class="btn"  
        style="background-color:#001D49;color:white;">Tambah Menu</a>
    </div>
<hr>

<div class="container">
<div class="card-body" style="margin-left:100px;margin-right:100px;">
<div class="d-flex justify-content-between">
                <form action="" method="GET" class="my-3">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search">
                        <button type="button input-group-text" class="btn btn-dark">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
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
<div class="copyright">
    <p>
        <img width="10" src="{{asset('assets/copyright.svg')}}" alt="logo copyright">
        Copyright Kasironald 2022
    </p>
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