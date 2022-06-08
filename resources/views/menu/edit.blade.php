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



<div class="container">
    <div class="" role="alert" style="display:none;">
    </div>
    <div class="row">
        <a style="position: absolute; top: 72px" href="{{route('menu.index')}}">
            <i class="fa-solid fa-arrow-left fa-3x"></i>
        </a>
        <h2 class="text-center mt-4">Edit Menu</h2>
   </div>
</div>  

<hr>

<div class="d-flex justify-content-center" style="color:black;margin-top:10px;font-family:'Noto Sans'">

</div>
<section class="row d-flex align-items-center justify-content-center" style="color:white; margin-top:20px;" >
    <form class="card px-5 py-4 shadow col-12 col-sm-6 col-md-5 col-lg-3 center-this-shit" style="background-color:#001D49;">
   
    <div class="my-1">
    <label>Nama Produk</label>
            <div class="col-sm-20">
            <input id="name" class='w-100 form-user-input' type='text' name='nama_produk'>
            </div>
            </div>
        <div class="my-1">
            <label>Deskripsi Produk</label>
            <div class="col-sm-20">
            <input id="description" class='w-100 form-user-input' type='text' name='decs_produk'>
            </div>
        </div>
        <div class="my-1">
            <label>Stok Produk</label>
            <div class="col-sm-20">
            <input id="stock" class='w-100 form-user-input' type='number' name='stok_produk'>
            </div>
        </div>
        <div class="my-1">
            <label>HPP</label>
            <div class="col-sm-20">
            <input id="production_cost" class='w-100 form-user-input' type='number' name='hpp_produk'>
            </div>
        </div>
        <div class="my-1">
            <label>Gambar</label>
            <div class="col-sm-20">
            <input id="image" class='w-100 form-user-input' name='image'>
            </div>
        </div>
        <div class="my-1">
            <label>Harga Jual</label>
            <div class="col-sm-20">
            <input id="price" class='w-100 form-user-input' name='price_produk'>
            </div>
        </div>
    </form>
    <div class="d-flex align-items-center justify-content-center my-2 mb-5">
            <div class="col-sm-20">
            <button id="btn" type='submit' class="btn btn-primary my-2" style="align-items: center;">Tambahankan Menu</button>
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
        $(document).ready(function(){
            let id = {{ app('request')->input('id') }};


            $.ajax({
                url: "{{route('api.product.show', app('request')->input('id'))}}",
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                },
                success: data => {
                    console.log(data)
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#price').val(data.price);
                    $('#production_cost').val(data.production_cost);
                    $('#image').val(data.image);
                    $('#stock').val(data.stock);
                },
                error: err => {
                    console.error(err)
                }
            })


            $('#btn').click(e => {
                e.preventDefault()
                const name = $('#name').val()
                const description = $('#description').val()
                const price = parseInt($('#price').val())
                const stock = parseInt($('#stock').val())
                const production_cost = parseInt($('#production_cost').val())
                const image = $('#image').val()
                
                const data = {name, description, price, stock, production_cost, image}

                $.ajax("{{route('api.product.update',app('request')->input('id'))}}", {
                    type : 'PUT',
                    data : data,
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function (data){
                        let alert = $('div[role="alert"]');
                        alert.addClass('alert alert-success');
                        alert.html(data.message);
                        alert.show()
                    },
                    error: function (jqXHR, textStatus, errorMessage) {
                        alert('Error : ' + errorMessage)
                    }
                })
            })

        });
    </script>

@endpush