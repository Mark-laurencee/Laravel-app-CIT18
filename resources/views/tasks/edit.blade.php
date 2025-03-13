@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" class="w-full p-2 border rounded" value="{{ $task->title }}" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full p-2 border rounded">{{ $task->description }}</textarea>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_completed" value="1" class="h-4 w-4" {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed">Completed</label>
        </div>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update Task</button>
    </form>
</div>
@endsection