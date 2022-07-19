<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillRequiredOccupation extends Model
{

    protected $table = 'skill_required_occupation';
    use HasFactory;
    protected $fillable = [
        'id',
        'text',
        'id_occupation',

    ];
    protected $primaryKey = 'id';
}
