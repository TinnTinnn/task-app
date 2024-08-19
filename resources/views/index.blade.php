@extends('layouts.app')

@section('title', 'The list of tasks')

@vite('resources/js/app.js')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
        class="fw-large text-decoration-underline text-info">Add Task!</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
               class="{{ $task->completed ? 'text-decoration-line-through' : 'text-decoration-none' }}"
            >{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links('pagination::bootstrap-5') }}
        </nav>
    @endif
@endsection




