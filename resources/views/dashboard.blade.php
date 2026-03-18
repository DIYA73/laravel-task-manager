<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Task Manager
</h2>
</x-slot>

<div class="max-w-6xl mx-auto mt-10">

<!-- ADD TASK -->
<form action="/tasks" method="POST" class="flex gap-2 mb-6">
@csrf
<input
type="text"
name="title"
placeholder="Add new task..."
class="border rounded w-full px-4 py-2"
/>

<button class="bg-blue-600 text-white px-6 py-2 rounded">
Add
</button>
</form>

<!-- KANBAN -->
<div style="display:flex; gap:20px;">

    <div data-status="todo" class="column">
        <h3>Todo</h3>
        @foreach($tasks->where('status','todo') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                {{ $t->title }}
            </div>
        @endforeach
    </div>

    <div data-status="doing" class="column">
        <h3>Doing</h3>
        @foreach($tasks->where('status','doing') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                {{ $t->title }}
            </div>
        @endforeach
    </div>

    <div data-status="done" class="column">
        <h3>Done</h3>
        @foreach($tasks->where('status','done') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                {{ $t->title }}
            </div>
        @endforeach
    </div>

</div>

</div>

<!-- STYLE -->
<style>
.column {
    flex:1;
    background:#1e293b;
    padding:15px;
    border-radius:10px;
    color:white;
}

.task {
    background:white;
    padding:10px;
    margin:10px 0;
    border-radius:6px;
    cursor:grab;
    color:black;
}
</style>

<!-- SCRIPT -->
<script>
let tasks = document.querySelectorAll('.task');

tasks.forEach(task => {
    task.addEventListener('dragstart', () => {
        task.classList.add('dragging');
    });

    task.addEventListener('dragend', () => {
        task.classList.remove('dragging');
    });
});

let columns = document.querySelectorAll('[data-status]');

columns.forEach(column => {
    column.addEventListener('dragover', e => {
        e.preventDefault();
    });

    column.addEventListener('drop', () => {
        let task = document.querySelector('.dragging');
        column.appendChild(task);

        let taskId = task.dataset.id;
        let status = column.dataset.status;

        fetch(`/tasks/${taskId}/move`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status })
        });
    });
});
</script>

</x-app-layout>