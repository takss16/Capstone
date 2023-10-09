<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pabustan Birthing Clinic-</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 
        <link href="{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <link href="assets/img/logo.png" rel="icon">
        <!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->
    </head>
    <body class="sb-nav-fixed">
        @include('navbar')
       
            </div>
            <div id="layoutSidenav_content">
                <!-- <main> -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart 
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart 
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                INCOMING APPOINTMENTS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <div class="card-body">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Civil Status</th>
                                    <th>Start Date</th>
                                    <th>Action</th> <!-- Add a new column for the button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                                    <td>{{ $appointment->age }}</td>
                                    <td>{{ $appointment->address }}</td>
                                    <td>{{ $appointment->civil_status }}</td>
                                    <td>
                                        @if ($appointment->dateTimeReasons->count() > 0)
                                        @foreach ($appointment->dateTimeReasons as $dateTimeReason)
                                        {{ date('Y-m-d', strtotime($dateTimeReason->appointment_date)) }}<br>
                                        @endforeach
                                        @else
                                        No appointments
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Add a button that links to the appointment details page -->
                                        <a href="{{ route('appointment.info', ['id' => $appointment->id]) }}" class="btn btn-primary">View Details</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
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
        <!-- <script src="js/scripts.js"></script> -->
        <link href="{{asset('js/app.js')}}" rel="stylesheet">
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/datatables-simple-demo.js"></script> -->
    </body>
</html>
