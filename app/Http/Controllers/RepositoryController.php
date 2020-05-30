<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_info;
use App\Models\Users;
use App\Models\Grading;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class RepositoryController extends Controller
{
   public function Index()
	{
		// $data= Project_info::all();
		// $data= Project_info::where('status', '=', 1)->get();
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;


		$data=DB::select(DB::raw("SELECT p.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name
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
			"));
		

		return view('repository.index', compact('data'));
	}

	public function searchRepository(request $r)
	{	
		$search = "$r->keyword";

		$data=DB::select(DB::raw("
			SELECT p.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name 
			FROM project_info p 
			LEFT JOIN users u1 
			ON u1.userid=p.student_id
			LEFT JOIN users u2 
			ON u2.userid=p.supervisor_id
			LEFT JOIN users u3
			ON u3.userid=p.assessor1_id
			LEFT JOIN users u4
			ON u4.userid=p.assessor2_id
			WHERE p.project_title LIKE '%$search%'
			OR u1.name LIKE '%$search%' 
			OR u1.userid LIKE '%$search%' 
			OR u2.name LIKE '%$search%' 
			OR u2.userid LIKE '%$search%'
			OR u3.name LIKE '%$search%'
			OR u3.userid LIKE '%$search%'
			OR u4.name LIKE '%$search%'
			OR u4.userid LIKE '%$search%'
			AND p.status = 1;"));

		return view('repository.index', compact('data'));	
	}
}
