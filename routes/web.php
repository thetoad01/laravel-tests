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

Route::view('/home', 'home')->name('home');

// test scrape routes
Route::get('/scrape', 'Scrape\HtmlParserController@test');

// test sitemap routes
// Route::get('/scrape/cdk-sitemap/{cdk_sitemap_id}', 'Scrape\HtmlParserController@getCdkSitemap');



/*******************************************************************
 * Open Weather
 *******************************************************************/
Route::resource('/weather', 'Weather\OpenweatherController');



/*******************************************************************
 * CDK VDPs
 *******************************************************************/
Route::get('/scrape/cdk-vdp', 'Scrape\CdkVdpController@index')->name('scrape.cdk-vdp.index');
Route::get('/scrape/cdk-vdp/{id}', 'Scrape\CdkVdpController@show')->name('scrape.cdk-vdp.show');

/*******************************************************************
 * CDK Sitemaps
 *******************************************************************/
// protected
Route::group(['middleware' => ['auth']], function () {
    Route::get('/scrape/cdk/create', 'Scrape\CdkController@create');
    Route::post('/scrape/cdk', 'Scrape\CdkController@store');
    Route::get('/sitemap/cdk/{id}', 'Scrape\CdkController@edit')->name('sitemap.cdk.edit');
    Route::put('/sitemap/cdk/{id}', 'Scrape\CdkController@update')->name('sitemap.cdk.update');

    Route::get('/test/sitemap/first', 'Tests\CdkSitemapTestController@first')->name('test.sitemap.first');
});

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
// Route::get('/scrape/cdk', 'Scrape\CdkController@index')->name('scrape.cdk');
// Route::get('/scrape/cdk/{id}', 'Scrape\CdkController@show');
// Route::get('/scrape/cdk/{id}/edit', 'Scrape\CdkController@edit');
// Route::patch('/scrape/cdk/{id}', 'Scrape\CdkController@update');
// Route::delete('/scrape/cdk/{id}', 'Scrape\CdkController@destroy');
Route::get('/scrape/count', 'Scrape\HtmlParserController@getNumberToCrawl');
// process all sitemaps
Route::get('/scrape/sitemaps/all', 'Scrape\HtmlParserController@processSitemaps');


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


/*******************************************************************
 * NHTSA VIN Decode
 *******************************************************************/
Route::get('/nhtsa/decode/{vin}/{year}', 'Nhtsa\NhtsaController@decode');


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
