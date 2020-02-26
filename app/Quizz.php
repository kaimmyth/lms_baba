<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Course;

class Quizz extends Model {

    use SoftDeletes;

    protected $table = 'quizz';
    protected $softDelete = true;

    public function course() {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

}
