<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_info;
use App\Models\Users;
use App\Models\Department;
use App\Models\Role;
use App\Models\Designation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class UserController extends Controller
{
	public function Index()
	{
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;
		$deptname = Department::where('id','=',$dept)->first();


		if($role == 1)
		{
			$data=DB::select(DB::raw("SELECT u.id, u.name, u.userid, u.email, d.department_short AS department_name, r.role_name AS role
			FROM users u
			JOIN department d 
			ON u.department_id=d.id
			JOIN role r
			ON u.role=r.id
			WHERE u.status = 1;
			"));
		}

		elseif($role == 2)
		{
		$data=DB::select(DB::raw("SELECT u.id, u.name, u.userid, u.email, d.department_short AS department_name, r.role_name AS role
			FROM users u
			JOIN department d 
			ON u.department_id=d.id
			JOIN role r
			ON u.role=r.id
			WHERE u.status = 1 AND u.department_id = $dept;
			"));
		// dd($data);
		}
		return view('user.index', compact('data', 'deptname', 'role'));
	}

	public function searchUser(request $r)
	{	
		$user = \Auth::user();
		$dept = $user->department_id;
		$role = $user->role;
		$deptname = Department::where('id','=',$dept)->first();
		$search = "$r->keyword";

		if($role == 1)
		{
			$data=DB::select(DB::raw("
			SELECT u.id, u.name, u.userid, u.email, d.department_short AS department_name, r.role_name AS role 
			FROM users u
			LEFT JOIN department d 
			ON u.department_id=d.id
			LEFT JOIN role r 
			ON u.role=r.id
			WHERE (u.name LIKE '%$search%' 
			OR u.userid LIKE '%$search%' 
			OR d.department_name LIKE '%$search%' 
			OR r.role_name LIKE '%$search%')
			AND u.status = 1;"));
		}

		elseif($role == 2)
		{
			$data=DB::select(DB::raw("
			SELECT u.id, u.name, u.userid, u.email, d.department_short AS department_name, r.role_name AS role 
			FROM users u
			LEFT JOIN department d 
			ON u.department_id=d.id
			LEFT JOIN role r 
			ON u.role=r.id
			WHERE (u.name LIKE '%$search%' 
			OR u.userid LIKE '%$search%' 
			OR d.department_name LIKE '%$search%' 
			OR r.role_name LIKE '%$search%')
			AND u.status = 1 AND u.department_id = $dept;"));
		}
		

		return view('user.index', compact('data', 'deptname', 'role'));	
	}

	public function addUser()
	{
		$department = Department::getData();
		$role = Role::getData();
		$designation = Designation::getData();


		return view('user.addUser', compact('department','role','designation'));
	}

	public function saveNewUser(request $r)
	{	
				// dd($r);
		$data = new Users();
		$data->userid = $r->userid;
		$data->password = bcrypt("password");
		$data->name = $r->name;
		$data->email = $r->email;
		$data->role = $r->role;
		$data->department_id = $r->department_id;
		$data->designation_id = $r->designation_id;
		$data->status = 1;
		$data->save();
		return redirect('user');
	}

	public function saveUpdateUser(request $r)
	{	
		$data = Users::find($r->user_id);
		$data->userid = $r->userid;
		$data->name = $r->name;
		$data->email = $r->email;
		$data->role = $r->role;
		$data->department_id = $r->department_id;
		$data->designation_id = $r->designation_id;
		$data->status = 1;
		$data->save();
		return redirect('user');

	}

	public function editUser($id)
	{
		$data=Users::find($id);
		$department = Department::getData();
		$role = Role::getData();
		$designation = Designation::getData();
			// dd($data);

		return view('user.updateUser', compact('data','department','role', 'designation'));
	}

	public function viewUser($id)
	{
		$data=Users::find($id);
		$department = Department::getData();
		$role = Role::getData();
		$designation = Designation::getData();
			// dd($data);

		return view('user.viewUser', compact('data','department','role', 'designation'));
	}

	public function deleteUser($id)
	{
		$data=Users::find($id);
		$data->status = 0;
		$data->save();
		return redirect('user');
	}


}
