<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSeriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('test_series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->string('title', 2550)->nullable($value = true);
            $table->integer('time_limit')->default(0);
            $table->integer('max_tries')->default(0);
            $table->integer('total_marks')->default(0);
            $table->integer('passing_marks')->default(0);
            $table->integer('no_of_question')->default(0);
            $table->text('instruction')->nullable($value = true);
            $table->text('description')->nullable($value = true);
            $table->string('status', 100)->default('Inactive')->comment('Active,Inactive');
            $table->ipAddress('ip_address')->nullable();
            $table->integer('is_deleted')->default(0)->comment('0=not deleted,1=is_deleted');
            $table->integer('deleted_by')->default(0);
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('test_series');
    }

}
