<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Course;
use App\PlanCode;

class LearningPlan extends Model {

    use SoftDeletes;

    protected $table = 'learning_plans';
    protected $softDelete = true;

    public function course() {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function plancode() {
        return $this->hasOne(PlanCode::class, 'id', 'plan_code');
    }

}
