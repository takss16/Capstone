<x-layout>
    <main class="mw-100 col-11">
    <div class="card mb-4">
        <h2>Select a Patient to Check out</h2>
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Patients
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
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
                            <div class="text-center">
                            <a href="{{ route('admin.checkout', ['patientId' => encrypt($patient->id)]) }}" class="btn btn-primary">Checkout</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </main>
</x-layout>