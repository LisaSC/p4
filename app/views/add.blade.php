@extends('_master')

@section('content')
	
	<h1>Comment</h1>

	{{ Form::open(array('url' => '/add', 'method' => 'POST')) }}

		Subject: {{ Form::text('subject') }} <br>
		Comment: {{ Form::textarea('comment') }} <br>
		
		{{ Form::submit('Post!') }}
	
	{{ Form::close() }}
	
	
@stop