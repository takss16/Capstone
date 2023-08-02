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
}

