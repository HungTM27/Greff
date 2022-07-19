<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'level'
    ];
    public static function showStation($stations, $parent_id = 0, $char = '')
    {
        foreach ($stations as $key => $item)
        {
            if ($item['parent_id'] == $parent_id)
            {
                echo $char.'<option value="'.$item->id.'" checked>'.$char.$item->name.'</option>';
                unset($stations[$key]);
                self::showStation($stations, $item->id, $char.'&emsp;');
            }
        }
    }

}
