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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'sdmobile/api/v1.0'], function () use ($router) {

    $router->post('user/login', ['uses' => 'sdmobileapp\UserController@login']);
    $router->post('user/register', ['uses' => 'sdmobileapp\UserController@register']);
    $router->post('user/info', ['uses' => 'sdmobileapp\UserController@info']);

    $router->get('menu',  ['uses' => 'sdmobileapp\MenuController@showAllMenu']);
    $router->get('millets',  ['uses' => 'sdmobileapp\MilletController@showAllMillets']);

    $router->get('millet/{id}', ['uses' => 'sdmobileapp\MilletController@showOneMillet']);

    $router->get('generalNotes',  ['uses' => 'sdmobileapp\GeneralNoteController@showAllNotes']);

    $router->get('generalNote/{id}', ['uses' => 'sdmobileapp\GeneralNoteController@showOneNote']);

    $router->get('kidsNotes',  ['uses' => 'sdmobileapp\KidsNoteController@showAllNotes']);

    $router->get('kidsNote/{id}', ['uses' => 'sdmobileapp\KidsNoteController@showOneNote']);

    $router->get('diseaseMilletDiet', ['uses' => 'sdmobileapp\MilletDietForDiseaseController@showDiseaseMilletDiet']);
    $router->get('cancerMilletDiet', ['uses' => 'sdmobileapp\MilletDietForDiseaseController@showCancerMilletDiet']);

    $router->get('search/filterTypes', ['uses' => 'sdmobileapp\SearchController@getFilterTypes']);
    $router->get('search/do/{searchTerm}', ['uses' => 'sdmobileapp\SearchController@doSearch']);
    $router->post('search/doPost', ['uses' => 'sdmobileapp\SearchController@doSearchPost']);


    $router->get('milletFaq', ['uses' => 'sdmobileapp\MilletFaqController@showAllFaq']);
    $router->get('milletDoc', ['uses' => 'sdmobileapp\MilletDocController@showAll']);
    $router->get('settings', ['uses' => 'sdmobileapp\AppSettingController@showAll']);

    $router->get('recipes', ['uses' => 'sdmobileapp\GenericDataController@getRecipes']);
    $router->get('milletLocations', ['uses' => 'sdmobileapp\GenericDataController@getMilletLocations']);


    $router->get('leaves', ['uses' => 'sdmobileapp\KashayaLeavesController@showAll']);
    $router->get('profileTypes', ['uses' => 'sdmobileapp\AppProfileTypeController@showAll']);

});


//$router->group(['prefix' => 'sdmobile/api', 'middleware' => 'auth'], function () use ($router) {
//    $router->get('millets',  ['uses' => 'sdmobileapp\MilletController@showAllMillets']);

//    $router->get('millet/{id}', ['uses' => 'sdmobileapp\MilletController@showOneMillet']);
//});