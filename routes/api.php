<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Front end routes
Route::get('/about','API\FrontendController@getAbout');
Route::get('/underneath-organizations','API\FrontendController@get_underneath_organizations');
Route::get('/organization-chart','API\FrontendController@get_organization_chart');
Route::get('/policy-and-programmes','API\FrontendController@get_policy_and_programmes');
Route::get('/staff','API\FrontendController@get_staff');

Route::apiResources(['user'=>'API\UserController']);
Route::get('profile','API\UserController@profile');
Route::put('profile','API\UserController@updateProfile');
Route::get('findUser','API\UserController@search');

/*===========================
			settings
===============================*/

//about


Route::group(['prefix'=>'postaladmin','middleware' => 'auth:api'], function() {
    Route::get('about','API\SettingsController@getAbout');
	Route::post('about','API\SettingsController@postAbout');

	Route::get('contact-us','API\SettingsController@getContactus');
	Route::post('contact-us','API\SettingsController@postContactus');

	Route::get('underneath-organizations','API\SettingsController@getUnderneathOrganizations');
	Route::post('underneath-organizations','API\SettingsController@postUnderneathOrganizations');
	Route::get('organization-chart','API\SettingsController@get_organization_chart');
	Route::post('organization-chart','API\SettingsController@post_organization_chart');

	Route::get('policy-and-programmes','API\SettingsController@get_policy_and_programmes');
	Route::post('policy-and-programmes','API\SettingsController@post_policy_and_programmes');

	Route::apiResources(['staff'=>'API\StaffController']);
	Route::apiResources(['postal-rates'=>'API\PostalRateController']);


});