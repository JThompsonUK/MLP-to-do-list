@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Add Task</h2>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Task Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>

            <div class="col-md-8">
                <h2>All Tasks</h2>

                @if ($tasks->isEmpty())
                    <p>No tasks found.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $index => $task)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>

                                    <td>
                                        <span class="{{ $task->completed ? 'completed-task' : '' }}">
                                            <strong>{{ $task->name }}</strong>
                                        </span>
                                    </td>

                                    <td>
                                        @if (!$task->completed)
                                            <div>
                                                <a href="{{ route('tasks.tick', $task->id) }}" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @else
                                            <a href="{{ route('tasks.untick', $task->id) }}" class="btn btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                                </svg>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>



                @endif
            </div>
        </div>
    </div>
@endsection
<style>
    .completed-task {
        text-decoration: line-through;
    }
</style>
