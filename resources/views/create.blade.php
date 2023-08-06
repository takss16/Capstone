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
                     <div class="container text-center col-md-12 ">  
                     <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="container text-center col-md-12">
                            <div class="h1">Patient Record</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="lastName" class="form-label">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" name="lastname">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firstName" class="form-label">First Name:</label>
                                            <input type="text" class="form-control" id="firstName" name="firstname">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="middleName" class="form-label">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" name="midlename">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" class="form-control" id="age" name="age">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday" class="form-label">Birthday:</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="civilStatus" class="form-label">Civil Status:</label>
                                            <select class="form-select" id="civilStatus" name="civilstatus" required onchange="showSpouse()">
                                                <option value="">-- Select --</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact" class="form-label">Contact:</label>
                                            <input type="text" class="form-control" id="contact" name="contact">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="address" class="form-label">Address:</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-3 mb-3">
                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                              <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Patients
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                  <thead>
                                      <tr>
                                         
                                          <th>Patient ID</th>
                                          <th>Name</th>
                                          <th>Age</th>
                                          <!-- <th>Civil Status</th> -->
                                          <!-- <th>Address</th> -->
                                          <th>Birthday</th>
                                          <th>Contact</th>
                                          <th>Civil Status</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($patients as $patient)
                                      <tr>
                                      <td>{{ $patient->id }}</td>
                                          <td>
                                              {{ $patient->firstname }}
                                              {{ $patient->midlename }}
                                              {{ $patient->lastname }}
                                          </td>
                                          <td>{{ $patient->age }}</td>
                                          <!-- <td>{{ $patient->civilstatus }}</td>
                                          <td>{{ $patient->address }}</td> -->
                                          <td>{{ $patient->birthday }}</td>
                                          <td>{{ $patient->contact }}</td>
                                          <td>{{ $patient->civilstatus }}</td>
                                         
                                          
                                          <td>
                                          <a href="{{ route('edit', ['id' => $patient->id]) }}" class="btn btn-primary edit">
                                            <i class="fa-regular fa-pen-to-square">edit</i>
                                            </a>
                                            
                                            <!-- data-bs-tog" -->

                                            <a href="{{ route('delete', ['id' => $patient->id]) }}" class="btn btn-danger delete" >
                                            <i class="fa-solid fa-trash">delete</i>
                                            </a>

                                          </td>
                                      </tr>
                                      @endforeach
                                      <!-- Add more rows as needed -->
                                  </tbody>
                              </table>

                            </div>
                        </div>
                            </div>
                          
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
