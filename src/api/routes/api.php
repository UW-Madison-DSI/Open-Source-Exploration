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
use App\Http\Controllers\GitLabProjectController;

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
// GitHub routes
//

//
// GitHub repository language querying routes
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
// GitHub repository license querying routes
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
// GitHub repository querying routes
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

//
// GitLab routes
//

//
// GitLab project language querying routes
//

Route::get('/gitlab/projects/languages', function (Request $request) {
    return GitLabProjectController::getLanguages($request);
});
Route::get('/gitlab/projects/languages/counts', function (Request $request) {
    return GitLabProjectController::getLanguageCounts($request);
});
Route::get('/gitlab/projects/languages/counts/year', function (Request $request) {
    return GitLabProjectController::getLanguageCountsByYear($request);
});

//
// GitLab project license querying routes
//

Route::get('/gitlab/projects/licenses', function (Request $request) {
    return GitLabProjectController::getLicenses($request);
});
Route::get('/gitlab/projects/licenses/counts', function (Request $request) {
    return GitLabProjectController::getLicenseCounts($request);
});
Route::get('/gitlab/projects/licenses/counts/year', function (Request $request) {
    return GitLabProjectController::getLicenseCountsByYear($request);
});

//
// GitLab project querying routes
//

Route::get('/gitlab/projects', function (Request $request) {
    return GitLabProjectController::getAll($request);
});
Route::get('/gitlab/projects/num', function (Request $request) {
    return GitLabProjectController::getNum($request);
});
Route::get('/gitlab/projects/num/year', function (Request $request) {
    return GitLabProjectController::getNumByYear($request);
});
Route::get('/gitlab/projects/{id}', function (Request $request, string $id) {
    return GitLabProjectController::getIndex($request, $id);
});