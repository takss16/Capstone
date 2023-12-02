<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $table = 'team_members'; // Specify the table name

    protected $fillable = ['name', 'degrees', 'position', 'image_url'];
}
