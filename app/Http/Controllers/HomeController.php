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
        $items = Item::orderByDesc('updated_at')->paginate(6);

        $keyword = $request->input('keyword');

        $query = Item::query();

        if($keyword) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
            $query->where('name', 'like', '%'.$value.'%')
                    ->orWhere('detail','LIKE', '%'.$value.'%');
            }
            // 上記で取得した$queryをページネートにし、変数$itemsに代入
            $items = $query->orderByDesc('updated_at')->paginate(6);
        }
        return view('home',[
            'items' => $items,
            'keyword' => $keyword,
        ]);
    }
}
