<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

Route::get('/login', 'Auth\TrisAuthController@getLogin');
Route::post('/login', 'Auth\TrisAuthController@postLogin');

Route::get('/logout', 'Auth\TrisAuthController@getLogout');

Route::get('/{authuser}/changepassword', 'PagesController@getChangePassword');
Route::post('/{authuser}/changepassword', 'PagesController@postChangePassword');

Route::get('/{authuser}/edit', 'PagesController@getEditUserProfile');
Route::post('/{authuser}/edit', 'PagesController@postEditUserProfile');

Route::get('/{authuser}/changephoto', 'PagesController@getChangePhoto');
Route::post('/{authuser}/changephoto', 'PagesController@postChangePhoto');

Route::get('/devices/print', 'InventoryController@printView');
Route::resource('/devices', 'InventoryController');
Route::post('/devices/{devices}/updatestatus', 'InventoryController@updateStatus');

Route::get('/locations/print', 'LocationController@printView');
Route::resource('/locations', 'LocationController');

Route::get('/types/print', 'DeviceTypeController@printView');
Route::resource('/types', 'DeviceTypeController');

Route::get('/users/admins/print', 'SystemAdminController@printView');
Route::resource('/users/admins', 'SystemAdminController');
Route::post('/users/admins/{admins}/updatepermission', 'SystemAdminController@updatePermission');

Route::get('/users/systemusers/print', 'SystemUserController@printView');
Route::resource('/users/systemusers', 'SystemUserController');
Route::post('/users/systemusers/{systemusers}/updatepermission', 'SystemUserController@updatePermission');

Route::get('/logs/activitylogs/print', 'ActivityLogController@printView');
Route::resource('/logs/activitylogs', 'ActivityLogController');

Route::get('/logs/userlogs/print', 'UserLogController@printView');
Route::resource('/logs/userlogs', 'UserLogController');

Route::get('/users/', 'PagesController@usersIndex');
Route::get('/logs/', 'PagesController@logsIndex');
// Ajax Requests
// InventoryController Ajax Rquests
Route::post('/getDeviceById', 'InventoryController@getDeviceByStatus');
Route::post('/getDeviceSlugById', 'InventoryController@getDeviceBySlug');
// DeviceTypeController Ajax Requests
Route::post('/getDeviceTypeSlugById', 'DeviceTypeController@getDeviceTypeBySlug');
// LocationController Ajax Requests
Route::post('/getDeviceLocationSlugById', 'LocationController@getDeviceLocationBySlug');
// SystemAdminController AJax Requests
Route::post('/getUserSlug', 'SystemAdminController@getUserSlug');