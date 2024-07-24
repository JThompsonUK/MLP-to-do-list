<?php

namespace App\Http\Controllers;

use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * The task service instance.
     *
     * @var TaskServiceInterface
     */
    protected $taskService;

    /**
     * Create a new controller instance.
     *
     * @param TaskInterface $taskService
     * @return void
     */
    public function __construct(TaskInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a list of the tasks.
     *
     * @return View
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a new task.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->taskService->create($request->name);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Mark the specified task as completed.
     *
     * @param int $taskId
     * @return RedirectResponse
     */
    public function tick(Task $task)
    {
        $this->taskService->tick($task);
        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }

    /**
     * Mark the specified task as not completed.
     *
     * @param int $taskId
     * @return RedirectResponse
     */
    public function untick(Task $task)
    {
        $this->taskService->untick($task);
        return redirect()->route('tasks.index')->with('success', 'Task marked as not completed.');
    }

    /**
     * Delete the specified task.
     *
     * @param int $taskId
     * @return RedirectResponse
     */
    public function delete(Task $task)
    {
        $this->taskService->delete($task);
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
