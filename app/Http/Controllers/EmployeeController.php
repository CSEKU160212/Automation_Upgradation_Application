<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Auth;

class EmployeeController extends Controller
{
    //

    public function index(){
    	$roles = DB::table('roles')->select('*')->orderBy('name', 'asc')->get();
    	$sections = DB::table('sections')->select('*')->orderBy('name', 'asc')->get();
    	$disciplines = DB::table('disciplines')->select('*')->orderBy('name', 'asc')->get();

        return view('employee', ['roles' => $roles, 'sections' => $sections, 'disciplines' => $disciplines]);
    }
   


    protected function create(Request $request)
    {
    	
    	$users_id =Auth::id();
    	$roles_id = $request->input('role');
    	$sections_id = $request->input('section');
    	$disciplines_id = $request->input('discipline');
    	$upgradation_date = $request['upgradation_date'];

    	DB::table('employees')->insert(
    		['users_id' => $users_id,
    		'roles_id' => $roles_id,
    		'sections_id' => $sections_id,
    		'disciplines_id' => $disciplines_id,
    		'upgradation_date' => $upgradation_date]
    	);
        return redirect('/');
    }


    public function showWelcome()
    {
       $allEmployees = DB::table('employees')
                        ->join('users', 'employees.users_id', '=', 'users.id')
                        ->join('disciplines', 'employees.disciplines_id', '=', 'disciplines.id')
                        ->join('roles', 'employees.roles_id', '=', 'roles.id')
                        ->join('sections', 'employees.sections_id', '=', 'sections.id')
                        ->join('schools', 'disciplines.schools_id', '=', 'schools.id')
                        ->select( 'users.name' , 'users.email', 'users.contact_no', 'users.joining_date' ,'employees.*','sections.name as sectionName' , 'roles.name as roleName' , 'disciplines.name as disciplineName' , 'schools.name as schoolName')
                        ->orderBy('users.name', 'asc')
                        ->paginate(8);

        $totalEmployee = DB::table('employees')->count();

        return view('welcome', ['allEmployees'=> $allEmployees, 'totalEmployee'=>$totalEmployee]);
    }
}
