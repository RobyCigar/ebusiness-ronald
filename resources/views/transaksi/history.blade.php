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
                <h2>HISTORY</h2>
            </div>
        </div>
        <a style="position: absolute;right: 0;width:130px;margin-right:20px;" class="col-lg-2 pe-2 mt-2 btn btn-primary btn-lg" href="{{route('transaksi.history')}}" role="button">History</a>
   </div>
</div>  

<hr>

</section>
<div class="container d-flex">
    <div class="card-body">
        <table class="table" data-filter-control="true" data-show-search-clear-button="true" border="1">
        <tr style="background-color:#001D49; color:white;">
            <th>Id Transaksi</th>
            <th>Jenis Pesanan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <th>Id001</th>
            <th>Jus Anggur</th>
            <th>20/02/2021</th>
            <th>Rp 30000</th>
            <th>Rp 50000</th>
            <th>
            <a class="btn btn-primary" href="#" role="button">Edit</a>
            </th>
        </tr>
        <tr>
            <th>Id002</th>
            <th>Jus Mangga</th>
            <th>20/02/2021</th>
            <th>Rp 20000</th>
            <th>Rp 30000</th>
            <th>
            <a class="btn btn-primary" href="#" role="button">Edit</a>
            </th>
        </tr>
        <tr>
            <th>Id003</th>
            <th>Jus Jambu</th>
            <th>20/02/2021</th>
            <th>Rp 10000</th>
            <th>Rp 10000</th>
            <th>
            <a class="btn btn-primary" href="#" role="button">Edit</a>
            </th>
        </tr>
        </table>
    </div>
    <div style="color:white;background: #001D49; width: 30%; margin-top:15px; border: 1px solid black;" class="bagian-kanan">
        <div class="ps-3 pt-4">
            <h5>Jumlah Bayar</h5>
        </div>
        <h6 class="total py-2 d-flex align-items-center">50.000 IDR</h6>
        <h6 class="ps-3 pt-4">Sub Total: 20.000 IDR</h6>
        <h6 class="ps-3 pt-4">Diskon: </h6>
        <h6 class="ps-3 pt-4">Tax: </h6>

        <div class="ps-3 pt-4">
            <h4>Total</h4>
        </div>
        <h6 class="total py-2 d-flex align-items-center">Rp.30.000</h6>
        <div class="ps-3 pt-4">
            <h4>Kembali</h4>
        </div>
        <h6 class="total py-2 d-flex align-items-center">Rp.20.000 -</h6>
        <div class="d-flex align-items-center justify-content-center mt-2 mb-3">
            <div class="d-flex">
            <div class="btn btn-primary mt-2 ms-3">
            <i class="fa-solid fa-trash"></i>
            </div>
            </div>
            <div class="d-flex">
                <button id="btn" type='submit' class="btn btn-primary mt-2 ms-3" style="align-items: center;">EDIT</button>
                <div class="btn btn-primary mt-2 ms-3">
                <i class="fa-solid fa-print"></i>
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