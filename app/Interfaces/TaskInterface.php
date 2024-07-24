<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskInterface
{
    /**
     * Add a new task.
     *
     * @param string $name
     * @return Task
     */
    public function create(string $name): Task;

    /**
     * Remove the specified task.
     *
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool;

    /**
     * Mark the specified task as completed.
     *
     * @param Task $task
     * @return bool
     */
    public function tick(Task $task): bool;

    /**
     * Mark the specified task as not completed.
     *
     * @param Task $task
     * @return bool
     */
    public function untick(Task $task): bool;
}
