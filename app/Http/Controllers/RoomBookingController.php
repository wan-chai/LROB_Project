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

class RoomBookingController extends Controller
{
	public function bookingForm($id)
	{
		$data=Room::find($id);
		return view('room.bookingFormUI', compact("data"));
	}

	public function saveBooking(request $r)
	{
		$user = \Auth::user();
		$userId = $user->userid;
		$role = $user->role;

		$roomId = $r->input('roomId');
		$dateBooking = $r->input('dateBooking');
		$startTime = $r->input('startTime');
	  $endTime = $r->input('endTime');

		//$startTime = date('H:i:s', strtotime($r->input('startTime')));
		//$endTime = date('H:i:s', strtotime($r->input('endTime')));
		$rules = [
			'roomId'       => 'required',
			'dateBooking'         => 'required',
			'startTime'         => 'required',
			'endTime'         => 'required',
		];

		//validate input
		$this->validate($r, $rules);

		echo $roomId;
		echo $userId;
		echo $dateBooking;
		echo $startTime;
		echo $endTime;

		$data = DB::table('roombooking')
	    ->select( DB::raw('COUNT(userId) as bil'))
	    ->where('roomId', '=', $roomId)
			->where('dateBooking', '=', $dateBooking)
			->where('startTime', '<', $endTime)
			->where('endTime', '>', $startTime)
			->where('status', '=', 1)
	    ->get();

			foreach ($data as $row)
			{
				$count = $row->bil;
				if($count>0)
				{
					return back()->with('message', 'Room not available at the time you choose.');
				}
				else
				{
					$data = new RoomBooking();
					$data->roomId= $roomId;
					$data->userId= $userId;
					$data->datebooking = $dateBooking;
					$data->startTime = $startTime;
					$data->endTime = $endTime;
					$data->status = 1;
					$data->save();

					$data = DB::table('roombooking')
						->select( DB::raw('*'))->where('userId', '=', $userId)
						->get();

					return view('room.listBookingUI',compact('data','role'))->with('message', 'Room not available at the time you choose.');
				}
			}
	}

	public function listBooking()
	{
		$user = \Auth::user();
		//$dept = $user->department_id;
		$userId = $user->userid;
		$role = $user->role;

		$data=DB::select(DB::raw("SELECT rb.id, rb.dateBooking, rb.startTime, rb.endTime, rb.status, r.roomName
					FROM roomBooking rb
					LEFT JOIN room r ON r.id = rb.roomId
					WHERE rb.userId = $userId;
			"));
		return view('room.listBookingUI',compact('data','role'));

	}

	public function cancelBooking($id)
	{
		$user = \Auth::user();
		$userId = $user->userid;
		$role = $user->role;
		$data=DB::UPDATE(DB::raw("UPDATE roombooking SET status = 2  WHERE id = $id;"));

		$data=DB::select(DB::raw("SELECT rb.id, rb.dateBooking, rb.startTime, rb.endTime, rb.status, r.roomName
					FROM roomBooking rb
					LEFT JOIN room r ON r.id = rb.roomId
					WHERE rb.userId = $userId;
			"));

		//create successfully messages using session
		Session::flash('message', 'Booking successfully Cancelled.');
		Session::flash('alert-class', 'alert-success');

		return view('room.listBookingUI',compact('data','role'));

	}

	public function logout()
	{
		\Auth::logout();
		Session::flush();
		return redirect('login');
	}
}
