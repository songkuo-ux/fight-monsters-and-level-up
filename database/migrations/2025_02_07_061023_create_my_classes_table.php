<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myclass', function (Blueprint $table) {
            $table->id();  // 自增ID
            $table->string('name'); // 班级名称
            $table->unsignedBigInteger('course_id'); // 课程ID
            $table->unsignedBigInteger('school_id'); // 学校ID
            $table->unsignedBigInteger('room_id'); // 教室ID
            $table->unsignedBigInteger('teacher_id'); // 教师ID
            $table->integer('capacity'); // 班级容量
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('myclass');
    }
}
