<?php
/******************************************************************************\
|                                                                              |
|                                  route.php                                   |
|                                                                              |
|******************************************************************************|
|                                                                              |
|        This defines the REST API routes used by the application.             |
|                                                                              |
|        Author(s): Abe Megahed                                                |
|                                                                              |
|        This file is subject to the terms and conditions defined in           |
|        'LICENSE.txt', which is part of this source code distribution.        |
|                                                                              |
|******************************************************************************|
|            Copyright (C) 2016-2024, Sharedigm, www.sharedigm.com             |
\******************************************************************************/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubRepositoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function (Request $request) {
    header("Content-type: text/html");
    return view('api-welcome')->render();
});

//
// repository language querying functions
//

Route::get('/github/repositories/languages', function (Request $request) {
    return GitHubRepositoryController::getLanguages($request);
});

Route::get('/github/repositories/languages/counts', function (Request $request) {
    return GitHubRepositoryController::getLanguageCounts($request);
});

Route::get('/github/repositories/languages/counts/year', function (Request $request) {
    return GitHubRepositoryController::getLanguageCountsByYear($request);
});

//
// repository license querying functions
//

Route::get('/github/repositories/licenses', function (Request $request) {
    return GitHubRepositoryController::getLicenses($request);
});

Route::get('/github/repositories/licenses/counts', function (Request $request) {
    return GitHubRepositoryController::getLicenseCounts($request);
});

Route::get('/github/repositories/licenses/counts/year', function (Request $request) {
    return GitHubRepositoryController::getLicenseCountsByYear($request);
});

//
// repository querying functions
//

Route::get('/github/repositories', function (Request $request) {
    return GitHubRepositoryController::getAll($request);
});

Route::get('/github/repositories/num', function (Request $request) {
    return GitHubRepositoryController::getNum($request);
});

Route::get('/github/repositories/num/year', function (Request $request) {
    return GitHubRepositoryController::getNumByYear($request);
});

Route::get('/github/repositories/{id}', function (Request $request, string $id) {
    return GitHubRepositoryController::getIndex($request, $id);
});