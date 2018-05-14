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
Route::get('/tutorial', 'TutorialController@index')
    ->name('tutorial')
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
//Statistiques
Route::get('/statistics', 'StatisticsController@index')
    ->name('statistics')
    ->middleware('auth');
//Fil actu
Route::get('/actu', 'ActuController@index')
    ->name('actu')
    ->middleware('auth');
//Classement
Route::get('/leaderboards', 'LeaderboardsController@index')
    ->name('leaderboards')
    ->middleware('auth');
//arbre progression
Route::get('/progression', 'ProgressionController@index')
    ->name('progression')
    ->middleware('auth');

/////////////////////////////////////////
///
///           ADMINISTRATION
///
/////////////////////////////////////////




