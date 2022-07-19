<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'career_name',
        'describe',
        'parent_id'
    ];
    public static function showCategories($jobcategory, $parent_id = 0, $char = '')
    {
        foreach ($jobcategory as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id)
            {
                echo '<option value="'.$item->id.'">'.$char.$item->career_name.'</option>';
                unset($jobcategory[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showCategories($jobcategory, $item->id, $char.'&nbsp&nbsp&nbsp&nbsp');
            }
        }
    }
}
