<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\CourseCategory;
use App\CourseCode;
use App\Language;
use App\Certificate;

class Course extends Model {

    use SoftDeletes;

    protected $table = 'courses';
    protected $softDelete = true;

    public function category() {
        return $this->hasOne(CourseCategory::class, 'id', 'cate_id');
    }

    public function code() {
        return $this->hasOne(CourseCode::class, 'id', 'course_code');
    }

    public function language() {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function certificate() {
        return $this->hasOne(Certificate::class, 'id', 'certificate_template');
    }

}
