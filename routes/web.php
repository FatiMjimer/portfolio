<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserProjectController;
use App\Models\Project;
use App\Models\Skill;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MessageController;

Route::get('/', function () {
    $projects = Project::latest()->get();
    $skills = Skill::all();
    return view('welcome', compact('projects', 'skills'));
});

Route::get('/project/{project}', [UserProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', [ContactController::class, 'form'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 


// LOGIN ADMIN
Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login')->middleware('guest');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (auth()->attempt($credentials)) {

        // Vérifie si c’est l’admin
        if (auth()->user()->email !== 'admin@admin.com') {
            auth()->logout();
            return back()->withErrors(['email' => 'Accès refusé.']);
        }

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
});




Route::middleware(['auth', 'adminOnly'])->prefix('admin')->name('admin.')->group(function () {

    

        /* Dashboard */
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /* Projets */
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        /* Compétences */
        Route::resource('skills', \App\Http\Controllers\Admin\AdminSkillController::class);
    
        /* contact Admin */
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
        Route::post('/messages/{message}/mark-read', [MessageController::class, 'markRead'])->name('messages.markRead');


    });




require __DIR__.'/auth.php';
