<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategory extends Model {

    use SoftDeletes;

    protected $fillable = [
        'org_id', 'cate_name', 'cate_status', 'ip_address', 'is_deleted', 'deleted_by', 'created_by', 'updated_by', 'deleted_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'course_category';
    protected $softDelete = true;

}
