<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanCode extends Model {

    use SoftDeletes;

    protected $table = 'plan_code';
    protected $softDelete = true;

}
