<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));

Route::group(array('prefix' => 'listing'), function() {
	Route::get('/', array('as' => 'listing', 'uses' => 'ListingController@index'));
});

Route::group(array('prefix' => 'account'), function() {
	Route::get('/edit', array('as' => 'account.edit', 'before' => 'auth', 'uses' => 'AccountController@edit'));
	Route::get('/create', array('as' => 'account.create', 'uses' => 'AccountController@create'));
	Route::get('/login', array('as' => 'account.login', 'uses' => 'AccountController@login'));	
	Route::get('/dashboard', array('as' => 'account.dashboard', 'before' => 'auth', 'uses' => 'AccountController@index'));
	Route::get('/category', array('as' => 'account.add.category', 'before' => 'auth', 'uses' => 'CategoryController@add'));		

	Route::post('/login', array('as' => 'account.login', /*'before' => 'csrf',*/ 'uses' => 'AccountController@authorization'));
	Route::get('/logout', array('as' => 'account.logout', 'uses' => 'AccountController@logout'));
});

Route::group(array('prefix' => 'admin'), function() {
	Route::get('/settings/{tab?}', array('as' => 'admin.settings', 'before' => 'auth', 'uses' => 'SettingsController@edit'));	
	Route::post('/settings', array('as' => 'admin.save-settings', 'before' => 'auth', 'uses' => 'SettingsController@save'));	
	
	// Fieldset
	Route::get('/fieldset/{id?}', array('as' => 'admin.fieldset', 'before' => 'auth', 'uses' => 'FieldsetController@index'));	
	Route::get('/fieldset-form/{id?}', array('as' => 'admin.fieldset.form', 'before' => 'auth', 'uses' => 'FieldsetController@getForm'));	
	Route::post('/fieldset', array('as' => 'admin.add-fieldset', 'before' => 'auth', 'uses' => 'FieldsetController@save'));	
	Route::get('/edit-fieldset/{id}', array('as' => 'admin.fieldset.edit', 'before' => 'auth', 'uses' => 'FieldsetController@edit'));	
	Route::get('/new-fieldset/', array('as' => 'admin.fieldset.new', 'before' => 'auth', 'uses' => 'FieldsetController@edit'));	
	Route::get('/fieldset/delete/{id}', array('as' => 'admin.fieldset.delete', 'before' => 'auth', 'uses' => 'FieldsetController@delete'));	
	Route::post('/fieldset/save', array('as' => 'admin.fieldset.save', 'before' => 'auth', 'uses' => 'FieldsetController@doSave'));	
	Route::post('/fieldset/delete', array('as' => 'admin.fieldset.do.delete', 'before' => 'auth', 'uses' => 'FieldsetController@doDelete'));	
		
	Route::get('/field/delete/{id}', array('as' => 'admin.field.delete', 'before' => 'auth', 'uses' => 'FieldsetController@deleteField'));	
	Route::post('/field/delete', array('as' => 'admin.field.do.delete', 'before' => 'auth', 'uses' => 'FieldsetController@doDeleteField'));	
	Route::post('/field/save', array('as' => 'admin.field.save', 'before' => 'auth', 'uses' => 'FieldsetController@doSaveField'));	
	Route::get('/field/{fid}/{id?}', array('as' => 'admin.field.edit', 'before' => 'auth', 'uses' => 'FieldsetController@editField'));	


	// Category
	Route::get('/category/{id?}', array('as' => 'admin.category', 'before' => 'auth', 'uses' => 'CategoryController@index'));	
	Route::get('/category-form/{id?}', array('as' => 'admin.category.form', 'before' => 'auth', 'uses' => 'CategoryController@getForm'));	
	Route::post('/category', array('as' => 'admin.add-category', 'before' => 'auth', 'uses' => 'CategoryController@save'));	
	Route::delete('/category', array('as' => 'admin.delete-category', 'before' => 'auth', 'uses' => 'CategoryController@delete'));	
	Route::post('/get-categories', array('as' => 'admin.get-categories', 'before' => 'auth', 'uses' => 'CategoryController@getCategories'));	

	// Route::get('/category/{id?}', array('as' => 'admin.category', 'before' => 'auth', 'uses' => 'CategoryController@index'));
});

Route::group(array('prefix' => 'advert'), function() {
	Route::get('/create.html', array('as'=>'advert.create', 'uses' => 'AdvertController@index'));
	Route::post('/create', array('as'=>'advert.create.new', 'uses' => 'AdvertController@create'));
});

Route::group(array('prefix' => 'category'), function() {
	Route::get('/chooser', array('as'=>'category.chooser', 'uses' => 'CategoryController@getCategoryChooser'));
	Route::get('/category-list-items/{id?}', array('as' => 'admin.category.list.item', 'uses' => 'CategoryController@getListItems'));
});

Route::group(array('prefix' => 'app'), function() {
	Route::get('/settings/{name?}', array('as' => 'app.settings', 'before' => 'ajax', 'uses' => 'ApplicationController@settings'));
	Route::get('/image/{type}/{size}/{filename}', array('as' => 'app.image', 'uses' => 'ImageController@getImage'));
});

// 	// main page for the admin section (app/views/admin/dashboard.blade.php)
//     Route::get('/listing', function() {
//     	die('Hello 1 2 3 ');
//         return View::make('admin.dashboard');
//     });
// });

// Route::controller('listing', 'ListingController');

// Handle the listing routes here
// Route::get('listing', array('before' => 'old', 'uses' => 'ListingController@index'));

// Route::post('postLogin',array('before' => 'csrf','uses'=>AuthController@postLogin) );




