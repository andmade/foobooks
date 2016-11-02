<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

# Main homepage

Route::get('/', function () {return view('welcome');});

// Book Routes
# View all books
Route::get('/books', 'BookController@index')->name('books.index');

# Display form to add a new book
Route::get('/books/create', 'BookController@create')->name('books.create');

# Process form to add a new book
Route::post('/books', 'BookController@store')->name('books.store');

# Display an individual book
Route::get('/books/{book}', 'BookController@show')->name('books.show');

# Display form to edit an individual book
Route::get('/books/{book}/edit', 'BookController@edit')->name('books.edit');

# Process form to save edits to an individual book
Route::put('/books/{book}', 'BookController@update')->name('books.update');

# Delete an individual book
Route::delete('/books/{book}', 'BookController@destroy')->name('books.destroy');

/**
 * Misc Pages
 * A way to display simple, static pages that don't really need their own controller
 */
Route::get('/help', 'PageController@help')->name('page.help');
Route::get('/faq', 'PageController@faq')->name('page.faq');

/**
 * Contact page
 * Single action controller that contains a __invoke method, so no action is specified
 * This page could also be taken care of via the PageController, it's up to you.
 */
Route::get('/contact', 'ContactController')->name('contact');

/**
 * Development related
 */
# Make it so the logs can only be seen locally
if (App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
