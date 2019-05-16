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
			<form method="POST" action="{{route('disciplines')}}" arial-label="{{__('Disciplines')}}" >
			@csrf

			 <div class="form-group row">
		            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Discipline Name') }}</label>

		            <div class="col-md-4">
		                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required  autofocus>

		                    @if ($errors->has('name'))
		                     <span class="invalid-feedback" role="alert">
		                     <strong>{{ $errors->first('name') }}</strong>
		                     </span>
		                    @endif
		            </div>
		        </div>
				<div class="form-group row">
					<label for="school" class="col-sm-4 col-form-label text-md-right"> {{__('Select School')}} </label>

				<div class="col-sm-4">
					<select class="form-control" name="school">
					@foreach ($schools as $school)
							<option value="{{$school->id}}"> {{$school->name}} </option>
						@endforeach
						</select>
					</div>
				</div>
		        
		 	<div class="form-group row mb-0">
		        <div class="col-md-6 offset-md-4">
		            <button type="submit" class="btn btn-primary">
		                {{ __('Add Discipline') }}
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
		      <th scope="col">Discipline Name</th>
		      @auth
			  @if (auth::user()->super_admin)
		      <th scope="col">Action</th>
		      @endif
		      @endauth
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i = 1; ?>
		  	
		  	@foreach ($disciplines as $discipline)
		    <tr>
		      <th scope="row">{{$i}}</th>
		      <td>{{$discipline->name}}</td>
		      @auth
			@if (auth::user()->super_admin)
		      <td> 
		      		<form action="/discipline/delete" method="post">
        {{ csrf_field() }}
        	<input type="hidden" name="id" id="id" value="{{$discipline->id}}">
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
			{{$disciplines->links()}}
		</div>
		</p>
@endsection

