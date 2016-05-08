
@extends('welcome')
@section('nav')

<h1>Welcome To LoginApp</h1>
<strong><h2>Hi,{{$key}} !</h2></strong>

<h3>Thanks For Registering in LoginApp.com your Confirmation code is:</h3>
<a href ="http://localhost.com:8000/{{$code}}">{{$code}}</a>
<h4>click to activate.</h4>
</div>
<div class="panel-footer">
    <div class="panel-body">
                © 2015 LoginApp
            </div>
  </div>

  @endsection