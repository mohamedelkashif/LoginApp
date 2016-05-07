@extends('welcome')
@section('nav')
<body>

<strong>Welcome</strong>  <strong>{{ Auth::user()->firstname.Auth::user()->username}}</strong>
</br>
<a href="logout">
<button type="button" class="btn btn-danger">Log Out</button></a>

@endsection

</body>