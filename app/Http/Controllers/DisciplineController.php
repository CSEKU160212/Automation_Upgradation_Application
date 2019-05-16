<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class DisciplineController extends Controller
{
    public function index()
    {
    	$disciplines = DB::table('disciplines')->select('*')->orderBy('name', 'asc')->paginate(10);
    	$schools = DB::table('schools')->select('*')->orderBy('name', 'asc')->get();
    	return view('discipline', ['disciplines'=> $disciplines, 'schools'=> $schools]);
    }
    public function delete(Request $request)
    {
    	$id = $request->input('id');

        $found = DB::table('employees')->where('disciplines_id', $id)->first();
        if ($found) {
            Session::flash('message', 'Discipline can\'t be deleted!');
            return redirect::back();
        }
        else{
            $deleted = DB::delete('delete from disciplines where id = ?',[$id]);
            Session::flash('message', 'Discipline deleted successfully!');
            return redirect::back();
        }
    }

    public function create(Request $request)
    {
    	$name = $request->input('name');
    	$schools_id = $request->input('school');

    	

        $found = DB::table('disciplines')->where('name', $name)->first();
    	if ($found) {
    		Session::flash('message', 'Discipline name already exists!');
    		return redirect::back();
    	}
    	else{
    		DB::table('disciplines')->insert(
    		['name' => $name,
    		'schools_id' => $schools_id
    		]
    		);
    	Session::flash('message', 'Discipline added successfully!');	
        return redirect::back();
    	}
    }
}
