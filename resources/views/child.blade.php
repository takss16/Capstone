<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
        <div class="text-start mb-3">
        <a href="{{ route('ViewRecord', ['id' => $patient->id]) }}" class="btn btn-primary">
                <i class="fa-solid fa-circle-chevron-left"></i> Back
            </a>
            </div>
            <div class="mt-3 text-center">
            <h3>New Born Care Form</h3>
            </div>
            <hr>
           
           
            <div class="col-12 mt-5">
                <div class="card shadow-lg col-12">
                    <div class="card-body">
            <h4>Parents Information</h4>
            <table class="table table-bordered">
                <tr>
                    <th class="text-start">Mother's Name</th>
                    <td class="fw-bold">{{ $patient->firstname }}</td>
                    <td class="fw-bold">{{ $patient->midlename }}</td>
                    <td class="fw-bold">{{ $patient->lastname }}</td>
                </tr>
              </table>

              @if ($baby)
              
           
                
                <table class="table table-bordered">
                    <tr>
                        <th class="text-start">Father's Name</th>
                        <td class="fw-bold">{{ $baby->fatherFirstName }}</td>
                        <td class="fw-bold">{{ $baby->fatherMiddleName }}</td>
                        <td class="fw-bold">{{ $baby->fatherLastName }}</td>
                    </tr>
                 </table>
                    <h4>Baby's Information</h4>
                    <table class="table table-bordered">
                    <tr>
                        <th class="text-start">Baby's Name</th>
                        <td class="fw-bold">{{ $baby->babyGivenName }}</td>
                        <td class="fw-bold">{{ $baby->babyMiddleName }}</td>
                        <td class="fw-bold">{{ $baby->babyLastName }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Date of Birth</th>
                        <td class="fw-bold">{{ $baby->babyDOB }}</td>
                        <th class="text-start">Time of Birth</th>
                        <td class="fw-bold">{{ $baby->babyTOB }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Age of Baby</th>
                        <td class="fw-bold">{{ $baby->babyAge }}</td>
                        <th class="text-start">Permanent Address</th>
                        <td class="fw-bold">{{ $baby->babyAddress }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Gender</th>
                        <td class="fw-bold">{{ $baby->babyGender }}</td>
                        <th class="text-start">Nationality</th>
                        <td class="fw-bold">{{ $baby->babyNationality }}</td>
                    </tr>
                </table>

                <div class="d-flex justify-content-between mt-5 col-12 text-center">
                    <div class="col-md-4">
                        <a href="{{ route('confirmDeleteBaby', ['id' => $patient->id, 'babyId' => $baby->id]) }}" class="btn btn-danger btn-block">Delete</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('printBaby', ['id' => $patient->id, 'babyId' => $baby->id]) }}" class="btn btn-primary btn-block" target="_blank">
                            <i class="fa-solid fa-print"></i> Print
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('editBaby', ['id' => $patient->id]) }}" class="btn btn-primary btn-block"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                    </div>
                </div>

                
                    </div>
                </div>
            </div>
        @else
        <div class="row">
            <div>
            <form action="{{ route('storeBabyInformation', ['id' => $patient->id]) }}" method="POST">
                @csrf
                                    <div class="text-center"><h3>Baby's Information</h3></div>
                                    <div class="bg-dark col-9 mt-5"></div>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="lastName" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" id="lastName" name="babyLastName" oninput="convertToUppercase(this)"required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">Given Name*</label>
                                            <input type="text" class="form-control" id="firstName" name="babyGivenName" oninput="convertToUppercase(this)"required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middleName" name="babyMiddleName"oninput="convertToUppercase(this)">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Permanent Address*</label>
                                            <input type="text" class="form-control" id="address" name="babyAddress"oninput="convertToUppercase(this)"required >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Date of Birth*</label>
                                            <input type="date" class="form-control" id="birthday" name="babyDOB"oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="timeOfBirth" class="form-label">Time of Birth*</label>
                                            <input type="time" class="form-control" id="timeOfBirth" name="babyTOB" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age of Baby*</label>
                                            <input type="text" class="form-control" id="age" name="babyAge" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="gender" class="form-label">Gender*</label>
                                            <select class="form-select" id="gender" name="babyGender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nationality" class="form-label">Nationality*</label>
                                            <input type="text" class="form-control" id="nationality" name="babyNationality" oninput="convertToUppercase(this)"required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="phic" class="form-label">PHIC*</label>
                                            <input type="text" class="form-control" id="phic" name="phic"oninput="convertToUppercase(this)" required>
                                        </div>
                                     
                                        <h3>Father's Information</h3>
                                        <div class="col-md-4">
                                            <label for="fatherLastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="fatherLastName" name="fatherLastName" oninput="convertToUppercase(this)">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherFirstName" class="form-label">Given Name</label>
                                            <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName" oninput="convertToUppercase(this)" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherMiddleName" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="fatherMiddleName" name="fatherMiddleName"oninput="convertToUppercase(this)">
                                        </div>
                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-md-2 mb-3">
                                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-download"></i> Save</button>
                                                </div>
                                               
        
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
            </div>
            </form>

        @endif
        </div>
    </main>
</x-layout>