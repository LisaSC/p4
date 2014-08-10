@extends('_master')

@section('content')

	<h1>Comments</h1>
	
	@if(Auth::check())
		<a href='/logout'>Log out {{{ Auth::user()->email }}}</a>
		<br><br><br>
		<h2><b><a href='/comment'>Make comment!</a></b></h2>
	@else 
		<a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
	@endif
	<br><br>
	@foreach($comments as $comment)
		<b>{{{ $comment->subject }}}</b><br>
		{{{ $comment->comment }}}<br><br>
	@endforeach
	
@stop