<?php

namespace App\Http\Controllers;

use App\Http\Requests\myrequest;
use App\Models\myclass;
use App\Models\schools;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Exceptions\APIHttpException;

class OrgClassController extends Controller
{
    public function create(myrequest $request)
    {
        if(!myclass::checkByName($request->input('name'))){
            return api_response(200,[],'already exist');
        }
        $class = new myclass();
        $class->name = $request['name']; // 设置班级名称
        $class->course_id = $request['course_id']; // 设置课程 ID
        $class->teacher_id = $request['teacher_id']; // 设置教师 ID
        $class->capacity = $request['capacity']; // 设置班级容量
        $class->start_data = $request['start_data']; // 设置开始日期
        $class->end_data = $request['end_data']; // 设置结束日期
        $class->school_id = $request['school_id']; // 设置学校id
        // 保存到数据库
        $class->save();
        // 返回响应
        return api_response(200,$class);

    }
    public function selectSchool(Request $request){
//        $cachedUser = Redis::get('school_' . $request['id']); // 获取缓存数据
//
//if ($cachedUser) {
//    // 如果 Redis 中有数据，直接返回缓存数据
//    $data = json_decode($cachedUser, true);
//} else {
//    // 如果 Redis 中没有数据，从 MySQL 查询
//    $query = myclass::query()->where('school_id', $request['id']);
//    $data = $query->orderByDesc('id')->paginate(5, ['*']);
//
//    // 如果查询到用户数据，将其缓存到 Redis
//    if ($data) {
//        Redis::set('school_' . $request['id'], json_encode($data), 'EX', 3600); // 缓存1小时
//    } else {
//        return response()->json([
//            'message' => 'User not found',
//        ], 404);
//    }
//}
//return response()->json($data);
        $data = myclass::getClassBySchoolId($request['school_id']=1);
        if (!$data) {
            throw new APIHttpException('学校id错误');
        }
        return api_response(200,$data);
    }
}
