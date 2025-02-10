<?php

namespace App\Listeners;
use App\Models\schools;
use Illuminate\Support\Facades\Log;
use App\Events\SchoolCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     */
    public function handle(SchoolCreated $event): void
    {
        // school 是 ID，尝试查询学校模型

        $school = schools::query()->find($event->school);

        if ($school) {
            Log::info('School Created', [
                'school_id' => $school->id,
//                'school_name' => $school->name,
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
