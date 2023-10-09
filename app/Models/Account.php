<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Account extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'accounts';

    protected $fillable = [
        'username',
        'password',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
