<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MouthfulQueries extends Controller
{

    // return number
    public function get_keuntungan()
    {
        $keuntungan = DB::table('transaction_items')
        ->select(DB::raw('SUM(price * quantity) as total_keuntungan'))
        ->first() ?? 0;
        return $keuntungan->total_keuntungan ?? 0;
    }

    public function keuntungan()
    {
        $keuntungan = $this->get_keuntungan();
        return response()->json($keuntungan);
    }

    public function omset() 
    {
        $keuntungan = $this->get_keuntungan();

        $production_cost = DB::table('transaction_items')
            ->join('products', 'transaction_items.product_id', '=', 'products.id')
            ->select(DB::raw('SUM(products.production_cost) as total_production_cost'))
            ->first();

        $omset = $keuntungan + (int) $production_cost->total_production_cost;

        return response()->json($omset);
    }

    public function total_transaction() {
        $total_transaction = DB::table('transactions')
            ->select(DB::raw('COUNT(id) as total_transaction'))
            ->first();
        return response()->json($total_transaction);
    }
}
