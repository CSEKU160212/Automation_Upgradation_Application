<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class SchoolController extends Controller
{
     public function index()
    {
    	$schools = DB::table('schools')->select('*')->orderBy('name', 'asc')->paginate(10);
    	return view('school', ['schools'=> $schools]);
    }
    public function delete(Request $request)
    {
    	$id = $request->input('id');

        $found = DB::table('disciplines')->where('schools_id', $id)->first();
        if ($found) {
            Session::flash('message', 'School can\'t be deleted!');
            return redirect::back();
        }
        else{
            $deleted = DB::delete('delete from schools where id = ?',[$id]);
            Session::flash('message', 'School deleted successfully!');
            return redirect::back();
        }
    }

    public function create(Request $request)
    {
    	$name = $request->input('name');

        $found = DB::table('schools')->where('name', $name)->first();
    	if ($found) {
    		Session::flash('message', 'School already exists!');
    		return redirect::back();
    	}
    	else{
    		DB::table('schools')->insert(
    		['name' => $name
    		]);
    	Session::flash('message', 'School added successfully!');	
        return redirect::back();
    	}
	}
}
