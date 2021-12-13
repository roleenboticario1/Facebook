@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
       <li><a href="{{url('/home')}}">Home</a></li>
       <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
    </ol>

    <div class="row">

        @include('profile.sidebar')
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                     <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <h1 align="center">{{Auth::user()->name}}</h1>
                              <img src="{{URL::to('img/')}}/{{Auth::user()->pic}}" width="100px" height="100px" class="img-circle" src=""/>
                              <div class="caption">
                                 <p align="center">{{ $data->city }} - {{ $data->country }}</p>
                                 <p align="center">
                                     <a href="{{ url('editProfile')}}" class="btn btn-primary">Edit Profile</a>
                                 </p>
                              </div>
                          </div>
                      </div>
                       <div class="col-sm-6 col-md-4">
                          <h4 class=""><span class="label label-default">About</span></h4>
                          <p>{{$data->about}}</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
