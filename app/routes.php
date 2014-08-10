<?php

#Home page
Route::get('/', function() {
	$comments = Comment::all();	
	return View::make('index')->with('comments', $comments);	
});

#GET login
Route::get('/login', array(
		'before' => 'guest',
		function() {
			return View::make('login');
		}
));

#POST login
Route::post('/login', array('before' => 'csrf', function() {
	$credentials = Input::only('email', 'password');
	if (Auth::attempt($credentials, $remember = true)) {
		return Redirect::intended('/')->with('flash_message', 'Welcome back, please keep commenting!');
	}
	else {
		return Redirect::to('/login')
			->with('flash_message', 'Password or username is incorrect; please try again.')
			->withInput();
	}
	return Redirect::to('login');
}));

#GET logout
Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/');
});

#GET signup
Route::get('/signup',
	array(
		'before' => 'guest',
		function() {
	    	return View::make('signup');
		}
	)
);

#POST signup
Route::post('/signup', array('before' => 'csrf', function() {
	$user = new User;
	$user->email    = Input::get('email');
	$user->password = Hash::make(Input::get('password'));
	try {
		$user->save();
	}
	catch (Exception $e) {
		return Redirect::to('/signup')
			->with('flash_message', 'Sign up failed; please try again. Note that we can only associate one accound with each email address.')
			->withInput();
	}
	Auth::login($user);
	return Redirect::to('/')->with('flash_message', 'Thank you for signing up! Now start commenting!');
}));

#Display add form
Route::get('/add/', function() {
	return View::make('add');
});

#Process add form
Route::post('/add/', function() {	
	$comment = new Comment();
	$comment->subject = Input::get('subject');
	$comment->comment = Input::get('comment');

	$comment->save();
	
	return "Your comment has been saved.";
});

#Debug
Route::get('/debug', function() {
	echo '<pre>';
	echo '<h1>environment.php</h1>';
	$path   = base_path().'/environment.php';
	try {
		$contents = 'Contents: '.File::getRequire($path);
		$exists = 'Yes';
	}
	catch (Exception $e) {
		$exists = 'No. Defaulting to `production`';
		$contents = '';
	}
	echo "Checking for: ".$path.'<br>';
	echo 'Exists: '.$exists.'<br>';
	echo $contents;
	echo '<br>';
	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';
	echo '<h1>Debugging?</h1>';
	if(Config::get('app.debug')) echo "Yes"; else echo "No";
	echo '<h1>Database Config</h1>';
	print_r(Config::get('database.connections.mysql'));
	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	} 
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}
	echo '</pre>';
});