<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * お問い合わせ一覧
     */
    public function index()
    {
        $contact_forms = Contact::all();

        return view('contact.index', compact('contact_forms'));
    }

    /**
     * 問い合わせフォーム
     */
    public function form(Request $request)
    {
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'title' => 'required|max:100',
                'content' => 'required',
            ],[
                'name.required'=>'名前は必須です。',
                'email.required'=>'メールアドレスは必須です。',
                'gender.required'=>'性別は必須です。',
                'age.required'=>'年齢は必須です。',
                'title.required'=>'件名は必須です。',
                'content.required'=>'内容は必須です。',
            ]);

           $contact_forms = new contact();
           $contact_forms->id = $request->id;
           $contact_forms->name = $request->name;
           $contact_forms->email = $request->email;
           $contact_forms->gender = $request->gender;
           $contact_forms->age = $request->age;
           $contact_forms->title = $request->title;
           $contact_forms->content = $request->content;
           $contact_forms->save();

            return redirect('/');
        }else{
            $contact_forms = contact::find($request->id);

            return view('contact.form',[
                'contact_forms'=>$contact_forms
            ]);   
        }
    }
}
