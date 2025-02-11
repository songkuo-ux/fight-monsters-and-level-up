<?php

namespace App\Services;

use App\Models\ClassModel;
use App\Models\myclass;

class ClassService
{
    /**
     *
     * @param int $schoolId
     * @param int $classCount 要创建的班级数量
     * @return void
     * 作用：创建学校时，自动创建1-6年级
     */
    public static function autoCreateClasses(int $schoolId, int $classCount = 6): void
    {

        for ($i = 1; $i <= $classCount; $i++) {
            $class = new ClassModel([
                'name' => '班级 ' . $i,
                'school_id' => $schoolId,
                'course_id' => 0, // 假设所有班级的默认课程ID是 0
                'teacher_id' => 0, // 假设所有班级的默认教师ID是 0
                'capacity' => 30, // 假设每个班级的默认容量为 30
                'start_data' => now(),
                'end_data' => now()->addMonths(6),
            ]);
            $class->save();
        }
    }
}
