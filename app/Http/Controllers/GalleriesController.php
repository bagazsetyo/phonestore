<?php

namespace App\Http\Controllers;


use App\Http\Requests\GallerieRequest;
use File;
use Illuminate\Support\Facades\Storage;
use App\Phone;
use App\Gallerie;
use Illuminate\Http\Request;

class GalleriesController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GallerieRequest $request)
    {
         $data = $request->all();
        // $k
         $photo = Gallerie::where('products_id', $data['products_id'])->where('is_default',1)->get();
         foreach ($photo as $p) {
            if ($p->is_default = $data['is_default']) {
                return back()
                ->with('warning', 'IsDefault Already Exist!');
            }
         }
        
         $data['photo'] = $request->file('photo')->store(
                    'assets/picture','public'
                 );

        Gallerie::create($data);
        return back()
        ->with('success', 'Photo Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Phone::findOrFail($id);
        $galleries = Gallerie::where('products_id',$id)->get();
        return view('pages.galleries.index')->with([
            'items' => $items,
            'galleries' => $galleries
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
        $items = Gallerie::findOrFail($id);
        $path = parse_url($items->photo);
        File::delete(public_path($path['path']));
        $items->delete();
        // dd($path);
        return back()
        ->with('success', 'Photo Created Successfully!');
    }

    public function createphoto($id)
    {
        $items = Phone::findOrFail($id);
        // dd($data);
        return view('pages.galleries.create')->with([
            'items' => $items,
        ]);   
    }

}
