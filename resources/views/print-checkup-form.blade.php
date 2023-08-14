<x-layout-print>
<div class="container mt-4 col-10">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="border p-4">
                <div class="row">
                    <div class="col-m1-1 text-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 60px;">
                    </div>
                    <div class="col text-center">
                    <h2 class="text-center">Pabustan Birthing Clinic</h2>
                    <span class="fw-bold">0192 RIVERSIDE ST DOLORES CAPAS TARLAC</span>
                    </div>
                </div>
                <hr>
                    <h3 class="text-center mt-4">Check up Record</h3>

                    <!-- Patient Details -->
                    <div class="col-md-4 mt-4">
                                <span class="fw-bold">Full Name:</span> {{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}
                            </div>
                   
                    <div class="row mb-2 mt-2">
                        <div class="col">
                            <span class="fw-bold">Birthday:</span>  {{ $patient->birthday }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Civil Status:</span>  {{ $patient->civilstatus }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Age:</span>  {{ $patient->age }}
                        </div>
                    </div>
                    <hr>
                    <h2>Checkup Details</h2>
                <p>Date: {{ $checkup->visit_date }}</p>
                <p>Time: {{ $checkup->visit_time }}</p>
                <p>Reason: {{ $checkup->reason }}</p>
                <p>Next Visit: {{ $checkup->next_visit }}</p>
<hr>
                
                    
                
                <div class="container mt-3">
                    <div class="text-center">
                    <h2>Medication</h2>
                    </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkup->medicineRecords as $medicine)
                    <tr>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td>{{ $medicine->dosage }}</td>
                        <td>{{ $medicine->frequency }}</td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
                
            <!-- Your content goes here -->

            <!-- Print Button outside of the x-layout-print element -->
            <div class="text-center no-print">
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="fa-solid fa-print"></i> Print
                </button>
            </div>
        </div>
    </x-layout-print>