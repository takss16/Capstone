<?php

namespace App\Http\Controllers;

use App\Models\Baby;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function generateMonthlyReport()
    {
        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Calculate the start and end dates of the current month
        $startDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->endOfMonth();

        // Retrieve bills for the current month
        $bills = Bill::whereBetween('created_at', [$startDate, $endDate])->get();

        // Retrieve baby data for the current month
        $babyData = Baby::whereBetween('created_at', [$startDate, $endDate])->get();

        // Calculate total revenue, expenses, and net income
        $totalRevenue = $bills->sum('total_amount');
        $totalDiscounts = $bills->sum('total_discount');
        $netIncome = $totalRevenue - $totalDiscounts;
        $babyCount = $babyData->count();

        return view('monthly-report', [
            'month' => $currentMonth,
            'year' => $currentYear,
            'startDate' => $startDate,
            'totalRevenue' => $totalRevenue,
            'totalDiscounts' => $totalDiscounts,
            'netIncome' => $netIncome,
            'babyCount' => $babyCount,
        ]);
    }
    public function generateAnnualReports(Request $request)
    {
        // Get the current year and define the oldest year
        $currentYear = Carbon::now()->year;
        $oldestYear = 2020; // Define the oldest year as needed
    
        // Retrieve query parameters for filtering
        $filterYear = $request->input('year', $currentYear);
        $filterMonth = $request->input('month', null);
    
      
        // Annual report data
        $annualReports = [];
    
        // Loop through each month of the specified year
        for ($month = 1; $month <= 12; $month++) {
            // Calculate the start and end dates of the current month
            $startDate = Carbon::createFromDate($filterYear, $month, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($filterYear, $month, 1)->endOfMonth();
        
            // Retrieve bills for the current month
            $bills = Bill::whereBetween('created_at', [$startDate, $endDate])->get();
        
            // Check if there are bills for the current month
            if ($bills->count() > 0) {
                // Retrieve baby data for the current month
                $babyData = Baby::whereBetween('created_at', [$startDate, $endDate])->get();
        
                // Calculate total revenue, expenses, and net income for the current month
                $totalRevenue = $bills->sum('total_amount');
                $totalDiscounts = $bills->sum('total_discount');
                $netIncome = $totalRevenue - $totalDiscounts;
                $babyCount = $babyData->count();
        
                // Store the annual report data in an array
                $annualReports[] = [
                    'month' => date('F', mktime(0, 0, 0, $month, 1)),
                    'year' => $filterYear,
                    'startDate' => $startDate,
                    'totalRevenue' => $totalRevenue,
                    'totalDiscounts' => $totalDiscounts,
                    'netIncome' => $netIncome,
                    'babyCount' => $babyCount,
                ];
            }
        }
    
        // Pass filterMonth to the view
        return view('annual-report', [
            'annualReports' => $annualReports,
            'filterYear' => $filterYear,
            'filterMonth' => $filterMonth,
            'currentYear' => $currentYear,
            'oldestYear' => $oldestYear,
        ])->with(['filterMonth' => $filterMonth]); // Add this line
    }
    // AnnualReportController.php

public function printReports(Request $request)
{
    $currentYear = Carbon::now()->year;
    $oldestYear = 2020; // Define the oldest year as needed

    // Retrieve query parameters for filtering
    $filterYear = $request->input('year', $currentYear);
    $filterMonth = $request->input('month', null);

  
    // Annual report data
    $annualReports = [];

    // Loop through each month of the specified year
    for ($month = 1; $month <= 12; $month++) {
        // Calculate the start and end dates of the current month
        $startDate = Carbon::createFromDate($filterYear, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($filterYear, $month, 1)->endOfMonth();
    
        // Retrieve bills for the current month
        $bills = Bill::whereBetween('created_at', [$startDate, $endDate])->get();
    
        // Check if there are bills for the current month
        if ($bills->count() > 0) {
            // Retrieve baby data for the current month
            $babyData = Baby::whereBetween('created_at', [$startDate, $endDate])->get();
    
            // Calculate total revenue, expenses, and net income for the current month
            $totalRevenue = $bills->sum('total_amount');
            $totalDiscounts = $bills->sum('total_discount');
            $netIncome = $totalRevenue - $totalDiscounts;
            $babyCount = $babyData->count();
    
            // Store the annual report data in an array
            $annualReports[] = [
                'month' => date('F', mktime(0, 0, 0, $month, 1)),
                'year' => $filterYear,
                'startDate' => $startDate,
                'totalRevenue' => $totalRevenue,
                'totalDiscounts' => $totalDiscounts,
                'netIncome' => $netIncome,
                'babyCount' => $babyCount,
            ];
        }
    }

    // Pass filterMonth to the view
    return view('print-annual-reports', [
        'annualReports' => $annualReports,
        'filterYear' => $filterYear,
        'filterMonth' => $filterMonth,
        'currentYear' => $currentYear,
        'oldestYear' => $oldestYear,
    ])->with(['filterMonth' => $filterMonth]); // Add this line
}


    

}
