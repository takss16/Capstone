<x-layout-portal>
    <main class="mw-100 col-11">
        <div class="container">
            <h1>Medicine Details for {{ $patient->firstname }} {{ $patient->lastname }}</h1>

            @if ($latestCheckUp)
                <!-- Display checkup details -->
                @if ($latestCheckUp->medicineRecords->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        <h6>These Medicine prescribed on {{ \Carbon\Carbon::parse($latestCheckUp->visit_date)->format('F d, Y') }}</h6>
                        <!-- Add any checkup details you want to display here -->
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-body">
                        <h6>No Medicine prescribed on {{ \Carbon\Carbon::parse($latestCheckUp->visit_date)->format('F d, Y') }}</h6>
                        <!-- Add any checkup details you want to display here -->
                    </div>
                </div>
                @endif
               

                @if ($latestCheckUp->medicineRecords->isNotEmpty())
                    <div class="row">
                        @foreach ($latestCheckUp->medicineRecords as $medicine)
                            <!-- Display associated medicines with margin -->
                            <div class="card mt-3 col-lg-4 col-md-6 col-sm-12 mx-2">
                                <div class="card-body">
                                    <p><strong>Associated Medicines:</strong></p>

                                    <ul>
                                        <li>
                                            <p><strong>Medicine Name:</strong> {{ $medicine->medicine_name }}</p>
                                            <p><strong>Dosage:</strong> {{ $medicine->dosage }}</p>
                                            <p><strong>Frequency:</strong> {{ $medicine->frequency }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                <div class="card mt-5">
                    <div class="card-body">
                    <h6>No medicines associated with this checkup.</h6>
                    </div>
                </div>
              
                @endif
            @else
                <p>No check-up records found.</p>
            @endif
        </div>
    </main>
</x-layout-portal>
