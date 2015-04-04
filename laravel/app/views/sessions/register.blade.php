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
{{--  As can be seen above, this is the navbar --}}

<h1>Register</h1>

{{ Form::open(array('route' => 'sessions.registerdatabase')) }}
<ul>
<li>
{{ Form::label('username', 'Username:')}}
{{ Form::text('username') }}
</li>

<li>
{{ Form::label('password', 'Password:') }}
{{ Form::password('password') }}
</li>

<li>
{{ Form::submit() }}
</li>
</ul>
{{ Form::close() }}

{{-- This is a form where details are entered for new users-}}

	 @if (Session::has('message'))
 <div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif
