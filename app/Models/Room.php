<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected $table = "room";
    public $timestamps = false;

    private $rules = [
        'roomName' => 'required',
        'status' => 'required',
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getMessages()
    {
        return [
            'roomName.required' => 'Insert The Room Name',
            'status.required' => 'Insert The Room Status',
        ];
    }
}
