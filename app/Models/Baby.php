<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{

    protected $fillable = [
        'patient_id_baby',
        'babyLastName',
        'babyGivenName',
        'babyMiddleName',
        'babyAddress',
        'babyDOB',
        'babyTOB',
        'babyAge',
        'babyGender',
        'babyNationality',
        'phic',
        'fatherLastName',
        'fatherFirstName',
        'fatherMiddleName',
        // Add other fillable attributes for babies here
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id_baby');
    }

    // Add other relationships or methods related to babies if needed
}


