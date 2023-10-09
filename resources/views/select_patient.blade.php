<x-layout>
    <main class="mw-100 col-11">
    <h2>Select a Patient to Check out</h2>
    
    <table class="table" data-bs-smooth-scroll="true">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->firstname }}</td>
                    <td>{{ $patient->lastname }}</td>
                    <td>
                    <a href="{{ route('checkout', ['patientId' => $patient->id]) }}" class="btn btn-primary">Checkout</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </main>
</x-layout>
