@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save Task</button>
    </form>
</div>
@endsection