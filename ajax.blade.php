<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style2.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script
	 src="https://code.jquery.com/jquery-3.3.1.min.js"
	 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-fixed-top nav-tabs">
		<div class="container-fluid">
			<div class="row-sm-4" align="right"> 
				<div class="nav-tabs navbar-toggler-right">	
				</div>
			</div>	
		</div>
	</nav>
    <div class="container">
        <h1>Register Form</h1>
        <div class="row">
        <div class="col-lg-5">
            <h2>Get Request</h2>
            <button type="button" class="btn btn-primary" id="get">Get</button>
        </div> 
        <div class="col-lg-5">
            <h2>Register Form</h2>
           <form id="register" action="post">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <label for="email"></label>
               <input type="text" id='email' class="forn-control">
                <label for="pincode"></label>
                <input type="number" id="pincode" class="forn-control">
                <input type="submit" value="Register" class="btn btn-secondary">
           </form>
        </div>
        
    </div>
    <div id="getRequest"></div>
    <div id="postRequest"></div>
    <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
        $.ajaxSetup({
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
        });
            $(document).ready(function(){
                $('#get').click(function(){
                    $ajax({
                        type:"GET",
                        url:"get",
                        success:function(data){
                            console.log(data);
                            $('#getRequest').append(data);
                        }
                    })
                });
                $('#register').submit(function(){
                    var email=$('3email').val();
                    var pincode=$('#pincode').val();
                    var dataString="email="+email+"pincode="+pincode;
                    $.ajax({
                        type:"POST",
                        url:"register",
                        data:dataString,
                        success:function(){
                            console.log(data);
                            $('postRequest').html(data);
                        }
                     })
                });
            });
        </script>
        </div>
</body>
</html>