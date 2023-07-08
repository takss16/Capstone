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
                <div class="container text-center col-md-12 ">
                      <div class="container text-center col-md-9">
                        <input type="text" id="searchInput" placeholder="Search...">
                      </div>      
                      <div class="div"><p>search patient</p></div>
                      
                      <div class="h1">Patient Record</div>  
                      <div class="row">
                        <div class="col-12">
                          <form class="text-center">
                            
                            <div class="row g-3">
                              <div class="col-md-4">
                                <label for="lastName" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" >
                              </div>
                              <div class="col-md-4">
                                <label for="firstName" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstName">
                              </div>
                              <div class="col-md-4">
                                <label for="middleName" class="form-label">Middle Name:</label>
                                <input type="text" class="form-control" id="middleName">
                              </div>
                            </div>
                            

                            <div class="row g-3">
                              <div class="col-md-4">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="age">
                              </div>
                              <div class="col-md-4">
                                <label for="birthday" class="form-label">Birthday:</label>
                                <input type="date" class="form-control" id="birthday" >
                              </div>
                              <div class="col-md-4">
                                <label for="civilStatus" class="form-label">Civil Status:</label>
                                <input type="text" class="form-control" id="civilStatus">
                              </div>
                              <div class="col-md-4">
                                <label for="contact" class="form-label">Contact:</label>
                                <input type="text" class="form-control" id="contact">
                              </div>
                              <div class="col-md-4">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address">
                              </div>
                            </div>
                            
                            <div class="row justify-content-center mt-5">
                              <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                              </div>
                              <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                              </div>
                              <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Delete</button><br>
                              </div>
                              <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Print</button><br>
                              </div>
                            </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </main>
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
