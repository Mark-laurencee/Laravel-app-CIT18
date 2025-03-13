@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Task List</h1>
    <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Create Task</a>
    <table class="w-full mt-4 border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Description</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="border">
                    <td class="p-2 border">{{ $task->title }}</td>
                    <td class="p-2 border">{{ $task->description }}</td>
                    <td class="p-2 border">{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                    <td class="p-2 border space-x-2">
                        <a href="{{ route('tasks.show', $task->id) }}" class="px-2 py-1 bg-blue-400 text-white rounded">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="px-2 py-1 bg-yellow-400 text-white rounded">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection