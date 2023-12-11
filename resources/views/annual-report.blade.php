<x-layout>
    <main class="mw-100 col-11">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.monthly-report') }}">Month</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Year</a>
            </li>
        </ul>

        <div class="card shadow-lg border-0"> <!-- Add the border-0 class to remove the border -->
            <div class="card-header ">
                <div class="me-5 ms-5">
                    <hr>
                    <form method="get" action="{{ route('admin.annual-report') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-5">
                                <label for="year" class="form-label">Select Year</label>
                                <select name="year" id="year" class="form-select">
                                    @for ($y = $currentYear; $y >= $oldestYear; $y--)
                                    <option value="{{ $y }}" {{ $y == $filterYear ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6 mb-5">
                                <label for="month" class="form-label">Select Month</label>
                                <select name="month" id="month" class="form-select">
                                    <option value="" {{ empty($filterMonth) ? 'selected' : '' }}>All Months</option>
                                    @foreach (range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ $m == $filterMonth ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3 mb-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-3 mb-2">
                                <a href="{{ route('admin.annual-reports.print', ['year' => $filterYear, 'month' => $filterMonth]) }}" target="_blank" class="btn btn-success">Print</a>
                            </div>
                        </div>
                    </form>

                    <hr>
                    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Year</th>
                <th>Start Date</th>
                <th>Total Revenue</th>
                <th>Total Discounts</th>
                <th>Net Income</th>
                <th>Baby Count</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalRevenue = $totalDiscounts = $netIncome = $totalBabyCount = 0;
            @endphp

            @foreach($annualReports as $annualReport)
                @if(empty($filterMonth) || Carbon\Carbon::parse($annualReport['startDate'])->month == $filterMonth)
                    <tr>
                        <td>{{ $annualReport['month'] }}</td>
                        <td>{{ $annualReport['year'] }}</td>
                        <td>{{ $annualReport['startDate']->format('Y-m-d') }}</td>
                        <td>₱{{ number_format($annualReport['totalRevenue'], 2) }}</td>
                        <td>₱{{ number_format($annualReport['totalDiscounts'], 2) }}</td>
                        <td>₱{{ number_format($annualReport['netIncome'], 2) }}</td>
                        <td>{{ $annualReport['babyCount'] }}</td>
                    </tr>

                    @php
                        $totalRevenue += $annualReport['totalRevenue'];
                        $totalDiscounts += $annualReport['totalDiscounts'];
                        $netIncome += $annualReport['netIncome'];
                        $totalBabyCount += $annualReport['babyCount'];
                    @endphp
                @endif
            @endforeach

            <tr>
                <td colspan="3">Totals</td>
                <td>₱{{ number_format($totalRevenue, 2) }}</td>
                <td>₱{{ number_format($totalDiscounts, 2) }}</td>
                <td>₱{{ number_format($netIncome, 2) }}</td>
                <td>{{ $totalBabyCount }}</td>
            </tr>
        </tbody>
    </table>
</div>


                </div>
            </div>
    </main>
</x-layout>