<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash; //ハッシュ化

use Illuminate\Validation\Rules\Password; 

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * ユーザー一覧
     */
    public function index(Request $request)
    {   
        $keyword =$request->input('keyword');

        $query = User::query();

        if(!empty($keyword)){
            $query->where('id','LIKE',"%{$keyword}%")
            ->orWhere('name','LIKE',"%{$keyword}%");

            $users = $query->orderByDesc('created_at')->paginate(15);

            return view('user.index', compact('users','keyword'));
        }else{
            $users=User::orderBy('created_at','desc')->get()->all();

            return view('user.index',[
                'users' => DB::table('users')->paginate(15),
                'keyword' => $keyword,
            ]);
        }

    }

    //ユーザー登録
    public function register(Request $request){

        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required','email','unique:user',
                'password' => 'required','min:8',
                'password_confirmation' => 'required',
            ],[
                'name.required'=>'名前は必須です。',

                'email.required'=>'メールアドレスは必須です。',
                'email.email' => '有効なメールアドレス形式で指定してください。',
                'email.unique' => '指定のメールアドレスは、既に使用されています。',

                'password.required'=>'パスワードは必須です。',
                'password.min' => 'パスワードは8文字以上にする必要があります。',

                'password_confirmation.required'=>'パスワードは必須です。',
                
            ]);

            $users =new user();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();

            return redirect()->route('loginIndex')->with('registerMessage','登録に成功しました。');

        }else{
            return view('user.register');
        }   
    }

    //ユーザー編集
    public function edit(Request $request){

        $user = User::find($request->id);
        
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required','email','unique:user',
            ],[
                'name.required'=>'名前は必須です。',

                'email.required'=>'メールアドレスは必須です。',
                'email.email' => '有効なメールアドレス形式で指定してください。',
                'email.unique' => '指定のメールアドレスは、既に使用されています。',
            ]);
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            if(isset($request->password)){
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect('/users');
        }else{
            return view('user.editor',[
                'user'=>$user
            ]);
        }
    }
    //詳細
    public function detail(Request $request){

        $user = User::find($request->id);

        return view('user.detail',[
            'user' => $user,
        ]);
    }

    //ログイン
    public function login(Request $request){

        if ($request->isMethod('post')) {
            $validate = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],[
                'email.required' => 'メールアドレスを入力してください。',
                'email.email' => '有効なメールアドレス形式で指定してください。',
                'password.required' => 'パスワードを入力してください。',
            ]);

            if(Auth::attempt($validate)){
                $request->session()->regenerate();
                return redirect()->route('home');
            }

    
        }else{
            if(Auth::check()){
                return redirect()->route('home');
            }else{
                return view('user.login');
            }
        }
        //ログイン失敗時
        return back()->withErrors([
            'Auth' => 'ログインに失敗しました。',
            'comment' => 'メールアドレス、パスワードを確認してください。'
        ])->onlyInput('email');
    }

    //ログアウト
    public function logout(Request $request){
        
        // ログアウト処理
        Auth::logout();

        // 現在使っているセッションを無効化(セキュリティー対策)
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginIndex');
    }

    //削除
    public function delete(Request $request){
        User::find($request->id)->delete();

        return redirect('/users');
    }
}
