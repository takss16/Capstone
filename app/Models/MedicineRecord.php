<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineRecord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'check_up_id',
        'medicine_name',
        'dosage',
        'frequency'
    ];
    public function checkUp()
    {
        return $this->belongsTo(CheckUp::class);
    }
}
