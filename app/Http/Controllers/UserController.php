<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash; //ハッシュ化

use Illuminate\Validation\Rules\Password; 

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

        if(isset($keyword)){
            $query->where('id','LIKE',"%{$keyword}%")
            ->orWhere('name','LIKE',"%{$keyword}%");
        }
        $users = $query->orderByDesc('updated_at')->paginate(15);
        $count = $query->count();
        

        return view('user.index',[
            'users' => $users,
            'count' => $count,
            'keyword' => $keyword,
        ]);
        

    }

    //ユーザー登録
    public function register(Request $request){

        if ($request->isMethod('post')) {
            // バリデーション
            $request->validate([
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:254', 'unique:users'],
                'password' => ['required', 'string', 'max:128',password::min(8), 'confirmed' ],
                'password_confirmation' => ['required', 'string'],
            ],[
                'name.required' => 'ユーザー名は必須です。',
                'name.max' => 'ユーザー名は、 50 文字以内にする必要があります。',
    
                'email.required' => 'メールアドレスは必須です。',
                'email.email' => '有効なメールアドレス形式で指定してください。',
                'email.max' => 'メールアドレスは、 254 文字以内にする必要があります。',
                'email.unique' => '指定のメールアドレスは、既に使用されています。',
    
                'password.required' => 'パスワードは必須です。',
                'password.max' => 'パスワードは、 128 文字以内にする必要があります。',
                'password.confirmed' => 'パスワード【確認】と入力内容が一致しません。',
                'password.min' => 'パスワードは8文字以上にする必要があります。',
    
                'password_confirmation.required' => 'パスワード【確認】は必須です。',
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
