<?php

namespace App\Http\Controllers;

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
}
