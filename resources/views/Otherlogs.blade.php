<x-layout>
    <main class="mw-100 col-11">
        <div class="d-flex justify-content-end">
            <label for="srchmdl" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="fa-solid fa-filter"></i>
            </label>
        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Choose Date Range</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="get" action="{{ route('admin.otherfilter') }}" onsubmit="return validateDateRange()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="FilterDateFrom" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="FilterDateFrom" name="start" value="{{ request('start') ?? '' }}" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="FilterDateTo" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="FilterDateTo" name="end" value="{{ request('end') ?? '' }}" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>

                        <div id="dateRangeError" class="text-danger"></div>

                        <!-- JavaScript for Date Validation -->
                        <script>
                            function validateDateRange() {
                                var startDate = document.getElementById('FilterDateFrom').value;
                                var endDate = document.getElementById('FilterDateTo').value;
                                var dateRangeError = document.getElementById('dateRangeError');

                                if (startDate > endDate) {
                                    dateRangeError.innerHTML = "End date cannot be earlier than the start date";
                                    return false; // Prevent form submission
                                } else {
                                    dateRangeError.innerHTML = ""; // Clear previous error message
                                }

                                return true; // Allow form submission
                            }
                        </script>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Go</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="log-tab" href="{{ route('admin.activity-logs') }}">Record Logs</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="another-tab">Other Logs</a>
            </li>
        </ul>
        <div class="col-12 text-center">
            <div class="card-body">
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #000;">User</th>
                            <th style="border: 1px solid #000;">Action</th>
                            <th style="border: 1px solid #000;">Action Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logsWithNullPatientId as $log)
                        <tr>
                            <td style="border: 1px solid #000;">{{ optional($log->user)->name }}</td>
                            <td style="border: 1px solid #000;">{{ $log->action }}</td>
                            <td style="border: 1px solid #000;">{{ $log->created_at->format('F j, Y g:ia') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</x-layout>