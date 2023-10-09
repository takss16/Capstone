<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'midlename',
        'age',
        'birthday',
        'civilstatus',
        'contact',
        'address',
        'philhealth_beneficiary',
    ];

    protected $casts = [
        'philhealth_beneficiary' => 'boolean',
    ];

    public function account()
    {
        return $this->hasOne(Account::class);
    }
    public function maternalRecords()
    {
        return $this->hasMany(MaternalRecord::class, 'patient_id_maternal');
    }
    public function babies()
    {
        return $this->hasMany(Baby::class, 'patient_id_baby');
    }
    public function checkups()
    {
        return $this->hasMany(CheckUp::class, 'patient_id_checkup');
    }
    public function admissions()
    {
        return $this->hasMany(Admission::class, 'patient_id_addmit');
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    

}

