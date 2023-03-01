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

Auth::routes([
    'verify' => true
]);
Route::middleware(['auth', 'verified'])->group(function () {
    //Página inicial
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
    
    //Páginas de projetos
    Route::get('/projeto/{position}', [App\Http\Controllers\ProjectController::class, 'show_project'])->name('project.show');
    Route::get('/projetos', [App\Http\Controllers\ProjectController::class, 'show_projects'])->name('projects.show');
    Route::get('/projetos/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::post('/projetos', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::get('/projetos/{position}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projetos/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projetos/{project_position}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
    
    //Páginas de requisitos
    Route::get('/projeto/{project_position}/requisitos/create', [App\Http\Controllers\RequirementController::class, 'create'])->name('requirement.create');
    Route::get('/projeto/{project_position}/requisitos/suggestion', [App\Http\Controllers\RequirementController::class, 'suggestion'])->name('requirement.suggestion');
    Route::post('/projeto/{project_position}/requisitos', [App\Http\Controllers\RequirementController::class, 'store'])->name('requirement.store');
    Route::get('/projeto/{project_position}/requisitos/{requirement_position}/edit', [App\Http\Controllers\RequirementController::class, 'edit'])->name('requirement.edit');
    Route::put('/projeto/{project_position}/requisitos/{requirement_position}', [App\Http\Controllers\RequirementController::class, 'update'])->name('requirement.update');
    Route::delete('/projeto/{project_position}/requisitos/{requirement_position}', [App\Http\Controllers\RequirementController::class, 'destroy'])->name('requirement.destroy');

    //Gerar PDF
    Route::get('/projeto/{project_position}/pdf', [App\Http\Controllers\PdfController::class, 'generate_pdf'])->name('pdf.generate');
});
