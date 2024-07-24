<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a list of the tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }




    public function store()
    {
        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        return redirect()->route('tasks.index');
    }

    public function delete(Task $task)
    {
        return redirect()->route('tasks.index');
    }
}
