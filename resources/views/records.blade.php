<x-layout>
    <main class="mw-100 col-11">
    <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Patients
                                    </div>
                                    <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                
                                                <th>Patient ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Midle Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                            <tr>
                                            <td>{{ $patient->id }}</td>
                                                <td>
                                                    {{ $patient->firstname }}</td>
                                                <td>{{ $patient->lastname }}</td>
                                                <td> {{ $patient->midlename }}</td>                                                                                               
                                                <td>
                                                <a href="{{ route('ViewRecord', ['id' => $patient->id]) }}" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                            @endforeach
                     
                                        </tbody>
                                    </table>

                            </div>
    
    </main>
</x-layout>
