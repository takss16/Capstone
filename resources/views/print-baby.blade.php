<x-layout-print>
<div class="container mt-4 col-10">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="border p-4">
                <div class="row">
                    <div class="col-m1-1 text-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 60px;">
                    </div>
                    <div class="col text-center">
                    <h2 class="text-center">Pabustan Birthing Clinic</h2>
                    <span class="fw-bold">0192 RIVERSIDE ST DOLORES CAPAS TARLAC</span>
                    </div>
                </div>
                <hr>
                <h3>New Born Care Form</h3>
            
            <hr>
            <div class="text-end">
         

             </div>
           
            <div class="text-start">
        <h4>Parents Information</h4>
            </div>
        <div class="col-md-12 mt-2 text-center">
            <div class="text-start">
            <span class="fw-bold">Mother's Name:</span>  
            </div>
            <span class="fw-bold">{{ $patient->firstname }}</span> 
            <span class="fw-bold">{{ $patient->midlename }}</span> 
            <span class="fw-bold">{{ $patient->lastname }}</span> 
            
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
            <!-- Your content goes here -->

            <!-- Print Button outside of the x-layout-print element -->
            <div class="text-center no-print">
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="fa-solid fa-print"></i> Print
                </button>
            </div>
        </div>
    </x-layout-print>