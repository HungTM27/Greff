<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Occuption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='image_occupation';
    protected $fillable = [
        'name',
        'path',
        'id_occupation',
    ];
    protected $primaryKey = 'id';
}
