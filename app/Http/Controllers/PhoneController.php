<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Brand;
use App\Http\Requests\PhoneRequest;
use Illuminate\Http\Request;

class PhoneController extends Controller
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
        $items = Phone::with('thisphone')->get();
        return view('pages.phone.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Brand::all();
        return view('pages.phone.create')->with([
            'items' =>  $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $data = $request->all();
        Phone::create($data);
        return redirect()
        ->route('phone.create')
        ->with('success', 'Phone Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::all();
        $items = Phone::findOrFail($id);
        return view('pages.phone.edit')->with([
            'items' =>  $items,
            'brand' =>  $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $data = $request->all();
        $items = Phone::findOrFail($id)->update($data);
        return redirect()
        ->route('phone.edit',$id)
        ->with('success', 'Phone Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
