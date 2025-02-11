<?php

namespace App\Http\Controllers;

use App\Http\Requests\myrequest;
use App\Models\ClassModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Exceptions\APIHttpException;

class OrgClassController extends Controller
{
    /**
     * @param myrequest $request
     * @return JsonResponse
     * 作用：创建教室
     */
    public function create_class(myrequest $request): JsonResponse
    {
        // 查看查询的班级是否存在
        $name = $request->input('name');
        $is_exist = ClassModel::checkByName($name);
        if (!$is_exist) {
            return api_response(200, [], 'already exist');
        }

        // 创建并保存班级
        $class = new ClassModel([
            'name' => $request['name'], // 设置班级名称
            'course_id' => $request['course_id'], // 设置课程 ID
            'teacher_id' => $request['teacher_id'], // 设置教师 ID
            'capacity' => $request['capacity'], // 设置班级容量
            'start_data' => $request['start_data'], // 设置开始日期
            'end_data' => $request['end_data'], // 设置结束日期
            'school_id' => $request['school_id'], // 设置学校id
        ]);
        // 保存到数据库
        $class->save();

        // 返回响应
        return api_response(200, $class);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws APIHttpException
     * 作用：查看该学校的所有的班级
     */
    public function selectSchool(Request $request): JsonResponse
    {
        // 调用model的方法查询班级信息
        $data = ClassModel::getClassBySchoolId();

        // 如果信息为空，返回异常
        if (!$data) {
            throw new APIHttpException('学校id错误');
        }

        return api_response(200, $data);
    }
}
