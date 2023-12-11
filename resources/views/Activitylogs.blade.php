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

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Choose Date Range</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="get" action="{{ route('admin.filter') }}">
                    <div class="modal-body">
        <div class="mb-3">
            <label for="FilterDateFrom" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="FilterDateFrom" name="start" value="{{ request('start') ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="FilterDateTo" class="form-label">End Date</label>
            <input type="date" class="form-control" id="FilterDateTo" name="end" value="{{ request('end') ?? '' }}">
        </div>
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
                <a class="nav-link active" id="log-tab" data-bs-toggle="tab" href="#log-content" role="tab" aria-controls="log-content" aria-selected="true">Record Logs</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="another-tab"  href="{{ route('admin.Other-logs') }}">Other Logs</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="log-content" role="tabpanel" aria-labelledby="log-tab">
                <div class="col-12 text-center">
                    <div class="card-body">
                        <table style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #000;">User</th>
                                    <th style="border: 1px solid #000;">Action</th>
                                    <th style="border: 1px solid #000;">Patient</th>
                                    <th style="border: 1px solid #000; width: 20%;">Action Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activityLogs as $log)
                                <tr>
                                    <td style="border: 1px solid #000;">{{ $log->user->name }}</td>
                                    <td style="border: 1px solid #000;">{{ $log->action }}</td>
                                    @if ($log->patient)
                                    <td style="border: 1px solid #000;">
                                        {{ $log->patient->firstname }}
                                        @if ($log->patient->midlename)
                                        {{ $log->patient->midlename }}
                                        @endif
                                        {{ $log->patient->lastname }}
                                    </td>
                                    <td style="border: 1px solid #000;">{{ $log->created_at->format('F j, Y g:ia') }}</td>
                                    @else
                                    <td style="border: 1px solid #000;">N/A</td>
                                    <td style="border: 1px solid #000;">N/A</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
        </div>
    </main>
</x-layout>