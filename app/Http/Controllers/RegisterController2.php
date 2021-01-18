<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

//use App\Models\Project_info;

class RegisterController2 extends Controller
{
	public function registerLink()
	{
		return view('registerUI');
	}
	public function cancelRegLink()
	{
		return view('auth.login');
	}

  //new register account by user
public function register(request $r)
{
  //$data = new Users();
  $userid = $r->input('userid');
  $email = $r->input('email');
  $password1 = $r->input('password');
  $password = bcrypt($password1);
  $name = $r->input('name');
  $status = 1;



  //validate input
  //$this->validate($r, $rules);
  $data=DB::table('users')->insert(
      ['userid' => $userid, 'name'=>$name, 'email' => $email, 'password' => $password, 'role' => 2, 'status' => 1]
  );

  //create successfully messages using session
  Session::flash('message', 'Your user account successfully registed. Please login to continue using this system.');
  Session::flash('alert-class', 'alert-success');

  return view('auth.login');

}

}
