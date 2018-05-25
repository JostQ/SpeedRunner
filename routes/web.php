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
    ->name('user_profile')
    ->middleware('auth');
Route::post('/profile/edit/{id}', 'ProfileController@edit')
    ->name('user_profile_edit')
    ->middleware('auth');
Route::delete('/profile/delete', 'ProfileController@delete')
    ->name('user_profile_delete')
    ->middleware('auth');
Route::put('/profile', 'ProfileController@update')
    ->name('user_profile_update')
    ->middleware('auth');
Route::any('profile/{friend_id}', 'FriendsController@index')
    ->name('user_profile_show')
    ->middleware('auth');
Route::post('profile/{friend_id}', 'FriendsController@add')
    ->name('user_profile_add')
    ->middleware('auth');

/////////////////////////////////////////
///
///           PAGES
///
/////////////////////////////////////////

// Page tutoriel
Route::get('/tutoriel', 'TutorialController@index')
    ->name('tutoriel')
    ->middleware('auth');

// Page CGU
Route::get('/cgu', 'CguController@index')
    ->name('cgu')
    ->middleware('auth');

// Page tuto GPX
Route::get('/tutogpx', 'TutoGpxController@index')
    ->name('tutogpx')
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

// Messagerie

Route::get('/messenger', 'MessengerController@index')
    ->name('messenger')
    ->middleware('auth');


Route::post('/messenger/chat', 'MessengerController@conversation')
    ->name('messenger_friend')
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
Route::post('/actu', 'ActuController@store')
    ->name('actu_post')
    ->middleware('auth');

// Classement
Route::get('/leaderboards', 'LeaderboardsController@index')
    ->name('leaderboards')
    ->middleware('auth');

// Affichage des tracés effectués
Route::get('/routes', 'RoutesController@index')
    ->name('routes')
    ->middleware('auth');

// Affichage des succès
Route::get('/succes', 'SuccessController@index')
    ->name('success')
    ->middleware('auth');

/////////////////////////////////////////
///
///           ADMINISTRATION
///
/////////////////////////////////////////


Route::get('/admin', 'AdminController@index')
    ->name('admin')
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

Route::post('/gpx/races', 'GpxController@addRace')
    ->name('add_race_gpx')
    ->middleware('auth');



