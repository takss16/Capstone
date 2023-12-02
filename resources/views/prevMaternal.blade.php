<x-layout>
<main class="mw-100 col-11">
<div class="text-start">
            <a href="{{ route('admin.maternal', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
<div class="mt-3">
    <h3>Previous Maternal Record </h3>
</div>

<div class="col-12 mt-3">
    <div class="card shadow-lg col-12">
        <div class="card-body">
            <section class="patient-info-section mb-4">
                <h5 class="section-title">Personal Information</h5>
                <div class="row">
                    <div class="col-md-3">
                        <p class="info-label">Patient Name</p>
                        <p>{{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Patient ID</p>
                        <p>{{ $patient->id }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Age</p>
                        <p>{{ $patient->age }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Birthday</p>
                        <p>{{ $patient->birthday }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="info-label">Civil Status</p>
                        <p>{{ $patient->civilstatus }}</p>
                    </div>
                </div>
            </section>

            @foreach ($maternalRecord as $maternalRecord)
            <section class="maternal-details-section mt-2">
                                <h5 class="section-title">Maternal Details</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Last Menstrual Period (LMP)</th>
                                            <td>{{ $maternalRecord->lmp }}</td>
                                            <th>Age of Gestation (AOG)</th>
                                            <td>{{ $maternalRecord->aog }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estimated Date of Confinement (EDC)</th>
                                            <td>{{ $maternalRecord->edc }}</td>
                                            <th>Fetal Heart Tones (FHT)</th>
                                            <td>{{ $maternalRecord->fht }}</td>
                                        </tr>
                                        <tr>
                                            <th>Presentation</th>
                                            <td>{{ $maternalRecord->pres }}</td>
                                            <th>Station</th>
                                            <td>{{ $maternalRecord->st }}</td>
                                        </tr>
                                        <tr>
                                            <th>Effacement</th>
                                            <td>{{ $maternalRecord->effacement }}</td>
                                            <th>Cervical Dilatation</th>
                                            <td>{{ $maternalRecord->cervical_dilatation }}</td>
                                        </tr>
                                        <tr>
                                            <th>Blood Pressure (BP)</th>
                                            <td>{{ $maternalRecord->bp }}</td>
                                            <th>Bag of Waters</th>
                                            <td>{{ $maternalRecord->bow }}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{ $maternalRecord->color }}</td>
                                            <th>Time of Rupture</th>
                                            <td>{{ $maternalRecord->time_rupture }}</td>
                                        </tr>
                                        <tr>
                                            <th>Condition of Labor</th>
                                            <td>{{ $maternalRecord->condition }}</td>
                                            <th>Gravidity</th>
                                            <td>{{ $maternalRecord->gravidity }}</td>
                                        </tr>
                                        <tr>
                                            <th>Parity</th>
                                            <td>{{ $maternalRecord->parity }}</td>
                                            <th>Medical History</th>
                                            <td>{{ $maternalRecord->medical_history }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </section>

<hr>
            @endforeach

          
        </div>
    </div>
</div>
</main>
</x-layout>