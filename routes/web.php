<?php

use App\Http\Controllers\DynamicToken;
use Illuminate\Support\Facades\Route;

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

// Dynamic Token route for posting a form with Ajax.
Route::get('/!/DynamicToken/refresh', [DynamicToken::class, 'getRefresh']);

// The Manifest route to the manifest.json
Route::statamic('/site.webmanifest', 'manifest/manifest', [
    'layout' => null,
    'content_type' => 'application/json'
]);
