<?php
namespace App\Services;

use App\Models\Task;
class TaskService
{
    public function getAllTasks(){
        return Task::paginate(2);
    }

    public function getTaskById($id){
        return Task::findOrFail($id);
    }
    public function createTask(array $data)
    {
        try {
            $task = Task::create($data);
            return $task;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function updateTask(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function deleteTask($id){
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
