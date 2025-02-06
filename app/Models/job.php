<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 指定表名（可选，默认是类名的复数形式，如：users）
    protected $table = 'users';

    // 指定主键（可选，默认是'id'）
    protected $primaryKey = 'id';

    // 指定是否使用时间戳（可选，默认是true）
    public $timestamps = true;

    // 可填充字段（白名单）
    protected $fillable = ['name', 'email', 'password'];

    // 隐藏字段（黑名单）
    protected $hidden = ['password', 'remember_token'];

    // 类型转换
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 关联关系定义（如果有的话）
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // 访问器和修改器（如果有的话）
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
