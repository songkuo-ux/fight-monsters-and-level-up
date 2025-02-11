<?php

namespace App\Http\Controllers;

use App\Events\SchoolCreated;
use App\Exceptions\APIHttpException;
use App\Models\School;
use App\Services\ClassService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * 创建学校
 */
class SchoolController extends Controller
{
    /**
     * 创建一个学校，并且在class表中自动初始化该学校的1-6年级
     */
    public function create_school(Request $request)
    {
        // 验证请求数据
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // 查看学校名字是否存在
        $exist = School::query()
            ->where('name', $validated['name'])
            ->exists();
        //如果学校名称已经存在，返回异常信息
        if ($exist) {
            throw new APIHttpException('学校已经存在');
        }

        // 如果学校名称不存在，则创建一个新的学校对象
        $school = new School([
            'name' => $validated['name'],
        ]);
        // 保存到数据库
        $school->save();

        // 批量建立6个班级
        ClassService::autoCreateClasses($school->id);
        event(new SchoolCreated($school->id, 6));

        // 返回响应
        return response()->json([
            'message' => '学校创建成功,并且自动生成了1-6年级',
            'school_id' => $school->id,
        ]);
    }
}
