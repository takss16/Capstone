<x-layout>
    <main class="mw-100 col-11">
        <div class="container text-center col-md-12 ">  
       
            <div class="container text-center col-md-12">
                
           
    <!-- Display patient details here -->
    <div>
    <div class="text-start">
            <a href="{{route('records')}}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
           
    <div class="col-6 text-start mt-3">
            <span class="fw-bold">Patient ID:</span> {{ $patient->id }}
    </div>
        <h1>
            {{ $patient->firstname }}
            {{ $patient->midlename }}
            {{ $patient->lastname }}
        </h1>
        <!-- Display other patient information as desired -->
                 
        <div class="container mt-3">


    <div class="row mb-2">
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

    <div class="row mb-2 mt-4">
        <div class="col-4">
            <span class="fw-bold">Address:</span>  {{ $patient->address }}
        </div>
        <div class="col-4">
            <span class="fw-bold">Contact:</span>  {{ $patient->contact }}
        </div>
    </div>
</div>







                        
        <!-- Add more patient details as needed -->
    </div>

    <!-- Check if the patient already has a maternal record -->
    @if ($patient->maternalRecord)
            <div class="mt-3">
            <h3>Maternal Record Details</h3>
            </div>
            <div class="text-end">
            <a href="{{ route('editMaternalRecord', ['id' => $patient->id]) }}" class="btn btn-primary btn-block"><i class="fa-solid fa-pen-to-square"></i> Update</a>

             </div>
            <div class="row g-3 mt-3">
            <!-- <form action="{{ route('showDeleteConfirmation', ['id' => $patient->id, 'maternalRecordId' => $patient->maternalRecord->id]) }}" method="POST">
            @csrf                          -->
                <div class="col-md-4">
                    <span class="fw-bold">Last Menstrual Period:</span>  
                    <label> {{ $patient->maternalRecord->lmp }}</label>
                </div>
                <div class="col-md-4">
                    <span class="fw-bold">Age of Gestation:</span> 
                    <label>{{ $patient->maternalRecord->aog }}</label>
                </div>

                <div class="col-md-4">
                <span class="fw-bold">Estimated Date Confinement:</span>  
                    <label>{{ $patient->maternalRecord->edc }}</label>
  
                </div>

                <div class="col-md-4">
                <span class="fw-bold">Fetal Heart Tones:</span>
                <label>{{ $patient->maternalRecord->fht }}</label>
                
                </div>

                <div class="col-md-4">
                <span class="fw-bold">Presentation:</span>
                <label>{{ $patient->maternalRecord->pres }}</label>
            
                </div>

                <div class="col-md-4">
                <span class="fw-bold">Station:</span>
                <label>{{ $patient->maternalRecord->st }}</label>
            
                </div>

                <div class="col-md-4">
                <span class="fw-bold">Effacement:</span>
                <label>{{ $patient->maternalRecord->effacement }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Cervical Dilatation:</span>
                <label>{{ $patient->maternalRecord->cervical_dilatation }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Blood Pressure:</span>
                <label>{{ $patient->maternalRecord->bp }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Bag of Waters:</span>
                <label>{{ $patient->maternalRecord->bow }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Color:</span>
                <label>{{ $patient->maternalRecord->color }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Time of Rupture:</span>
                <label>{{ $patient->maternalRecord->time_rupture }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Condition of Labor:</span>
                <label>{{ $patient->maternalRecord->condition }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Gravidity:</span>
                <label>{{ $patient->maternalRecord->gravidity }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Parity:</span>
                <label>{{ $patient->maternalRecord->parity }}</label>
            
                </div>
                <div class="col-md-4">
                <span class="fw-bold">Medical History:</span>
                <label>{{ $patient->maternalRecord->medical_history }}</label>
            
                </div>
               
               

            <div class="row g-3 ">
           
            <div class="col-md-6">
                <a href="{{ route('showDeleteConfirmation', ['id' => $patient->id]) }}" class="btn btn-danger">
                    <i class="fa-regular fa-square-minus"></i> Delete
                </a>
            </div>
            <div class="col-md-6">
            <a href="{{ route('printMaternalRecord', ['id' => $patient->id]) }}" target="_blank" class="btn btn-primary btn-block">
                <i class="fa-solid fa-print"></i> Print
            </a>


            </div>
                                     
            </div>
            <!-- <p>Medical History: {{ $patient->maternalRecord->medical_history }}</p>
            <p>LMP: {{ $patient->maternalRecord->lmp }}</p> -->
        
    @else
       
            
            <form action="{{ route('storeMaternalRecord', ['id' => $patient->id]) }}" method="POST">
                @csrf
                <!-- Add form fields for maternal record -->
                <div class="mb-5 text-center mt-3">
                                            <h3>Add Maternal Record</h3> 
                                            </div>
                                    
                                            <div class="col-9 bg-dark"></div>
                                                    
                                            <div class="row g-3">
                                               
                                            <div class="col-md-4">
                                                <label for="lmp" class="form-label">Last Menstrual Period:</label>
                                                <input type="date" id="lmp" name="lmp" class="form-control" required onchange="calculateEDC()">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="aog" class="form-label">Age of Gestation:</label>
                                                <input type="text" id="aog" name="aog" class="form-control">
                                            </div>
                                                <div class="col-md-4">
                                                <label for="edc" class="form-label">Estimated Date of Confinement:</label>
                                                <input type="date" id="edc" name="edc" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="fht" class="form-label">Fetal Heart Tones:</label>
                                                    <input type="text" id="fht" name="fht" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="pres" class="form-label">Presentation:</label>
                                                    <input type="text" id="pres" name="pres" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="st" class="form-label">Station:</label>
                                                    <select class="form-select text-center" id="Forms "name="st">
                                                    <option value="">-- Select --</option>
                                                    <option value="0">0</option>
                                                    <option value="+1 cm">+1 cm</option>
                                                    <option value="+2 cm">+2 cm</option>
                                                    <option value="+3 cm">+3 cm</option>
                                                    <option value="-1 cm">-1 cm</option>
                                                    <option value="-2 cm">-2 cm</option>
                                                    <option value="-3 cm">-3 cm</option>
                                                    <option value="-4 cm">-4 cm</option>
                                                    </select>   
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="effacement" class="form-label">Effacement:</label>
                                                    <select class="form-select text-center" id="Forms" name="effacement" >
                                                    <option value="">-- Select --</option>
                                                    <option value="10%">10%</option>
                                                    <option value="15%">15%</option>
                                                    <option value="20%">20%</option>
                                                    <option value="25%">25%</option>
                                                    <option value="30%">30%</option>
                                                    <option value="35%">35%</option>
                                                    <option value="40%">40%</option>
                                                    <option value="45%">45%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="55%">55%</option>
                                                    <option value="60%">60%</option>
                                                    <option value="65%">65%</option>
                                                    <option value="70%">70%</option>
                                                    <option value="75%">75%</option>
                                                    <option value="80%">80%</option>
                                                    <option value="85%">85%</option>
                                                    <option value="90%">90%</option>
                                                    <option value="95%">95%</option>
                                                    <option value="100%">100%</option>
                                                    </select>  
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="cervical_dilatation" class="form-label">Cervical Dilatation:</label>
                                                    <select class="form-select text-center" id="Forms" name="cervical_dilatation">
                                                    <option value="">-- Select --</option>
                                                    <option value="1 cm">1 cm</option>
                                                    <option value="2 cm">2 cm</option>
                                                    <option value="3 cm">3 cm</option>
                                                    <option value="4 cm">4 cm</option>
                                                    <option value="5 cm">5 cm</option>
                                                    <option value="6 cm">6 cm</option>
                                                    <option value="7 cm">7 cm</option>
                                                    <option value="8 cm">8 cm</option>
                                                    <option value="9 cm">9 cm</option>
                                                    <option value="10 cm">10 cm</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="bp" class="form-label">Blood Pressure:</label>
                                                    <input type="number" id="bp" name="bp" class="form-control" required>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="bow" class="form-label">BOW (Bag of Waters):</label>
                                                    <select class="form-select text-center" id="Forms" name="bow">
                                                    <option value="">-- Select --</option>
                                                    <option value="Clear">Clear</option>
                                                    <option value="Thinly">Thinly</option>
                                                    <option value="Thickly">Thickly</option>
                                                    <option value="Meconium">Meconium</option>
                                                    </select>   
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="color" class="form-label">Color:</label>
                                                    <select class="form-select text-center" id="Forms" name="color">
                                                    <option value="">-- Select --</option>
                                                    <option value="Clear">Clear</option>
                                                    <option value="Meconium">Meconium</option>
                                                    <option value="Bloody">Bloody</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="time-rupture" class="form-label">Time of Rupture:</label>
                                                    <input type="text" id="time-rupture" name="time-rupture" class="form-control">
                                                </div>
        
                                                <div class="form-group col-md-4">
                                                    <label for="condition">Condition of Labor:</label>
                                                    <select class="form-select text-center" id="Forms" name="condition">
                                                        <option value="">-- Select --</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Not Active">Not Active</option>
                                                    </select>                      
                                                </div>
                                                
                                                
                                                
                                                    <div class="col-md-4">
                                                        <label for="gravidity" class="form-label">Gravidity:</label>
                                                        <input type="text" id="gravidity" name="gravidity" class="form-control">
                                                    </div>
        
                                                    <div class="col-md-4">
                                                        <label for="parity" class="form-label">Parity:</label>
                                                        <input type="text" id="parity" name="parity" class="form-control">
                                                    </div>
                                                
                                                 <div class="col-md-4">
                                                    <label for="medical-history" class="form-label">Medical History:</label>
                                                    <textarea id="medical-history" name="medical-history" class="form-control" required></textarea>
                                                </div>
        
                                                <div class="col-12">
                                                            
                                                        
                                                        <button type="submit">Add Maternal Record</button>
                                                        </div>
            </form>
    @endif

            </div>
           
        </div>                      
    </main>
</x-layout>