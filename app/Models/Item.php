<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'type'];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
    
}
