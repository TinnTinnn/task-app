@extends('layouts.app')

@section('title', $task->title)

@vite('resources/js/app.js')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}"
           class="fw-medium text-decoration-underline text-info">← Go back to the task list!</a>
    </div>

    <p class="mb-4 fw-medium text-muted">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 fw-small text-muted">{{$task->long_description}}</p>
    @endif

    {{--Show what time is last update. From by date to how many time pass you have updated it--}}
    <p class="mb-4 fw-small text-secondary">Created {{ $task->created_at->diffForHumans() }} •
        Updated {{ $task->updated_at->diffForHumans() }}</p>


    <p class="mb-4">
        @if($task->completed)
            <span class="fw-medium text-success">Completed</span>
        @else
            <span class="fw-medium text-danger">Not completed</span>
        @endif
    </p>


    <div class="d-flex gap-2">
        <div>
            <a href="{{ route('tasks.edit', ['task'=> $task]) }}"
               class="btn btn-outline-primary">Edit</a>
        </div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
                <button type="submit" class="btn btn-outline-success  text-nowrap">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>
@endsection
