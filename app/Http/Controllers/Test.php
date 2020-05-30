<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_info;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class Test extends Controller
{
   public function Index()
	{
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;

		$stud = DB::select(DB::raw("SELECT distinct(u1.department_id) AS department
			FROM project_info p
			LEFT JOIN users u1 
			ON u1.userid=p.student_id;
			"));

		dd($stud);

		$sql = "SELECT p.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name
			FROM project_info p
			LEFT JOIN users u1 
			ON u1.userid=p.student_id
			LEFT JOIN users u2 
			ON u2.userid=p.supervisor_id
			LEFT JOIN users u3
			ON u3.userid=p.assessor1_id
			LEFT JOIN users u4
			ON u4.userid=p.assessor2_id
			WHERE p.status = 1;
			";

			if($role == 2)
			$senarai = \DB::select(\DB::raw($sql), ['idkursus' => $r->id]);
		
		

		// dd($data);
  // $senarai = \DB::select(\DB::raw($sql), ['idkursus' => $r->id]);
		return view('project.index', compact('data'));
	}
}
