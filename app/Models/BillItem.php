<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    protected $fillable = ['bill_id', 'item_id', 'quantity', 'price'];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
