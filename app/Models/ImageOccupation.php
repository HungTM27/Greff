<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageOccupation extends Model
{
    protected $table = 'image_occupation';
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'path',
        'id_occupation',

    ];
    protected $primaryKey = 'id';
}
