<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id_checkup',
        'visit_date',
        'visit_time',
        'reason',
        'next_visit',
    ];

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id_checkup');
    }
    public function medicineRecords()
    {
        return $this->hasMany(MedicineRecord::class);
    }
}
