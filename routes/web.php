<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/w2', 'welcome-old')->name('w2');

Route::view('/home', 'home')->name('home');


/*******************************************************************
 * Open Weather
 *******************************************************************/
Route::resource('/weather', 'Weather\OpenweatherController');



/*******************************************************************
 * CDK VDPs
 *******************************************************************/
// test scrape routes
// Route::get('/scrape', 'Scrape\HtmlParserController@test');
// Route::get('/scrape/count', 'Scrape\HtmlParserController@getNumberToCrawl');

Route::middleware('auth')->namespace('Scrape')->prefix('scrape')->name('scrape.cdk-vdp.')->group(function () {
    Route::get('/cdk-vdp', 'CdkVdpController@index')->name('index');
    Route::get('/cdk-vdp/process', 'CdkVdpController@process')->name('process');
    Route::get('/cdk-vdp/{id}', 'CdkVdpController@show')->name('show');
});


/*******************************************************************
 * CDK Sitemaps
 *******************************************************************/
Route::middleware(['auth'])->namespace('Scrape')->name('scrape.')->prefix('scrape')->group(function () {
    Route::get('/cdk-sitemap', 'CdkSitemapController@index')->name('cdk-sitemap.index');
    Route::get('/cdk-sitemap/create', 'CdkSitemapController@create')->name('cdk-sitemap.create');
    Route::get('/cdk-sitemap/{id}', 'CdkSitemapController@show')->name('cdk-sitemap.show');
    Route::get('/cdk-sitemap/{id}/edit', 'CdkSitemapController@edit')->name('cdk-sitemap.edit');
    Route::get('/cdk-sitemap/{id}/scrape', 'CdkSitemapController@scrape')->name('cdk-sitemap.scrape');
    Route::post('/cdk-sitemap', 'CdkSitemapController@store')->name('cdk-sitemap.store');
    Route::put('/cdk-sitemap/{id}', 'CdkSitemapController@update')->name('cdk-sitemap.update');
    Route::delete('/cdk-sitemap/{id}', 'CdkSitemapController@destroy')->name('cdk-sitemap.destroy');
});

/*******************************************************************
 * Dealer Inspire (/dealer-inspire-inventory/inventory_sitemap)
 *******************************************************************/
// Sitemap
Route::get('/scrape/sitemap/dealer-inspire', 'Scrape\DealerInspireSitemapController@index')->name('sitemap.dealer-inspire.index');
Route::get('/scrape/sitemap/dealer-inspire/create', 'Scrape\DealerInspireSitemapController@create')->name('sitemap.dealer-inspire.create');
Route::post('/scrape/sitemap/dealer-inspire', 'Scrape\DealerInspireSitemapController@store')->name('sitemap.dealer-inspire.store');
Route::get('/scrape/sitemap/dealer-inspire/{id}', 'Scrape\DealerInspireSitemapController@show')->name('sitemap.dealer-inspire.show');
// VDP
Route::get('/scrape/vdp/dealer-inspire', 'Scrape\DealerInspireVdpController@index')->name('vdp.dealer-inspire.index');
Route::get('/scrape/vdp/dealer-inspire/crawl', 'Scrape\DealerInspireVdpController@crawl')->name('vdp.dealer-inspire.crawl');
Route::get('/scrape/vdp/dealer-inspire/{id}', 'Scrape\DealerInspireVdpController@show')->name('vdp.dealer-inspire.show');



/*******************************************************************
 * Scraped Vehicles
 *******************************************************************/
Route::resource('/vehicles', 'Scrape\VehicleController');
// this is a test route
Route::get('/vehicle/check-link', 'Vehicle\ActiveLinkController@check');
// deleted vehicles
Route::get('/deleted/vehicles', 'Scrape\DeletedVehicleController@index')->name('vehicles.deleted.index');
// Old Vehicles
Route::get('/old-vehicles', 'Scrape\OldVehicleController@index')->name('old-vehicles.index');
Route::get('/old-vehicles/{id}', 'Scrape\OldVehicleController@show')->name('old-vehicles.show');
// vehicle stats
Route::get('/vehicle/stats', 'Vehicle\VehicleStatsController@index')->name('vehicle.stats.index');


/*******************************************************************
 * NHTSA VIN Decode
 *******************************************************************/
Route::get('/nhtsa', 'Nhtsa\NhtsaController@index')->name('nhtsa.index');
Route::get('/nhtsa/update', 'Nhtsa\NhtsaController@update')->name('nhtsa.update');
Route::get('/nhtsa/{id}', 'Nhtsa\NhtsaController@show')->name('nhtsa.show');
Route::post('/nhtsa', 'Nhtsa\NhtsaController@store')->name('nhtsa.store');
Route::get('/nhtsa/decode/{vin}/{year}', 'Nhtsa\NhtsaController@decode')->name('nhtsa.decode');


/*******************************************************************
 * Laracasts Practical Vue Components
 *******************************************************************/
Route::view('/vue-components/smooth-scrolling', 'practical-vue-components.smooth-scrolling');
Route::view('/vue-components/context-menu', 'practical-vue-components.context-menu');
Route::view('/vue-components/confirmation-button', 'practical-vue-components.confirmation-button');
Route::view('/vue-components/conditional-visibility', 'practical-vue-components.conditional-visibility');
Route::view('/vue-components/modal', 'practical-vue-components.modal');


/*******************************************************************
 * Security Test Routes
 *******************************************************************/
Route::get('/security/generate-uuid', 'Security\UuidController@generate');



/*******************************************************************
 * TESTS
 *******************************************************************/
Route::view('/something.php', 'Tests.something');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'Tests\MysqlVehicleController@index');
Route::get('/test/move', 'Tests\MysqlVehicleController@move');
Route::get('/test/move/cdklink', 'Tests\MysqlVehicleController@moveCdkLink')->middleware('auth');
Route::get('/test/move/cdksitemap', 'Tests\MysqlVehicleController@moveCdkSitemap')->middleware('auth');




/*******************************************************************
 * Fitbit
 *******************************************************************/
Route::namespace('Fitbit')->name('fitbit.')->prefix('fitbit')->group(function () {
    Route::get('/activity', 'ActivityController@index')->name('activity.index');
    Route::get('/activity/create', 'ActivityController@create')->name('activity.create');
    Route::post('/activity/store', 'ActivityController@store')->name('activity.store');
});




/*******************************************************************
 * spatie/laravel-collection-macros
 *******************************************************************/
Route::name('collection-macros')->prefix('collection-macros')->group(function () {
    Route::get('/', 'CollectionMacrosController@index')->name('index');
});




/*******************************************************************
 * Tailwind CSS
 *******************************************************************/
Route::view('/tailwind', 'tailwind.index')->name('tailwind.index');
Route::view('/tailwind/tweet', 'tailwind.tweet')->name('tailwind.tweet');
Route::view('/tailwind/github', 'tailwind.github')->name('tailwind.github');
Route::view('/tailwind/kanban', 'tailwind.kanban')->name('tailwind.kanban');
Route::view('/tailwind/dashboard', 'tailwind.dashboard')->name('tailwind.dashboard');



/*******************************************************************
 * Forge of Empires
 *******************************************************************/
Route::get('/foe', '\App\Http\Controllers\Foe\FoeController@index');


/*******************************************************************
 * Laravel Job Batching
 *******************************************************************/
Route::get('/csvbatch', 'Csv\CsvBatchController@index')->middleware('auth');
Route::get('/batch', 'Csv\CsvBatchController@batch')->middleware('auth');


/*******************************************************************
 * Covid19 Data
 *******************************************************************/
Route::get('/covid19', 'Covid19Controller@index')->name('covid19.index');
Route::get('/covid19/create', 'Covid19Controller@create')->name('covid19.create');
