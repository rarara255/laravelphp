<?php
namespace App\Services;

use App\Models\Task;
class TaskService
{
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
}
