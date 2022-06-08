<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $transactions = Transaction::with('transaction_items')->get();

        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * receive:
     * {
     *  "items": [
     *     {
     *      "product_id": 1,
     *      "quantity": 2,
     *      "price": 100
     *    }
     * ]
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create transaction
        $items = $request->all()['items'];
        $total = 0;

        try {
            $now = Carbon::now('utc')->toDateTimeString();
            foreach ($items as $item => $value) {
                $total += $value['price'];
                $array[] = array_merge($value, ['created_at' => $now, 'updated_at' => $now]);
            }
            
            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            $transaction->total_price = $total;
            $transaction->save();

            // add transaction_id on each transaction item table
            foreach ($array as $item => $value) {
                $array[$item]['transaction_id'] = $transaction->id;
            }

            // store every items array to transactionitem
            TransactionItem::insert($array);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error: ' . $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Transaction created successfully',
            'data' => $array,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Transaction::with('transaction_items')->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        try {
            $transaction->update($request->all());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error: ' . $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Transaction updated successfully',
            'transaction' => $transaction
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = Transaction::find($id)->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error: ' . $th->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Transaction deleted successfully',
            'deleted' => $deleted
        ], 200);
    }
}
