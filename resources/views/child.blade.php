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
                                    <div class="text-center"><h3>Baby's Information</h3></div>
                                    <div class="bg-dark col-9 mt-5"></div>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="lastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" name="babyLastName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" id="firstName" name="babyGivenName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" name="babyMiddleName">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">Permanent Address:</label>
                                            <input type="text" class="form-control" id="address" name="babyAddress" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Date of Birth:</label>
                                            <input type="date" class="form-control" id="birthday" name="babyDOB" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="timeOfBirth" class="form-label">Time of Birth:</label>
                                            <input type="time" class="form-control" id="timeOfBirth" name="babyTOB" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age of Baby:</label>
                                            <input type="number" class="form-control" id="age" name="babyAge" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="gender" class="form-label">Gender:</label>
                                            <select class="form-select" id="gender" name="babyGender" required>
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nationality" class="form-label">Nationality:</label>
                                            <input type="text" class="form-control" id="nationality" name="babyNationality" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="idcCode" class="form-label">IDC Code:</label>
                                            <input type="text" class="form-control" id="idcCode" name="idcCode" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="clinicalImpression" class="form-label">Clinical Impression:</label>
                                            <input type="text" class="form-control" id="clinicalImpression" name="clinicalImpression" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dtae" class="form-label">DTAE:</label>
                                            <input type="text" class="form-control" id="dtae" name="dtae" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phic" class="form-label">PHIC:</label>
                                            <input type="text" class="form-control" id="phic" name="phic" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="clinicNo" class="form-label">Clinic Number:</label>
                                            <input type="text" class="form-control" id="clinicNo" name="clinicNo" required>
                                        </div>
                                        <h3>Father's Information</h3>
                                        <div class="col-md-4">
                                            <label for="fatherLastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" id="fatherLastName" name="fatherLastName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherFirstName" class="form-label">Given Name:</label>
                                            <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fatherMiddleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" id="fatherMiddleName" name="fatherMiddleName">
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
