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

<div class="" role="alert" style="display:none;">
</div>

<div class="container">
    <div class="row" style="position: relative;">
        <div class="col-lg-4 px-2 pe-2 mt-2">
        <a class="btn btn-primary btn-lg" href="{{route('pesanan.index')}}" role="button">Tambah Juice</a>
        </div>
        <div class="d-flex justify-content-center bold col-lg-4 px-0 pe-2">
            <div style="color:black;margin-top:15px;font-weight: bold;">
                <h2>Keranjang Pesanan</h2>
            </div>
        </div>
        <!-- <a style="position: absolute;right: 0;width:130px;margin-right:20px;" class="col-lg-2 pe-2 mt-2 btn btn-primary btn-lg" href="{{route('transaksi.index')}}" role="button">Laporan Transaksi</a> -->
   </div>
</div>  

<hr>



</section>
<div class="container d-flex">
    <div class="card-body">
        <table class="table" data-filter-control="true" data-show-search-clear-button="true" border="1">
        <tr style="background-color:#001D49; color:white;">
            <th>ID Produk</th>
            <th>Jenis Pesanan</th>
            <th>QTY</th>
            <th>Harga Per-Unit</th>
            <th>Sub Total</th>
        </tr>
        <!-- data inside here -->
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
        <h6 id="total" class="total py-2 d-flex align-items-center">Rp.20.000 -</h6>
        <div class="mx-3 mt-2 mb-3">
            <form id="pesanan">

                <button type='submit' class="btn btn-primary w-100 mt-2">Pesan</button>
                <div class="btn btn-secondary w-100 mt-2">
                <i class="fa-solid fa-print"></i> Print
                </div>
            </form>
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
        $(document).ready(function(){
            function onload() {
                const items = JSON.parse(localStorage.getItem('pesanan'))
                if(items) {
                    items.forEach(item => {
                        $('.table').append(`
                            <tr class="table-item">
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>
                                    <form id='myform' method='POST' class='quantity' action='#'>
                                        <input type='button' value='-' class='qtyminus minus' field='${item.id}' />
                                        <input type='text' name='${item.id}' value='${item.qty ?? 1}' class='qty' />
                                        <input type='button' value='+' class='qtyplus plus' field='${item.id}' />
                                </form>
                                </td>
                                <td class='price ${item.id}'>${item.price}</td>
                                <td class='subtotal ${item.id}'>${(item.qty * item.price)}</td>
                            </tr>
                        `)
                    })
                } else {
                    $('.table').append(
                        `
                        <tr>
                            <td colspan="5" align="center">Silakan tambahkan produk</td>
                        </tr>
                        `
                    )
                }
            }

            // call when page is rendered
            onload()

            $('.qtyplus').click(function(e){
                e.preventDefault();
                const items = JSON.parse(localStorage.getItem('pesanan'))
                fieldName = $(this).attr('field');

                for(let item of items) {
                    if(item.id == fieldName) {
                        item.qty += 1
                        localStorage.setItem('pesanan', JSON.stringify(items))
                        break
                    }
                }


                var currentVal = parseInt($('input[name='+fieldName+']').val());
                if (!isNaN(currentVal)) {
                    let price = parseInt($('.price.'+fieldName).text());
                    let updatedVal = currentVal + 1;
                    let subtotal = (updatedVal * price)

                    $('.subtotal.'+fieldName).text(subtotal)
                    // Increment
                    $('input[name='+fieldName+']').val(updatedVal);
                    

                } else {
                    $('input[name='+fieldName+']').val(0);
                }
            });

            $('.qtyminus, .qtyplus').click(function(e){
                e.preventDefault();
                let total = $(".subtotal").map(function() {
                    return parseInt($(this).text());
                }).get();
                let totalPrice = total.reduce((a, b) => a + b, 0);
                $('#total').text("Rp. " + totalPrice)
            })




            $(".qtyminus").click(function(e) {
                e.preventDefault();
                const items = JSON.parse(localStorage.getItem('pesanan'))
                fieldName = $(this).attr('field');

                for(let item of items) {
                    if(item.id == fieldName && item.qty > 0) {
                        item.qty -= 1
                        localStorage.setItem('pesanan', JSON.stringify(items))
                        break
                    }
                }
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                if (!isNaN(currentVal) && currentVal > 0) {
                    let price = parseInt($('.price.'+fieldName).text());
                    let updatedVal = currentVal - 1;
                    let subtotal = (updatedVal * price)

                    $('.subtotal.'+fieldName).text(subtotal)
                    $('input[name='+fieldName+']').val(updatedVal);
                } else {
                    $('input[name='+fieldName+']').val(0);
                }
            });


            function checkItemById(items, id) {
                if(items.filter(item => item.id == id).length > 0) {
                    return true
                } 
                return false
            }

            $("#pesanan").submit(function(e){
                e.preventDefault();
                const parsedLS = JSON.parse(localStorage.getItem('pesanan'))
                const items = []

                if(!parsedLS) {
                    let alert = $('div[role="alert"]');
                    alert.addClass('alert alert-danger');
                    alert.html("tambahkan juice terlebih dahulu");
                    alert.show()
                }

                // rename the object keys in items to be exact same as the api
                for(let i = 0; i < parsedLS.length; i++) {
                    let tmp = {}
                    tmp.product_id = parsedLS[i].id
                    tmp.quantity = parsedLS[i].qty
                    tmp.price = parsedLS[i].price
                    console.log(tmp)

                    items.push(tmp)
                }


                    $.ajax({
                        url: "{{route('api.transaction.store')}}",
                        type: "POST",
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        },
                        data: {
                            _token: "{{csrf_token()}}",
                            items: items
                        },
                        success: function(data) {
                            console.log(data)
                            let alert = $('div[role="alert"]');
                            localStorage.removeItem('pesanan')
                            alert.addClass('alert alert-success');
                            alert.html(data.message);
                            alert.show()
                            onload()

                            $(".table-item").remove()
                        },
                        error: function(data) {
                            let alert = $('div[role="alert"]');
                            alert.addClass('alert alert-danger');
                            alert.html(data.responseJSON.message);
                            alert.show()
                        }
                    })
            })

        });
    </script>

@endpush