<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class filterController extends Controller
{
    public function getData(Request $request)
{
    $startDate = $request->input('start');
    $endDate = $request->input('end');

    $query = ActivityLog::query();

    if ($startDate && $endDate) {
        $query->whereBetween('created_at_date', [$startDate, $endDate]);
    }

    $activityLogs = $query->get();

    
        return view('Activitylogs',  ['activityLogs' => $activityLogs]);
    }



    
    public function Otherlogs(Request $request)
    {
        $startDate = $request->input('start');
        $endDate = $request->input('end');
    
        $query = ActivityLog::with(['user', 'patient'])
            ->whereNull('patient_id');
    
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $logsWithNullPatientId = $query->orderBy('created_at', 'desc')->get();
    
        return view('Otherlogs', [
            'logsWithNullPatientId' => $logsWithNullPatientId,
        ]);
    }
    

    
    
}
