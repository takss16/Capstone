<x-layout>
<main class="mw-100 col-11">
<div class="text-start">
            <a href="{{ route('admin.addmit', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
<div class="col-12 mt-5">
    <div class="card shadow-lg col-12">

        <div class="card-body">
        @if ($admission->isNotEmpty())
                @foreach ($admission as $record)
                <section class="patient-info-section mb-2">
                                    <h5 class="section-title">Personal Information</h5>
                                    <h6 class="mt-2 mb-2">
                                        {{ $patient->firstname }}
                                        {{ $patient->midlename }}
                                        {{ $patient->lastname }}
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="info-label">Patient ID:</p>
                                            <p>{{ $patient->id }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Age:</p>
                                            <p>{{ $patient->age }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Birthday:</p>
                                            <p>{{ \Carbon\Carbon::parse($patient->birthday)->format('F d, Y') }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Civil Status:</p>
                                            <p>{{ $patient->civilstatus }}</p>
                                        </div>
                                    </div>
                                </section>

                                <!-- Checkup Details Section -->
                                <section class="checkup-details-section mt-2">

                                    <div class="text-center mt-3">
                                        <h3>Details</h3>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold">Date of Admission</td>
                                                <td>{{ $record->admission_date }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Date of Discharge</td>
                                                <td>{{ $record->discharge_date }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Admission Diagnosis</span>
                                    </div>
                                    <div class="col">
                                        {{ $record->admission_diagnosis }}
                                    </div>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Services Performed</span>
                                    </div>
                                    <div class="col">
                                        {{ $record->services_performed }}
                                    </div>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Final Diagnosis</span>
                                    </div>
                                    <div class="col">
                                        {{ $record->final_diagnosis }}
                                    </div>

                                </section>
                @endforeach
            @else
                <p>No admission records found.</p>
            @endif
        </div>
    </div>
</main>
</x-layout>