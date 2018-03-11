<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductShowRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Product;
use App\ProductsMaterialsBase;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @param Product $product product
     * @param Request $request
     * @return Product
     */
    private function initProductByRequest(Product $product, Request $request) {
        $product->prod_title = $request->input('title', '');
        $product->prod_number = $request->input('number', '');
        $product->prod_unit = $request->input('unit', '');
        $product->prod_count = $request->input('count', 0.00);
        $product->prod_remark = $request->input('remark', '');
        return $product;
    }

    public function show(ProductShowRequest $request) {
        $pagesize = $request->input('pagesize', 10);
        $product_number = $request->input('number', '');
        $product_title = $request->input('title', '');
        $product_unit = $request->input('unit', '');
        $product_count_from = $request->input('countBegin', null);
        $product_count_to = $request->input('countEnd', null);
        $product_sort_field = $request->input('sortField', 'created_at');
        $product_sortord = $request->input('sortord', 'desc');
        $query = [];
        if ($product_number) {
            array_push($query, ['prod_number', 'like', '%'.$product_number.'%']);
        }
        if ($product_title) {
            array_push($query, ['prod_title', 'like', '%'.$product_title.'%']);
        }
        if ($product_unit) {
            array_push($query, ['prod_unit', 'like', '%'.$product_unit.'%']);
        }
        if ($product_count_from) {
            array_push($query, ['prod_count', '>=', $product_count_from]);
        }
        if ($product_count_to) {
            array_push($query, ['prod_count', '<=', $product_count_to]);
        }
        return Product::where($query)->orderBy($product_sort_field, $product_sortord)->paginate($pagesize);
    }

    public function create(ProductCreateRequest $request) {
        // 获取原料信息
        $materialsInfo = $request->input('materials', []);
        if (!is_array($materialsInfo)) {
            return response()->json(['message' => 'Materials must be a list'], 404);
        }
        if (count($materialsInfo) == 0) {
            return response()->json(['message' => 'Materials is required'], 404);
        }
        // 创建product
        $product = new Product();
        $product = $this->initProductByRequest($product, $request);
        $product->save();
        // 添加materials
        $materialsArray = [];
        foreach ($materialsInfo as $v) {
            array_push($materialsArray, [
                'product_id' => $product->id,
                'material_id' => $v['id'],
                'material' => $v['count'],
                'remark' => $v['remark'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        ProductsMaterialsBaseController::create($materialsArray);
        // return product
        $product->materials = $product->getMaterials();
        return $product;
    }

    public function query(int $id) {
        $product = Product::findOrFail($id);
        $product->materials = $product->getMaterials();
        return $product;
    }

    public function remove(int $id) {
        $product = Product::find($id);
        $res = $product->delete();
        ProductsMaterialsBase::where('product_id', '=', $product->id)->delete();
        return $res
            ? response()->json(['message' => 'Delete Successful'])
            : response()->json(['message' => 'Delete failed'], 404);
    }

    public function update(ProductUpdateRequest $request, int $id) {
        $product = Product::findOrFail($id);
        $product = $this->initProductByRequest($product, $request);
        $res = $product->save();
        return $res
            ? $product
            : response()->json([
                'message' => 'Server Error',
            ], 500);
    }

    public function lists() {
        return Product::all(['id', 'prod_title']);
    }
}
