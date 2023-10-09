<x-layout>
    <!-- <main> -->
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Patients Record</h1>
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>

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
                                {{ $patient->firstname }}
                            </td>
                            <td>{{ $patient->lastname }}</td>
                            <td> {{ $patient->midlename }}</td>
                            <td>
                                <a href="{{ route('refferalForm', ['id' => $patient->id]) }}" class="btn btn-primary" target="_blank">Get Referral Form</a>
                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>

</x-layout>