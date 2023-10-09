<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateTimeReasons extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'reason',
        'appointment_patient_id', // Keep this for association with AppointmentPatient
    ];

    // Define the relationship to appointment_patient
    public function appointmentPatient()
    {
        return $this->belongsTo(AppointmentPatient::class, 'appointment_patient_id');
    }
}



