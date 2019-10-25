<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send-notification', function () {
    $client = new Berkayk\OneSignal\OneSignalClient(
        config('onesignal.app_id'),
        config('onesignal.rest_api_key'),
        config('onesignal.user_auth_key')
    );

    $client->sendNotificationToAll(
        "Some Message",
        $url = 'https://forums.voz.vn/showthread.php?t=7422074&page=2',
        $data = null,
        $buttons = null,
        $schedule = null
    );
});
