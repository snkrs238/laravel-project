<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\StockMovement;
use App\Models\Supplier;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index(Request $request)
    {
        $keyword =$request->input('keyword');
        $typeKeyword = $request->input('typeKeyword');

        $query = Item::query();

        //検索機能
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

        $items =$query->orderByDesc('updated_at')->paginate(15);
        $count = $query->count();
        $users = Item::with('user:id,name')->get();


        return view('item.index',[
            'items' => $items,
            'keyword' => $keyword,
            'typeKeyword' =>$typeKeyword,
            'count'=>$count,
            'users' =>$users,
        ]);
    }

    /**
     * 商品登録、発注
     */
    public function add(Request $request)
    {   
        $suppliers = Supplier::all();

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required',
                'image' => 'max',
                'price' => 'required',
                'order' => 'required',
                'image' => 'max:50000',
                'deliveryDate' => 'required','date',
                'supplier_id' => 'required',
            ],[
                'name.required'=>'名前は必須です。',
                'type.required'=>'種類は必須です。',
                'price.required'=>'価格は必須です。',
                'order.required'=>'在庫数は必須です。',
                'image.max' => '画像サイズを50MB以内にしてください。',
                'deliveryDate.required' => '納入日を入力してください。',
                'supplier_id.required' => '仕入れ先を入力してください。',
            ]);

            

            // 商品登録
            $item = new Item();
            $item->user_id = Auth::user()->id;
            $item->name = $request->name;
            $item->type = $request->type;
            
            if ($request->image == null){
                $item->image = null;
            }else{
                $item->image= base64_encode(file_get_contents($request->image));
            };
            $item->price = $request->price;
            $item->quantity = 0;
            $item->supplier_id = $request->supplier_id;
            $item->save();

            // 注文を登録
            $order = new Order; 
            $order->deliveryDate = $request->deliveryDate;
            $order->supplier_id = $request->supplier_id;  
            $order->save();

            // 注文アイテムを登録
            $order_item =new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->item_id = $item->id;
            $order_item->order = $request->order;
            $order_item->save();


            return redirect('/items')->with('message', '新しい商品が登録されました。');
        }

        return view('item.add',[
            'suppliers' => $suppliers,
        ]);
    }

    //詳細
    public function detail(Request $request){
        $item = Item::where('id','=',$request->id)->first();
        $suppliers = Supplier::all();
        return view('item.detail',[
            'item'=>$item,
            'suppliers' => $suppliers,
        ]);
    }

    //削除
    public function delete(Request $request){
        $item_id = $request->id;

        // StockMovementモデルから該当商品の在庫移動レコードを削除
        StockMovement::where('item_id',$item_id)->delete();

        // OrderItemモデルから該当商品の発注アイテムを削除
        OrderItem::where('item_id',$item_id)->delete();

        // Itemモデルから該当商品を削除
        Item::find($item_id)->delete();

        // Orderモデルから該当商品の関連する発注を削除
        $order_id = OrderItem::where('item_id', $item_id)->pluck('order_id')->first();
        if ($order_id) {
            Order::find($order_id)->delete();
        }
        
        return redirect('/items')->with('message', '商品が正常に削除されました。');
    }

    //編集
    public function edit(Request $request){
        // $item = Item::where('id','=',$request->id)->first();
        $item = Item::find($request->id);
        // $suppliers = Item::with('supplier:id,name')->get();
        $suppliers = Supplier::all();
        
        if ($request->isMethod('post')) {

            // バリデーション
            $this->validate($request,[
                'image' => 'max:50000',
                'supplier_id' => 'required',
                'price' => 'required',
            ],
            [
                'image.max' => '画像サイズを50MB以内にしてください。',
                'supplier_id.required' => '仕入れ先は必須です。',
                'price.required' => '仕入れ先は必須です。',
            ],
            );

            $item->name= $request->name;
            if(isset($request->image)){
                $item->image= base64_encode(file_get_contents($request->image));
            };
            $item->type= $request->type;
            $item->supplier_id = $request->supplier_id;
            $item->price = $request->price;
            $item->quantity = $request->quantity;
            $item->save();

            return redirect('/items');

        }else{
            return view('item.editor',[
                'item'=>$item,
                'suppliers' => $suppliers,
            ]);
        }
    }

    
}
