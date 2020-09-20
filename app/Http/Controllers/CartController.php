<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chart;
use App\Phone;
use Auth;
use DB;

class CartController extends Controller
{
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
        $items = Chart::with('thiscartphone')
                        ->whereUser_id(Auth::user()->id)
                        ->get();
        $data = DB::table('charts')
                ->select('qty','price')
                ->join('phones', 'charts.transaction_id', '=', 'phones.id')
                ->get();
             // echo  $data;
        // $income = Chart::whereUser_id(Auth::user()->id)->sum('id');
        return view('pages.cart.index')->with([
            'items' => $items,
            'data' => $data,
        ]);
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
        $data = $request->all();
        $create = new Chart([
                'transaction_id' => $request->get('transaction_id'),
                'photo' => $request->get('photo'),
                'qty' => $request->get('qty'),
                'user_id' => Auth::user()->id,
            ]);
        $create->save();
        //  $buat = $request->get('photo');
        // dd($data);
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
        $items = Phone::whereId($id)
                    ->with('galleries')
                    ->take(1)
                    ->get();
        $data = Phone::findOrFail($id);
        // echo $items;
        return view('pages.cart.show')->with([
            'items' => $items,
            'data' => $data,
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
        $data = $request->all();
        $items = Chart::findOrFail($id)->update($data);
        return redirect()->route('cart.index');
        // dd($items);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Chart::findOrFail($id);
        $data->delete();

        return redirect()->route('cart.index');
    }
}
