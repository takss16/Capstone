<x-layout>
    <main class="mw-100 col-11">
        <div class="container bg">
            <div>

                <div class="bg-dark col-9 mt-3"></div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.ViewRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-circle-chevron-left"></i> Back
                    </a>
                    @if (!$admissionFalse->isEmpty())
                                    <a  href="{{ route('admin.prevAdmission', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i> Previous Admission
                                    </a>
                        @endif
                </div>
                <div class="col-md-12 mt-2 ">
                    <div class="text-center mt-3">
                        <h3>Admission</h3>
                    </div>

                    @if ($admission)




                    <!-- Display checkup details here -->
                    <div class="col-12 mt-5">
                        <div class="card shadow-lg col-12">
                            <div class="card-body">
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
                                                <td>{{ $admission->admission_date }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Date of Discharge</td>
                                                <td>{{ $admission->discharge_date }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Admission Diagnosis</span>
                                    </div>
                                    <div class="col">
                                        {{ $admission->admission_diagnosis }}
                                    </div>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Services Performed</span>
                                    </div>
                                    <div class="col">
                                        {{ $admission->services_performed }}
                                    </div>
                                    <hr>
                                    <div class="text-start">
                                        <span class="fw-bold">Final Diagnosis</span>
                                    </div>
                                    <div class="col">
                                        {{ $admission->final_diagnosis }}
                                    </div>

                                </section>
                                <div class="row g-3 mt-5 col-12 text-center">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                                            Delete
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('admin.printAdmission', ['id' => $patient->id]) }}" class="btn btn-primary btn-block" target="_blank">
                                            <i class="fa-solid fa-print"></i> Print
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="{{ route('admin.editAdmissionForm', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary text-end">
    <i class="fa-solid fa-pen-to-square"></i> Update
</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>



                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this admission record?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteForm" action="{{ route('admin.deleteAdmission', ['id' => $patient->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else
                    <!-- Admission form -->
                    <div class="col-12">
                        <div class="card shadow-lg col-12">
                            <div class="card-body">
                                <form action="{{ route('admin.storeAdmission', ['id' => $patient->id]) }}" method="POST">
                                    @csrf
                                    <div class="row g-3">



                                        <div class="col-md-6">
                                            <label for="admission-date" class="form-label">Date of Admission</label>
                                            <input type="date" id="admission-date" name="admission-date" class="form-control" value="{{ date('Y-m-d') }}"><br>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="discharge-date" class="form-label">Date of Discharge</label>
                                            <input type="date" id="discharge-date" name="discharge-date" class="form-control" min="{{ date('Y-m-d') }}"><br>
                                        </div>

                                        <div class="col-12">
                                            <label for="admission-diagnosis" class="form-label">Admission Diagnosis*</label>
                                            <textarea id="admission-diagnosis" name="admission-diagnosis" class="form-control" oninput="convertToUppercase(this)" required></textarea><br>
                                        </div>
                                        <div class="col-12">
                                            <label for="services-performed" class="form-label">Services Performed</label>
                                            <textarea id="services-performed" name="services-performed" class="form-control" oninput="convertToUppercase(this)"></textarea><br>
                                        </div>
                                        <div class="col-12">
                                            <label for="final-diagnosis" class="form-label">Final Diagnosis</label>
                                            <textarea id="final-diagnosis" name="final-diagnosis" class="form-control" oninput="convertToUppercase(this)"></textarea><br>
                                        </div>
                                        <div class="col-12">
                                            <div class="row justify-content-center">

                                                <div class="col-md-2 mb-3">
                                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-download"></i> Save</button>
                                                </div>
                                                <!-- Add more buttons as needed -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
    </main>
</x-layout>