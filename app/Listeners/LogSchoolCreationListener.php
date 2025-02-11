<?php

namespace App\Listeners;

use App\Models\School;
use Illuminate\Support\Facades\Log;
use App\Events\SchoolCreated;

class LogSchoolCreationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * 当创建学校并且初始化六个班级之后，监视器：log中会生成记录。
     */
    public function handle(SchoolCreated $event): void
    {
        $school = School::query()
            ->find($event->school);

        if ($school) {
            Log::info('School Created', [
                'school_id' => $school->id,
                'class_count' => $event->classCount,
                'created_at' => now(),
            ]);
        } else {
            Log::error('School not found', [
                'school_id' => $event->school, // 记录无法找到的 ID
            ]);
        }
    }
}
