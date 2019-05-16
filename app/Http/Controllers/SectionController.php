<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class SectionController extends Controller
{
     public function index()
    {
    	$sections = DB::table('sections')->select('*')->orderBy('name', 'asc')->paginate(10);
    	return view('section', ['sections'=> $sections]);
    }
    public function delete(Request $request)
    {
    	$id = $request->input('id');

        $found = DB::table('employees')->where('sections_id', $id)->first();
        if ($found) {
            Session::flash('message', 'Section can\'t be deleted!');
            return redirect::back();
        }
        else{
            $deleted = DB::delete('delete from sections where id = ?',[$id]);
            Session::flash('message', 'Section deleted successfully!');
            return redirect::back();
        }
    }

    public function create(Request $request)
    {
    	$name = $request->input('name');

        $found = DB::table('sections')->where('name', $name)->first();
    	if ($found) {
    		Session::flash('message', 'Section already exists!');
    		return redirect::back();
    	}
    	else{
    		DB::table('sections')->insert(
    		['name' => $name
    		]);
    	Session::flash('message', 'Section added successfully!');	
        return redirect::back();
    	}
	}
}
