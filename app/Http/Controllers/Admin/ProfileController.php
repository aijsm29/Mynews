<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\Models\Profile;


class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
     public function Profile(Request $request)
     {
         // 以下を追記
        // Validationを行う
        $this->validate(request,create::$rules);
        
        $create = new create;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
       
         //データベースに保存する
        $create->fill($form);
        $create->save();
        
          // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
}
