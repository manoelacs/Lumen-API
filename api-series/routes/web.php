<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//['prefix'=>'/api', 'middleware'=> 'auth'],//usando o middleware do lumen
$router->group(['prefix'=>'/api', 'middleware'=> 'autenticador'], function () use ($router){
    $router->group(['prefix'=>'/series'], function () use ($router){
        $router->get('', 'SeriesController@index');
        $router->post('', 'SeriesController@store');
        $router->get('/{id}', 'SeriesController@show');
        $router->put('/{id}', 'SeriesController@update');
        $router->delete('/{id}', 'SeriesController@destroy');
        $router->get('/{id}/episodios', 'EpisodiosController@episodiosPorSerie');
    });
    $router->group(['prefix'=>'/episodios'], function () use ($router){
        $router->get('', 'EpisodiosController@index');
        $router->post('', 'EpisodiosController@store');
        $router->get('/{id}', 'EpisodiosController@show');
        $router->put('/{id}', 'EpisodiosController@update');
        $router->delete('/{id}', 'EpisodiosController@destroy');

    });
});
$router->post('/api/login', 'TokenController@geraToken');

