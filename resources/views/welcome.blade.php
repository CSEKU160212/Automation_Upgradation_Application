@extends('layouts.app')

@section('nav_content')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Profile') }}</a>
    </li>
@endsection

@section('content')
             <div>
             	<h1 style="text-align: center;">List of all employees (Total Employee: {{$totalEmployee}})</h1>
             	<p>
              	<section class="our-webcoderskull">
				  <div class="container">
				    <ul class="row">
				    	@if (@allEmployees)
				 		@foreach ($allEmployees as $employee)
				      <li class="col-12 col-md-6 col-lg-3">
				          <div class="cnt-block equal-hight" style="height: 410px;">
				            <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive" alt=""></figure>
				            <h3>{{ $employee->name }}</h3>
				            <p>
				            	{{'Role: '}}{{ $employee->roleName }} <br>
				            	{{'Discipline: '}}{{ $employee->disciplineName }} <br>
				            	{{'School: '}}{{ $employee->schoolName }} <br>
				            	{{'Section: '}}{{ $employee->sectionName }} <br>
				            	{{'Email: '}}{{ $employee->email }} <br>
				            	{{'Contact No: '}}{{ $employee->contact_no }} <br>
				            	{{'Joining Date: '}}{{ $employee->joining_date }} <br>
				            	{{'Upgradation date: '}}{{ $employee->upgradation_date }} <br>

				            </p>
				          </div>
				      </li>
				      @endforeach
				      @endif
				    </ul>
				    
				{{$allEmployees->links()}}
				  </div>

				</section>
			</p>
			</div>

@endsection
