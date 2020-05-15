<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    // 14kadai_validation
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
        
        // 17課題 Profile Modelに関連付け
        public function histories()
        {
            return $this->hasMany('App\ProfilesHistory');
        }
}
