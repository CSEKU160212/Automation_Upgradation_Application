@extends('layouts.app')


	@section('nav_content')
     <li class="nav-item">
        <a class="nav-link" href="{{ route('welcome') }}">{{ __('Home') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Profile') }}</a>
    </li>
	@endsection

		@section('content')

		@auth
		@if (auth::user()->super_admin)
		<div>
			@if (Session::has('message'))
				<div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
			<form method="POST" action="{{route('roles')}}" arial-label="{{__('Employee')}}" >
			@csrf

			 <div class="form-group row">
		            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

		            <div class="col-md-4">
		                <input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" required  autofocus>

		                    @if ($errors->has('role'))
		                     <span class="invalid-feedback" role="alert">
		                     <strong>{{ $errors->first('role') }}</strong>
		                     </span>
		                    @endif
		            </div>
		        </div>

		        <div class="form-group row">
		            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>

		            <div class="col-md-4">
		                <input id="grade" type="text" class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" required  autofocus>

		                    @if ($errors->has('grade'))
		                     <span class="invalid-feedback" role="alert">
		                     <strong>{{ $errors->first('grade') }}</strong>
		                     </span>
		                    @endif
		            </div>
		        </div>
		 	<div class="form-group row mb-0">
		        <div class="col-md-6 offset-md-4">
		            <button type="submit" class="btn btn-primary">
		                {{ __('Add Role') }}
		                </button>
		         </div>
		     </div>

		</form>	
		</div>
		@endif
		@endauth
		<p>
		<div class="container">
			<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Role Name</th>
		      <th scope="col">Grade</th>
		      @auth
			  @if (auth::user()->super_admin)
		      <th scope="col">Action</th>
		      @endif
		      @endauth
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i = 1; ?>
		  	
		  	@foreach ($roles as $role)
		    <tr>
		      <th scope="row">{{$i}}</th>
		      <td>{{$role->name}}</td>
		      <td>{{$role->grade}}</td>
		      @auth
			@if (auth::user()->super_admin)
		      <td> 
		      		<form action="/roles/delete" method="post">
        {{ csrf_field() }}
        	<input type="hidden" name="id" id="id" value="{{$role->id}}">
       		<button type="submit" class="btn btn-danger">
          	<span class="glyphicon glyphicon-remove"></span> Delete 
        </button>
        </form>
		      </td>
		  @endif
		  @endauth
		    </tr>
		    <?php $i += 1; ?>
		    @endforeach
		  </tbody>
		</table>
			{{$roles->links()}}
		</div>
		</p>
@endsection

