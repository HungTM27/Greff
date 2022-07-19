<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected  $table = 'companies';
    protected $fillable = [
        'status',
        'company_name',
        'company_name(kana)',
        'registed_name',
        'registed_name(kana)',
        'id_city',
        'id_district',
        'room',
        'building',
        'zipcode',
        'hp_url',
        'area',
        'career',
        'contact_name',
        'phone_number',
        'email',
        'other',
        'note',
    ];

    public static function getData(){
        $records = Company::all()->toArray();
        return $records;
    }
}
