<x-layout>
    <main class="mw-100 col-11">
        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <a href="{{ route('admin.ViewRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                    <i class="fa-solid fa-circle-chevron-left"></i> Back
                </a>
            </div>
            <div class="col-md-6 text-end mb-3">
            <a href="{{ route('admin.checkupHistory', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-clock-rotate-left"></i> History
                    </a>
            </div>
        </div>
        <hr>
        <div class="container mt-3">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="row">
                <div class="col-md-4">
                    <div class="col-12">
                        <div class="card shadow-lg col-12">
                            <div class="card-body">
                                <h2>Add Medicine</h2>
                                <form action="{{ route('admin.addMedicine', ['id' => $checkup->id]) }}" method="POST" class="mb-3">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-select" id="medicine_name" name="medicine_name" required>
                                                <option value="" selected disabled>Select Medicine Name</option>
                                                @foreach ($medicineOptions as $option)
                                                <option value="{{ $option->name }}">{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medicineModal">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-select" id="dosage" name="dosage" required>
                                                <option value="" selected disabled>Select Dosage</option> <!-- Placeholder option -->
                                                <!-- Add your dosage options here -->
                                                @foreach($dosages as $dosage)
                                                <option value="{{ $dosage->name }}">{{ $dosage->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dosageModal">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-select" id="frequency" name="frequency" required>
                                                <option value="" selected disabled>Select Frequency</option> <!-- Default placeholder option -->
                                                @foreach ($frequencies as $frequency)
                                                <option value="{{ $frequency->name }}">{{ $frequency->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#frequencyModal">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="medicineModal" tabindex="-1" aria-labelledby="medicineModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a larger modal -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="medicineModalLabel">Medicine Names</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Add New Medicine Name</h2>
                                    <form action="{{ route('admin.addMedicineName') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="newMedicineName" class="form-label">New Medicine Name</label>
                                            <input type="text" class="form-control" id="newMedicineName" name="newMedicineName" required>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    <hr> <!-- Add a horizontal line to separate the form from the list -->
                                    <h2>Medicine Names</h2>
                                    <ul class="list-group">
                                        @foreach ($medicineOptions as $medicineOption)
                                        <li class="list-group-item">
                                            {{ $medicineOption->name }}
                                            <form action="{{ route('admin.deleteMedicineName', ['id' => $medicineOption->id]) }}" method="POST" class="float-end">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="dosageModal" tabindex="-1" aria-labelledby="dosageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dosageModalLabel">Manage Dosages</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form to add new dosages -->
                                    <form action="{{ route('admin.dosages.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="newDosage" class="form-label">New Dosage</label>
                                            <input type="text" class="form-control" id="newDos
                                                 age" name="name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                    <hr>
                                    <h4>Existing Dosages</h4>
                                    <ul class="list-group">
                                        @foreach ($dosages as $dosage)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $dosage->name }}
                                            <form action="{{ route('admin.dosages.destroy', ['dosage' => $dosage->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="frequencyModal" tabindex="-1" aria-labelledby="frequencyModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="frequencyModalLabel">Manage Frequencies</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Here, you can include a form to add and delete frequencies -->
                                    <form action="{{ route('admin.frequencies.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="newFrequency" class="form-label">New Frequency</label>
                                            <input type="text" class="form-control" id="newFrequency" name="name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                    <hr>
                                    <h4>Existing Frequencies</h4>
                                    <ul class="list-group">
                                        @foreach ($frequencies as $frequency)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $frequency->name }}
                                            <form action="{{ route('admin.frequencies.destroy', ['id' => $frequency->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="col-12">
                        <div class="card shadow-lg col-12">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>Dosage</th>
                                            <th>Frequency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checkup->medicineRecords as $medicine)
                                        <tr>
                                            <td>{{ $medicine->medicine_name }}</td>
                                            <td>{{ $medicine->dosage }}</td>
                                            <td>{{ $medicine->frequency }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#deleteMedicineModal-{{ $medicine->id }}">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>

                                                <!-- Delete Medicine Modal -->
                                                <div class="modal fade" id="deleteMedicineModal-{{ $medicine->id }}" tabindex="-1" aria-labelledby="deleteMedicineModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteMedicineModalLabel">Confirm Deletion</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the medicine record for {{ $medicine->medicine_name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('admin.deleteMedicine', ['id' => $patient->id, 'medicineId' => $medicine->id]) }}" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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
                        <h5 class="section-title">Checkup Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Date:</th>
                                    <td>{{ \Carbon\Carbon::parse($checkup->visit_date)->format('F d, Y') }}</td>
                                    <th>Time:</th>
                                    <td>{{ \Carbon\Carbon::parse($checkup->visit_time)->format('h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Reason:</th>
                                    <td colspan="3">{{ $checkup->reason }}</td>
                                </tr>
                                <tr>
                                    <th>Next Visit:</th>
                                    <td>{{ \Carbon\Carbon::parse($checkup->next_visit)->format('F d, Y') }}</td>
                                    <th>Last Menstrual Period (LMP):</th>
                                    <td>{{ \Carbon\Carbon::parse($checkup->lmp)->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Age of Gestation (AOG):</th>
                                    <td>{{ $checkup->aog }}</td>
                                    <th>Estimated Date of Confinement (EDC):</th>
                                    <td>{{ \Carbon\Carbon::parse($checkup->edc)->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Blood Pressure (BP):</th>
                                    <td>{{ $checkup->bp }}</td>
                                    <th>Weight:</th>
                                    <td>{{ $checkup->weight }}</td>
                                </tr>
                                <tr>
                                    <th>Fetal Heart Tones (FHT):</th>
                                    <td>{{ $checkup->fht }}</td>
                                    <th>Fundic Height (FH):</th>
                                    <td>{{ $checkup->fh }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <section class="medicine-details-section mt-2"> <!-- Add a new section for displaying medicine -->
                        <h5 class="section-title">Medicine</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <th>Dosage</th>
                                    <th>Frequency</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkup->medicineRecords as $medicineRecord)
                                <tr>
                                    <td>{{ $medicineRecord->medicine_name }}</td>
                                    <td>{{ $medicineRecord->dosage }}</td>
                                    <td>{{ $medicineRecord->frequency }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                    <div class="row g-3 mt-5 col-12 text-center">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCheckupModal{{ $checkup->id }}">
                                Delete
                            </a>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mt-3">
                                <a href="{{ route('admin.patient.printCheckup', ['id' => $patient->id, 'checkupId' => $checkup->id]) }}" target="_blank" class="btn btn-primary">
                                    <i class="fa-solid fa-print"></i> Print
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#editCheckupModal">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteCheckupModal{{ $checkup->id }}" tabindex="-1" aria-labelledby="deleteCheckupModalLabel{{ $checkup->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCheckupModalLabel{{ $checkup->id }}">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this checkup record?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.deleteCheckup', ['checkupId' => $checkup->id]) }}" method="POST">
                            @csrf
                            @method('DELETE') <!-- Add this line -->
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>





        <!-- Edit Checkup Modal -->
        <div class="modal fade" id="editCheckupModal" tabindex="-1" aria-labelledby="editCheckupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"> <!-- Add modal-lg class for wide modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCheckupModalLabel">Update Checkup Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.updateCheckup', ['id' => $patient->id, 'checkupId' => $checkup->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="visit-date" class="form-label">Date of Visit:</label>
                                    <input type="date" id="visit-date" name="visit-date" class="form-control" readonly><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="visit-time" class="form-label">Time of Visit:</label>
                                    <input type="time" id="visit-time" name="visit-time" class="form-control" readonly><br>
                                </div>
                                <div class="col-12">
                                    <label for="reason" class="form-label">Notes:</label>
                                    <textarea id="reason" name="reason" value="" rows="4" class="form-control">{{ $checkup->reason }}</textarea><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="next-visit" class="form-label">Expected Date of Next Visit:</label>
                                    <input type="date" id="next-visit" value="{{ $checkup->next_visit }}" name="next-visit" class="form-control" min="<?= date('Y-m-d') ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="bp" class="form-label">Blood Pressure:</label>
                                    <input type="text" id="bp" name="bp" value="{{ $checkup->bp }}" pattern="\d+/\d+" placeholder="e.g., 120/80" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="lmp" class="form-label">Last Menstrual Period*</label>
                                    @if (is_null($checkup))
                                    <input type="date" id="lmp" name="lmp" class="form-control" required onchange="calculateEDCAndAOG()" max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">
                                    @else
                                    <input type="date" id="lmp" name="lmp" value="{{ $checkup->lmp }}" class="form-control" required onchange="calculateEDCAndValidate()" readonly>
                                    @endif
                                    <span id="lmp-error" class="text-danger"></span> <!-- This is where the error message should appear -->
                                </div>

                                <div class="col-md-4">
                                    <label for="aog" class="form-label">Age of Gestation</label>
                                    <input type="text" id="aog" name="aog" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="edc" class="form-label">Estimated Due Date</label>
                                    <input type="date" id="edc" name="edc" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="fht" class="form-label">Fetal Heart Tones:</label>
                                    <input type="text" id="fht" name="fht" value="{{ $checkup->fht }}" class="form-control" required  placeholder="e.g., 24bpm" pattern="\d{1,3}bpm">
                                </div>
                                <div class="col-md-4">
                                    <label for="fht" class="form-label">Weight:</label>
                                    <input type="text" id="weight" value="{{ $checkup->weight }}" name="weight" class="form-control"  placeholder="e.g., 23kg" pattern="\d{1,3}kg">
                                </div>
                                <div class="col-md-4">
                                    <label for="fh" class="form-label">Fundic Height:</label>
                                    <input type="text" id="fh" value="{{ $checkup->fh }}" name="fh" class="form-control" required placeholder="e.g., 120cm" pattern="\d{1,3}cm">
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-download"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>



        </div>

    </main>
</x-layout>