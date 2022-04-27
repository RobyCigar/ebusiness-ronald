@extends('layouts.app')

@push('styles')
<script>
    if (!localStorage.getItem('token')) {
        window.location.replace("{{route('login')}}");
    }
</script>
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

<style>

</style>
@endpush

@section('content')
<!-- End Bagian Atas Navigation -->

<!-- Load sidebar component -->
<x-sidebar/>
<!-- Isi Konten Dashboard -->

<div class="d-flex justify-content-center" style="color:black;margin-top:20px;font-family:
Noto Sans TC;">
 <h3>ATUR MENU</h3>
</div>
<hr>

<div class="d-flex justify-content-center text-align-center">
    <div class="container col-4" style="color:white;background:#001D49; padding:10px; border-radius:10px;">
    <form action='#create_data' id='data_list'>
        <table border='0'>
            <tr>
                <td>Nama Produk</td>
                <td>
                    <input id="name" class='form-user-input' type='text' name='nama_produk' style='width: 20em'>
                </td>
            </tr>
            <tr>

            <tr>
                <td>Dekripsi Produk</td>
                <td>
                    <input id="description" class='form-user-input' type='text' name='harga_produk' style='width: 20em'>
                </td>
            </tr>
            <tr>
            <tr>
                <td>Stok Produk</td>
                <td>
                    <input id="stock" class='form-user-input' type='number' name='stok_produk' style='width: 20em'>
                </td>
            </tr>
            <tr>
                <td>HPP</td>
                <td>
                    <input id="production_cost" class='form-user-input' type='number' name='stok_produk' style='width: 20em'>
                </td>
            </tr>

            <tr>
            <td>Harga Jual</td>
            <td>
                <input id="price" class='form-user-input' name='deks_produk' style='width: 20em'>
            </td>
            </tr>
        
            </tr>
            <tr>
                <td colspan='2' style='text-align: center;'>
                    <button id="btn" type='submit'>Kirim Data</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    </div>


@endsection
@push('scripts')
    <script>
        $(document).ready(function(){


            $('#btn').click(e => {
                e.preventDefault()
                const name = $('#name').val()
                const description = $('#description').val()
                const price = parseInt($('#price').val())
                const stock = parseInt($('#stock').val())
                const production_cost = parseInt($('#production_cost').val())
                
                const data = {name, description, price, stock, production_cost}

                $.ajax("{{route('product.store')}}", {
                    type : 'POST',
                    data : data,
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function (data){
                        console.log('here')
                    },
                    error: function (jqXHR, textStatus, errorMessage) {
                        alert('Error : ' + errorMessage)
                    }
                })
            })
        });
    </script>

@endpush