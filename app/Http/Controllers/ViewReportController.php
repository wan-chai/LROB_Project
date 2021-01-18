<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ViewReportController extends Controller
{
  public function viewReport(request $r)
  {	$user = \Auth::user();
    $role = $user->role;

    $search = "$r->keyword";
    $data=DB::select(DB::raw("SELECT rb.id, rb.dateBooking, rb.startTime, rb.endTime, rb.status, r.roomName, u.name
					FROM roomBooking rb
					LEFT JOIN room r ON r.id = rb.roomId
          LEFT JOIN users u ON u.userid = rb.userId
          WHERE (rb.userId LIKE '%$search%'
          OR r.roomName LIKE '%$search%');"));

    return view('report.viewReportUI', compact('data', 'role'));
  }
}
