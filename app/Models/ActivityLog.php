<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log'; // Specify the table name

    protected $fillable = [
        'user_id',
        'action',
        'patient_id',
    ];
    public function user()
    {
        return $this->belongsTo(AdminUsers::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
