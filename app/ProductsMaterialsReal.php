<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsMaterialsReal extends Model
{
    protected $table = 'products_materials_real';

    protected $fillable = ['task_info_id', 'material_id', 'remark', 'material'];

    public function material() {
        return $this->belongsTo('App\Material');
    }
}
