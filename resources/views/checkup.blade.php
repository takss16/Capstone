<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-3">
            <div class="text-start mb-3">
                <a href="{{ route('records') }}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
            <div class="mt-3 text-center">
                <h3>Checkup Form</h3>
            </div>
            <hr>
            

            <!-- <div class="text-end">
                <a href="{{ route('editBaby', ['id' => $patient->id]) }}" class="btn btn-primary btn-block"><i class="fa-solid fa-pen-to-square"></i> Update</a>
            </div> -->
            <!-- {{ route('editBaby', ['id' => $patient->id]) }} -->
            <!-- Parents Information section... -->
            <div class="text-center">
            <h1>
            {{ $patient->firstname }}
            {{ $patient->midlename }}
            {{ $patient->lastname }}
            </div>
          </h1>
            @if (!empty($checkup))
             
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicineModal">
                Add Medicine
            </button>
            <div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('addMedicine', ['id' => $checkup->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="medicine_name" class="form-label">Medicine Name</label>
                                <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="dosage" class="form-label">Dosage</label>
                                <input type="text" class="form-control" id="dosage" name="dosage" required>
                            </div>
                            <div class="mb-3">
                                <label for="frequency" class="form-label">Frequency</label>
                                <input type="text" class="form-control" id="frequency" name="frequency" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
            <div class="container mt-3">
            <h2>Medicine Records</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkup->medicineRecords as $medicine)
                    <tr>
                        <td>{{ $medicine->medicine_name }}</td>
                        <td>{{ $medicine->dosage }}</td>
                        <td>{{ $medicine->frequency }}</td>
                        <td>
                        <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#deleteMedicineModal-{{ $medicine->id }}">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>

                <!-- Delete Medicine Modal -->
                <div class="modal fade" id="deleteMedicineModal-{{ $medicine->id }}" tabindex="-1" aria-labelledby="deleteMedicineModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteMedicineModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the medicine record for {{ $medicine->medicine_name }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('deleteMedicine', ['id' => $patient->id, 'medicineId' => $medicine->id]) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            @if ($checkup)
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#editCheckupModal">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>
                </div>

                <!-- Display checkup details here -->
                <h2>Checkup Details</h2>
                <p>Date: {{ $checkup->visit_date }}</p>
                <p>Time: {{ $checkup->visit_time }}</p>
                <p>Reason: {{ $checkup->reason }}</p>
                <p>Next Visit: {{ $checkup->next_visit }}</p>
            @else
                <!-- Display the checkup form here... -->
            @endif
      


    <!-- Edit Checkup Modal -->
    <div class="modal fade" id="editCheckupModal" tabindex="-1" aria-labelledby="editCheckupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCheckupModalLabel">Update Checkup Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('updateCheckup', ['id' => $patient->id, 'checkupId' => $checkup->id]) }}" method="POST">
                  @csrf
                  <div class="col-md-6">        
                  <label for="visit-date" class="form-label">Date of Visit:</label>           
                  <input type="date" id="visit-date" value="{{ $checkup->visit_date }}" name="visit-date" class="form-control"><br>
                  </div>             
                  <div class="col-md-6">
                   <label for="visit-time" class="form-label">Time of Visit:</label>
                   <input type="time" id="visit-time" value="{{ $checkup->visit_time }}"value="{{ $checkup->visit_time }}" name="visit-time" class="form-control"><br>
                   </div>                
                   <div class="col-12">     
                    <label for="reason" class="form-label">Notes:</label>  
                    <textarea id="reason" name="reason" value="{{ $checkup->reason }}" rows="4" class="form-control" ></textarea><br>
                    </div>               
                    <div class="col-md-6">
                    <label for="next-visit" class="form-label">Expected Date of Next Visit:</label>
                    <input type="date" id="next-visit" value="{{ $checkup->next_visit }}" name="next-visit" class="form-control"><br>
                    </div>   
                  

                  <div class="text-center mt-3">
                      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-download"></i> Save Changes</button>
                  </div>
              </form>

                </div>
            </div>
        </div>
    </div>

            
        </div>
                <div class="row g-3 mt-5 col-12 text-center ">
                    <div class="col-md-6">
                <a href="" class="btn btn-danger">Delete</a>
                </div>
                <div class="col-md-6">
                <div class="text-center mt-3">
                  <a href="{{ route('patient.printCheckup', ['id' => $patient->id, 'checkupId' => $checkup->id]) }}" target="_blank" class="btn btn-primary">
                      <i class="fa-solid fa-print"></i> Print
                  </a>

                 </div>
                </div>
            
            @else
                <div>
                    <form action="{{ route('storeCheckup', ['id' => $patient->id]) }}" method="POST">
                              @csrf
                              <div class="row">
                                          <div class="col-md-6">        
                                            <label for="visit-date" class="form-label">Date of Visit:</label>           
                                            <input type="date" id="visit-date" name="visit-date" class="form-control"><br>
                                          </div>             
                                          <div class="col-md-6">
                                            <label for="visit-time" class="form-label">Time of Visit:</label>
                                            <input type="time" id="visit-time" name="visit-time" class="form-control"><br>
                                          </div>                
                                          <div class="col-12">     
                                            <label for="reason" class="form-label">Notes:</label>  
                                            <textarea id="reason" name="reason" rows="4" class="form-control" required></textarea><br>
                                          </div>               
                                          <div class="col-md-6">
                                            <label for="next-visit" class="form-label">Expected Date of Next Visit:</label>
                                            <input type="date" id="next-visit" name="next-visit" class="form-control"><br>
                                          </div>   
                              </div>            
                                              <hr>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-download"></i> Save Checkup</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </main>
</x-layout>
