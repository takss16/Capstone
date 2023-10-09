<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillPackage extends Model
{
    protected $fillable = ['bill_id', 'package_id'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
}
