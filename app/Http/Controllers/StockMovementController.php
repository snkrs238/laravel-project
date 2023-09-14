<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StockMovement;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Supplier;

class StockMovementController extends Controller
{   
    //入出庫履歴
    public function index(Request $request){
        $keyword =$request->input('keyword');
        $query = StockMovement::query();
        $count = $query->count();
        $items = StockMovement::with('item:id,name')->get();
        $stockMovements =$query->orderByDesc('updated_at')->paginate(15);

        if(isset($keyword)){
            $query->where('name','LIKE',"%{$keyword}%");
        }

        return view('stock_movements.index',[
            'stockMovements' => $stockMovements,
            'items' => $items,
            'keyword' => $keyword,
            'count' => $count,
        ]);
    }

    // 出庫・入庫
    public function shipping(Request $request){
        $item = Item::find($request->id);
        $stockMovement = StockMovement::find($request->id);

        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request,[
                'quantity'=>'required|integer|min:1',
                'movement_type'=> 'required',
            ],
            [
                'quantity.required' => '在庫数は必須です。',
                'movement_type' => '移動種類は必須です'
            ]
            );
            
            $stockMovement = new StockMovement();
            $stockMovement->movement_type =$request->movement_type;
            $stockMovement->quantity = $request->quantity;
            $stockMovement->item_id = $item->id;

            if ($stockMovement->movement_type == 1){
                if ($item->quantity < $request->quantity){
                    return redirect()->back()->with('error', '在庫数が不足しています。');
                }
                $item->quantity =$item->quantity - $request->quantity;
            } else {
                $item->quantity =$item->quantity + $request->quantity;
            }
            $item->save();
            $stockMovement->save();

            return redirect('/items');
        }else{
            return view('stock_movements.shipping',[
                'item' => $item,
            ]);
        }
    }
}
