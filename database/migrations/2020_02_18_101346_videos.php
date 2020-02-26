<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Videos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->default(0);
            $table->integer('course_id')->default(0);
            $table->string('title', 255)->nullable($value = true);
            $table->string('description', 255)->nullable($value = true);
            $table->integer('link_type')->default(1)->comment('1=Upload File,2=YouTube URL,3=Embeded Video URL');
            $table->string('file', 200)->nullable($value = true);
            $table->string('status', 100)->default('Inactive');
            $table->integer('playhaed')->default(0)->comment('0=No,1=Yes,2=After Completion');
            $table->integer('playback')->default(0)->comment('0=No,1=Yes');
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
        Schema::dropIfExists('videos');
    }
}
