<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // 定义数据库表名
    protected $table = 'class';

    // 如果你的表没有时间戳字段 (created_at 和 updated_at)，则可以关闭
    public $timestamps = true; // 默认为 true，如果没有时间戳字段则设置为 false

    // 定义可批量赋值的字段
    protected $fillable = [
        'name',          // 班级名称
        'course_id',     // 课程ID
        'school_id',     // 学校ID
        'room_id',       // 教室ID
        'teacher_id',    // 教师ID
        'capacity',      // 容纳人数
    ];

    /**
     * @param $id
     * @return array
     * 函数作用：select * from class where school_id = $id，以array形式返回。
     */
    public static function getClassBySchoolId(int $id = 17): array
    {
        $data = [];
        $items = self::query()
            ->where('school_id', $id)
            ->get();
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }
        return $data;
    }

    /**
     * @param $name
     * @return bool
     * 作用：判断查找班级是否存在
     */
    public static function checkByName($name): bool
    {
        $item = self::query()
            ->where('name', $name)->exists();
        if ($item) {
            return false;
        } else {
            return true;
        }
    }
}
