<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

// 以下追記 17課題
use App\ProfilesHistory;
use Carbon\carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
    
    
        return redirect('admin/profile/create');
    }

    
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules); // Validationをかける
        $profile = Profile::find($request->id); // Profile Modelからデータ取得
        $profile_form = $request->all(); //　送信されてきたフォームデータ格納
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save(); // 該当するデータを上書き保存
        
        
        // 以下追記 17課題
        $histoty = new ProfilesHistory;
        $histoty->profile_id = $profile->id;
        $histoty->edited_at = Carbon::now();
        $histoty->save();
        
        return redirect('admin/profile/edit');
    }
}
