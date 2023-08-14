<x-layout>
    <main class="mw-100 col-11">
        <div class="container bg">
            <div>
                
                <div class="bg-dark col-9 mt-3"></div>
                
                <div class="text-center mt-3">
                    <h3>Admission</h3>
                </div>    
                      <hr>
                      <div class="col-md-4 mt-4">
                                <span class="fw-bold">Full Name:</span> {{ $patient->firstname }} {{ $patient->midlename }} {{ $patient->lastname }}
                            </div>
                   
                    <div class="row mb-2 mt-2">
                        <div class="col">
                            <span class="fw-bold">Birthday:</span>  {{ $patient->birthday }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Civil Status:</span>  {{ $patient->civilstatus }}
                        </div>
                        <div class="col">
                            <span class="fw-bold">Age:</span>  {{ $patient->age }}
                        </div>
                    </div>
                    <hr>

            </div>
        </div>
    </main>
</x-layout>




