<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RecruitJobs extends Model
{  protected $table = 'recruit_jobs';
    use HasFactory;
    protected $fillable = [
        'id_job',
        'id_occupation',
        'work_date',
        'work_time',
        'work_time_start',
        'work_time_end',
        'break_time',
        'people',
        'applied_people',
        'salary_hour',
        'travel_fees',
        'dealine_day',
        'dealine_time',
        'status',
    ];
//    protected $primaryKey = 'id';
    public function job(){
         return $this->belongsTo(Occupation::class,'id_occupation','id');
    }
    public function occupdation(){
        return $this->belongsTo(Occupation::class,'id_occupation');
    }
}
