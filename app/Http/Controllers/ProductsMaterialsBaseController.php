<?php

namespace App\Http\Controllers;

use App\Http\Requests\PMB\ProductsMaterialsBaseCreateRequest;
use App\Http\Requests\PMB\ProductsMaterialsBaseUpdateRequest;
use App\ProductsMaterialsBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsMaterialsBaseController extends Controller
{
    public static function create($pmb = []) {
        if (!is_array($pmb)) {
            return false;
        }
        if (count($pmb) === 0) {
            return false;
        }
        return DB::table('products_materials_base')->insert($pmb);
    }

    public function remove($id) {
        return ProductsMaterialsBase::destroy($id) > 0
            ? response()->json(['message' => 'Delete Successful'])
            : response()->json(['message' => 'Delete failed'], 404);
    }

    public function add(ProductsMaterialsBaseCreateRequest $request) {
        $product = $request->input('product', 0);
        $material = $request->input('material', 0);
        $count = $request->input('count', 0);
        $remark = $request->input('remark', '');
        $res = ProductsMaterialsBase::where(['product_id' => $product, 'material_id' => $material])->first();
        if ($res) {
            return response()->json(['message' => 'this relationship already exists'], 404);
        }
        $pmb = new ProductsMaterialsBase();
        $pmb->product_id = $product;
        $pmb->material_id = $material;
        $pmb->material = $count;
        $pmb->remark = $remark;
        $pmb->save();
        return $pmb;
    }

    public function update(ProductsMaterialsBaseUpdateRequest $request, int $id) {
        $count = $request->input('count', 0);
        $remark = $request->input('remark', '');
        $pmb = ProductsMaterialsBase::findOrFail($id);
        $pmb->material = $count;
        $pmb->remark = $remark;
        $res = $pmb->save();
        return $res
            ? $pmb
            : response()->json([
                'message' => 'Server Error',
            ], 500);
    }
}
