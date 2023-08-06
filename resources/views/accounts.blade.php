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
    @include('navbar')

    </div>
            <div id="layoutSidenav_content">
                <!-- <main> -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Patient's Account</h1>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                        </ol>
                   

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
                                          <th>Username</th>
                                          <th>Password</th>
                                          <!-- <th>Civil Status</th> -->
                                          <!-- <th>Address</th> -->
                                          <!-- <th>Birthday</th>
                                          <th>Contact</th>
                                          <th>Civil Status</th> -->
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($patientsWithAccounts as $patient)
                                                <tr>
                                                <td>{{ $patient->id }}</td>
                                                    <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                                                    <td>{{ optional($patient->account)->username }}</td>
                                                    <td>{{ optional($patient->account)->password }}</td>
                                                    <td>
                                                    <button onclick="resetForm()" class="reset-button"><i class="fas fa-undo"></i> Reset</button>
                                                    </td>
                                                </tr>
                                 @endforeach
                                      <!-- Add more rows as needed -->
                                  </tbody>
                              </table>

                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
