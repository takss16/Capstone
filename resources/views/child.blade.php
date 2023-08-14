<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
        <div class="text-start mb-3">
            <a href="{{route('records')}}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
            <div class="mt-3 text-center">
            <h3>New Born Care Form</h3>
            </div>
            <hr>
           
           
            <div clas
        <h4>Parents Information</h4>
        <div class="col-md-12 mt-2 text-center">
            <div class="text-start">
            <span class="fw-bold">Mother's Name:</span>  
            </div>
            <span class="fw-bold">{{ $patient->firstname }}</span> 
            <span class="fw-bold">{{ $patient->midlename }}</span> 
            <span class="fw-bold">{{ $patient->lastname }}</span> 
            
        </div>
     
       
        
        
        @if ($patient->babies)
        <div class="text-end">
            <a href="{{ route('editBaby', ['id' => $patient->id]) }}" class="btn btn-primary btn-block"><i class="fa-solid fa-pen-to-square"></i> Update</a>

             </div>
        <div class="col-md-12 mt-2 text-center">
        <div class="text-start">
            <span class="fw-bold">Father's Name:</span>  
            </div>
            <span class="fw-bold">{{ $patient->babies->fatherFirstName }}</span> 
            <span class="fw-bold">{{ $patient->babies->fatherMiddleName }}</span> 
            <span class="fw-bold">{{ $patient->babies->fatherLastName }}</span> 
        </div>    
            <hr>
            <h4>Baby's Information</h4>
            <div class="col-md-12 mt-2 text-center mb-4">
        <div class="text-start">
            <span class="fw-bold">Babys's Name:</span>  
            </div>
            <span class="fw-bold">{{ $patient->babies->babyGivenName }}</span> 
            <span class="fw-bold">{{ $patient->babies->babyMiddleName }}</span> 
            <span class="fw-bold">{{ $patient->babies->babyLastName }}</span> 
        </div> 

        <hr>
        <div class="row mb-2">
            <div class="col">
                <span class="fw-bold">Date of Birth:</span>  {{ $patient->babies->babyDOB }}
            </div>
            <div class="col">
                <span class="fw-bold">Time of Birth:</span> {{ $patient->babies->babyTOB }}
            </div>
            <div class="col">
                <span class="fw-bold">Age of Baby:</span>  {{ $patient->babies->babyAge }}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <span class="fw-bold">Permanent Address:</span>  {{ $patient->babies->babyAddress }}
            </div>
            <div class="col">
                <span class="fw-bold">Gender:</span> {{ $patient->babies->babyGender }}
            </div>
            <div class="col">
                <span class="fw-bold">nationality:</span>  {{ $patient->babies->babyNationality }}
            </div>
        </div>
        <div class="col">
                <span class="fw-bold">nationality:</span>  {{ $patient->babies->babyNationality }}
            </div>

            <div class="row g-3 mt-5 col-12 text-center ">
           
            <div class="col-md-6">
            <a href="{{ route('confirmDeleteBaby', ['id' => $patient->id, 'babyId' => $baby->id]) }}" class="btn btn-danger">Delete</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('printBaby', ['id' => $patient->id, 'babyId' => $baby->id]) }}" class="btn btn-primary btn-block" target="_blank">
                    <i class="fa-solid fa-print"></i> Print
                </a>
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
                                            <label for="lastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" name="babyLastName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" id="firstName" name="babyGivenName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" name="babyMiddleName">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Permanent Address:</label>
                                            <input type="text" class="form-control" id="address" name="babyAddress" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Date of Birth:</label>
                                            <input type="date" class="form-control" id="birthday" name="babyDOB" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="timeOfBirth" class="form-label">Time of Birth:</label>
                                            <input type="time" class="form-control" id="timeOfBirth" name="babyTOB" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age of Baby:</label>
                                            <input type="number" class="form-control" id="age" name="babyAge" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="gender" class="form-label">Gender:</label>
                                            <select class="form-select" id="gender" name="babyGender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nationality" class="form-label">Nationality:</label>
                                            <input type="text" class="form-control" id="nationality" name="babyNationality" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="phic" class="form-label">PHIC:</label>
                                            <input type="text" class="form-control" id="phic" name="phic" required>
                                        </div>
                                     
                                        <h3>Father's Information</h3>
                                        <div class="col-md-4">
                                            <label for="fatherLastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" id="fatherLastName" name="fatherLastName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherFirstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherMiddleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" id="fatherMiddleName" name="fatherMiddleName">
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
