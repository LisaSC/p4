@extends('_master')

@section('content')

	<h1>Comments</h1>
	
	@if(Auth::check())
		<a href='/logout'>Log out {{ Auth::user()->email; }}</a>
	@else 
		<a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
	@endif
	<br><br>
	{{{ $comments }}};
	
@stop