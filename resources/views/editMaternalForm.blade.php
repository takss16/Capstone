<x-layout>
    <main class="mw-100 col-11">
        <div class="container text-center col-md-12 ">  
        <div class="text-start">
            <a href="{{route('maternal', ['id' => $patient->id]) }})}}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
            <div class="container text-center col-md-12">
            <h2>
                Edit Maternal Record for<b> {{ $patient->firstname }} {{ $patient->lastname }}</h2></b>
<hr>
            <form action="{{ route('updateMaternalRecord', ['id' => $patient->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Use the PUT method for updating -->

                <!-- Add form fields for maternal record -->
                <!-- Populate the input fields with existing maternal record data -->
         
              
                                           
                <div class="col-9 bg-dark"></div>
                                                    
                                                    <div class="row g-3">
                                                       
                                                    <div class="col-md-4">
                                                        <label for="lmp" class="form-label">Last Menstrual Period:</label>
                                                        <input type="date" id="lmp" name="lmp" class="form-control" value="{{ $maternalRecord->lmp }}" required onchange="calculateEDC()">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="aog" class="form-label">Age of Gestation:</label>
                                                        <input type="text" id="aog" name="aog" value="{{ $maternalRecord->aog }}" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="edc" class="form-label">Estimated Date of Confinement:</label>
                                                        <input type="date" id="edc" name="edc" value="{{ $maternalRecord->edc }}" class="form-control">
                                                    </div>
                
                                                        <div class="col-md-4">
                                                            <label for="fht" class="form-label">Fetal Heart Tones:</label>
                                                            <input type="text" id="fht" name="fht" value="{{ $maternalRecord->fht }}" class="form-control">
                                                        </div>
                
                                                        <div class="col-md-4">
                                                            <label for="pres" class="form-label">Presentation:</label>
                                                            <input type="text" id="pres" name="pres" value="{{ $maternalRecord->pres }}" class="form-control">
                                                        </div>
                
                                                       
                                                        <div class="col-md-4">
                                                            <label for="st" class="form-label">ST (Station):</label>
                                                            <select class="form-select text-center" name="st" id="Forms">
                                                                <option value="">-- Select --</option>
                                                                <option value="0" @if ($maternalRecord->st === '0') selected @endif>0</option>
                                                                <option value="+1 cm" @if ($maternalRecord->st === '+1 cm') selected @endif>+1 cm</option>
                                                                <option value="+2 cm" @if ($maternalRecord->st === '+2 cm') selected @endif>+2 cm</option>
                                                                <option value="+3 cm" @if ($maternalRecord->st === '+3 cm') selected @endif>+3 cm</option>
                                                                <option value="-1 cm" @if ($maternalRecord->st === '-1 cm') selected @endif>-1 cm</option>
                                                                <option value="-2 cm" @if ($maternalRecord->st === '-2 cm') selected @endif>-2 cm</option>
                                                                <option value="-3 cm" @if ($maternalRecord->st === '-3 cm') selected @endif>-3 cm</option>
                                                                <option value="-4 cm" @if ($maternalRecord->st === '-4 cm') selected @endif>-4 cm</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="gravidity" class="form-label">Effacement:</label>
                                                            <select class="form-select text-center" name="effacement" id="Forms">
                                                                <option value="">-- Select --</option>
                                                                <option value="10%" @if ($maternalRecord->effacement === '10%') selected @endif>10%</option>
                                                                <option value="15%" @if ($maternalRecord->effacement === '15%') selected @endif>15%</option>
                                                                <option value="20%" @if ($maternalRecord->effacement === '20%') selected @endif>20%</option>
                                                                <option value="25%" @if ($maternalRecord->effacement === '25%') selected @endif>25%</option>
                                                                <option value="30%" @if ($maternalRecord->effacement === '30%') selected @endif>30%</option>
                                                                <option value="35%" @if ($maternalRecord->effacement === '35%') selected @endif>35%</option>
                                                                <option value="40%" @if ($maternalRecord->effacement === '40%') selected @endif>40%</option>
                                                                <option value="45%" @if ($maternalRecord->effacement === '45%') selected @endif>45%</option>
                                                                <option value="50%" @if ($maternalRecord->effacement === '50%') selected @endif>50%</option>
                                                                <option value="55%" @if ($maternalRecord->effacement === '55%') selected @endif>55%</option>
                                                                <option value="60%" @if ($maternalRecord->effacement === '60%') selected @endif>60%</option>
                                                                <option value="65%" @if ($maternalRecord->effacement === '65%') selected @endif>65%</option>
                                                                <option value="70%" @if ($maternalRecord->effacement === '70%') selected @endif>70%</option>
                                                                <option value="75%" @if ($maternalRecord->effacement === '75%') selected @endif>75%</option>
                                                                <option value="80%" @if ($maternalRecord->effacement === '80%') selected @endif>80%</option>
                                                                <option value="85%" @if ($maternalRecord->effacement === '85%') selected @endif>85%</option>
                                                                <option value="90%" @if ($maternalRecord->effacement === '90%') selected @endif>90%</option>
                                                                <option value="95%" @if ($maternalRecord->effacement === '95%') selected @endif>95%</option>
                                                                <option value="100%" @if ($maternalRecord->effacement === '100%') selected @endif>100%</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="cervical-dilatation" class="form-label">Cervical Dilatation:</label>
                                                            <select class="form-select text-center" name="cervical_dilatation" id="Forms">
                                                                <option value="">-- Select --</option>
                                                                <option value="1 cm" @if ($maternalRecord->cervical_dilatation === '1 cm') selected @endif>1 cm</option>
                                                                <option value="2 cm" @if ($maternalRecord->cervical_dilatation === '2 cm') selected @endif>2 cm</option>
                                                                <option value="3 cm" @if ($maternalRecord->cervical_dilatation === '3 cm') selected @endif>3 cm</option>
                                                                <option value="4 cm" @if ($maternalRecord->cervical_dilatation === '4 cm') selected @endif>4 cm</option>
                                                                <option value="5 cm" @if ($maternalRecord->cervical_dilatation === '5 cm') selected @endif>5 cm</option>
                                                                <option value="6 cm" @if ($maternalRecord->cervical_dilatation === '6 cm') selected @endif>6 cm</option>
                                                                <option value="7 cm" @if ($maternalRecord->cervical_dilatation === '7 cm') selected @endif>7 cm</option>
                                                                <option value="8 cm" @if ($maternalRecord->cervical_dilatation === '8 cm') selected @endif>8 cm</option>
                                                                <option value="9 cm" @if ($maternalRecord->cervical_dilatation === '9 cm') selected @endif>9 cm</option>
                                                                <option value="10 cm" @if ($maternalRecord->cervical_dilatation === '10 cm') selected @endif>10 cm</option>
                                                            </select>
                                                        </div>

                
                                                        <div class="col-md-4">
                                                            <label for="bp" class="form-label">Blood Pressure:</label>
                                                            <input type="number" id="bp" name="bp" value="{{ $maternalRecord->bp }}"class="form-control" >
                                                        </div>
                
                                                        <div class="col-md-4">
                                                            <label for="bow" class="form-label">BOW (Bag of Waters):</label>
                                                            <select class="form-select text-center" id="Forms" name="bow">
                                                                <option value="">-- Select --</option>
                                                                <option value="Clear" @if ($maternalRecord->bow === 'Clear') selected @endif>Clear</option>
                                                                <option value="Thinly" @if ($maternalRecord->bow === 'Thinly') selected @endif>Thinly</option>
                                                                <option value="Thickly" @if ($maternalRecord->bow === 'Thickly') selected @endif>Thickly</option>
                                                                <option value="Meconium" @if ($maternalRecord->bow === 'Meconium') selected @endif>Meconium</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="color" class="form-label">Color:</label>
                                                            <select class="form-select text-center" id="Forms" name="color">
                                                                <option value="">-- Select --</option>
                                                                <option value="Clear" @if ($maternalRecord->color === 'Clear') selected @endif>Clear</option>
                                                                <option value="Meconium" @if ($maternalRecord->color === 'Meconium') selected @endif>Meconium</option>
                                                                <option value="Bloody" @if ($maternalRecord->color === 'Bloody') selected @endif>Bloody</option>
                                                            </select>
                                                        </div>

                
                                                        <div class="col-md-4">
                                                            <label for="time-rupture" class="form-label">Time of Rupture:</label>
                                                            <input type="text" id="time-rupture" name="time-rupture"value="{{ $maternalRecord->time_rupture }}" class="form-control">
                                                        </div>
                
                                                        <div class="form-group col-md-4">
                                                            <label for="condition">Condition of Labor:</label>
                                                            <select class="form-select text-center" id="Forms" name="condition">
                                                                <option value="">-- Select --</option>
                                                                <option value="Active" @if ($maternalRecord->condition === 'Active') selected @endif>Active</option>
                                                                <option value="Not Active" @if ($maternalRecord->condition === 'Not Active') selected @endif>Not Active</option>
                                                            </select>
                                                        </div>
                                                                                                                
                                                        
                                                        
                                                            <div class="col-md-4">
                                                                <label for="gravidity" class="form-label">Gravidity:</label>
                                                                <input type="text" id="gravidity" name="gravidity"  value="{{ $maternalRecord->gravidity }}" class="form-control">
                                                            </div>
                
                                                            <div class="col-md-4">
                                                                <label for="parity" class="form-label">Parity:</label>
                                                                <input type="text" id="parity" name="parity" class="form-control" value="{{ $maternalRecord->parity }}">
                                                            </div>

                                                        
                                                            <div class="form-group col-md-4">
                                                                <label for="medical-history" class="form-label">Medical History:</label>
                                                                <textarea id="medical-history" name="medical-history" rows="4" class="form-control" required>{{ $maternalRecord->medical_history }}</textarea>
                                                            </div>

              
                <div class="col-12">
                    <button type="submit">Update Maternal Record</button>
                </div>
            </form>
            
            </div>
           
        </div>                      
    </main>
</x-layout>