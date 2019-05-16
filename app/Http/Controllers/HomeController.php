<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userProfile = DB::table('employees')
                        ->join('users', 'employees.users_id', '=', 'users.id')
                        ->join('disciplines', 'employees.disciplines_id', '=', 'disciplines.id')
                        ->join('roles', 'employees.roles_id', '=', 'roles.id')
                        ->join('sections', 'employees.sections_id', '=', 'sections.id')
                        ->join('schools', 'disciplines.schools_id', '=', 'schools.id')
                        ->select( 'users.name' , 'users.email', 'users.contact_no', 'users.joining_date' ,'employees.*','sections.name as sectionName' , 'roles.name as roleName' , 'disciplines.name as disciplineName' , 'schools.name as schoolName')
                        ->where('users_id', auth::user()->id)
                        ->first();

        return view('home', ['userProfile'=> $userProfile]);
    }
}
