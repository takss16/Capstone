<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

}
