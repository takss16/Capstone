<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentPatient extends Model
{
    use HasFactory;

    protected $table = 'appointment_patient';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birthday',
        'age',
        'civil_status',
        'contact',
        'address',
        'philhealth_beneficiary',
    ];

    protected $casts = [
        'philhealth_beneficiary' => 'boolean',
    ];

    // Enable cascading deletes for this model
    protected $cascadeDeletes = true;

    public function dateTimeReasons()
    {
        return $this->hasMany(DateTimeReasons::class, 'appointment_patient_id');
    }
}

