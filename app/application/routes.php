<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
*/
// Default Home Page
Route::get('/', function ()
{
    return View::make('home.index'); 
});

// Register Controllers
Route::controller(Controller::detect());

// Authentication Routes
Route::get('logout', function() 
{
    Auth::logout();
    return Redirect::to('/')->with('message','You have successfully logged out.');
});

Route::get('register', function ()
{
    return View::make('auth.register');
});

Route::post('register', array('before' => 'csrf', function ()
{
    
}));

Route::get('lost', function ()
{
    return View::make('auth.lost');
});

Route::post('lost', array('before' => 'csrf', function ()
{
    
}));

Route::get('reset', function ()
{
    return View::make('auth.reset');
});

Route::post('reset', array('before' => 'csrf', function ()
{
    
}));

Route::post('login', array('before' => 'csrf', function ()
{
    $input = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );
    
    $rules = array(
        'username'  => 'required|max:200|email|unique:users',
        'password' => 'required',
    );
    
    $validation = Validator::make($input, $rules);

    if ($validation->passes())
    {
        if(Auth::attempt($input)) {
            return Redirect::to_action('profile@dashboard')->with('message','You have successfully logged in.');
        }
        else {
            return Redirect::to('/')->with('error','Username and password do not match.');
        }
    }
    else {
        return Redirect::to('/')->with_errors($validation);
    }
}));

// Add Filters to routes
Route::filter('pattern: profile/*', 'auth');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('/');
});

Route::filter('admin', function()
{
    
});
