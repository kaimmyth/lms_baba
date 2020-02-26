<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Catalogue;
use App\Course;

class CourseCatalog extends Model {

    use SoftDeletes;

    protected $fillable = [
        'org_id', 'course_id', 'catalog', 'catalog_status', 'ip_address', 'is_deleted', 'deleted_by', 'created_by', 'updated_by', 'deleted_at'
    ];
    protected $table = 'course_catalog';
    protected $softDelete = true;

    public function catalogueData() {
        return $this->hasOne(Catalogue::class, 'id', 'catalog');
    }

    public function courseData() {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

}
