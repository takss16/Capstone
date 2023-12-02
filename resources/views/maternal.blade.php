<x-layout>
    <main class="mw-100 col-11">
        <div class="container col-md-12 ">
            <div class="container  col-md-12">
                <!-- Display patient details here -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.ViewRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                            <i class="fa-solid fa-circle-chevron-left"></i> Back
                        </a>

                        @if($maternalRecordsFalse->isNotEmpty())
                        <a href="{{ route('admin.prevMaternal', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-eye"></i> Previous Maternal Records</a>
                        @endif
                    </div>

                    <!-- Add more patient details as needed -->
                </div>
                @if ($maternalRecord)
                <div class="mt-3 text-center">
                    <h3>Maternal Record </h3>
                </div>

                <div class="col-12 mt-3">
                    <div class="card shadow-lg col-12">
                        <div class="card-body">
                            <section class="patient-info-section mb-4">
                                <h5 class="section-title">Personal Information</h5>
                                <h6 class="mt-3 mb-3">
                                    {{ $patient->firstname }}
                                    {{ $patient->midlename }}
                                    {{ $patient->lastname }}
                                </h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="info-label">Patient ID</p>
                                        <p>{{ $patient->id }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="info-label">Age</p>
                                        <p>{{ $patient->age }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="info-label">Birthday</p>
                                        <p>{{ $patient->birthday }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="info-label">Civil Status</p>
                                        <p>{{ $patient->civilstatus }}</p>
                                    </div>
                                </div>


                            </section>
                            <section class="maternal-details-section mt-2">
                                <h5 class="section-title">Maternal Details</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Last Menstrual Period (LMP)</th>
                                            <td>{{ $maternalRecord->lmp }}</td>
                                            <th>Age of Gestation (AOG)</th>
                                            <td>{{ $maternalRecord->aog }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estimated Date of Confinement (EDC)</th>
                                            <td>{{ $maternalRecord->edc }}</td>
                                            <th>Fetal Heart Tones (FHT)</th>
                                            <td>{{ $maternalRecord->fht }}</td>
                                        </tr>
                                        <tr>
                                            <th>Presentation</th>
                                            <td>{{ $maternalRecord->pres }}</td>
                                            <th>Station</th>
                                            <td>{{ $maternalRecord->st }}</td>
                                        </tr>
                                        <tr>
                                            <th>Effacement</th>
                                            <td>{{ $maternalRecord->effacement }}</td>
                                            <th>Cervical Dilatation</th>
                                            <td>{{ $maternalRecord->cervical_dilatation }}</td>
                                        </tr>
                                        <tr>
                                            <th>Blood Pressure (BP)</th>
                                            <td>{{ $maternalRecord->bp }}</td>
                                            <th>Bag of Waters</th>
                                            <td>{{ $maternalRecord->bow }}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{ $maternalRecord->color }}</td>
                                            <th>Time of Rupture</th>
                                            <td>{{ $maternalRecord->time_rupture }}</td>
                                        </tr>
                                        <tr>
                                            <th>Condition of Labor</th>
                                            <td>{{ $maternalRecord->condition }}</td>
                                            <th>Gravidity</th>
                                            <td>{{ $maternalRecord->gravidity }}</td>
                                        </tr>
                                        <tr>
                                            <th>Parity</th>
                                            <td>{{ $maternalRecord->parity }}</td>
                                            <th>Medical History</th>
                                            <td>{{ $maternalRecord->medical_history }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </section>

                            <div class="row g-3 mt-3 text-center">
                                <div class="col-3 mx-auto">
                                    <a href="{{ route('admin.showDeleteConfirmation', ['id' => $patient->id]) }}" class="btn btn-danger">
                                        <i class="fa-regular fa-square-minus"></i> Delete
                                    </a>
                                </div>
                                <div class="col-3 mx-auto">
                                <a href="{{ route('admin.printMaternalRecord', ['id' => encrypt($patient->id)]) }}" target="_blank" class="btn btn-primary btn-block">
                                    <i class="fa-solid fa-print"></i> Print
                                </a>

                                </div>
                                <div class="col-3 mx-auto">
                                <a href="{{ route('admin.editMaternalRecord', ['id' => encrypt($patient->id)]) }}" class="btn btn-primary btn-block">
                                    <i class="fa-solid fa-pen-to-square"></i> Update
                                </a>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                @else
                <div class="col-12 mt-3">
                    <div class="card shadow-lg col-12">
                        <div class="card-body">

                            <form action="{{ route('admin.storeMaternalRecord', ['id' => $patient->id]) }}" method="POST">
                                @csrf
                                <!-- Add form fields for maternal record -->
                                <div class="mb-5 text-center mt-3">
                                    <h3>Add Maternal Record</h3>
                                </div>

                                <div class="col-9 bg-dark"></div>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label for="lmp" class="form-label">Last Menstrual Period*</label>
                                        @if (is_null($latestCheckup))
                                        <input type="date" id="lmp" name="lmp" class="form-control" required onchange="calculateEDCAndValidate()" max="<?php echo date('Y-m-d', strtotime('-1 day')); ?>">
                                        @else
                                        <input type="date" id="lmp" name="lmp" value="{{$latestCheckup->lmp }}" class="form-control" required onchange="calculateEDCAndValidate()" readonly>
                                        @endif
                                        <span id="lmp-error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="aog" class="form-label">Age of Gestation</label>
                                        <input type="text" id="aog" name="aog" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edc" class="form-label">Estimated Due Date</label>
                                        <input type="date" id="edc" name="edc" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="fht" class="form-label">Fetal Heart Tones(bpm)*</label>
                                        <input type="text" id="fht" name="fht" class="form-control" oninput="convertToUppercase(this)">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="pres" class="form-label">Presentation*</label>
                                        <input type="text" id="pres" name="pres" class="form-control" oninput="convertToUppercase(this)">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="st" class="form-label">Station*</label>
                                        <select class="form-select text-center" id="Forms " name="st">
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
                                        <label for="effacement" class="form-label">Effacement*</label>
                                        <select class="form-select text-center" id="Forms" name="effacement">
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
                                        <label for="cervical_dilatation" class="form-label">Cervical Dilatation*</label>
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
                                        <label for="bp" class="form-label">Blood Pressure*</label>
                                        <input type="text" id="bp" name="bp" pattern="\d+/\d+" placeholder="e.g., 120/80" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="bow" class="form-label">BOW (Bag of Waters)*</label>
                                        <select class="form-select text-center" id="Forms" name="bow">
                                            <option value="">-- Select --</option>
                                            <option value="Clear">Clear</option>
                                            <option value="Thinly">Thinly</option>
                                            <option value="Thickly">Thickly</option>
                                            <option value="Meconium">Meconium</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="color" class="form-label">Color*</label>
                                        <select class="form-select text-center" id="Forms" name="color">
                                            <option value="">-- Select --</option>
                                            <option value="Clear">Clear</option>
                                            <option value="Meconium">Meconium</option>
                                            <option value="Bloody">Bloody</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="time-rupture" class="form-label">Time of Rupture*</label>
                                        <input type="time" id="time-rupture" name="time-rupture" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="condition">Condition of Labor*</label>
                                        <select class="form-select text-center" id="Forms" name="condition">
                                            <option value="">-- Select --</option>
                                            <option value="Active">Active</option>
                                            <option value="Not Active">Not Active</option>
                                        </select>
                                    </div>



                                    <div class="col-md-4">
                                        <label for="gravidity" class="form-label">Gravidity*</label>
                                        <input type="number" id="gravidity" name="gravidity" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="parity" class="form-label">Parity*</label>
                                        <input type="number" id="parity" name="parity" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="medical-history" class="form-label">Medical History*</label>
                                        <textarea id="medical-history" name="medical-history" class="form-control" oninput="convertToUppercase(this)"></textarea>
                                    </div>

                                    <div class="col-12">


                                        <div class="col-md-12 text-center mb-3">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-download"></i> Save</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
</x-layout>