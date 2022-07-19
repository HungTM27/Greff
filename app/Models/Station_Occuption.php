<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station_Occuption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='station_occupation';
    protected $fillable = [
        'name',
        'id_occupation',
    ];
}
