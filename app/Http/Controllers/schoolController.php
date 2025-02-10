<?php

namespace App\Http\Controllers;

use App\Events\SchoolCreated;
use App\Exceptions\APIHttpException;
use App\Models\schools;
use App\Services\ClassService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class schoolController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        // 验证请求数据
        $validated = $request->validate([
            'name' => 'required|string|max:255',
//            'id' => 'required|integer',
        ]);
        $exist = schools::query()->where('name', $validated['name'])->exists();
        if ($exist) {
            throw new APIHttpException('学校已经存在');
        }
        // 创建一个新的班级对象
        $school = new schools();
        $school->name = $validated['name']; // 设置班级名称

        // 保存到数据库
        $school->save();
        // 批量建立6个班级
        ClassService::createClasses($school->id);
        event(new SchoolCreated($school->id, 6));
        // 返回响应
        return response()->json([
            'message' => '学校创建成功,并且自动生成了1-6年级',
            'school_id' => $school->id,
        ]);
    }
}
