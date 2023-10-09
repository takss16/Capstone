<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'case_number',
        'admission_date',
        'discharge_date',
        'admission_diagnosis',
        'services_performed',
        'final_diagnosis',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
