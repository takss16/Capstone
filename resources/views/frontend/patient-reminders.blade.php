<x-layout-portal>
    <main class="mw-100 col-11">
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            @if ($latestCheckUp)
                            <div class="card-header text-center d-flex align-items-center">
                                <i class="fa-solid fa-bell" style="font-size: 24px;"></i>
                                <h5 class="ms-2 mb-0">Reminders on your Previews Check-up</h5>
                            </div>

                            <div class="card-body">
                              <div class="mb-5">
                            <h5 class="ms-2 mb-0">Your Follow up Check-up will be on {{ \Carbon\Carbon::parse($latestCheckUp->next_visit)->format('F d, Y') }}</h5>
                            </div> 
                            <div class="mt-5"> 
                            <label for=""><b>Note From Midwife:</b></label>
                            <div class="col-12">                                 
                            <textarea id="reason" name="reason" value="" rows="4" class="form-control" readonly >{{$latestCheckUp->reason }}</textarea><br>
                                </div>
                            </div>
                            </div> 
                            @else
                            <p>No check-up records found.</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-portal>