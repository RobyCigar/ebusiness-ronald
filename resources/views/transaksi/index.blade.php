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

.total {
    display:flex;
    background-color:white;
    margin: 0px 11px;
    align-items: center;
    justify-content: center;
    color:black;
    border: 1px solid black;
}

.brdr {
    border: 2px dotted blue;
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
    <div class="row" style="position: relative;">
        <div class="col-lg-4 px-2 pe-2 mt-2">
        <a class="btn btn-primary btn-lg" href="{{route('transaksi.tambah')}}" role="button">Pesanan</a>
        <a class="btn btn-primary btn-lg" href="{{route('menu.tambah')}}" role="button">Add Menu</a>
        </div>
        <div class="d-flex justify-content-center bold col-lg-4 px-0 pe-2">
            <div style="color:black;margin-top:15px;font-weight: bold;">
                <h2>TRANSAKSI</h2>
            </div>
        </div>
        <a style="position: absolute;right: 0;width:130px;margin-right:20px;" class="col-lg-2 pe-2 mt-2 btn btn-primary btn-lg" href="{{route('transaksi.history')}}" role="button">History</a>
   </div>
</div>  

<hr>

<div class="container mb-3">
 <div class="row">
    <div class="col-lg-3">
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
        </div>
        <div class="col-lg-3">
        <div class="d-flex justify-content-between">
            <a class="btn btn-dark mt-3" href="{{route('menu.index')}}" role="button">TAMBAHKAN + </a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/jeruk.jpg')}}" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center">JUS JERUK</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/melon.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS MELON</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/strawberry.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS STRAWBERRY</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/anggur.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS ANGGUR</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/tomat.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS TOMAT</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/mangga.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS MANGGA</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/alpukat.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS ALPUKAT</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                <img class="card-img" src="{{asset('images/jambu.jpg')}}" alt="Card image" style="width:238px;height:160px;">
                    <div class="card-body">
                        <h5 class="card-title  d-flex justify-content-center">JUS JAMBU</h5>
                        <a class="btn btn-light d-flex justify-content-center" href="#" role="button">Pesan</a>
                    </div>
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
@push('scripts')
    <script>

    </script>

@endpush