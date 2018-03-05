<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductShowRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Product;
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
        $product = new Product();
        $product = $this->initProductByRequest($product, $request);
        $product->save();
        return $product;
    }

    public function query(int $id) {
        return Product::findOrFail($id);
    }

    public function remove(int $id) {
        return Product::destroy($id) > 0
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
}
