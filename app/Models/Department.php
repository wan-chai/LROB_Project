<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "department";
    public $timestamps = false;

    public static function getData($option=true)
	{
		$data = Department::orderBy('id')->get();

		$arr = [];

		if($option)
			$arr[0] ="--Please Select--";
		else
			$arr = [];

		foreach ($data as $r) {
			$arr[$r->id] = $r->department_name;
		}
		return $arr;
	}
}
