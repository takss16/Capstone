<x-layout>
    <main class="mw-100 col-11">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="log-tab" data-bs-toggle="tab" href="#log-content" role="tab" aria-controls="log-content" aria-selected="true">Record Logs</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="another-tab" data-bs-toggle="tab" href="#another-content" role="tab" aria-controls="another-content" aria-selected="false">Other Logs</a>
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
                                    <td style="border: 1px solid #000;">{{ $log->patient->created_at->format('F j, Y g:ia') }}</td>
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
            <div class="tab-pane fade" id="another-content" role="tabpanel" aria-labelledby="another-tab">
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
                                    <td style="border: 1px solid #000;">{{ $log->user->name }}</td>
                                    <td style="border: 1px solid #000;">{{ $log->action }}</td>
                                    <td style="border: 1px solid #000;">{{ $log->created_at->format('F j, Y g:ia') }}</td>
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