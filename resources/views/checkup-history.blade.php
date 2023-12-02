<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
            <div class="text-start mb-3">
            <div class="col-md-6 text-start mb-3">
                    <a href="{{ route('admin.checkup', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-chevron-left"></i> Back
                    </a>
                </div>
            </div>
            <h2>Checkup History for {{ $patient->firstname }} {{ $patient->lastname }}</h2>

            @foreach ($checkup as $checkups)

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Checkup on {{ \Carbon\Carbon::parse($checkups->visit_date)->format('F d, Y') }}</h5>
                        <hr>
                        <section class="checkup-details-section mt-2">
            <h5 class="section-title">Checkup Details</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                      
                        <th>Time:</th>
                        <td>{{ \Carbon\Carbon::parse($checkups->visit_time)->format('h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Reason:</th>
                        <td colspan="3">{{ $checkups->reason }}</td>
                    </tr>
                    <tr>
                        <th>Next Visit:</th>
                        <td>{{ \Carbon\Carbon::parse($checkups->next_visit)->format('F d, Y') }}</td>
                        <th>Last Menstrual Period (LMP):</th>
                        <td>{{ \Carbon\Carbon::parse($checkups->lmp)->format('F d, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Age of Gestation (AOG):</th>
                        <td>{{ $checkups->aog }}</td>
                        <th>Estimated Date of Confinement (EDC):</th>
                        <td>{{ \Carbon\Carbon::parse($checkups->edc)->format('F d, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Blood Pressure (BP):</th>
                        <td>{{ $checkups->bp }}</td>
                        <th>Weight:</th>
                        <td>{{ $checkups->weight }}</td>
                    </tr>
                    <tr>
                        <th>Fetal Heart Tones (FHT):</th>
                        <td>{{ $checkups->fht }}</td>
                        <th>Fundic Height (FH):</th>
                        <td>{{ $checkups->fh }}</td>
                    </tr>
                </tbody>
            </table>
        </section>

                        @if ($checkups->medicineRecords->isNotEmpty())
                           
                            <section class="medicine-details-section mt-2"> <!-- Add a new section for displaying medicine -->
                            <h6 class="card-subtitle mb-2 text-muted">Medicine Prescribed:</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>Dosage</th>
                                            <th>Frequency</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($checkups->medicineRecords as $medicineRecord)
                                            <tr>
                                                <td>{{ $medicineRecord->medicine_name }}</td>
                                                <td>{{ $medicineRecord->dosage }}</td>
                                                <td>{{ $medicineRecord->frequency }}</td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </section>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
