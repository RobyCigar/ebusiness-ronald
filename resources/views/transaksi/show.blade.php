@extends('layouts.print')
@section('content')
<div class="mx-5 my-5">
    <h1>Juice Ronald</h1>
    <p>PT Juice Ronald | Copyright 2022</p>
    <p>
        <table class="table">
            <tr>
                <td>
                    ID Transaksi: 
                </td>
                <td>
                    {{$transaction->id}}
                </td>
            </tr>
            <tr>
                <td>
                    Total Harga: 
                </td>
                <td>
                    Rp.{{$transaction->total_price}}
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal:
                </td>
                <td>
                    {{$transaction->created_at}}
                </td>
            </tr>
            <tr>
                <td>
                    Penjual:
                </td>
                <td>
                    {{$user->name}}
                </td>
            </tr>
        </table>
        <table class="table my-5">
            <tr>
                <th>Id Produk</th>
                <th>Jumlah</th>
                <th>Harga(pcs)</th>
                <th>Subtotal</th>
            </tr>
            @foreach($transaction->transaction_items as $item)
            <tr>
                <td>
                    {{$item->product_id}}
                </td>
                <td>
                    {{$item->quantity}} Pcs
                </td>
                <td>
                    Rp.{{$item->price}}
                </td>
                <td>
                    Rp.{{($item->price * $item->quantity)}}
                </td>
            </tr>
            @endforeach
        </table>
    </p>
</div>
@endsection