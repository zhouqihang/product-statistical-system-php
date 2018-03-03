<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function show(Request $request) {
        $pagesize = $request->input('pagesize', 10);
        return Material::paginate($pagesize);
    }

    /**
     * @param Request $request
     * @return Material
     */
    public function create(MaterialRequest $request) {
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
