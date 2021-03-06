<?php
Route::get('/map', 'Maps\AcarsMapController@renderMaps')->middleware('auth');
Route::get('/acars/{id}', 'Maps\AcarsMapController@getAcars');

Route::get('/forum', function () {
    return view('forum');
})->middleware('auth');


Route::get('/wxr', function() {
    return view('wxr');
})->middleware('auth');

Route::get('/wxr/new', function() {
    return view('wxr_new');
})->middleware('auth');

Route::get('/faq', function() {
    return view('faq');
})->middleware('auth');


Route::get('/', function() {
    return view('faq');
})->middleware('auth');

Route::get('/ranks', function() {
    return view('ranks');
})->middleware('auth');


Route::group(['prefix' => '/flightops', 'namespace' => 'CrewOps', 'middleware' => 'auth'], function() {

  Route::get('/stats', function () {
      return view('crewops.stats.view');
  });

    Route::get('freeflight', 'fswireScheduleController@create');
    Route::post('schedule', 'fswireScheduleController@store');

});

Route::get('/', function () {
    return redirect('login');
});
