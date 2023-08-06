<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternalRecord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id_maternal',
        'medical_history',
        'lmp',
        'edc',
        'aog',
        'fht',
        'pres',
        'st',
        'effacement',
        'cervical_dilatation',
        'bp',
        'bow',
        'color',
        'time_rupture',
        'condition',
        'gravidity',
        'parity'
        // Add other fillable attributes for maternal records here
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id_maternal');
    }
}
