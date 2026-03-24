<form action="/tasks/{{ $t->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn" title="Delete">✕</button>
</form>