<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\MainController;
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
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('panel',[MainController::class, 'dashboard'])->name('dashboard');
    
    Route::get('quiz/detail/{slug}',[MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}',[MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result',[MainController::class, 'result'])->name('quiz.result');
});



Route::group(['middleware' => ['auth' ,'isAdmin'], 'prefix'=>'admin',] ,function(){
    
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}', [QuestionsController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');

    //silenen quizin bütün bilgilerini silmiyor,sonuç vs kalıyor!
    Route::get('quizzes/trashed',[QuizController::class, 'trashed'])->name('quizzes.trashed');
    Route::get('quizzes/restore/{id}',[QuizController::class, 'restore'])->name('quizzes.restore');
   
    //bütün quizlerin silinen questionlarını aynı yere alıyor!
    Route::get('question/trashed',[QuestionsController::class, 'trashed'])->name('question.trashed');
    Route::get('question/restore/{id}',[QuestionsController::class, 'restore'])->name('question.restore');
    

    Route::resource('quizzes',QuizController::class);
    // Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::resource('quiz/{quiz_id}/questions', QuestionsController::class);
});