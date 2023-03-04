<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\category;
use Illuminate\Support\Facades\DB;

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
        $params = $request->query();
        $typeKeyword = $request->input('typeKeyword');

        $query = Item::query();

        if(isset($keyword)){
            $query->where('id','LIKE',"%{$keyword}%")
                ->orWhere('name','LIKE',"%{$keyword}%");
        }

        if(!empty($typeKeyword)){
            $query = Item::where('type',$typeKeyword);
        
        }
        $items =$query->orderByDesc('updated_at')->paginate(15);

        //     return view('item.index', compact('items','typeKeyword','keyword'));
        //     // 商品一覧取得
        // $items = Item::latest('updated_at')->get()->all();
        

        return view('item.index',[
            'items' => $items,
            'keyword' => $keyword,
            'typeKeyword' =>$typeKeyword,
            'params' =>$params,
        ]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required',
                'image' => 'required',
                'production_aria' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'detail' => 'required|max:255',
                'image' => 'max:50000',
            ],[
                'name.required'=>'名前は必須です。',
                'type.required'=>'種類は必須です。',
                'image.required'=>'画像は必須です。',
                'production_aria.required'=>'産地は必須です。',
                'price.required'=>'価格は必須です。',
                'quantity.required'=>'在庫数は必須です。',
                'detail.required'=>'詳細は必須です。',
                'image.max' => '画像サイズを50MB以内にしてください。',
                'detail.max' => '文字を255文字までにしてください。'
            ]);

            // 商品登録
            $items = new Item();
            $items->user_id = Auth::user()->id;
            $items->name = $request->name;
            $items->type = $request->type;
            if ($request->image == null){
                $items->image = null;
            }else{
                $items->image= base64_encode(file_get_contents($request->image));
            };
            $items->production_aria = $request->production_aria;
            $items->price = $request->price;
            $items->quantity = $request->quantity;
            $items->detail = $request->detail;
            $items->save();

            return redirect('/items');
        }

        return view('item.add');
    }

    //削除
    public function detail(Request $request){
        $item = Item::where('id','=',$request->id)->first();
        return view('item.detail',['item'=>$item]);
    }

    public function delete(Request $request){
        Item::find($request->id)->delete();

        return redirect('/items');
    }

    //編集
    public function edit(Request $request){
        // $item = Item::where('id','=',$request->id)->first();
        $item = Item::find($request->id);
        
        if ($request->isMethod('post')) {

            // バリデーション
            $this->validate($request,[
                'detail'=>'required','max:500',
                'name'=>'required','max:100',
                'type' =>'required',
                'image' => 'max:50000',
            ],
            [
                'name.required' => '名前は必須です',
                'detail.required' => '詳細は必須です',
                'type.required' =>'種別を選択してください',
                'image.max' => '画像サイズを50MB以内にしてください。',
            ]
            );

            $item->name= $request->name;
            if(isset($request->image)){
                $item->image= base64_encode(file_get_contents($request->image));
            };
            $item->type= $request->type;
            $item->status=$request->status;
            $item->production_aria = $request->production_aria;
            $item->price = $request->price;
            $item->quantity = $request->quantity;
            $item->detail = $request->detail;
            $item->save();

            return redirect('/items');

        }else{
            return view('item.editor',['item'=>$item]);
        }
    }
}
