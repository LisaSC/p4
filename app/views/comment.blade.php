@extends('_master')

@section('content')
	
	<h1>Comment</h1>

	{{ Form::open(array('url' => '/comment', 'method' => 'POST')) }}

		Subject: {{ Form::text('subject') }} <br>
		{{ Form::textarea('comment') }} <br>
		
		{{ Form::submit('Post!') }}
	
	{{ Form::close() }}
	
	
@stop