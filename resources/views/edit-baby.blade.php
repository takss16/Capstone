<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
        <a href="{{ route('admin.child', ['id' => encrypt($patient->id)]) }}"class="btn btn-primary">
                        <i class="fa-solid fa-circle-chevron-left"></i> Back
                    </a>
   

            <form action="{{ route('admin.updateBaby', ['id' => $patient->id, 'babyId' => $baby->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-center"><h3>Update Baby's Information</h3></div>
                                    <div class="bg-dark col-9 mt-5"></div>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="lastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->babyLastName  }}"id="lastName" name="babyLastName" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->babyGivenName   }}" id="firstName" name="babyGivenName" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->babyMiddleName   }}" id="middleName" name="babyMiddleName" oninput="convertToUppercase(this)">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Permanent Address:</label>
                                            <input type="text" class="form-control" value="{{ $baby->babyAddress  }}" id="address" name="babyAddress" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Date of Birth:</label>
                                            <input type="date" class="form-control" value="{{ $baby->babyDOB   }}" id="birthday" name="babyDOB" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="timeOfBirth" class="form-label">Time of Birth:</label>
                                            <input type="time" class="form-control" value="{{ $baby->babyTOB  }}" id="timeOfBirth" name="babyTOB" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age of Baby:</label>
                                            <input type="number" class="form-control" value="{{ $baby->babyAge  }}" id="age" name="babyAge" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="gender" class="form-label">Gender:</label>
                                            <select class="form-select" id="gender" name="babyGender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ $baby->babyGender === 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ $baby->babyGender === 'female' ? 'selected' : '' }}>Female</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="nationality" class="form-label">Nationality:</label>
                                            <input type="text" class="form-control" value="{{ $baby->babyNationality   }}" id="nationality" name="babyNationality" oninput="convertToUppercase(this)" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="phic" class="form-label">PHIC:</label>
                                            <input type="text" class="form-control" value="{{ $baby->phic  }}" id="phic" name="phic" oninput="convertToUppercase(this)" required>
                                        </div>
                                     
                                        <h3>Father's Information</h3>
                                        <div class="col-md-4">
                                            <label for="fatherLastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->fatherLastName  }}" id="fatherLastName" name="fatherLastName" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherFirstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->fatherFirstName  }}" id="fatherFirstName" name="fatherFirstName" oninput="convertToUppercase(this)" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherMiddleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" value="{{ $baby->fatherMiddleName  }}" id="fatherMiddleName" name="fatherMiddleName" oninput="convertToUppercase(this)">
                                        </div>
                                       
                                    </div>
                                    
                         <div class="text-center mt-5">  
                         <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                    <a href="{{ route('admin.child', ['id' => encrypt($patient->id)]) }}" class="btn btn-secondary">Cancel</a>
                         </div>  
            </form>
        </div>
    </main>
</x-layout>
