<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsMaterialsBase extends Model
{
    protected $table = 'products_materials_base';

    public function material() {
        return $this->belongsTo('App\Material');
    }
}
