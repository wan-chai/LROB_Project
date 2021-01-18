<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
     protected $table = "roombooking";
    public $timestamps = false;

    private $rules = [
        'dateEvent' => 'required',
        'startTime' => 'required',
        'endTime' => 'required',
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getMessages()
    {
        return [
            'dateBooking.required' => 'Inserte Date Of Booking',
            'startTime.required' => 'Insert Start Time Of Event',
            'endtTime.required' => 'Insert End Time Of Event',
        ];
    }
}
