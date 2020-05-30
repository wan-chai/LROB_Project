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

class ProjectController extends Controller
{
	public function Index()
	{
		$user = \Auth::user();
		$dept = $user->department_id;
		$sv = $user->userid;
		$role = $user->role;
		
		if($role == 1)
		{
			$deptname = Department::where('id','=',$dept)->first();
			$data=DB::select(DB::raw("SELECT u.id, u.name, u.userid, u.email, d.department_short AS department_name, r.role_name AS role
			FROM users u
			JOIN department d 
			ON u.department_id=d.id
			JOIN role r
			ON u.role=r.id
			WHERE u.status = 1;
			"));
			return view('user.index', compact('data', 'deptname', 'role'));
		}

		//fyp coordinator
		if($role == 2)
		{
			$name = Department::where('id','=',$dept)->first();
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
				WHERE p.status = 1 AND u1.department_id = $dept ;
				"));
		}
		//staff@supervisor
		elseif($role == 3){
			$name = Users::where('userid','=', $sv)->first();
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
				WHERE p.status = 1 AND p.supervisor_id = $sv;
				"));
		}
			//student
			elseif($role == 4){
			$name = Users::where('userid','=', $sv)->first();
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
				WHERE p.status = 1 AND p.student_id = $sv;
				"));
		}

		// dd($data);
		return view('project.index', compact('data','name', 'role'));
	}

	public function searchProject(request $r)
	{	$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;
		$sv = $user->userid;

		$deptname = Department::where('id','=',$dept)->first();

		$search = "$r->keyword";

		if($role == 2)
		{
			$name = Department::where('id','=',$dept)->first();
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
				LEFT JOIN department d
				ON d.id=u1.department_id
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

		}

		elseif($role == 3){
			$name = Users::where('userid','=', $sv)->first();
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
				LEFT JOIN department d
				ON d.id=u1.department_id
				WHERE (p.project_title LIKE '%$search%'
				OR u1.name LIKE '%$search%' 
				OR u1.userid LIKE '%$search%' 
				OR u2.name LIKE '%$search%' 
				OR u2.userid LIKE '%$search%'
				OR u3.name LIKE '%$search%'
				OR u3.userid LIKE '%$search%'
				OR u4.name LIKE '%$search%'
				OR u4.userid LIKE '%$search%')
				AND p.status = 1 AND p.supervisor_id = $sv;"));

		}

		return view('project.index', compact('data','name', 'role'));	
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

		return redirect('project');
	}

	public function saveUpdateProject(request $r)
	{	
		$data = Project_info::find($r->project_id);
		$data->project_title = $r->project_title;
		$data->student_id = $r->student_id;
		$data->supervisor_id = $r->supervisor_id;
		$data->assessor1_id = $r->assessor1_id;
		$data->assessor2_id = $r->assessor2_id;
		$data->status = 1;
		$data->save();
		return redirect('project');

	}

	public function editProject($id)
	{
		$data=Project_info::find($id);
		return view('project.updateProject', compact("data"));
	}

	public function viewProject($id)
	{
		$data=Project_info::find($id);
		return view('project.viewProject', compact("data"));
	}

	public function deleteProject($id)
	{
		$data=Project_info::find($id);
		$data->status = 0;
		$data->save();
		return redirect('project');
	}

	public function logout()
	{
		\Auth::logout();
		Session::flush();
		return redirect('login');
	}
}
