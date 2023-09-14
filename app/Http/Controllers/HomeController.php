<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

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
        // $items = Item::where('items.status','active')->orderByDesc('updated_at')->paginate(6);

        $keyword = $request->input('keyword');
        $typeKeyword = $request->input('typeKeyword');

        $query = Item::query();
        $queryOrderItem = OrderItem::query();
        $queryUser = User::query();
        $queryStockMovement = StockMovement::query();

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
        // 上記で取得した$queryをページネート
        $items = $query->orderByDesc('updated_at')->paginate(6);

        $order_items = $queryOrderItem->orderByDesc('updated_at')->paginate(6);

        $users = $queryUser->orderByDesc('updated_at')->paginate(6);

        $stockMovements = $queryStockMovement->orderByDesc('updated_at')->paginate(6);
        
        return view('home.notification',[
            'items' => $items,
            'order_items' => $order_items,
            'users' => $users,
            'keyword' => $keyword,
            'typeKeyword' => $typeKeyword,
            'stockMovements' => $stockMovements,
        ]);
    }

    
    

       
}
