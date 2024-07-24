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
    public function addTask(string $name): Task
    {
        return Task::create(['name' => $name]);
    }

    /**
     * Remove a task.
     *
     * @param int $taskId
     * @return bool
     */
    public function removeTask(int $taskId): bool
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
            return true;
        }

        return false;
    }

    /**
     * Mark a task as completed.
     *
     * @param int $taskId
     * @return bool
     */
    public function tickTask(int $taskId): bool
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->update(['completed' => Carbon::now()]);
            return true;
        }

        return false;
    }

    /**
     * Mark a task as not completed.
     *
     * @param int $taskId
     * @return bool
     */
    public function untickTask(int $taskId): bool
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->update(['completed' => null]);
            return true;
        }

        return false;
    }
}
