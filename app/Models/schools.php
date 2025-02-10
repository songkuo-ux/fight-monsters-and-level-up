<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
    use HasFactory;

    // 定义数据库表名
    protected $table = 'schools';

    // 如果你的表没有时间戳字段 (created_at 和 updated_at)，则可以关闭
    public $timestamps = false; // 默认为 true，如果没有时间戳字段则设置为 false

    // 定义可批量赋值的字段
    protected $fillable = [
        'name',          // 学校名称
        'id',     // 学校id
    ];
}
