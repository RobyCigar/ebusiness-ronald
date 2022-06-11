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
<div class="" role="alert" style="display:none;">
</div>

<div class="container" style="font-family:'Noto Sans'">
    <div class="d-flex justify-content-center" style="color:black;margin-top:20px;;">
    <h2>Daftar MENU</h2>
    </div>
        <a href="{{route('menu.tambah')}}" class="btn"  
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
    <thead>
        <tr style="background-color:#001D49; color:white;">
            <th>Nama Pesanan</th>
            <th>Stok/Porsi</th>
            <th>HPP</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="menu">

    </tbody>
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
        function delete_item(id) {
            $.ajax({
            url: `{{route('api.product.index')}}/${id}`,
            method: 'DELETE',
            dataType: 'json',
            headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
            },
            success: function(data){
                console.log(data);
                let alert = $('div[role="alert"]');
                alert.addClass('alert alert-danger');
                alert.html(data.message);
                alert.show()
                fetchProduct()
            }
        })
        }
        function fetchProduct() {
            $.ajax({
                url: "{{route('api.product.index')}}",
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var html = '';
                    var i;
                    for(i=0;i<data.length;i++){
                        html += `
                                <tr>
                                    <td>${data[i].name}</td>
                                    <td>${data[i].stock}</td>
                                    <td>${data[i].production_cost}</td>
                                    <td>${data[i].price}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('menu.index')}}/edit?id=${data[i].id}">Edit</a>
                                        <a class="btn btn-danger" onclick="delete_item(${data[i].id})" href="#">Hapus</a>
                                    </td>
                                </tr>
                                `;
                    }
                    $('#menu').html(html);
                }
            });
        }

        $(document).ready(($) => {
            fetchProduct();
        });


    
    </script>

@endpush