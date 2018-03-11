<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskInfo extends Model
{
    public function PMRs() {
        return $this->hasMany('App\ProductsMaterialsReal');
    }
}
