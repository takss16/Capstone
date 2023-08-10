<x-layout>
    <main class="mw-100 col-11">
        <div class="container mt-5">
            <div class="row">
            <div>
            <div>
            <a href="{{route('records')}}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
            <div class="container">
                                        
                                        <div class="row">
                                                                
                                          <div class="col-12 bg-dark mb-3"></div>
                                          <div class="text-center mt-3">
                                         <h3>Check-up</h3>
                                        </div>           
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
                                          <div id="medicine-section">
                                            <div class="col-12 medicine-record">
                                              <hr>
                                              <h4>Medicine Record</h4>
                                              <div class="col-12">
                                                <label for="medicine-name" class="form-label">Medicine Name:</label>
                                                <input type="text" class="medicine-name form-control" name="medicine-name[]">
                                              </div>
                                              <div class="col-md-6">
                                                <label for="medicine-dosage" class="form-label">Dosage:</label>
                                                <input type="text" class="medicine-dosage form-control" name="medicine-dosage[]">
                                              </div>
                                              <div class="col-md-6">
                                                <label for="medicine-frequency" class="form-label">Frequency:</label>
                                                <input type="text" class="medicine-frequency form-control" name="medicine-frequency[]">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-12 mt-3">
                                            <button type="button" id="add-medicine" class="btn btn-secondary">Add Medicine</button>
                                          </div>

                                          <!-- ...Other buttons... -->

                                          <script>
                                          
                                          </script>           
                                          <div class="col-12">
                                                                      
                                            <div class="row justify-content-center">
                                                                          
                                              <div class="col-md-2 mb-3">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-download"></i> Save</button>
                                              </div>                     
                                              <div class="col-md-2 mb-3">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                              </div>                     
                                              <div class="col-md-2 mb-3">        
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-regular fa-square-minus"></i> Delete</button><br>
                                              </div>                   
                                              <div class="col-md-2 mb-3">  
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-print"></i> Print</button><br>
                                              </div>
                                                                      
                                            </div>
                      
                                          </div>
                                                              
                                        </div>
                      
                                      </div>
                                  
        </div>
    </main>
    
        </x-layout>
