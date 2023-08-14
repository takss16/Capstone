<x-layout>
    <main class="mw-100 col-11">
        <div class="container bg">
            <div>
                
                <div class="bg-dark col-9 mt-3"></div>
                <div class="col-md-12 mt-2 text-center">
                  <div class="text-center mt-3">
                    <h3>Admission</h3>
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
                @if ($admission)
                <div class="text-end">
                    <a href="{{ route('editAdmissionForm', ['id' => $patient->id]) }}" class="btn btn-primary text-end">
                        <i class="fa-solid fa-pen-to-square"></i> Update
                    </a>
                </div>

                  
                    <div class="text-center mt-3">
                            <h3>Details</h3>
                        </div>
                    <div class="row mb-2 mt-2">
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
                     <div class="col">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->admission_diagnosis }}
                     </div>
                     <hr>
                     <div class="text-start">
                            <span class="fw-bold">Services Performed:</span> 
                            
                     </div>
                     <div class="col">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->services_performed }}
                     </div>
                   
                     <hr>
                     <div class="text-start">
                            <span class="fw-bold">Final Diagnosis:</span> 
                            
                     </div>
                     <div class="col">
                            <!-- <span class="fw-bold">Date of Discharge:</span>  -->
                            {{ $admission->final_diagnosis}}
                     </div>
                     <hr>
                     <div class="row g-3 mt-5 col-12 text-center">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                                Delete
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('printAdmission', ['id' => $patient->id]) }}" class="btn btn-primary btn-block" target="_blank">
                                <i class="fa-solid fa-print"></i> Print
                            </a>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this admission record?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteForm" action="{{ route('deleteAdmission', ['id' => $patient->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                  @else
                    <!-- Admission form -->
                    <form action="{{ route('storeAdmission', ['id' => $patient->id]) }}" method="POST">
                        @csrf
                        <div class="row g-3">
                        <div class="text-center mt-3">
                            <h3>Admission</h3>
                        </div>
                        <div class="col-md-6">          
                                            <label for="case-number" class="form-label">Case Number:</label>      
                                            <input type="text" id="case-number" name="case-number" class="form-control"><br>
                                          </div>            
                                          <div class="col-md-6">           
                                            <label for="admission-date" class="form-label">Date of Admission:</label>           
                                            <input type="date" id="admission-date" name="admission-date" class="form-control"><br>
                                          </div>           
                                          <div class="col-md-6"> 
                                            <label for="discharge-date" class="form-label">Date of Discharge:</label>
                                            <input type="date" id="discharge-date" name="discharge-date" class="form-control"><br>
                                          </div>           
                                          <div class="col-12">  
                                            <label for="admission-diagnosis" class="form-label">Admission Diagnosis:</label>   
                                            <textarea id="admission-diagnosis" name="admission-diagnosis" class="form-control"></textarea><br>
                                          </div>              
                                          <div class="col-12">   
                                            <label for="services-performed" class="form-label">Services Performed:</label> 
                                            <textarea id="services-performed" name="services-performed" class="form-control"></textarea><br>
                                          </div>               
                                          <div class="col-12">     
                                            <label for="final-diagnosis" class="form-label">Final Diagnosis:</label>   
                                            <textarea id="final-diagnosis" name="final-diagnosis" class="form-control"></textarea><br>
                                          </div>          
                                          <div class="col-12">     
                                            <div class="row justify-content-center">
                                                                        
                                              <div class="col-md-2 mb-3">                    
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-download"></i> Save</button>
                                              </div> 
                                    <!-- Add more buttons as needed -->
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </main>
</x-layout>
