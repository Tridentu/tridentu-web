<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\TenantAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dash', function () {
        return view('dash');
    })->name("welcome:dash");
    Route::view('/users/current-profile','profile')->name('users:profile');
    Route::get('/health', HealthCheckResultsController::class)->name('dash:health');
    Route::controller(TenantAppController::class)->group(function(){
        Route::get('/dash/create-app', 'create')->name("tenantmeta:create");
        Route::post('/dash/create-app', 'createFinalize')->name('tenantmeta:createFinalize');
    });

});

Route::controller(MessagingController::class)->group(function(){
    Route::get('/messages','inbox')->name('messages:inbox');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::controller(SearchController::class)->group(function(){
    Route::get('/search/user', 'searchUsers')->name("search:users");
    Route::get('/search/roles', 'searchRoles')->name("search:roles");
    Route::get('/search/groups', 'searchGroups')->name("search:groups");
});
