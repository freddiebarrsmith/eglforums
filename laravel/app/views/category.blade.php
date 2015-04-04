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
<br>
<center><img src="http://filebase.heavenmedia.net/SapphireTechnology/1018/4190.gif"></center>
<br>
<br>


<br>
<br>
<table class="table table-striped table-bordered">
	<thead>

		<tr>
			
	</thead>
	<tbody>
	@foreach($topic as $key => $value)
{{-- This foreach loops through each variable --}}	
	{{--*/ $topicid = $value->topicid /*--}}
	{{--*/ $categoryid = $value->categoryid /*--}}
{{-- above topicid and categoryid are assigned as independent variables--}}

			<td><a href=/topic/{{ $topicid }}>{{ $value->topicname }}</a> </td>
			<td><a href=/topic/{{ $topicid }}>{{ $value->username }}</a> </td>
{{-- above each individual topic is --}}


			<td>{{ Form::open(array('route' => 'threaddestroy')) }}
			{{ Form::hidden('topicid', $topicid) }}
			{{ Form::submit('Delete') }}</td>
			{{ Form::close() }}
{{-- Above the value of topicid is passed through to a thread destroying function--}}

		</tr>
	@endforeach
	</tbody>
</table>


<br>
{{--*/ $id = Auth::id();/*--}}
<a href =/newtopic/{{ $categoryid }}/{{ $id }}/ >Create New Topic</a>
<br>



{{--*/ echo $topic->links(); /*--}}



</div>
</body>
</html>
