
<x-layout>
    <main class="mw-100 col-11">
        <div class="container text-center col-md-12 ">
            <form action="{{ route('admin.patients.update', ['id' => $patient->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Add form fields for the patient's information -->
                <!-- For example: -->
                <div class="container text-center col-md-12">
                    <div class="h1">Patient Record</div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" value="{{ $patient->lastname }}" class="form-control" id="lastName" name="lastname">
                                </div>
                                <div class="col-md-4">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" value="{{ $patient->firstname }}" class="form-control" id="firstName" name="firstname">
                                </div>
                                <div class="col-md-4">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" value="{{ $patient->midlename }}" class="form-control" id="middleName" name="midlename">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" value="{{ $patient->age }}" class="form-control" id="age" name="age">
                                </div>
                                <div class="col-md-4">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" value="{{ $patient->birthday }}" class="form-control" id="birthday" name="birthday" required onchange="calculateAge()">
                                </div>
                                <div class="col-md-4">
                                    <label for="civilStatus" class="form-label">Civil Status</label>
                                    <select class="form-select" id="civilStatus" name="civilstatus" required onchange="showSpouse()">
                                        <option value="">-- Select --</option>
                                        <option value="Single" {{ $patient->civilstatus === 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ $patient->civilstatus === 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed" {{ $patient->civilstatus === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" value="{{ $patient->contact }}" class="form-control" id="contact" name="contact">
                                </div>
                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" value="{{ $patient->address }}" class="form-control" id="address" name="address">
                                </div>
                                <div class="col-md-4">
                                    <label for="philhealthBeneficiary" class="form-label">PhilHealth Beneficiary</label>
                                    <select class="form-select" id="philhealthBeneficiary" name="philhealth_beneficiary">
                                        <option value="0" {{ $patient->philhealth_beneficiary ? '' : 'selected' }}>No</option>
                                        <option value="1" {{ $patient->philhealth_beneficiary ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                                    <a href="{{ route('admin.records') }}" class="btn btn-secondary">Cancel</a>

                                </div>
                           
                        </div>
                    </div>
                </div>
                <!-- <input type="text" name="firstname" value="{{ $patient->firstname }}" >
            <input type="text" name="lastname" value="{{ $patient->lastname }}" > -->
                <!-- Add other form fields as needed -->
                <!--             
            <button type="submit">Update</button> -->
            </form>
        </div>
    </main>
</x-layout>