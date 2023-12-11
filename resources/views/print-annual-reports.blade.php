<x-layout-print>
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
</x-layout-print>