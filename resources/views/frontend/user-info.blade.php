<x-layout-appointment>
    <main class="mw-100 col-11 mt-5">
        <div class="d-flex justify-content-center mt-3">
            <div class="col-12 ">
                <div class="card shadow-lg ">
                    <div class="container  col-md-12">
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    @if ($appointmentPatient)
                                    <form method="POST" action="{{ route('appointment-patient.update', $appointmentPatient->id) }}">
                                            @csrf
                                            @method('PUT') <!-- Use the PUT method for updating -->
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $appointmentPatient->last_name }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $appointmentPatient->first_name }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middleName"  name="middle_name" value="{{ $appointmentPatient->middle_name }}" oninput="convertToUppercase(this)">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $appointmentPatient->birthday }}" required onchange="calculateAge()">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" value="{{ $appointmentPatient->age }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="civilStatus">Civil Status</label>
                                            <select class="form-select" id="civilStatus" name="civil_status" required onchange="showSpouse()">
                                                <option value="">-- Select --</option>
                                                <option value="Single" {{ $appointmentPatient->civil_status === 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ $appointmentPatient->civil_status === 'Married' ? 'selected' : '' }}>Married</option>
                                                <option value="Widowed" {{ $appointmentPatient->civil_status === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact" class="form-label">Contact</label>
                                            <input type="text" class="form-control" id="contact" value="{{ $appointmentPatient->contact }}" name="contact" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $appointmentPatient->address }}" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="philhealthBeneficiary">PhilHealth Beneficiary</label>
                                        <select class="form-select" id="philhealthBeneficiary" name="philhealth_beneficiary">
                                            <option value="0" {{ $appointmentPatient->philhealth_beneficiary == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $appointmentPatient->philhealth_beneficiary == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-3 mb-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>  
                                    </form>                                 
                                    @else
                                    <form method="POST" action="{{ route('appointment-patient.store') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" value="{{ $user->last_name }}" name="last_name" oninput="convertToUppercase(this)" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" value="{{ $user->first_name }}" name="first_name" oninput="convertToUppercase(this)" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="middleName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middleName" value="{{ $user->middle_name }}" name="middle_name" oninput="convertToUppercase(this)">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="birthday" class="form-label">Birthday</label>
                                                <input type="date" class="form-control" id="birthday" name="birthday" required onchange="calculateAge()">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="age" class="form-label">Age</label>
                                                <input type="number" class="form-control" id="age" name="age" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="civilStatus" class="form-label">Civil Status</label>
                                                <select class="form-select" id="civilStatus" name="civil_status" required onchange="showSpouse()" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="contact" class="form-label">Contact</label>
                                                <input type="text" class="form-control" id="contact" name="contact" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" oninput="convertToUppercase(this)" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="philhealthBeneficiary" class="form-label">PhilHealth Beneficiary</label>
                                                <select class="form-select" id="philhealthBeneficiary" name="philhealth_beneficiary">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-3 mb-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout-appointment>