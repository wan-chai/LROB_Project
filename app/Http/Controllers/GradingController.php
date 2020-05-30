<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_info;
use App\Models\Users;
use App\Models\Grading;
use App\Models\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class GradingController extends Controller
{
	public function Index()
	{
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;

		$deptname = Department::where('id','=',$dept)->first();

		$data=DB::select(DB::raw("
			SELECT g.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name, g.prop_sv, g.prop_ass, g.prog_sv, g.demo_sv, g.present_ass, g.demo_ass, g.logbook_sv, g.report_sv, g.current_stat
			FROM grading g
			LEFT JOIN project_info p 
			ON p.id=g.project_id
			LEFT JOIN users u1 
			ON u1.userid=p.student_id
			LEFT JOIN users u2 
			ON u2.userid=p.supervisor_id
			LEFT JOIN users u3
			ON u3.userid=p.assessor1_id
			LEFT JOIN users u4
			ON u4.userid=p.assessor2_id
			WHERE g.status = 1 AND u1.department_id = $dept;"));

		return view('grading.index', compact('data', 'deptname'));
	}

	public function searchGrading(request $r)
	{	
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;
		$deptname = Department::where('id','=',$dept)->first();

		$search = "$r->keyword";

		$data=DB::select(DB::raw("
			SELECT p.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name, g.current_stat
			FROM grading g
			LEFT JOIN project_info p 
			ON p.id=g.project_id
			LEFT JOIN users u1 
			ON u1.userid=p.student_id
			LEFT JOIN users u2 
			ON u2.userid=p.supervisor_id
			LEFT JOIN users u3
			ON u3.userid=p.assessor1_id
			LEFT JOIN users u4
			ON u4.userid=p.assessor2_id
			WHERE (p.project_title LIKE '%$search%'
			OR u1.name LIKE '%$search%' 
			OR u1.userid LIKE '%$search%' 
			OR u2.name LIKE '%$search%' 
			OR u2.userid LIKE '%$search%'
			OR u3.name LIKE '%$search%'
			OR u3.userid LIKE '%$search%'
			OR u4.name LIKE '%$search%'
			OR u4.userid LIKE '%$search%')
			AND p.status = 1 AND u1.department_id = $dept;"));

		return view('grading.index', compact('data', 'deptname'));	
	}

	public function addProject()
	{
		return view('project.addproject');
	}

	public function saveNewProject(request $r)
	{	
		$data = new Project_info();
		$data->project_title = $r->project_title;
		$data->student_id = $r->student_id;
		$data->supervisor_id = $r->supervisor_id;
		$data->assessor1_id = $r->assessor1_id;
		$data->assessor2_id = $r->assessor2_id;
		$data->status = 1;
		$data->save();

		$find = Project_info::where('student_id','=',$data->student_id)->get()->first();
		$grade = new Grading();
		$grade->project_id = $find->id;
		$grade->status = 1;
		$grade->save();
		// dd($grade);

		return redirect('grading');
	}

	public function saveUpdateGrading(request $r)
	{	
		$data = Project_info::find($r->user_id);
		$data->project_title = $r->project_title;
		$data->student_id = $r->student_id;
		$data->supervisor_id = $r->supervisor_id;
		$data->assessor1_id = $r->assessor1_id;
		$data->assessor2_id = $r->assessor2_id;
		$data->status = 1;
		$data->save();
		return redirect('grading');

	}

	public function editGrading($id)
	{
	$data=Grading::find($id);		
	// $data=Grading::where('project_id','=',$id)->get();
		// dd($data);
	// dd($data->id);
	$info=DB::select(DB::raw('
		SELECT g.id,p.project_title, u1.name AS student_name, u2.name AS supervisor_name, u3.name AS assessor1_name, u4.name AS assessor2_name, g.prop_sv, g.prop_ass, g.prog_sv, g.demo_sv, g.present_ass, g.demo_ass, g.logbook_sv, g.report_sv, g.current_stat
		FROM grading g
		LEFT JOIN project_info p 
		ON p.id=g.project_id
		LEFT JOIN users u1 
		ON u1.userid=p.student_id
		LEFT JOIN users u2 
		ON u2.userid=p.supervisor_id
		LEFT JOIN users u3
		ON u3.userid=p.assessor1_id
		LEFT JOIN users u4
		ON u4.userid=p.assessor2_id
		WHERE g.id = ".$id." AND g.status = 1 ;'));
	// dd($info);

	return view('grading.updateGrading', compact('data','info'));
}

public function viewGrading($id)
{
		
	$data=Grading::all();
		// return view('grading.viewGrading', compact("data"));
	return view('grading.viewGrading', compact('data'));
}

public function deleteGrading($id)
{
	$data=Grading::find($id);
	$data->status = 0;
	$data->save();
	return redirect('grading');
}

}
