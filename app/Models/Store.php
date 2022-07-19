<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'store_name',
        'store_name(kana)',
        'id_city',
        'id_district',
        'address',
        'station',
        'hp_url',
        'contact_name',
        'phone_number',
        'email',
        'id_company'
    ];
}
