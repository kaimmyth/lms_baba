<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\CourseCatalog;
use App\Course;

class Catalogue extends Model
{
    use SoftDeletes;
    protected $table='course_catalogue';
    protected $softDelete = true;
    
    public function courseCatalog(){
        return $this->hasMany(CourseCatalog::class,'catalog', 'id')->where('catalog_status','Active')->with('courseData');
    }
    
}
