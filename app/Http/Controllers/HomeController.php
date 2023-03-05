<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

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

    public function home(Request $request){
        $items = Item::where('items.status','active')->orderByDesc('updated_at')->paginate(6);

        $keyword = $request->input('keyword');
        $typeKeyword = $request->input('typeKeyword');

        $query = Item::query();

        if(isset($keyword) && isset($typeKeyword)){
            $query->where('type',$typeKeyword)
            ->Where('name','LIKE',"%{$keyword}%")
            ->orWhere('id','LIKE',"%{$keyword}%");
        }elseif(isset($keyword)){
            $query->where('id','LIKE',"%{$keyword}%")
                ->orWhere('name','LIKE',"%{$keyword}%");
        }elseif(!empty($typeKeyword)){
            $query = Item::where('type',$typeKeyword);
        }
        // 上記で取得した$queryをページネートにし、変数$itemsに代入
        $items = $query->orderByDesc('updated_at')->paginate(6);
        
        return view('home',[
            'items' => $items,
            'keyword' => $keyword,
            'typeKeyword' =>$typeKeyword,
        ]);
    }
}
