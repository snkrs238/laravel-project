<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Item;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //仕入業者一覧
    public function index(Request $request){
        $keyword =$request->input('keyword');

        $query = Supplier::query();

        //検索機能
        if(isset($keyword)){
            $query->where('id','LIKE',"%{$keyword}%")
                ->orWhere('name','LIKE',"%{$keyword}%");
        }

        $count = $query->count();
        $suppliers =$query->orderByDesc('updated_at')->paginate(15);

        return view('supplier.index',[
            'suppliers' => $suppliers,
            'count' => $count,
            'keyword' => $keyword,
        ]);
    }

    //削除
    public function delete(Request $request){
        // 指定された業者をデータベースから削除
        $supplier = Supplier::find($request->id);

        if ($supplier){
            // 関連する商品を取得し、supplier_id を null に設定
            Item::where('supplier_id', $supplier->id)->update(['supplier_id' => null]);

            //業者を削除
            $supplier->delete();
            return redirect('/suppliers')->with('message', '正常に削除されました。');
        } else {
            return redirect('/suppliers')->with('message', '業者が見つかりませんでした。');
        }
    }

    public function store(Request $request){
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'manager' => 'required|max:100',
                'phone' => 'required|digits_between:8,11',
            ],[
                'name.required'=>'名前は必須です。',
                'manager.required'=>'担当者は必須です。',
                'phone.required'=>'電話番号は必須です。',
                'phone.digits_between'=>'電話番号を入力してください。',
            ]);

            

            // 商品登録
            $suppliers = new Supplier();
            $suppliers->name = $request->name;
            $suppliers->manager = $request->manager;
            $suppliers->phone = $request->phone;
            $suppliers->save();

            return redirect('/suppliers')->with('message', '新しい業者が登録されました。');
        }

        return view('supplier.store'
        );
        
    }


}
