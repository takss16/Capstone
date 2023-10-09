<x-layout-appointment>
    <main class="mw-100 col-11 mt-5">
        <div class="d-flex justify-content-center mt-3">
            <div class="col-12 ">
                <div class="card shadow-lg ">
                    <div class="container  col-md-12">
                        <div class="row mt-3">
                            <div class="col-12">
                                <section class="patient-info-section mb-4">
                                    <h5 class="section-title">Personal Information</h5>
                                    <h6 class="mt-3 mb-3">
                                        {{ $appointmentPatient->first_name }}
                                        {{ $appointmentPatient->middle_name }}
                                        {{ $appointmentPatient->last_name }}
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="info-label">Age</p>
                                            <p><b>{{ $appointmentPatient->age }}</b></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Birthday</p>
                                            <p><b>{{ $appointmentPatient->birthday }}</b></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Civil Status</p>
                                            <p><b>{{ $appointmentPatient->civil_status }}</b></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="info-label">Contact</p>
                                            <p><b>{{ $appointmentPatient->contact }}</b></p>
                                        </div>
                                    </div>
                                </section>
                                <section class="patient-info-section mb-4">
                                    <div class="row">
                                        <div class="col">
                                            <p class="info-label">Address</p>
                                            <p><b>{{ $appointmentPatient->address }}</b></p>
                                        </div>
                                    </div>
                                </section>
                                <hr>
                                <form method="POST" action="{{ route('appointment-patient.step2.store') }}">
                                  @csrf
                                  <div class="row">
                                        <div class="col-md-6">
                                            <label for="appointment_date">Appointment Date (Monday to Friday)</label>
                                            <input type="date" name="appointment_date" id="appointment_date" class="form-control"min="<?= date('Y-m-d') ?>" required>
                                            <small id="date_error" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="appointment_time">Appointment Time (7 AM to 5 PM)</label>
                                            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
                                            <small id="time_error" class="text-danger"></small>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label for="appointment_reason">Appointment Reason</label>
                                    <textarea name="appointment_reason" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-appointment>