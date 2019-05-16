@extends('layouts.app')

@section('nav_content')
     <li class="nav-item">
        <a class="nav-link" href="{{ route('welcome') }}">{{ __('Home') }}</a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="our-webcoderskull">
                  <div class="container">
                    <ul class="row">
                      <li class="col-12 col-md-6 col-lg-3">
                          <div class="cnt-block equal-hight" style="height: 500; width: 660px;">
                            <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive" alt=""></figure>
                            <h3>{{ $userProfile->name }}</h3>
                            <p>
                                {{'Role: '}}{{ $userProfile->roleName }} <br>
                                {{'Discipline: '}}{{ $userProfile->disciplineName }} <br>
                                {{'School: '}}{{ $userProfile->schoolName }} <br>
                                {{'Section: '}}{{ $userProfile->sectionName }} <br>
                                {{'Email: '}}{{ $userProfile->email }} <br>
                                {{'Contact No: '}}{{ $userProfile->contact_no }} <br>
                                {{'Joining Date: '}}{{ $userProfile->joining_date }} <br>
                                {{'Upgradation date: '}}{{ $userProfile->upgradation_date }} <br>
                            </p>
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Accomplishment') }}</button>
                          </div>
                      </li>
                    </ul>
                  </div>
                </section>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
