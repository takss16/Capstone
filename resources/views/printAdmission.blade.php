<x-layout-print>
 
        <div class="container bg col-10">
            <div>
                
                <div class="bg-dark col-9 mt-3"></div>
                
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
                <div class="text-center">
                <h3>New Born Care Form</h3>
                </div>   
                      <hr>
                      <div class="col-md-4 mt-4">
                                <span class="fw-bold">Full Name:</span> {{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}
                            </div>
                   
                    <div class="row mb-2 mt-2">
                        <div class="col">
                            <span class="fw-bold">Birthday:</span>  {{ $patient->birthday }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Civil Status:</span>  {{ $patient->civilstatus }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Age:</span>  {{ $patient->age }}
                        </div>
                    </div>
                    <hr>
                    <div class="text-center mt-3">
                            <h3>Details</h3>
                        </div>
                    <div class="row mb-5 mt-5 text-center">
                    <div class="col">
                            <span class="fw-bold">Date of Admission:</span> 
                            {{ $admission->admission_date }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Date of Discharge:</span> 
                            {{ $admission->discharge_date }}
                        </div>
                    </div>
                    <hr>
                    <div class="text-start">
                            <span class="fw-bold">Admission Diagnosis:</span> 
                            
                     </div>
                     <div class="text-center">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->admission_diagnosis }}
                     </div>
                     <hr>
                     <div class="text-start">
                            <span class="fw-bold">Services Performed:</span> 
                            
                     </div>
                     <div class="text-center">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->services_performed }}
                     </div>
                   
                     <hr>
                     <div class="text-start">
                            <span class="fw-bold">Final Diagnosis:</span> 
                            
                     </div>
                     <div class="text-center">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->final_diagnosis}}
                     </div>
                     <hr>
                      <div class="text-center no-print">
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="fa-solid fa-print"></i> Print
                </button>
            </div>

            </div>
        </div>
    
</x-layout-print>




