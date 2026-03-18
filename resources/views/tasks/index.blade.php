<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-10">

<div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

<h1 class="text-3xl font-bold mb-6">Task Manager</h1>

<!-- Add Task -->
<form method="POST" action="/tasks" class="flex gap-2 mb-6">
    @csrf
    <input 
        type="text" 
        name="title" 
        placeholder="New Task"
        class="border p-2 rounded w-full"
    >

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Add
    </button>
</form>

<!-- Task List -->
@foreach($tasks as $task)

<div class="flex justify-between items-center border-b py-3">

<div>
{{ $task->title }}
</div>

<div class="flex gap-2">

<a href="/tasks/{{ $task->id }}/edit"
class="text-blue-500">
Edit
</a>

<form method="POST" action="/tasks/{{ $task->id }}">
@csrf
@method('DELETE')

<button class="text-red-500">
Delete
</button>

</form>

</div>

</div>

@endforeach

</div>

</body>
</html>