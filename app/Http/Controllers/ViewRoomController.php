<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class ViewRoomController extends Controller
{
	public function viewRoom()
	{
		$user = \Auth::user();
		$role = $user->role;

		//Admin/Lecturer
		$data=DB::select(DB::raw("SELECT id, roomName, status
			FROM room;"));

	return view('room.viewRoomUI', compact('data', 'role'));
	}

	public function viewRoomDetail($id)
	{
		$data=Room::find($id);
		return view('room.viewRoomDetail', compact("data"));
	}

}
