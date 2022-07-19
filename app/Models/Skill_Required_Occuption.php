<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_Required_Occuption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='skill_required_occupation';
    protected $fillable = [
        'text',
        'id_occupation',
    ];
}
