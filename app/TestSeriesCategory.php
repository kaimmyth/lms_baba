<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestSeriesCategory extends Model {

    use SoftDeletes;

    protected $table = 'test_series_categories';

}
