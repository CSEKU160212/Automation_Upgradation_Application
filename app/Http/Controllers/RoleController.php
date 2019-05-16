<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;


class RoleController extends Controller
{
    public function index()
    {
    	$roles = DB::table('roles')->select('*')->orderBy('name', 'asc')->paginate(10);
    	return view('roles', ['roles' => $roles]);
    }

    public function create(Request $request)
    {
    	$name = $request->input('role');
    	$grade = $request->input('grade');

    	$found = DB::table('roles')->where('name', $name)->first();
    	if ($found) {
    		Session::flash('message', 'Role already exists!');
    		return redirect::back();
    	}
    	else{
    		DB::table('roles')->insert(
    			['name' => $name,
    			'grade' => $grade]
    		);
    		Session::flash('message', 'Role added successfully!');
            return redirect::back();
    	}
    }

    public function delete(Request $request)
    {

     $id = $request->input('id');


        $found = DB::table('employees')->where('roles_id', $id)->first();
        if ($found) {
            Session::flash('message', 'Role can\'t be deleted!');
            return redirect::back();
        }
        else{
            $deleted = DB::delete('delete from roles where id = ?',[$id]);  
            Session::flash('message', 'Roles deleted successfully!');    
            return redirect::back();
        }
    }

}
