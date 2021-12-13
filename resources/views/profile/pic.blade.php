@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
       <li><a href="{{url('/home')}}">Home</a></li>
       <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
       <li><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li><a href="{{url('/ChangePhoto')}}">Change Image</a></li>
    </ol>
    <div class="row">

        @include('profile.sidebar')

        <div class="col-md-9">
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
                    <hr>
                    <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="file" name="pic" class="form-control"/>
                        <br />
                        <input type="submit" class="btn btn-success pull-right" name="btn" value="Update Profile Picture"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
