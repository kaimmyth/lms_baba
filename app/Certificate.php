<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model {

    use SoftDeletes;

    protected $table = 'certificates';
    protected $softDelete = true;

}
