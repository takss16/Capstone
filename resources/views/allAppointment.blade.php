<x-layout>
    <main class="mw-100 col-11">
    <div class="card mb-4">
                <div class="container">
                    <h1>APPOINTMENTS</h1>
                    <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Civil Status</th>
                                    <th>Start Date</th>
                                    <th>Action</th> <!-- Add a new column for the button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                                    <td>{{ $appointment->age }}</td>
                                    <td>{{ $appointment->address }}</td>
                                    <td>{{ $appointment->civil_status }}</td>
                                    <td>
                                        @if ($appointment->dateTimeReasons->count() > 0)
                                        @foreach ($appointment->dateTimeReasons as $dateTimeReason)
                                        {{ date('Y-m-d', strtotime($dateTimeReason->appointment_date)) }}<br>
                                        @endforeach
                                        @else
                                        No appointments
                                        @endif
                                    </td>
                                    <td>                  
                                        <a href="{{ route('appointment.info', ['id' => $appointment->id]) }}" class="btn btn-primary">View Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>
</x-layout>