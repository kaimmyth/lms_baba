<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Course;

class Video extends Model {

    use SoftDeletes;

    protected $table = 'videos';
    protected $softDelete = true;

    public function course() {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

}
