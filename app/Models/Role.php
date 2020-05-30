<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public $timestamps = false;

    public static function getData($option=true)
	{
		$data = Role::orderBy('id')->get();

		$arr = [];

		if($option)
			$arr[0] ="--Please Select--";
		else
			$arr = [];

		foreach ($data as $r) {
			$arr[$r->id] = $r->role_name;
		}
		return $arr;
	}
}