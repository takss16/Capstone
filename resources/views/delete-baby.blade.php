<x-layout>
    <main class="mw-100 col-11">
        <div class="container">
            <h3>Confirm Deletion</h3>
            <p>Are you sure you want to delete the baby record for this patient?</p>

            <form id="delete-form" action="{{ route('admin.deleteBabyRecord', ['id' => $patient->id, 'babyId' => $baby->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                    <i class="fa-regular fa-square-minus"></i> Delete
                </button>
                <a href="{{ route('admin.child', ['id' => $patient->id]) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </main>
</x-layout>
