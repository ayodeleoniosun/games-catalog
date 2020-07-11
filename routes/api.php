<?php

Route::prefix('v1')->group(function() {
	Route::get('/welcome', 'GameController@welcome');
        
    //players routes
    Route::group(['prefix' => 'players'], function() {
        Route::post('/login', 'PlayerController@login');
        Route::post('/register', 'PlayerController@register');
        Route::get('/', 'PlayerController@players');
        Route::get('/games/{playerId}', 'GameController@playerGames');
        Route::get('/played-games/{playerId}', 'GameController@playerPlayedGames');
        Route::get('/top/{month}', 'GameController@topPlayers');
        Route::get('/top/games/{month}', 'GameController@topPlayersGames');
    });
    
	//games routes
    Route::group(['prefix' => 'games'], function() {
        Route::post('/add', 'GameController@add');
        Route::get('/', 'GameController@games');
        Route::get('/date/{date}', 'GameController@gamesPerDay');
        Route::get('/range/{dateRange}', 'GameController@gamesDateRange');
    });
    
});