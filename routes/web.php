<?php

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
use App\Http\Controllers\OpenAiTestController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\InsightController;

Route::get('/history', [InsightController::class, 'showHistory'])->name('history');
Route::get('/summarize-logs', [InsightController::class, 'showSummarizeLogsPage'])->name('summarize_logs');
Route::post('/summarize-logs', [InsightController::class, 'store'])->name('insights.store');

Route::get('/test-openai-connection', [OpenAiTestController::class, 'testConnection']);

