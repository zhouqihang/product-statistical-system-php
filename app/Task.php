<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public static $status = [
        'editing' => '编辑中',
        'waiting' => '等待中',
        'underway' => '进行中',
        'postpone' => '延期',
        'closed' => '已关闭',
        'complete' => '已完成',
    ];

    public function taskInfos() {
        return $this->hasMany('App\TaskInfo');
    }
}
