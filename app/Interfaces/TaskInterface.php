<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskInterface
{
    public function addTask(string $name): Task;
    public function removeTask(int $taskId): bool;
    public function tickTask(int $taskId): bool;
    public function untickTask(int $taskId): bool;
}
