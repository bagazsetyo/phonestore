<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Brand;
use App\Gallerie;
use Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Phone::with('thisphone','galleries')->orderBy('id','DESC')->get();
        return view('pages.productindex')->with([
            'items' => $items
        ]);
        // dd($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = $request->all();
        // Cart::add($data['id'], $data['name'], 1, $data['price'], 0);
        $i = Cart::content();
        // $ii = $i['name'];
        // $photo = Gallerie::whereProducts_id($i['id'])
        //                    ->where('is_default',1)
        //                    ->get();
        // $checkItems = Cart::content()->count();
        // return view('pages.index')->with([
        //     'items' => $i,
        //     'checkItems' => $checkItems,
        //     'photo' => $photo,
        // ]);
        dd($i);
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
