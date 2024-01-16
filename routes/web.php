<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeachController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\FrontendSectionController;


Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    Route::middleware(['admin_auth'])->group(function(){

        Route::get('/home/admin', [AdminController::class, 'user_interface'])->name('admin.home');
        Route::get('/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
        Route::get('/course', [AdminController::class, 'course'])->name('admin.course');
        Route::get('/section', [AdminController::class, 'section'])->name('admin.section');
        Route::get('/student', [AdminController::class, 'student'])->name('admin.student');
        Route::get('/timetable', [AdminController::class, 'timetable'])->name('admin.timetable');
        Route::get('/project', [AdminController::class, 'project'])->name('admin.project');
        Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
        
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
        Route::prefix('project')->group(function () {
            Route::get('/createPage', [ProjectController::class, 'createPage'])->name('project.createPage');
            Route::post('/create', [ProjectController::class, 'create'])->name('project.create');
            Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
            Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
            Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        });

        // gallery section
        Route::prefix('gallery')->group(function () {
            Route::get('/createPage', [GalleryController::class, 'createPage'])->name('gallery.createPage');
            Route::post('/create', [GalleryController::class, 'create'])->name('gallery.create');
            Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
            Route::post('/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
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

        // for student 
        Route::prefix('student')->group(function() {
            Route::get('/createPage', [StudentController::class, 'createPage'])->name('student.createPage');
            Route::post('/create', [StudentController::class, 'create'])->name('student.create');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
            Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
            Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
        });

        // for timetable 
        Route::prefix('timetable')->group(function() {
            Route::get('/createPage', [TimeTableController::class, 'createPage'])->name('timetable.createPage');
            Route::post('/create', [TimeTableController::class, 'create'])->name('timetable.create');
            Route::get('/edit/{id}', [TimeTableController::class, 'edit'])->name('timetable.edit');
            Route::post('/update/{id}', [TimeTableController::class, 'update'])->name('timetable.update');
            Route::get('/delete/{id}', [TimeTableController::class, 'delete'])->name('timetable.delete');
        });

        // for timetable 
        Route::prefix('ajax')->group(function() {
            Route::get('/course/list', [AjaxController::class, 'courseList'])->name('ajax.courseList');
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


Route::prefix('yha')->group(function () {
    Route::get('/', [FrontendSectionController::class, 'index'])->name('index');
    Route::get('/student_signup', [FrontendSectionController::class, 'student_signup'])->name('student_signup');
    Route::post('/student_signup', [FrontendSectionController::class, 'student_signup_process'])->name('signup.student_signup_process');
});
