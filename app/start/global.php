<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	// app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
	switch ($code)
	{
		case 403:
			return Response::view('errors.403', array(), 403);

		case 404:
			return Response::view('errors.404', array(), 404);

	}
});

// Throw 404 error on ModelNotFoundException
App::error(function(Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code)
{
	return Response::view('errors.404', array(), 404);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

/*
|--------------------------------------------------------------------------
| HTML macros.
|--------------------------------------------------------------------------|
*/
require app_path().'/TypiCMS/Macros.php';

/*
|--------------------------------------------------------------------------
| Save locale in session and set app locale on admin side.
|--------------------------------------------------------------------------|
*/
if (Request::segment(1) == 'admin') {

	// If we have a query string like ?locale=xx
	if (Input::get('locale')) {

		// If locale is managed by the app
		if (in_array(Input::get('locale'), Config::get('app.locales'))) {

			// Store locale in session
			Session::put('locale', Input::get('locale'));
			Log::info('Lang is now '.Input::get('locale'));

		}

	}

	// Set locale for admin
	Config::set('app.locale', Session::get('locale', Config::get('app.locale')));

}
