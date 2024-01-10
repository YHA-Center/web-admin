<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeachController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CourseSectionController;


Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    Route::middleware(['admin_auth'])->group(function(){

        Route::get('/home/admin', [AdminController::class, 'user_interface'])->name('admin.home');
        Route::get('/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
        Route::get('/course', [AdminController::class, 'course'])->name('admin.course');
        Route::get('/section', [AdminController::class, 'section'])->name('admin.section');

        // welcome section
        Route::prefix('home')->group(function () {
            Route::get('/create', [HomeController::class, 'createWelcome'])->name('welcome.create');
            Route::post('/post', [HomeController::class, 'postWelcome'])->name('welcome.post');
            Route::get('/edit/{id}', [HomeController::class, 'editWelcome'])->name('welcome.edit');
            Route::post('/update', [HomeController::class, 'updateWelcome'])->name('welcome.update');
            Route::get('/delete/{id}', [HomeController::class, 'deleteWelcome'])->name('welcome.delete');
        });

        // about sectoin
        Route::prefix('about')->group(function () {
            Route::get('/post', [HomeController::class, 'postAbout'])->name('about.post');
            Route::post('/create', [HomeController::class, 'createAbout'])->name('about.create');
            Route::get('/edit/{id?}', [HomeController::class, 'editAbout'])->name('about.edit');
            Route::get('/delete/{id}', [HomeController::class, 'deleteAbout'])->name('about.delete');
            Route::post('/update', [HomeController::class, 'updateAbout'])->name('about.update');
            Route::get('/desc/edit/{id}', [HomeController::class, 'editDesc'])->name('about.desc.edit');
            Route::post('/desc/update', [HomeController::class, 'updateDesc'])->name('about.desc.update');
        });

        // student project section
        Route::prefix('student_project')->group(function () {
            Route::get('/post', [HomeController::class, 'postProject'])->name('student_project.home');
            Route::post('/create', [HomeController::class, 'createProject'])->name('student_project.create');
            Route::get('/delete/{id}', [HomeController::class, 'deleteProject'])->name('student_project.delete');
            Route::get('/edit/{id}', [HomeController::class, 'editProject'])->name('student_project.edit');
            Route::post('/update', [HomeController::class, 'updateProject'])->name('student_project.update');
        });

        // teacher section
        Route::prefix('teacher')->group(function () {
            Route::get('/createPage', [TeacherController::class, 'createPage'])->name('teacher.createPage');
            Route::post('/create', [TeacherController::class, 'create'])->name('teacher.create');
            Route::get('/edit/{id}', [TeacherCOntroller::class, 'edit'])->name('teacher.edit');
            Route::post('/update', [TeacherCOntroller::class, 'update'])->name('teacher.update');
            Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
        });

        // position section
        Route::prefix('position')->group(function() {
            Route::get('/createPage', [PositionController::class, 'createPage'])->name('position.createPage');
            Route::post('/create', [PositionController::class, 'create'])->name('position.create');
            Route::get('/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
            Route::post('/update', [PositionController::class, 'update'])->name('position.update');
            Route::get('/delete/{id}', [PositionController::class, 'delete'])->name('position.delete');
        });

        // teach section  (teachers <----> subjects)
        Route::prefix('teach')->group(function() {
            Route::get('/createPage', [TeachController::class, 'createPage'])->name('teach.createPage');
            Route::post('/create', [TeachController::class, 'create'])->name('teach.create');
            Route::get('/edit/{id}', [TeachController::class, 'edit'])->name('teach.edit');
            Route::post('/update', [TeachController::class, 'update'])->name('teach.update');
            Route::get('/delete/{id}', [TeachController::class, 'delete'])->name('teach.delete');
        });

        // for course section
        Route::prefix('course')->group(function () {
            Route::get('/createPage', [CourseController::class, 'createPage'])->name('course.createPage');
            Route::post('/create', [CourseController::class, 'create'])->name('course.create');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
            Route::post('/update', [CourseController::class, 'update'])->name('course.update');
            Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('course.delete');
        });

        // for subject section
        Route::prefix('subject')->group(function () {
            Route::get('/createPage', [SubjectController::class, 'createPage'])->name('subject.createPage');
            Route::post('/create', [SubjectController::class, 'create'])->name('subject.create');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
            Route::post('/update', [SubjectController::class, 'update'])->name('subject.update');
            Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
        });

        // for class section (course <---> subject)
        Route::prefix('class')->group(function() {
            Route::get('/createPage', [ClassController::class, 'createPage'])->name('class.createPage');
            Route::post('/create', [ClassController::class, 'create'])->name('class.create');
            Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
            Route::post('/update', [ClassController::class, 'update'])->name('class.update');
            Route::get('/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
        });

        // for section page
        Route::prefix('section')->group(function() {
            Route::get('/createPage', [SectionController::class, 'createPage'])->name('section.createPage');
            Route::post('/create', [SectionController::class, 'create'])->name('section.create');
            Route::get('/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
            Route::post('/update', [SectionController::class, 'update'])->name('section.update');
            Route::get('/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
        });

        // for couse_section page (course <----> section)
        Route::prefix('course/section')->group(function() {
            Route::get('/createPage', [CourseSectionController::class, 'createPage'])->name('course.section.createPage');
            Route::post('/create', [CourseSectionController::class, 'create'])->name('course.section.create');
            Route::get('/edit/{id}', [CourseSectionController::class, 'edit'])->name('course.section.edit');
            Route::post('/update', [CourseSectionController::class, 'update'])->name('course.section.update');
            Route::get('/delete/{id}', [CourseSectionController::class, 'delete'])->name('course.section.delete');
        });

    });


    // user
    Route::group(['middleware' => 'user_auth'], function(){
        Route::get('/home/user', [UserController::class, 'home'])->name('user.home');
    });

});

Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'login'])->name('loginPage');
    Route::get('registerPage', [AuthController::class, 'register'])->name('registerPage');
});

