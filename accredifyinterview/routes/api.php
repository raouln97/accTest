<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\verifyDoc;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
// Route::get('result', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return verificationResult::all();
// });
 
// Route::get('result/{id}', function($id) {
//     return verificationResult::find($id);
// });

// Route::post('result', function(Request $request) {
//     return verificationResult::create($request->all);
// });

// Route::put('result/{id}', function(Request $request, $id) {
//     $article = verificationResult::findOrFail($id);
//     $article->update($request->all());

//     return $article;
// });

// Route::delete('result/{id}', function($id) {
//     verificationResult::find($id)->delete();

//     return 204;
// });

Route::post('result', [verifyDoc::class, 'index']);