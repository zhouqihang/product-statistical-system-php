<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function materials() {
        return $this->belongsToMany('App\Material', 'products_materials_base');
    }

    public function getMaterials() {
        return $this->materials()->get([
            'materials.id as material_id',
            'material_number',
            'material_title',
            'material',
            'remark',
            'products_materials_base.id',
            'products_materials_base.created_at',
            'products_materials_base.updated_at',
        ]);
    }
}
