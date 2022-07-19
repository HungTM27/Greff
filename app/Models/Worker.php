<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'furigana_first_name',
        'furigana_last_name',
        'email',
        'password',
        'phone',
        'work_region',
        'push_notification',
        'status',
        'avatar',
        'birth_day',
        'birth_month',
        'birth_year',
        'gender'
    ];
//    use Notifiable;
    public static function hash($current_password){
        return bcrypt($current_password);
    }
}
