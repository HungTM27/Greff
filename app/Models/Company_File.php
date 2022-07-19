<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_File extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'id_company'
    ];
}
