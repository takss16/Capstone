<x-layout>
    <main class="mw-100 col-11">
  
  
        <a href="{{ route('records') }}" class="btn btn-primary"><i class="fa-solid fa-circle-chevron-left"></i> Back</a>
  
    <div class="col-md-12 mt-2">
        <div class="card shadow-lg border-0"> <!-- Add the border-0 class to remove the border -->
            <div class="card-header text-center">
                <div class="me-5 ms-5">
                    <section class="patient-action-icons mt-4 mb-4">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('checkup', $patient->id) }}" class="text-decoration-none">
                                <img src="{{ asset('img/checkup.png') }}" alt="Checkup" width="50">
                                <p class="icon-label"><b>Checkup</b></p>
                            </a>
                            <a href="{{ route('maternal', ['id' => $patient->id]) }}" class="text-decoration-none">
                                <img src="{{ asset('img/maternal.png') }}" alt="Maternal" width="50">
                                <p class="icon-label"><b>Maternal</b></p>
                            </a>
                            <a href="{{ route('addmit', $patient->id) }}" class="text-decoration-none">
                                <img src="{{ asset('img/admit.png') }}" alt="Admission" width="50">
                                <p class="icon-label"><b>Admission</b></p>
                            </a>
                            <a href="{{ route('child', $patient->id) }}" class="text-decoration-none">
                                <img src="{{ asset('img/child.png') }}" alt="Birth" width="50">
                                <p class="icon-label"><b>Birth</b></p>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


        <div class="col-12 mt-3">
            <div class="card shadow-lg col-12">
               
                <div class="card-body">
                    <section class="patient-info-section mb-4">
                        <h5 class="section-title">Personal Information</h5>
                        <h6 class="mt-3 mb-3">
                        {{ $patient->firstname }}
                        {{ $patient->midlename }}
                        {{ $patient->lastname }}
                    </h6>
                    <div class="row">
                            <div class="col-md-3">
                                <p class="info-label">Patient ID</p>
                                <p><b>{{ $patient->id }}</b></p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Age</p>
                                <p><b>{{ $patient->age }}</b></p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Birthday</p>
                                <p><b>{{ $patient->birthday }}</b></p>
                            </div>
                            <div class="col-md-3">
                                <p class="info-label">Civil Status</p>
                                <p><b>{{ $patient->civilstatus }}</b></p>
                            </div>
                        </div>


                    </section>
                    <section class="patient-info-section mb-4">
                        <h6 class="section-title">Contact Information</h6>
                        <div class="row">
                            <div class="col">
                                <p class="info-label">Address</p>
                                <p><b>{{ $patient->address }}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="info-label">Contact</p>
                                <p><b>{{ $patient->contact }}</b></p>
                            </div>
                        </div>
                    </section>
                   
                    
                </div>
            </div>
        </div>
    </main>
</x-layout>
