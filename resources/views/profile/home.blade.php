@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
       <li><a href="{{url('/home')}}">Home</a></li>
    </ol>
    <div class="row">
        
       @include('profile.sidebar')
       
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     Welcome to your Profile!
                     <br />
                     <img src="{{URL::to('img/')}}/{{Auth::user()->pic}}" width="120px" height="120px" class="img-circle" src=""/>
                     <br />
                     <a href="{{URL::to('ChangePhoto')}}">Change Profile Picture</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
