<?php
namespace App\Services;

use App\Models\myclass;
use Illuminate\Support\Facades\DB;

class ClassService
{
    /**
     * 批量创建班级
     *
     * @param int $schoolId
     * @param int $classCount 要创建的班级数量
     * @return void
     */
    public static function createClasses(int $schoolId, int $classCount = 6)
    {
        // 准备班级数据
        $classes = [];

        for ($i = 1; $i <= $classCount; $i++) {
            $classes[] = [
                'name' => '班级 ' . $i,
                'school_id' => $schoolId,
                'course_id' => 1, // 假设所有班级的课程ID是 1
                'teacher_id' => 1, // 假设所有班级的教师ID是 1
                'capacity' => 30, // 假设每个班级的容量为 30
                'start_data' => now(),
                'end_data' => now()->addMonths(6),
            ];
        }

        myclass::insert($classes); // 批量插入班级数据

    }
}
