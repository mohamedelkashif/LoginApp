



  <!DOCTYPE html>
<html>
    <head>
        <title>Email verfication</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
        <link  rel="stylesheet" type="text/css"href= "{{ asset('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css"href="css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .navbar-inverse {
    height: 70px;
}
.navbar-inverse.navbar-brand.img{
    height: 500px;
    right: 500px;
}
 .p {
  color: #9d9d9d;
  left: 500px;
}
p
{
    font-size: 35px;
            
            color: #ffffff;
    
    margin-left: 60px;
    margin-top: -29px;
}
.btn.btn-success{
   margin-left: 50px;
    font-size: 20px;
    border-radius:5px;
    color: white;
    font-weight: bold;
}
.btn.btn-primary
{
    font-size: 20px;
    border-radius:5px;
    color: #ffffff;
    font-weight: bold;


}

</style>
</head>
    <body>
        <div class="container">
            <div class="content">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
              <a class="navbar-brand" href="#">
                  <img alt="LoginApp" src="{{ asset('images/login.png') }}" width="31" height="35" id="logo">
                  <p>LoginApp</p>
              </a>
              
        
                </div>
            </nav>
            
<h1>Welcome To LoginApp</h1>
<h2>{{$message}}</h2>
@if($message == 'Confirmation Successfull')
</br>
</br>
<a href="emailconf">Continue please</a>
    
@endif
</div>
<div class="panel-footer">
    <div class="panel-body">
                © 2015 LoginApp
            </div>
  </div>
            

            </div>
           
           
        </div>

    </body>
</html>
