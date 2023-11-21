<?php

use Illuminate\Support\Facades\Route;

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

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () use ($tasks) {
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
Route::get('/tasks/{id}', function ($id) use ($tasks) {
//    $tasks = array_search($id,array_column($tasks,'id'));
    $task = collect($tasks)->firstWhere('id', $id);
//    array_filter($tasks, function ($task) use ($id) {
//        return $task->id === $id;
//    });
    if (!$task)
        abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
    return view('detail', ['task' => $task]);
})->name('tasks.detail');
