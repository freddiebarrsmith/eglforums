<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>EGL Forums</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('forums') }}">EGL Forums</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('forums') }}">View All Categories</a></li>
		@if (Auth::check()) 
		<li>{{--*/ $username = Auth::user()->username; /*--}}
		<a href= "#">Logged in as
{{{ $username }}}</a></li>
		<li>{{ HTML::link('/logout', 'Logout') }}</li>  
		@else
		 <li>{{ HTML::link('/register', 'Register') }}</li>  
         <li>{{ HTML::link('/login', 'Login') }}</li>   
        @endif
		
	</ul>
</nav>
{{--  As can be seen above, this is the navbar, if logged in there will be the option to register or login, if not then it displays the currently logged in user's name--}}


<center><img src="http://filebase.heavenmedia.net/SapphireTechnology/1018/4190.gif"></center>
<br>
<!-- will be used to show any messages -->


	
 	
	@foreach($category as $key => $value)
	 <div class="col-md-3">
	 <div class="well">
	 <center><img src="http://www.esportsheaven.com/_cache/forums/lol._160x160.jpg"></center>
	{{--*/ $categoryid = $value->categoryid /*--}}
			

   
        <h3><a href=category/{{ $categoryid }}>{{ $value->categoryname }}</a></h3>
        <p><a href=category/{{ $categoryid }}>{{ $value->categorydescription }}</a></p>
  
      

			
		
	</div>
  </div>




@endforeach




</div>
</body>
</html>