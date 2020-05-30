<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function Index()
	{
		
		return view('reporting.index');
	}
}
