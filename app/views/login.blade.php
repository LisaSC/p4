@extends('_master')

@section('content')
	<h1>Log in</h1>
	<a href='/signup'>New user? You have been missing out! Create your FREE account here.</a>
	<br><br>
	{{ Form::open(array('url' => '/login')) }}
		Email<br>
		{{ Form::text('email') }}<br><br>
		Password:<br>
		{{ Form::password('password') }}<br><br>
		{{ Form::submit('Submit') }}
	{{ Form::close() }}
@stop