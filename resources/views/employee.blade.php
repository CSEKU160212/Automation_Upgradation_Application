@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('employee')}}" arial-label="{{__('Employee')}}" >
	@csrf

	<div class="form-group row">
		<label for="role" class="col-sm-4 col-form-label text-md-right"> {{__('Select Role')}} </label>

		<div class="col-sm-4">
			<select class="form-control" name="role">
			@foreach ($roles as $role)
				<option value="{{$role->id}}"> {{$role->name}} </option>
			@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="section" class="col-sm-4 col-form-label text-md-right"> {{__('Select Section')}} </label>

		<div class="col-sm-4">
			<select class="form-control" name="section">
			@foreach ($sections as $section)
				<option value="{{$section->id}}"> {{$section->name}} </option>
			@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="discipline" class="col-sm-4 col-form-label text-md-right"> {{__('Select Discipline')}} </label>

		<div class="col-sm-4">
			<select class="form-control" name="discipline">
			@foreach ($disciplines as $discipline)
				<option value="{{$discipline->id}}"> {{$discipline->name}} </option>
			@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
         <label for="upgradation_date" class="col-md-4 col-form-label text-md-right">{{ __('Last Upgradation Date') }}</label>

            <div class="col-md-4">
                <input id="upgradation_date" type="date" class="form-control{{ $errors->has('upgradation_date') ? ' is-invalid' : '' }}" name="upgradation_date" required autocomplete="new-upgradation_date">

                     @if ($errors->has('upgradation_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('upgradation_date') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>


 	<div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
                </button>
         </div>
     </div>

</form>

@endsection

