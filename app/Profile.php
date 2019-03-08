<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Eloquentのcreateで割り当てようとする値は、
     * あらかじめEloquent側で割り当て許可を与えなくてはいけない。
     * セキュリティ上の仕様
     */
     
  protected $fillable = array('name', 'gender', 'hobby', 'introduction');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
	'hobby' => 'required',
	'introduction' => 'required',
    );
}
