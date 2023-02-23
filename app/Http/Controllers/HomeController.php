<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

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
        $items = Item::where('items.status', 'active')
        ->select()
        ->get();
        $user = User::all();

        return view('mypage',[
            'items'=> $items,
            'user'=>$user,
        ]);
    }

    public function home(){

        $items = Item::where('items.status', 'active')
        ->select()
        ->get();

        return view('home',[
            'items'=> $items
        ]);
    }
}
