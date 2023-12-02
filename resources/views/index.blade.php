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

        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container">
                <div class="row mb-5">
                    <!-- Card 1: Total Appointments -->
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Appointments</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center col-8">
                                        <h3 class="card-text"><b>{{ $appointmentCount }}</b></h3>
                                    </div>
                                    <img src="{{ asset('img/appointments.png') }}" alt="Admission" width="70" style="margin-left: 10px;">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Patients</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center col-8">
                                        <h3 class="card-text"><b>{{ $patientCount }}</b></h3>
                                    </div>
                                    <img src="{{ asset('img/total.png') }}" alt="Admission" width="70" style="margin-left: 10px;">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Patients</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center col-8">
                                        <h3 class="card-text"><b>{{ $activePatient }}</b></h3>
                                    </div>
                                    <img src="{{ asset('img/active.png') }}" alt="Admission" width="70" style="margin-left: 10px;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Chart 1: Clinic Bill Chart -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Clinic Bill Chart
                            </div>
                            <div class="card-body">
                                <canvas id="billChart" width="400" height="300"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Chart 2: Monthly Patient Count -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Monthly Patient Count
                            </div>
                            <div class="card-body">
                                <canvas id="patientCountChart" width="100%" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    INCOMING APPOINTMENTS
                </div>
                <div class="card-body">
                    <table>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Civil Status</th>
                                        <th>Appointments</th>
                                        <th>Actions</th>
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
                                            <a href="{{ route('admin.appointment.info', ['id' => $appointment->id]) }}" class="btn btn-primary">View Details</a>
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
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>


    <script>
        // Get the data from PHP
        var billsData = @json($monthlyBillAmounts);
        var monthlyCounts = @json($monthlyCounts);

        // Extract data for the Monthly Bill Amounts Chart
        var billDates = billsData.map(function(bill) {
            return bill.month; // Use the "month" property for bill data
        });
        var billAmounts = billsData.map(function(bill) {
            return bill.total;
        });

        // Extract data for the Monthly Patient Count Chart
        var labels = monthlyCounts.map(function(item) {
            return item.month;
        });
        var data = monthlyCounts.map(function(item) {
            return item.count;
        });

        // Create the Monthly Bill Amounts Chart
        var ctxBillChart = document.getElementById('billChart').getContext('2d');
        new Chart(ctxBillChart, {
            type: 'line',
            data: {
                labels: billDates,
                datasets: [{
                    label: 'Bill Amounts',
                    data: billAmounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Create the Monthly Patient Count Chart as before
        var ctxPatientCountChart = document.getElementById('patientCountChart').getContext('2d');
        new Chart(ctxPatientCountChart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Patient Count',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</body>

</html>