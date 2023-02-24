<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GraduatedController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return view('auth.login');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ 
        
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', [HomeController::class, 'index']) -> name('dashboard');

        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Grades', GradeController::class);
        });

         //==============================Classrooms============================
        // Route::resource('Grades', GradeController::class);
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Classrooms', ClassroomController::class);
            Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');
            Route::post('Filter_Classes', [ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');
        });


         //==============================Sections============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Sections', SectionController::class);
            Route::get('/classes/{id}', [SectionController::class, 'get_classes']);
        });

           //==============================Teachers============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Teachers', TeacherController::class);
        });
        //==============================parents============================

        Route::view('add_parent','livewire.show_Form');

         //==============================Students============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Students', StudentController::class);
            Route::resource('Graduated', GraduatedController::class);
            Route::resource('Promotion',  PromotionController::class);
            Route::resource('Fees_Invoices', FeeInvoiceController::class);
            Route::resource('Fees',  FeeController::class);
            Route::resource('receipt_students', 'ReceiptStudentsController');
            Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
            Route::get('/Get_Sections/{id}', [StudentController::class,'Get_Sections']);
            Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');
            Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
    });

    //  //==============================Promotion Students ============================
    //     Route::group(['namespace' => 'App\Http\Controllers'], function () {
    //         Route::resource('Promotion', 'PromotionController');
    // });












    });


        // Route::view('add_parent',[Livewire::class,'add_parent'])->name('show_Form');


   

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ 
        
//         /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//         Route::get('/dashboard', function()
//         {
//             return view('dashboard');
//         });

//         Route::resource('grade', 'GradeController');

//     });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
