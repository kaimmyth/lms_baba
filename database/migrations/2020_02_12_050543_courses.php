<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->default(0);
            $table->bigInteger('cate_id')->default(0);
            $table->string('course_name',255)->nullable($value = true);
            $table->string('course_code',255)->nullable($value = true);
            $table->string('course_credit',255)->nullable($value = true);
            $table->string('course_certificate',255)->nullable($value = true);
            $table->string('course_document',255)->nullable($value = true);
            $table->string('course_document_file',255)->nullable($value = true);
            $table->string('course_type',255)->nullable($value = true);
            $table->text('course_description')->nullable($value = true);
            $table->string('course_status',100)->default('Inactive');
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
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
