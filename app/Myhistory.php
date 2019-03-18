<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myhistory extends Model
{
    protected $guarded = array('id');
    protected $primaryKey = 'id';
    
    public static $rules = array(
        'profile_id' => 'required',
        'user_id' => 'required',
        'edited_at' => 'required',
    );
}
