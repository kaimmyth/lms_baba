<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LearningPlans extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('learning_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->default(0);
            $table->bigInteger('course_id')->default(0);
            $table->string('plan_name', 2550)->nullable($value = true);
            $table->string('plan_file', 255)->nullable($value = true);
            $table->string('plan_code', 255)->nullable($value = true);
            $table->text('plan_description')->nullable($value = true);
            $table->string('plan_catalog', 100)->default('No');

            $table->date('plan_validity')->nullable($value = true);
            $table->string('plan_after_access', 255)->default('No');
            $table->string('plan_after_enrollment', 255)->default('No');
            $table->string('plan_channel', 255)->nullable($value = true);
            $table->string('plan_Certificate', 255)->nullable($value = true);

            $table->string('plan_credit', 255)->nullable($value = true);
            $table->string('plan_inrollment_link', 255)->nullable($value = true);

            $table->string('plan_status', 100)->default('Inactive');
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
        Schema::dropIfExists('learning_plans');
    }

}
