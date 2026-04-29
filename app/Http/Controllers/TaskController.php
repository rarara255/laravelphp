<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    // реализация Dependency Injection
    private TaskService $taskService;
    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function index()
    {
        $this->authorize('viewAny', Task::class);
        $tasks = $this->taskService->getAllTasks();
        return View::make('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
       $this->authorize('create', Task::class);
        return View::make('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->authorize('create', Task::class);
        $validated = $request->validated(); // произведение валидации данных
        // пришедших от пользователя
        // обращение к приватному свойству конструктора
        // через контекст this
        $this->taskService->createTask($validated);
        return Redirect::route('tasks.index')->with('success','Задача успешно создана');
    }

    public function show($id)
    {
        $this->authorize('view', Task::class);
        $task = Task::findorfail($id); // SELECT * FROM tasks WHERE id=$id;
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);
        $this->authorize('update', $id);
        $task = $this->taskService->getTaskById($id);

        return View::make('tasks.edit', ['task'=>$task]);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->getTaskById($id);
        $this->authorize('update', $task);
        $task = $this->taskService->getTaskById($id);

        $validated = $request->validated();
        $this->taskService->updateTask($task,$validated);
        return Redirect::route('tasks.index')->with('success', 'Задача успешно обновлена');
    }

    public function destroy($id)
    {
        $this->authorize('delete', Task::class);
        $this->taskService->deleteTask($id);
        return Redirect::route('tasks.index')->with('success', 'Задача успешно удалена');
    }
}
