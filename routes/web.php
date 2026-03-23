<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Root redirect to login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $tasks = $user->tasks;
    return view('dashboard', compact('tasks'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // TASKS
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::post('/tasks/{task}/doing', [TaskController::class, 'doing']);
    Route::post('/tasks/{task}/done', [TaskController::class, 'done']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::post('/tasks/{task}/move', [TaskController::class, 'move']);

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';