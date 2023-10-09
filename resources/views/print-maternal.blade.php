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
                    <h3 class="text-center mt-4">Maternal Record</h3>

                    <!-- Patient Details -->
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

                    <!-- <div class="row mt-2">
                        <div class="col">
                                <span class="fw-bold">Address:</span> {{ $patient->address }}
                            </div>
                    
                            <div class="col">
                                <span class="fw-bold">Contact:</span> {{ $patient->contact }}
                            </div>
                    </div> -->

                    <!-- <div class="row mt-2">
                 
                    </div> -->
                    <h4 class="text-center mt-4">CLINICAL FINDINGS in PRESENT CONDITION</h4>
                    <!-- Maternal Record Details -->
                    <div class="row mt-2">
                        <div class="col-md-4 mt-2">
                            <span class="fw-bold">Last Menstrual Period:   </span> 
                            {{ $patient->maternalRecord->lmp }}
                        </div>
                        <div class="col-md-4 mt-2">
                            <span class="fw-bold">Age of Gestation:</span> 
                            {{ $patient->maternalRecord->aog }}
                        </div>
                        <div class="col-md-4 mt-2">
                            <span class="fw-bold">Estimated Date Confinement:</span>
                             {{ $patient->maternalRecord->edc }}
                        </div>

                        <div class="col-md-4 mt-2">
                       <span class="fw-bold">Fetal Heart Tones:</span>
                       {{ $patient->maternalRecord->fht }}
                       
                       </div>
       
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Presentation:</span>
                       {{ $patient->maternalRecord->pres }}
                   
                       </div>
       
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Station:</span>
                       {{ $patient->maternalRecord->st }}
                   
                       </div>
       
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Effacement:</span>
                       {{ $patient->maternalRecord->effacement }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Cervical Dilatation:</span>
                       {{ $patient->maternalRecord->cervical_dilatation }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Blood Pressure:</span>
                       {{ $patient->maternalRecord->bp }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Bag of Waters:</span>
                       {{ $patient->maternalRecord->bow }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Color:</span>
                       {{ $patient->maternalRecord->color }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Time of Rupture:</span>
                       {{ $patient->maternalRecord->time_rupture }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Condition of Labor:</span>
                       {{ $patient->maternalRecord->condition }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Gravidity:</span>{{ $patient->maternalRecord->gravidity }}
                   
                       </div>
                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Parity:</span>
                       {{ $patient->maternalRecord->parity }}
                   
                       </div>

                       <div class="col-md-4 mt-2">
                       <span class="fw-bold">Medical History:</span>
                       {{ $patient->maternalRecord->medical_history }}
                   
                       </div>
                    </div>
                </div>
            </div>
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