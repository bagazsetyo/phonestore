<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detailtransaction;
use App\Transaction;
use App\Phone;
use Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Transaction::where('email',Auth::user()->email)->get();
        return view('pages.user.index')->with([
                'items' => $items,
        ]);
    }
}
