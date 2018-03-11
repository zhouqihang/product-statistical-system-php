<?php

namespace App\Http\Controllers;

use App\ProductsMaterialsReal;
use App\TaskInfo;
use Illuminate\Http\Request;

class TaskInfosController extends Controller
{
    public function create(Request $request, int $id) {
        $task_info_product = $request->input('product');
        $task_info_remarkt = $request->input('remark', '');
        $materials = $request->input('materials', []);

        // create task info
        $task_info = new TaskInfo();
        $task_info->task_id = $id;
        $task_info->product_id = $task_info_product;
        $task_info->remark = $task_info_remarkt;
        $task_info->save();

        $PMRArray = [];
        foreach ($materials as $material) {
            array_push(
                $PMRArray,
                new ProductsMaterialsReal([
                    'task_info_id' => $task_info->id,
                    'material_id' => $material['id'],
                    'material' => $material['count'],
                    'remark' => $material['remark'],
                ])
            );
        }

        // create products materials real
        $task_info->PMRs()->saveMany($PMRArray);

        return $task_info;
    }
}
