<x-layout>
    <main class="mw-100 col-11">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Month</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.annual-report') }}">Year</a>
            </li>
        </ul>
        <div class="card shadow-lg border-0"> <!-- Add the border-0 class to remove the border -->
            <div class="card-header ">
                <div class="me-5 ms-5">
                    <h1>Monthly Report - {{ $startDate->format('F') }} {{ $year }}</h1>



                    <p>Total Revenue: ₱{{ number_format($totalRevenue, 2) }}</p>
                    <p>Philhealth Discounts: ₱{{ number_format($totalDiscounts, 2) }}</p>
                    <p>Net Income: ₱{{ number_format($netIncome, 2) }}</p>
                    <p>Total Birth: {{ $babyCount }}</p>
                </div>
            </div>
        </div>
    </main>
</x-layout>