<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Task Manager
</h2>
</x-slot>

<div class="max-w-6xl mx-auto mt-10 px-4">
    <form action="/tasks" method="POST" class="flex gap-2 mb-6">
        @csrf
        <input type="text" name="title" placeholder="Add new task..." class="border rounded w-full px-4 py-2"/>
        <button class="bg-blue-600 text-white px-6 py-2 rounded">Add</button>
    </form>
    <div style="display:flex; gap:20px;">
        <div data-status="todo" class="column">
            <h3>📌 Todo</h3>
            @foreach($tasks->where('status','todo') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                <span>{{ $t->title }}</span>
                <form action="/tasks/{{ $t->id }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="delete-btn">✕</button>
                </form>
            </div>
            @endforeach
        </div>
        <div data-status="doing" class="column">
            <h3>⚡ Doing</h3>
            @foreach($tasks->where('status','doing') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                <span>{{ $t->title }}</span>
                <form action="/tasks/{{ $t->id }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="delete-btn">✕</button>
                </form>
            </div>
            @endforeach
        </div>
        <div data-status="done" class="column">
            <h3>✅ Done</h3>
            @foreach($tasks->where('status','done') as $t)
            <div draggable="true" class="task" data-id="{{ $t->id }}">
                <span>{{ $t->title }}</span>
                <form action="/tasks/{{ $t->id }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="delete-btn">✕</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
.column { flex:1; background:#1e293b; padding:15px; border-radius:10px; color:white; min-height:300px; }
.column h3 { font-size:16px; font-weight:bold; margin-bottom:12px; padding-bottom:8px; border-bottom:1px solid rgba(255,255,255,0.2); }
.task { background:white; padding:10px 12px; margin:10px 0; border-radius:6px; cursor:grab; color:black; display:flex; justify-content:space-between; align-items:center; }
.task span { flex:1; font-size:14px; }
.delete-btn { background:transparent; border:none; color:#ef4444; font-size:16px; font-weight:bold; cursor:pointer; padding:2px 6px; border-radius:4px; }
.delete-btn:hover { background:#fee2e2; }
</style>
<script>
document.querySelectorAll('.task').forEach(task => {
    task.addEventListener('dragstart', () => task.classList.add('dragging'));
    task.addEventListener('dragend', () => task.classList.remove('dragging'));
});
document.querySelectorAll('[data-status]').forEach(column => {
    column.addEventListener('dragover', e => e.preventDefault());
    column.addEventListener('drop', () => {
        let task = document.querySelector('.dragging');
        column.appendChild(task);
        fetch(`/tasks/${task.dataset.id}/move`, {
            method:'POST',
            headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
            body:JSON.stringify({status: column.dataset.status})
        });
    });
});
</script>
</x-app-layout>
