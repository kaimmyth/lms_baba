<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCode extends Model {

    use SoftDeletes;

    protected $table = 'course_code';
    protected $softDelete = true;

}
