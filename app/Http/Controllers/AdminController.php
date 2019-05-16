<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class AdminController extends Controller
{
    public function index()
    {
    	return view('admin');
    }
}
