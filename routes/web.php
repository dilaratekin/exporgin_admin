<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\SliderGroupController;
use App\Http\Controllers\SliderItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', function () {
    return view('admin.dashboard');
});

/*Route::get('{controller}/{method}/{a?}/{b?}/{c?}', function ($contoller, $method, $a=null, $b=null, $c=null) {
    $controller = app()->make('\App\Http\Controllers\\' . $contoller . 'Controller');
    $controller->$method($a, $b, $c);
});*/


//Slider Dest. Yönetimi

Route::get('/slider/index', [SliderController::class, 'index'])->name('slider/index');
Route::get('/slider/show', [SliderController::class, 'show'])->name('slider/show');
Route::delete('/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('slider/destroy');


//Slider Grup Yönetimi
Route::get('/sliderGroup/index/{id}/{lang}', [SliderGroupController::class, 'index'])->name('sliderGroup/index');
Route::get('/sliderGroup/show/{id}/{lang}', [SliderGroupController::class, 'show'])->name('sliderGroup/show');;

//Slider Item Yönetimi
Route::get('/sliderItem/index/{id}/{lang}', [SliderItemController::class, 'index'])->name('sliderItem/index');
Route::get('/sliderItem/show/{id}/{lang}', [SliderItemController::class, 'show'])->name('sliderItem/show');

Route::get('/sliderItem/controlID', [SliderItemController::class, 'controlID'])->name('sliderItem/controlID');
Route::get('/sliderItem/create/{id}/{lang}/{group_id}', [SliderItemController::class, 'controlID'])->name('sliderItem/edit');
Route::post('/sliderItem/create', [SliderItemController::class, 'create'])->name('sliderItem/create');

/*
Route::get('/faq_add', [FaqController::class, 'faqAdd'])->name('faq_add');
Route::get('/faq_edit/{id}', [FaqController::class, 'faqAdd'])->name('faq_edit');
Route::post('/faq_add_post', [FaqController::class, 'faqAddPost'])->name('faq_add_post');*/

Route::delete('/sliderItem/delete/{id}', [SliderItemController::class, 'delete'])->name('sliderItem/delete');





