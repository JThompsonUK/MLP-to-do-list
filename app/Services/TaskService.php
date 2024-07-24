<?php

namespace App\Services;

use App\Interfaces\TaskInterface;
use App\Models\Task;
use Carbon\Carbon;

class TaskService implements TaskInterface
{
    /**
     * Add a new task.
     *
     * @param string $name
     * @return Task
     */
    public function create(string $name): Task
    {
        return Task::create(['name' => $name]);
    }

    /**
     * Remove a task.
     *
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool
    {
        return $task->delete();
    }

    /**
     * Mark a task as completed.
     *
     * @param Task $task
     * @return bool
     */
    public function tick(Task $task): bool
    {
        return $task->update(['completed' => now()]);
    }

    /**
     * Mark a task as not completed.
     *
     * @param Task $task
     * @return bool
     */
    public function untick(Task $task): bool
    {
        return $task->update(['completed' => null]);
    }
}
