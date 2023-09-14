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

class OrderController extends Controller
{
    // 注文履歴
    public function index(Request $request){
        $query = OrderItem::query();
        $keyword = $request->input('keyword');
        $typeKeyword = $request->input('typeKeyword');
        $order_items =$query->orderByDesc('updated_at')->paginate(15);
        $count = $query->count();
        

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

        return view('order.index',[
            'order_items' => $order_items,
            'keyword' => $keyword,
            'typeKeyword' => $typeKeyword,
            'count' => $count,
        ]);
    }

    // 発注
    public function order(Request $request){
        $item = Item::find($request->id);

        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'order' => 'required',
                'deliveryDate' => 'required','date',
                'supplier_id' => 'required',
            ],[
                'order.required'=>'在庫数は必須です。',
                'deliveryDate.required' => '納入日を入力してください。',
                'supplier_id.required' => '仕入れ先を入力してください。',
            ]);

        $order = new Order;
        $order->deliveryDate = $request->deliveryDate;
        $order->supplier_id = $request->supplier_id;  
        $order->save();

        $order_item = new OrderItem();
        $order_item->order_id = $order->id;
        $order_item->item_id = $item->id;
        $order_item->order = $request->order;
        $order_item->save();

        return redirect('/items');
       
        }else{
            return view('order.create',[
                'item' => $item,
            ]);
        }
    }

    //キャンセル
    public function delete(Request $request){
        // OrderItem モデルを削除
        $orderItem = OrderItem::find($request->id);
        if ($orderItem) {
            $orderItem->delete();
        }

        // Order モデルを削除
        $order = Order::find($request->id);
        if ($order) {
            $order->delete();
        }


        return redirect('/order')->with('cancel', '注文がキャンセルされました。');
    }
}
