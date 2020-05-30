<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
     protected $table = "users";
    public $timestamps = false;

    public static function getData()
    {

            // $refs = self::get();


            $arr = [];

        foreach ($refs as $ref) {
            $arr[$ref->id] = $ref->country_name;
        }
        return $arr;
    }


    private $rules = [
        'code' => 'required',
        'descr' => 'required|min:3',
        'cat' => 'required|not_in:0',
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getMessages()
    {
        return [
            'code.required' => 'Kod adalah mandatori',
            'descr.required' => 'Penerangan adalah mandatori',
            'descr.min' => 'Minimum Penerangan adalah sebanyak lima (3) aksara',
            'cat.not_in' => 'Jenis Kod adalah mandatori',
        ];
    }
}
