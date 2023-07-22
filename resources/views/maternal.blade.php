<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pabustan Birthing Clinic</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      @include('navbar')
      </div>
      
      <div id="layoutSidenav_content">
    <main class="mw-100 col-11">
        <div class="container mt-5">
            <div class="row">
            <div>
            
            <div>
            <a href="{{route('records')}}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
            </div>
                                            <div class="mb-5 text-center mt-3">
                                            <h3>Patient Maternal Record</h3> 
                                            </div>
                             
                                            <div class="col-9 bg-dark"></div>
                                                    
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label for="medical-history" class="form-label">Medical History:</label>
                                                    <textarea id="medical-history" name="medical-history" rows="4" class="form-control" required></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="lmp" class="form-label">LMP (Last Menstrual Period):</label>
                                                    <input type="date" id="lmp" name="lmp" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="edc" class="form-label">EDC (Estimated Date of Confinement):</label>
                                                    <input type="date" id="edc" name="edc" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="aog" class="form-label">AOG (Age of Gestation):</label>
                                                    <input type="number" id="aog" name="aog" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="fht" class="form-label">FHT (Fetal Heart Tones):</label>
                                                    <input type="text" id="fht" name="fht" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="pres" class="form-label">PRES (Presentation):</label>
                                                    <input type="text" id="pres" name="pres" class="form-control">
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="st" class="form-label">ST (Station):</label>
                                                    <select class="form-select text-center" id="Forms">
                                                    <option value="">-- Select --</option>
                                                    <option value="active">0</option>
                                                    <option value="not_active">+1 cm</option>
                                                    <option value="active">+2 cm</option>
                                                    <option value="not_active">+3 cm</option>
                                                    <option value="not_active">-1 cm</option>
                                                    <option value="active">-2 cm</option>
                                                    <option value="not_active">-3 cm</option>
                                                    <option value="not_active">-4 cm</option>
                                                    </select>   
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="gravidity" class="form-label">Effacement:</label>
                                                    <select class="form-select text-center" id="Forms">
                                                    <option value="">-- Select --</option>
                                                    <option value="active">10%</option>
                                                    <option value="not_active">15%</option>
                                                    <option value="active">20%</option>
                                                    <option value="not_active">25%</option>
                                                    <option value="not_active">30%</option>
                                                    <option value="active">35%</option>
                                                    <option value="not_active">40%</option>
                                                    <option value="not_active">45%</option>
                                                    <option value="not_active">50%</option>
                                                    <option value="not_active">55%</option>
                                                    <option value="not_active">60%</option>
                                                    <option value="not_active">65%</option>
                                                    <option value="not_active">70%</option>
                                                    <option value="not_active">75%</option>
                                                    <option value="not_active">80%</option>
                                                    <option value="not_active">85%</option>
                                                    <option value="not_active">90%</option>
                                                    <option value="not_active">95%</option>
                                                    <option value="not_active">100%</option>
                                                    </select>  
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="cervical-dilatation" class="form-label">Cervical Dilatation:</label>
                                                    <select class="form-select text-center" id="Forms">
                                                    <option value="">-- Select --</option>
                                                    <option value="not_active">1 cm</option>
                                                    <option value="active">2 cm</option>
                                                    <option value="not_active">3 cm</option>
                                                    <option value="not_active">4 cm</option>
                                                    <option value="active">5 cm</option>
                                                    <option value="not_active">6 cm</option>
                                                    <option value="not_active">7 cm</option>
                                                    <option value="not_active">8 cm</option>
                                                    <option value="not_active">9 cm</option>
                                                    <option value="not_active">10 cm</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="bp" class="form-label">Blood Pressure:</label>
                                                    <input type="number" id="bp" name="bp" class="form-control" required>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="bow" class="form-label">BOW (Bag of Waters):</label>
                                                    <select class="form-select text-center" id="Forms">
                                                    <option value="">-- Select --</option>
                                                    <option value="active">Clear</option>
                                                    <option value="not_active">Thinly</option>
                                                    <option value="active">Thickly</option>
                                                    <option value="active">Meconium</option>
                                                    </select>   
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="color" class="form-label">Color:</label>
                                                    <select class="form-select text-center" id="Forms">
                                                    <option value="">-- Select --</option>
                                                    <option value="active">Clear</option>
                                                    <option value="not_active">Meconium</option>
                                                    <option value="active">Bloody</option>
                                                    </select>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <label for="time-rupture" class="form-label">Time of Rupture:</label>
                                                    <input type="text" id="time-rupture" name="time-rupture" class="form-control">
                                                </div>
        
                                                <div class="form-group col-md-4">
                                                    <label for="condition">Condition of Labor:</label>
                                                    <select class="form-select text-center" id="Forms">
                                                        <option value="">-- Select --</option>
                                                        <option value="checkup">Active</option>
                                                        <option value="maternal">Not Active</option>
                                                    </select>                      
                                                </div>
                                                
                                                
                                                <div class="col-md-8 ">
                                                    <div class="col-md-4">
                                                        <label for="gravidity" class="form-label">Gravidity:</label>
                                                        <input type="text" id="gravidity" name="gravidity" class="form-control">
                                                    </div>
        
                                                    <div class="col-md-4">
                                                        <label for="parity" class="form-label">Parity:</label>
                                                        <input type="text" id="parity" name="parity" class="form-control">
                                                    </div>
                                                </div>
        
        
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
        </div>
    </main>
</div>


        </div>
        </div>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
