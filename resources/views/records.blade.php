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
                      <div class="row ">
                        <div class="col-12">
                          <form class="text-center">
                            
                            <div class="row g-3">
                              <div class="col-md-4">
                                <label for="lastName" class="form-label">Last Name:</label>
                                <!-- <input type="text" class="form-control" id="lastName"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="firstName" class="form-label">First Name:</label>
                                <!-- <input type="text" class="form-control" id="firstName"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="middleName" class="form-label">Middle Name:</label>
                                <!-- <input type="text" class="form-control" id="middleName"> -->
                              </div>
                            </div>
                            
                            <div class="row g-3">
                              <div class="col-md-4">
                                <label for="age" class="form-label">Age:</label>
                                <!-- <input type="number" class="form-control" id="age"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="birthday" class="form-label">Birthday:</label>
                                <!-- <input type="date" class="form-control" id="birthday"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="civilStatus" class="form-label">Civil Status:</label>
                                <!-- <input type="text" class="form-control" id="civilStatus"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="contact" class="form-label">Contact:</label>
                                <!-- <input type="text" class="form-control" id="contact"> -->
                              </div>
                              <div class="col-md-4">
                                <label for="address" class="form-label">Address:</label>
                                <!-- <input type="text" class="form-control" id="address"> -->
                              </div>
                            </div>
                            
                            <div class="row g-3 mt-5">
                              <div class="m-3">
                                <div class="col-md-6">
                                  <label for="Forms" class="form-label">Select Form:</label>
                                  <select class="form-select" id="Forms" required onchange="showSpouse()">
                                    <option value="">-- Select --</option>
                                    <option value="checkup">Check-ups</option>
                                    <option value="maternal">Maternal</option>
                                    <option value="admit">Admit</option>
                                    <option  href="babyfield" value="child">Child</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="container bg">
                                    <div id="babyfield" style="display:none">
                                      <h3>Baby's Information</h3>
                                      <div class="bg-dark col-9"></div>
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
                                              <button type="submit" class="btn btn-primary btn-block">Save</button>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                              <button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                              <button type="submit" class="btn btn-primary btn-block">Delete</button>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                              <button type="submit" class="btn btn-primary btn-block">Print</button>
                                            </div>
                                          </div>
                                        </div>
                                            </div>
                                          </div>

                                  <div class="container bg">
                                    <div id="maternalfield" style="display:none">
                                      <h3>Patient Maternal Record</h3>
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
                                          <div class="form-group col-md-4">
                                              <label for="condition">Condition of Labor:</label>
                                              <input type="radio" id="active" name="condition" value="active">Active
                                              <input type="radio" id="not-active" name="condition" value="not-active">Not Active
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
                                              <input type="text" id="st" name="st" class="form-control">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="gravidity" class="form-label">Gravidity:</label>
                                              <input type="text" id="gravidity" name="gravidity" class="form-control">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="bp" class="form-label">Blood Pressure:</label>
                                              <input type="number" id="bp" name="bp" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                              <label for="bow" class="form-label">BOW (Bag of Waters):</label>
                                              <input type="text" id="bow" name="bow" class="form-control">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="color" class="form-label">Color:</label>
                                              <input type="text" id="color" name="color" class="form-control">
                                          </div>
                                          <div class="col-md-4">
                                            <label for="parity" class="form-label">Parity:</label>
                                            <input type="text" id="parity" name="parity" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cervical-dilatation" class="form-label">Cervical Dilatation:</label>
                                            <input type="text" id="cervical-dilatation" name="cervical-dilatation" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="time-rupture" class="form-label">Time of Rupture:</label>
                                            <input type="text" id="time-rupture" name="time-rupture" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <div class="row justify-content-center">
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
                                        </div>
                                        
                                  
                                    <div class="container bg">
                                      <div id="checkupfield" style="display:none">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-12 bg-dark mb-3"></div>
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
                                            <div class="col-12">
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <button type="submit" class="btn btn-primary mb-3">Save</button>
                                                </div>
                                                <div class="col-md-3">
                                                  <button type="submit" class="btn btn-primary mb-3">Update</button>
                                                </div>
                                                <div class="col-md-3">
                                                  <button type="submit" class="btn btn-primary mb-3">Delete</button>
                                                </div>
                                                <div class="col-md-3">
                                                  <button type="submit" class="btn btn-primary mb-3">Print</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
              
                                      </div>
                                    </div>
              
                                    <div class="container bg">
                                      <div id="admitfield" style="display:none">
                                        <h3>Admission</h3>
                                        <div class="bg-dark col-9"></div>
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
                                            <div class="col-md-3">
                                              <button type="submit" class="btn btn-primary">Save</button><br>
                                            </div>
                                            <div class="col-md-3">
                                              <button type="submit" class="btn btn-primary">Update</button><br>
                                            </div>
                                            <div class="col-md-3">
                                              <button type="submit" class="btn btn-primary">Delete</button><br>
                                            </div>
                                            <div class="col-md-3">
                                              <button type="submit" class="btn btn-primary">Print</button><br>
                                            </div>
                                          </div>
                                        </form>
              
              
                                      </div>
                                    </div>                  
                                    <div class="container bg">
                                       <div id="checkupfield" style="display:none">
                                              <h3>Date of Visitations</h3>
                                              <div class="bg-dark col-9"></div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="visit-date">Date of Visit:</label>
                                                  <input type="date" id="visit-date" name="visit-date"><br>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="visit-time">Time of Visit:</label>
                                                  <input type="time" id="visit-time" name="visit-time"><br>
                                                </div>
                                              </div>
                                              <div class="form-row ">
                                                <label for="reason">Notes:</label>
                                                <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br>
                                              </div>
                                              <div class="form-group col-md-5">
                                                <label for="next-visit">Expected Date of Next Visit:</label>
                                                <input type="date" id="next-visit" name="next-visit"><br>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-3">
                                                  <button type="submit" class="btn btn-primary">Save</button><br>
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <button type="submit" class="btn btn-primary">Update</button><br>
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <button type="submit" class="btn btn-primary">Delete</button><br>
                                                </div>
                                                <div class="form-group col-md-3">
                                                  <button type="submit" class="btn btn-primary">Print</button><br>
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
        </div>        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
