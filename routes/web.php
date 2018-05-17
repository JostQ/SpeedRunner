<?php

/////////////////////////////////////////
///
///           AUTH + HOMEPAGE
///
/////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

/////////////////////////////////////////
///
///           PROFIL UTILISATEUR
///
/////////////////////////////////////////

Route::get('/profile', 'ProfileController@index')
    ->name('user_profile');
    //->middleware('auth');
Route::get('/profile/edit', 'ProfileController@edit')
    ->name('user_profile_edit')
    ->middleware('auth');
Route::delete('/profile/delete', 'ProfileController@delete')
    ->name('user_profile_delete')
    ->middleware('auth');
Route::put('/profile', 'ProfileController@update')
    ->name('user_profile_update')
    ->middleware('auth');

/////////////////////////////////////////
///
///           PAGES
///
/////////////////////////////////////////

// Page tutoriel GPX
Route::get('/tutoriel', 'TutorialController@index')
    ->name('tutoriel')
    ->middleware('auth');

// Fonction Amis
Route::get('/friends', 'FriendsController@index')
    ->name('friends')
    ->middleware('auth');
Route::post('/friends', 'FriendsController@add')
    ->name('add_friend')
    ->middleware('auth');
Route::delete('/friends/{id}', 'FriendsController@delete')
    ->name('delete_friend')
    ->middleware('auth');

// Messagerie privées

Route::get('/messenger', 'MessengerController@index')
    ->name('messenger')
    ->middleware('auth');

//@TODO: {id} doit être l'id utilisateur avec qui l'on converse et non l'id du message.
Route::get('/messenger/{id}', 'MessengerController@conversation')
    ->name('messenger')
    ->middleware('auth');

Route::post('/messenger', 'MessengerController@send')
    ->name('messenger_send_new')
    ->middleware('auth');

// Statistiques
Route::get('/statistiques', 'StatisticsController@index')
    ->name('statistics')
    ->middleware('auth');

// Fil actu
Route::get('/actu', 'ActuController@index')
    ->name('actu')
    ->middleware('auth');
Route::post('/post-status','ActuController@store');

// Classement
Route::get('/leaderboards', 'LeaderboardsController@index')
    ->name('leaderboards')
    ->middleware('auth');

// Affichage des tracés effectués
Route::get('/routes', 'RoutesController@index')
    ->name('routes')
    ->middleware('auth');


/////////////////////////////////////////
///
///           ADMINISTRATION
///
/////////////////////////////////////////


Route::get('/admin', 'AdminController@index')
    ->name('routes')
    ->middleware('auth');
//@TODO: Restreindre aux admin


/////////////////////////////////////////
///
///           TRAITEMENT GPX
///
/////////////////////////////////////////

Route::get('/gpx', 'GpxController@index')
    ->name('import_gpx')
    ->middleware('auth');

Route::post('/gpx', 'GpxController@add')
    ->name('add_gpx')
    ->middleware('auth');





