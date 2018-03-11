<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskCreateRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create1(TaskCreateRequest $request) {
        $task_title = $request->input('title', '');
        $task_status = $request->input('status', array_keys(Task::$status)[0]);
        $task_remark = $request->input('remark', '');
        $products = $request->input('products', []);

        // if not have products, return
        if (!is_array($products) || count($products) === 0) {
            return response()->json(['message' => 'products is required, it must be a list'], 404);
        }

        $task = [
            'title' => $task_title,
            'status' => $task_status,
            'remark' => $task_remark,
            'created_at' => date('Y-m-d H:i:d'),
            'updated_at' => date('Y-m-d H:i:d'),
        ];

        DB::transaction(function () use ($task, $products)  {
            // create task
            $task_id = DB::table('tasks')->insertGetId($task);

            // create task info
            foreach($products as $product) {
                $task_info_id = DB::table('task_infos')->insertGetId([
                    'task_id' => $task_id,
                    'product_id' => $product['id'],
                    'remark' => $product['remark'],
                    'created_at' => date('Y-m-d H:i:d'),
                    'updated_at' => date('Y-m-d H:i:d'),
                ]);

                // if materials create
                // if materials is not an array, use default config
                $materials = $products['materials'] ?? [];

                if (!is_array($materials) || count($materials)) {

                    // use default config
                    $materials_config = DB::table('products_materials_base')->where('product_id', $product['id'])->get();
                    foreach ($materials_config as $material_config) {
                        DB::table('products_materials_real')->insert([
                            'task_info_id' => $task_info_id,
                            'material_id' => $material_config->material_id,
                            'material' => $material_config->material,
                            'remark' => $material_config->remark,
                            'created_at' => date('Y-m-d H:i:d'),
                            'updated_at' => date('Y-m-d H:i:d'),
                        ]);
                    }
                }
                else {
                    // use input config
                    foreach ($materials as $material) {
                        DB::table('products_materials_real')->insert([
                            'task_info_id' => $task_info_id,
                            'material_id' => $material['id'],
                            'material' => $material['count'],
                            'remark' => $material['remark'],
                            'created_at' => date('Y-m-d H:i:d'),
                            'updated_at' => date('Y-m-d H:i:d'),
                        ]);
                    }
                }
            }
        }, 5);

        return Task::where('title', $task_title)->first();
    }
}
