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
<table class="table table-striped table-bordered">
	
	<tbody>
	<td>{{ $content->content }}</td>
	@foreach($post as $key => $value)
	{{-- This foreach loops through each variable --}}	

{{--*/ $postid = $value->postid /*--}}
		{{--*/ $topicid = $value->topicid /*--}}
		{{-- above topicid and postid are assigned as independent variables--}}
	<tr>
	<td>	{{ $value->username }}</td>
	<td>

	{{ $value->posttext }}
<td>{{ Form::open(array('route' => 'postdestroy')) }}
			{{ Form::hidden('postid', $postid) }}
			{{ Form::submit('Delete') }}</td>
			{{ Form::close() }}

			{{-- Above the value of postid is passed through to a postdestroying function--}}

		</td></tr>
	@endforeach
	</tbody>
</table>




{{--*/ $id = Auth::id();/*--}}

<a href =/newpost/{{ $topicid }}/{{ $id }}/ >Reply to This Topic</a>

<br>

{{--*/ echo $post->links(); /*--}}



</div>
</body>
</html>
