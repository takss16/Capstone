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
        <link href="{{Vite::asset('resources/css/styles.css')}}" rel="stylesheet" />
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
            <div class="container bg">
                                    
                                    <div>
                                        <div class="text-center mt-3">
                                         <h3>Admission</h3>
                                        </div>
                                        
                                        <div class="bg-dark col-9 mt-3"></div>
                                      <form>
                                                            
                                        <div class="row g-3">
                                                              
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
                    
                                      </form>
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
