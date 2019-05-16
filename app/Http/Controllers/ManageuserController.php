<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class ManageuserController extends Controller
{
    public function index()
    {
    	return view('manageuser');
    }
}
