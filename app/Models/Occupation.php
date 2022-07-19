<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='occupation';
    protected $fillable = [
        'id',
        'title',
        'description',
        'work_address',
        'access_address',
        'id_job_category',
        'note',
        'bring_item',
        'status',
    ];
    protected $primaryKey = 'id';
    public function images(){
        return $this->hasMany(Image_Occuption::Class);
    }
    public function getContentWith3Dots($string,$sl){
        if(strlen($string)>$sl){
            $string = substr($string,0,$sl);
            $string = $string." ...";
        }
        return $string;
    }
}
