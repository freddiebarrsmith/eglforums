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

<h1>New Thread</h1>

{{ Form::open(array('route' => 'threaddatabase')) }}
<ul>
<li>
{{ Form::label('texttitle', 'Title of Thread:')}}
{{ Form::text('texttitle') }}
</li>

<li>
{{ Form::label('textofthread', 'Thread Comment:')}}
{{ Form::text('textofthread') }}
</li>
<li>
{{ Form::label('sticky', 'Sticky?:')}}
{{ Form::checkbox('sticky', 'yes', false) }}




</li>

{{ Form::hidden('categoryid', $categoryid) }}

{{{ $categoryid }}}
<li>
{{ Form::submit() }}
</li>
</ul>
{{ Form::close() }}


{{--  This page is basically just a form to enter information into the database --}}

