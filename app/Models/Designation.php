<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = "designation";
    public $timestamps = false;

    public static function getData($option=true)
	{
		$data = Designation::orderBy('id')->get();

		$arr = [];

		if($option)
			$arr[0] ="--Please Select--";
		else
			$arr = [];

		foreach ($data as $r) {
			$arr[$r->id] = $r->designation_name;
		}
		return $arr;
	}
}
