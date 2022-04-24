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
        $transactions = Transaction::all();

        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(auth()->user());
        // create transaction
        $items = $request->all()['items'];
        $total = 0;

        try {
            $now = Carbon::now('utc')->toDateTimeString();
            foreach ($items as $item => $value) {
                $total += $value['price'];
                $array[] = array_merge($value, ['created_at' => $now, 'updated_at' => $now]);
            }
            

            $transaction = Transaction::insert([
                'user_id' => auth()->user()->id,
                'total_price' => $total,
            ]);


            TransactionItem::insert(array_merge($array, ['transaction_id' => $transaction->id]));

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
