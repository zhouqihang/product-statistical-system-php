<?php

namespace App\Http\Controllers;

use App\Http\Requests\Material\MaterialShowRequest;
use App\Http\Requests\Material\MaterialCreateRequest;
use App\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function show(MaterialShowRequest $request) {
        $pagesize = $request->input('pagesize', 10);
        $material_number = $request->input('number', '');
        $material_title = $request->input('title', '');
        $material_unit = $request->input('unit', '');
        $material_count_from = $request->input('countBegin', null);
        $material_count_to = $request->input('countEnd', null);
        $material_sort_field = $request->input('sortField', 'created_at');
        $material_sortord = $request->input('sortord', 'desc');
        $query = [];
        if ($material_number) {
            array_push($query, ['material_number', 'like', '%'.$material_number.'%']);
        }
        if ($material_title) {
            array_push($query, ['material_title', 'like', '%'.$material_title.'%']);
        }
        if ($material_unit) {
            array_push($query, ['material_unit', 'like', '%'.$material_unit.'%']);
        }
        if ($material_count_from) {
            array_push($query, ['material_count', '>=', $material_count_from]);
        }
        if ($material_count_to) {
            array_push($query, ['material_count', '<=', $material_count_to]);
        }
        return Material::where($query)->orderBy($material_sort_field, $material_sortord)->paginate($pagesize);
    }

    /**
     * @param Request $request
     * @return Material
     */
    public function create(MaterialCreateRequest $request) {
        $material = new Material();
        $material->material_number =  $request->input('number', '');
        $material->material_title =  $request->input('title', '');
        $material->material_unit =  $request->input('unit', '');
        $material->material_count =  $request->input('count', 0);
        $material->material_danger =  $request->input('danger', 0);
        $material->material_remark =  $request->input('remark', '');
        $material->save();
        return $material;
    }
}
