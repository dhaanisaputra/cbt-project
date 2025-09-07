<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseQuestionController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\StudentAnswerController;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routing for course
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('courses', CourseController::class)
        ->middleware('role:teacher'); // only for teacher

        Route::get('courses/question/create/{course}', [CourseQuestionController::class], 'create')
        ->middleware('role:teacher')
        ->name('course.create.question'); // form create question

        Route::post('courses/question/save/{course}', [CourseQuestionController::class], 'store')
        ->middleware('role:teacher')
        ->name('course.create.question.store'); // save data question

        Route::resource('courses_questions', CourseQuestionController::class)
        ->middleware('role:teacher');

        Route::get('/courses/students/show/{course}', [CourseStudentController::class, 'index'])
        ->middleware('role:teacher')
        ->name('course.course_students.index'); // view data student

        Route::get('/courses/students/create/{course}', [CourseStudentController::class, 'create'])
        ->middleware('role:teacher')
        ->name('course.course_students.create'); // form create student

        Route::get('/courses/students/save/{course}', [CourseStudentController::class, 'store'])
        ->middleware('role:teacher')
        ->name('course.course_students.store'); // save data student

        Route::get('/learning/finished/{course}', [LearningController::class, 'learning_finished'])
        ->middleware('role:student')
        ->name('learning.finished.course'); // view data learning finished for student

        Route::get('/learning/rapport/{course}', [LearningController::class, 'learning_rapport'])
        ->middleware('role:student')
        ->name('learning.rapport.course'); // view data rapport student

        Route::get('/learning', [LearningController::class, 'index'])
        ->middleware('role:student')
        ->name('learning.index'); // view student class courses assigne by teacher

        Route::get('/learning/{course}/{question}', [LearningController::class, 'learning'])
        ->middleware('role:student')
        ->name('learning.course'); // view progress learning student

        Route::post('/learning/{course}/{question}', [StudentAnswerController::class, 'store'])
        ->middleware('role:student')
        ->name('learning.course.answer.store'); // save data answer student

    });
});

require __DIR__.'/auth.php';
