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
            <form action="{{ route('searchPatients') }}" method="GET">
                <input type="text" name="query" placeholder="Search patients...">
                <button type="submit">Search</button>
            </form>

            @if($patients->isEmpty())
                <div class="col-md-12 mt-3">
                    <p>No records found.</p>
                </div>
            @else
            @foreach($patients as $patient)
                <div class="col-md-6 mt-3">
                <div class="card shadow-lg" style="background-color:#;" >
            <div class="card-header text-center">
                            <h2>
                                {{ $patient->firstname }}
                                {{ $patient->midlename }}
                                {{ $patient->lastname }}
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="fw-bold">Patient ID:</span> 
                                    {{ $patient->id }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="fw-bold">Age:</span> 
                                    {{ $patient->age }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="fw-bold">Birthday:</span> 
                                    {{ $patient->birthday }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <span class="fw-bold">Civil Status:</span> 
                                    {{ $patient->civilstatus }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="fw-bold">Address:</span> 
                                   {{ $patient->address }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="fw-bold">Contact:</span> 
                                    {{ $patient->contact }}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                    <a href="{{ route('maternalRecordForm', ['id' => $patient->id]) }}" class="btn btn-primary">Add Maternal Record</a>
                                        <a href="{{ route('child', $patient->id) }}" class="btn btn-primary">Child</a>
                                        <a href="{{ route('checkup', $patient->id) }}" class="btn btn-primary">Checkup</a>
                                        <a href="{{ route('addmit', $patient->id) }}" class="btn btn-primary">Admission</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         @endif
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
