<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Requests\Task\TaskShowRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private function setTaskByRequest(Task $task, Request $request) {
        $task->title = $request->input('title', '');;
        $task->remark = $request->input('remark', '');
        $task->status = $request->input('status', array_keys(Task::$status)[0]);
        $task->begin_time = $request->input('begin_time', date('Y-m-d H:i:d'));
        $task->end_time = $request->input('end_time', date('Y-m-d H:i:d'));
        return $task;
    }

    public function create(TaskCreateRequest $request) {
        $task = new Task();
        $task = $this->setTaskByRequest($task, $request);
        $task->save();
        return $task;
    }

    public function show(TaskShowRequest $request) {
        $pagesize = $request->input('pagesize', 10);
        $task_title = $request->input('title', '');
        $task_status = $request->input('status', '');
        $task_begin_time = $request->input('beginTime', '');
        $task_end_time = $request->input('endTime', '');
        $product_sort_field = $request->input('sortField', 'created_at');
        $product_sortord = $request->input('sortord', 'desc');
        $query = [];

        if ($task_title) {
            array_push($query, ['title', 'like', '%'.$task_title.'%']);
        }
        if ($task_status) {
            array_push($query, ['status', '=', '%'.$task_status.'%']);
        }
        if ($task_begin_time) {
            array_push($query, ['begin_time', '>=', '%'.$task_begin_time.'%']);
        }
        if ($task_end_time) {
            array_push($query, ['end_time', '<=', $task_end_time]);
        }

        return Task::where($query)->orderBy($product_sort_field, $product_sortord)->paginate($pagesize);
    }

    public function query(Request $request, int $id) {
        $task = Task::findOrFail($id);
        $task->taskInfos;
        $task->taskInfos->each(function ($taskInfo) {
            $taskInfo->PMRs;
        });
        return $task;
    }

    public function update(TaskUpdateRequest $request, int $id) {
        $task_title = $request->input('title', '');
        $task_status = $request->input('status', array_keys(Task::$status)[0]);
        $task_remark = $request->input('remark', '');

        $task = Task::findOrFail($id);
        $task->title = $task_title;
        $task->status = $task_status;
        $task->remark = $task_remark;
        $task->save();

        return $task;
    }

    public function remove(Request $request, int $id) {
        return Task::destroy($id) > 0
            ? response()->json(['message' => 'Delete Successful'])
            : response()->json(['message' => 'Delete failed'], 404);
    }

    public function status(Request $request, int $id) {
        $status = $request->input('status');
        if (!in_array($status, array_keys(Task::$status))) {
            return response()->json(['message' => 'status is not allowed'], 404);
        }
        $task = Task::findOrFail($id);
        $task->status = $status;
        $task->save();

        return $task;
    }

    public function getStatus() {
        return Task::$status;
    }
}
