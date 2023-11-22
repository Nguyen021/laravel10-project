<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

class Task
{
    public function __construct(
        public int     $id,
        public string  $title,
        public string  $description,
        public ?string $long_description,
        public bool    $completed,
        public string  $created_at,
        public string  $updated_at
    )
    {
    }
}

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
//    $tasks = DB::select('select * from tasks where completed = ?', [true]);
//    $tasks = \App\Models\Task::all();
    $tasks = \App\Models\Task::latest()->where('completed', true)->get(); // call query builder
    return view('index', [
        'name' => '<i> Nguyen Ne</i>',
        'tasks' => $tasks
    ]);
})->name('task.index');

Route::get('/hello', function () {
    return 'Hello Page';
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello' . $name . '!';
});

Route::get('/hallo', function () {
    return redirect()->route('task.index');
});

Route::fallback(function () {
    return 'Still got somewhere';
});

Route::get('/tasks/{id}', function ($id) {
//    $tasks = array_search($id,array_column($tasks,'id'));
//    $task = collect($tasks)->firstWhere('id', $id);
//    array_filter($tasks, function ($task) use ($id) {
//        return $task->id === $id;
//    });
//    $task = DB::table('tasks')
//        ->where('completed', true)
//        ->get();
//    $task = collect($task)->firstWhere('id', $id);

//    if (!$task)
//        abort(Response::HTTP_NOT_FOUND);

    return view('detail', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.detail')->where('id', '<>', 'create');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks', function (\Illuminate\Http\Request $request) {
    dd($request);
    dd($request->all());
})->name('tasks.store');
