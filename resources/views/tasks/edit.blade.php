
<h1 class="text-2xl font-bold mb-6">Edit Task</h1>

<form method="POST" action="/tasks/{{ $task->id }}">
    @csrf
    @method('PATCH')

    <input
        type="text"
        name="title"
        value="{{ $task->title }}"
        class="border p-2 rounded w-80"
    >

    <button class="bg-blue-500 text-white px-4 py-2 rounded ml-2">
        Update
    </button>
</form>