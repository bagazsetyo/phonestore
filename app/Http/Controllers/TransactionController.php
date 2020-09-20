<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Detailtransaction;
use App\User;
use App\Chart;
use App\Phone;
use App\Gallerie;
use Auth;
use App\Http\Requests\UserRequest;

class TransactionController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('pesan','transaction_id');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);
        $data['nama'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        // $data['number'] = Auth::user()->number;
        // $data['address'] = Auth::user()->address;
        $data['number'] = '081';
        $data['address'] = 'magelang';
        $data['transaction_status'] = 'pending';
        $transaction = Transaction::create($data);

        $names = $request->pesan;
        $codes = $request->products_id;
        foreach( $codes as $index => $code )
        {
            $details[] = new Detailtransaction([
                'transactions_id' => Auth::user()->id,
                'products_id' => $code, //id barang
                'pesan' => $names[$index], //jumlah barang yang di pesan
            ]);
        } 
        //details adalah nama model
        $transaction->details()->saveMany($details);

        $data = Chart::where('user_id',Auth::user()->id);
        $data->delete();

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Transaction::with('details.product')->findOrFail($id);
        return view('pages.transaction.show')->with([
            'item' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
