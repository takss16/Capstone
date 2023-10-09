<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['patient_id', 'total_amount', 'subtotal', 'total_discount'];

    public function billItems()
    {
        return $this->hasMany(BillItem::class);
    }
    
    public function billPackages()
    {
        return $this->hasMany(BillPackage::class);
    }
}
