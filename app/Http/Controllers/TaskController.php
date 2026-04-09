<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
class TaskController extends Controller
{
    // реализация Dependency Injection
    public function __construct(private TaskService $taskService){}

    public function index()
    {
        $tasks = Task::paginate(2);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return View::make('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated(); // произведение валидации данных
        // пришедших от пользователя
        // обращение к приватному свойству конструктора
        // через контекст this
        $task = $this->taskService->createTask($validated);
        dd($task);
        return Redirect::route('tasks.index')->with('success','Задача успешно создана');
    }

    public function show($id)
    {
<<<<<<< HEAD
        $task = Task::findorfail($id); // SELECT * FROM tasks WHERE id=$id;
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
=======
        $task = Task::findOrFail($id); // SELECT * FROM tasks WHERE id=$id;
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $validated = $request->validated();
        $task = Task::findOrFail($id);
        $updatedTask = $this->taskService->updateTask($task,$validated);
        dd($updatedTask);
        //return Redirect::route('tasks.index')->with('success', 'Задача успешно обновлена');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return Redirect::route('tasks.index')->with('success', 'Задача успешно удалена');
>>>>>>> d44176e (blade,controller)
    }
}
