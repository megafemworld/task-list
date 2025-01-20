<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function()
{
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index', ['tasks' => \App\Models\Task::latest()->where('completed', true)->get()
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id){
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');

// Route::get('/hello', function () {
//     return 'Hello World';
// });
// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . ' !';
// });

