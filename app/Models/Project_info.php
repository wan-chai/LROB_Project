<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_info extends Model
{
     protected $table = "project_info";
    public $timestamps = false;

    


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
