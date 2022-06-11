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
                <h2>Daftar Menu</h2>
            </div>
        </div>
        <a style="position: absolute;right: 0;width:130px;margin-right:20px;" class="col-lg-2 pe-2 mt-2 btn btn-primary btn-lg" href="{{route('transaksi.index')}}" role="button">Laporan Keuangan</a>
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
    </div>
</div>


<div class="container">
    <div id="menu" class="d-flex flex-wrap"></div>
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
        // store product into localstorage
        $(document).ready(function(){
            // fetch using ajax
            $.ajax({
                url: "{{ route('api.product.index') }}",
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    var html = '';
                    for(let i = 0; i < data.length; i++) {

                        html += `<div class="col-lg-3">
                                    <div class="card text-white bg-dark mb-3" style="max-width: 15rem;">
                                        <img class="card-img" style="max-height: 200px; object-fit: cover;" src="${data[i].image}" alt="Card image">
                                            <div class="card-body">
                                                <h5 class="item card-title d-flex"> Nama: ${data[i].name}</h5>
                                                <h5 class="card-title d-flex"> Harga: ${data[i].price}</h5>
                                                <h5 class="card-title d-flex"> Stock: ${data[i].stock}</h5>
                                                <a class="btn btn-light d-flex justify-content-center" href="#" role="button" onclick="additem(${data[i].id})">Tambahkan ke Pesanan</a>
                                            </div>
                                    </div>
                                </div>
                                `;
                    }

                    $('#menu').html(html);

                }
            });


        });

        /*
        * Add item to cart
        * params : id dari product
        */
        function additem(item) {
            let newItemID = item;

            $.ajax({ 
                url: `{{route('api.product.index')}}/${item}`,
                method: 'GET',
                success: (item) => {
                    // kalau ngaak ada item, buat baru
                    let prevItems = JSON.parse(localStorage.getItem("pesanan")) ?? [item]; 


                    if(prevItems.filter(item => item.id == newItemID).length == 0) {
                        prevItems.push(item)
                    }

                    // kalau itemnya udah ada, tambahkan qty nya
                    let newItems = prevItems.map(item => {
                        if(!item.qty) {
                            item.qty = 1;
                        } else if(item.id == newItemID) {
                            item.qty += 1;
                        }

                        return item
                    })
                    console.log(newItems)


                    localStorage.setItem("pesanan", JSON.stringify(newItems));
                    window.location.replace("{{route('pesanan.tambah')}}");
                },
                error: (err) => {
                    console.log(err)
                }
                
            })
        
        }
    </script>

@endpush