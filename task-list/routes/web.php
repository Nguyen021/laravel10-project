<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Task;
use \Illuminate\Http\Request;
use \App\Http\Requests\TaskRequest;


Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
//    $tasks = DB::select('select * from tasks where completed = ?', [true]);
//    $tasks = \App\Models\Task::all();
    $tasks = Task::latest()->paginate(10);
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

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
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

    return view('detail', ['task' => $task]);
})->name('tasks.detail');


Route::post('/tasks', function (TaskRequest $request) {
//    $data = $request->validated();
//
//    $task = new Task;
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//    $task->save();

    $task = Task::create($request->validated());
    return redirect()->route('tasks.detail', ['task' => $task->id])->with('success', 'Task created Successfully! ');
})->name('tasks.store');

//Edit Task Session

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('/tasks/{task}/edit', function (Task $task, TaskRequest $request) {

//    $data = $request->validated();
//
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//    $task->save();
    $task->update($request->validated());

    return redirect()->route('tasks.detail', ['task' => $task->id])->
    with('success', 'Task updated Successfully!');
})->name('tasks.update');
//End Edit Task Session

Route::delete('/tasks/{task}/delete',function (Task $task){
    $task->delete();
    return redirect()->route('task.index')->with('success','Deleted task!');
})->name('tasks.delete');

Route::put('/tasks/{task}/toggle-completed',function (Task $task){
   $task->toggleComplete();
    return redirect()->back()->with('success','Task updated successfully!');
})->name('tasks.toggle-complete');
