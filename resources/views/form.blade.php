@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task': 'Add Task')

@vite('resources/js/app.js')

@section('content')
    <form method="POST"
          action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title" class="d-block text-uppercase text-secondary mb-2">
                Title
            </label>
            <input type="text" name="title" id="title" class="form-control shadow-sm w-100 py-2 px-3 text-secondary
            {{ $errors->has('title') ? 'border-danger' : '' }}"
                   value="{{ $task->title ?? old('title') }}"/>
            @error('title')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="description" class="d-block text-uppercase text-secondary mb-2">Description</label>
            <textarea name="description" id="description" class="form-control shadow-sm w-100 py-2 px-3 text-secondary
            {{ $errors->has('title') ? 'border-danger' : '' }}"
                      rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description" class="d-block text-uppercase text-secondary mb-2">Long Description</label>
            <textarea name="long_description" id="long_description" class="form-control shadow-sm w-100 py-2 px-3 text-secondary
            {{ $errors->has('title') ? 'border-danger' : '' }}"
                      rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex gap-2 align-items-center">
            <button type="submit" class="btn btn-outline-success">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>
@endsection


