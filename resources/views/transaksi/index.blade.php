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
        <a class="btn btn-primary btn-lg" href="{{route('pesanan.tambah')}}" role="button">Pesanan</a>
        </div>
        <div class="d-flex justify-content-center bold col-lg-4 px-0 pe-2">
            <div style="color:black;margin-top:15px;font-weight: bold;">
                <h2>Laporan Transaksi</h2>
            </div>
        </div>
   </div>
</div>  

<hr>

</section>
<div class="container d-flex">
    <div class="card-body">
        <table class="table" data-filter-control="true" data-show-search-clear-button="true" border="1">
        <tr style="background-color:#001D49; color:white;">
            <th>Id Transaksi</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <!-- place data below -->
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
        $(document).ready(function () {
            $.ajax({
                url: "{{route('api.transaction.index')}}",
                method: 'GET',
                success: function(data) {
                    console.log("Heree", data)
                    let html = '';

                    for(let i = 0; i < data.length; i++) {
                        if(data[i].transaction_items.length) {
                            for(let item of data[i].transaction_items) {
                                let date = new Date(data[i].created_at);
                                html += `
                                    <tr>
                                        <td>${data[i].id}</td>
                                        <td>${date}</td>
                                        <td>${data[i].total_price}</td>
                                        <td>
                                            <a href="{{route('transaksi.index')}}/${data[i].id}" class="btn">Print</a>
                                        </td>
                                    </tr>
                                `;
                            }
                        }
                    }
                    $('.table').append(html);
                },
                error: function(err) {
                    console.log(err);
                }
            })
        })
    </script>

@endpush