<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    use HasFactory;

    public function patients()
{
    $patients = Patient::all();

    return view('records', compact('patients'));
    return view('create', compact('creates'));
}

}

