<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TestSeriesCategory;

class TestSeries extends Model {

    use SoftDeletes;

    protected $table = 'test_series';

    public function category(){
        return $this->hasOne(TestSeriesCategory::class,'id','category_id');
    }
    
}
