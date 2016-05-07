@extends('welcome')
@section('nav')
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

@import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";



body {
    background-image: linear-gradient(45deg, rgba(194, 233, 221, 0.5) 1%, rgba(104, 119, 132, 0.5) 100%), linear-gradient(-45deg, #494d71 0%, rgba(217, 230, 185, 0.5) 80%);
   margin: 0;
  }

body {
    background-image: linear-gradient(45deg, rgba(194, 233, 221, 0.5) 1%, rgba(104, 119, 132, 0.5) 100%), linear-gradient(-45deg, #494d71 0%, rgba(217, 230, 185, 0.5) 80%);
   margin: 0;
  }

#buttons {
    padding: 2px 2px;
    width: 330px;
    overflow: hidden;
    
}


.button {
    background: #DCE0E0;
    position: relative;
    display: block;
    float: left;
    height: 40px;
    margin: 4px;
    overflow: hidden;
    width: 200px;
    border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;

}

.icon {
    display: block;
    float: left;
    position: relative;
    z-index: 3;
    height: 100%;
    vertical-align: top;
    width: 38px;
    -moz-border-radius-topleft: 3px;
    -moz-border-radius-topright: 0px;
    -moz-border-radius-bottomright: 0px;
    -moz-border-radius-bottomleft: 3px;
    -webkit-border-radius: 3px 0px 0px 3px;
    border-radius: 3px 0px 0px 3px;
    text-align: center;
}

.icon i {
    color: #fff;
    line-height: 42px;
}

.slide {
    z-index: 2;
    display: block;
    margin: 0;
    height: 100%;
    left: 38px;
    position: absolute;
    width: 162px;
    font-style: normal;
    -moz-border-radius-topleft: 0px;
    -moz-border-radius-topright: 3px;
    -moz-border-radius-bottomright: 3px;
    -moz-border-radius-bottomleft: 0px;
    -webkit-border-radius: 0px 3px 3px 0px;
    border-radius: 0px 3px 3px 0px;
}

.slide p {
    font-family: 'Handlee', cursive;;
    
    border-left: 1px solid #fff;
    border-left: 1px solid rgba(255,255,255,0.35);
    color: #fff;
    font-size: 16px;
    left: 0;
    margin: 0;
    position: absolute;
    text-align: center;
    top: 10px;
    width: 100%;
}

.button .slide {
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.facebook iframe {
    display: block;
    position: absolute;
    right: 23px;
    top: 10px;
    z-index: 1;
}

.twitter iframe {
    width: 90px !important;
    right: 5px;
    top: 10px;
    z-index: 1;
    display: block;
    position: absolute;
}

.google #___follow_0 {
    width: 350px !important;
    top: 10px;
    right: 45px;
    position: absolute;
    display: block;
    z-index: 1;
}

.youtube #___ytsubscribe_0 {
    top: 10px;
    right: 1px;
    position: absolute;
    display: block;
    z-index: 1;
}

.facebook:hover .slide {
    left: 180px;
}

.twitter:hover .slide {
    top: -40px;
}

.google:hover .slide {
    bottom: 40px;
}

.youtube:hover .slide {
    left: -150px;
}

.facebook .icon, .facebook .slide {
    background: #305c99;
}

.twitter .icon, .twitter .slide {
    background: #00cdff;
}

.google .icon, .google .slide {
    background: #d24228;
}

.youtube .icon, .youtube .slide {
    background: #b31217;
}

</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="col-sm-4">
	<form "form-horizontal" role="form" method="POST" action"login">
		
		<input type="email" style="width:400px" name="email" required class="form-control" id="email1" placeholder="Email">
		</br>
		
		<input type="password" style="width:400px"  name="password" required class="form-control" id="password1" placeholder="Password">
		</br>
		
		
		
		<button type="submit" class="btn btn-success"  id="signup">Sign In</button>
		</br>
	

	
	</form>
	</div>


	<div class="col-sm-2">
		<div class="row">
		<h1>Or</h1>
	</div>
	</div>

	<div class="col-sm-4">
		{{-- <div class="google button">
    <i class="icon">
      <i class="fa fa-google-plus"></i>
  </i> --}}
  {{-- <div class="slide">
    <p>
     Gmail
    </p> --}}
    <a class="google button " id="right-1" href="google">


    	<i class="icon">
    		
   			 <i class="fa fa-google-plus "></i>
   			    			</i>
   		
   		<i class="slide"><p>SignIn with Gmail</p> </i>
 		 </a>

         @if(session()->has('message'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Account is not activated</strong>
  
</div>


@elseif(session()->has('messageerror'))
<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Email or password is incorrect</strong>
  
</div>
@elseif(session()->has('messageconfirmed'))
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Account has been activated</strong>

@endif

  </div>
  

	<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  </div>






@endsection


