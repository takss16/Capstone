<x-layout>
    <main class="mw-100 col-11">
    <div class="container">
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete the maternal record for this patient?</p>

        <form id="delete-form" action="{{ route('deleteMaternalRecord', ['id' => $patient->id, 'maternalRecordId' => $maternalRecord->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                <i class="fa-regular fa-square-minus"></i> Delete
            </button>
            <a href="{{ route('maternal', ['id' => $patient->id]) }}" class="btn btn-secondary">Cancel</a>
        </form>
   </main>
</x-layout>