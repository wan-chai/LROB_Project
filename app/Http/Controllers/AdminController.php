<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_info;
use App\Models\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class AdminController extends Controller
{

	public function Index()
	{
		$data= Users::where('status', '=', 1)->get();
		return view('admin.index', compact("data"));
	}

	public function viewUpdate($id)
	{
		$data=Project_info::find($id);
		return view('project.updateProject', compact("data"));
	}

}