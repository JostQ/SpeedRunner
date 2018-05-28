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
    ->name('tutoriel');

// Page CGU
Route::get('/cgu', 'CguController@index')
    ->name('cgu');

// Page tuto GPX
Route::get('/tutogpx', 'TutoGpxController@index')
    ->name('tutogpx');

// Fonction Amis
Route::get('/friends', 'FriendsController@index')
    ->name('friends')
    ->middleware('auth');
Route::post('/friends', 'FriendsController@add')
    ->name('add_friend')
    ->middleware('auth');
Route::post('/friends/{id}', 'FriendsController@delete')
    ->name('delete_friend')
    ->middleware('auth');
Route::get('/friends_list', 'FriendsListController@index')
    ->middleware('auth');
Route::get('/friends_list/{id}', 'FriendsListController@indexFriends')
    ->middleware('auth');

// Messagerie

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index'])->middleware('auth');
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create'])->middleware('auth');
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store'])->middleware('auth');
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show'])->middleware('auth');
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update'])->middleware('auth');
});

// Statistiques
Route::get('/statistiques', 'StatisticsController@index')
    ->name('statistics')
    ->middleware('auth');
Route::get('/statistiques/{id}', 'StatisticsController@indexFriend')
    ->name('statisticsFriend')
    ->middleware('auth');

// Fil actu
Route::get('/actu', 'ActuController@index')
    ->name('actu')
    ->middleware('auth');
Route::get('/actu/{id}', 'ActuController@indexFriend')
    ->name('actuFriend')
    ->middleware('auth');
Route::post('/actu', 'ActuController@store')
    ->name('actu_post')
    ->middleware('auth');

// Classement
Route::get('/leaderboards', 'LeaderboardsController@index')
    ->name('leaderboards')
    ->middleware('auth');
Route::get('/leaderboards/{id}', 'LeaderboardsController@indexFriend')
    ->name('leaderboardsFriend')
    ->middleware('auth');

// Affichage des tracés effectués
Route::get('/routes', 'RoutesController@index')
    ->name('routes')
    ->middleware('auth');

Route::get('/routes/{id}', 'RoutesController@indexFriend')
    ->name('routesFriend')
    ->middleware('auth');

// Affichage des succès
Route::get('/succes', 'SuccessController@index')
    ->name('success')
    ->middleware('auth');
Route::get('/succes/{id}', 'SuccessController@indexFriend')
    ->name('successFriend')
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



