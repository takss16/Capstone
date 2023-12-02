<x-layout>
<main class="mw-100 col-11">
        <div class="container text-center col-md-12 ">
                <div class="container text-center col-md-12">
                    <div class="h1">Patient Record</div>
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
                        <div class="col-12">
                        <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name:</label>
                                    <input type="text" value="{{ $appointment->last_name }}" class="form-control" id="lastName" name="lastname" oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="firstName" class="form-label">First Name:</label>
                                    <input type="text" value="{{ $appointment->first_name }}" class="form-control" id="firstName" name="firstname" oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="middleName" class="form-label">Middle Name:</label>
                                    <input type="text" value="{{ $appointment->middle_name }}" class="form-control" id="middleName" name="midlename" oninput="convertToUppercase(this)" required>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age:</label>
                                    <input type="number" value="{{ $appointment->age }}" class="form-control" id="age" name="age" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label">Birthday:</label>
                                    <input type="date" value="{{ $appointment->birthday }}" class="form-control" id="birthday" name="birthday" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="civilStatus" class="form-label">Civil Status:</label>
                                    <select class="form-select" id="civilStatus" name="civilstatus" required onchange="showSpouse()">
                                        <option value="">-- Select --</option>
                                        <option value="Single" {{ $appointment->civil_status === 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ $appointment->civil_status === 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed" {{ $appointment->civil_status === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact" class="form-label">Contact:</label>
                                    <input type="text" value="{{ $appointment->contact }}" class="form-control" id="contact" name="contact" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" value="{{ $appointment->address }}" class="form-control" id="address" name="address"oninput="convertToUppercase(this)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="philhealthBeneficiary" class="form-label">PhilHealth Beneficiary:</label>
                                    <select class="form-select" id="philhealthBeneficiary" name="philhealth_beneficiary">
                                        <option value="0" {{ $appointment->philhealth_beneficiary ? '' : 'selected' }}>No</option>
                                        <option value="1" {{ $appointment->philhealth_beneficiary ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> save</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>

                                  
                                </div>
                            </div>
                        </form>
                          <!-- Confirmation Modal -->
                          <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this record?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <!-- Add the delete form here -->
                                                        <form action="{{ route('admin.appointments.destroy', ['id' => $appointment->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                        </div>
                    </div>
                </div>
        </div>
    </main>

</x-layout>