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
    ];

    public function account()
    {
        return $this->hasOne(Account::class);
    }
    public function maternalRecord()
    {
        return $this->hasOne(MaternalRecord::class, 'patient_id_maternal');
    }
    public function babies()
    {
        return $this->hasOne(Baby::class, 'patient_id_baby');
    }
}

