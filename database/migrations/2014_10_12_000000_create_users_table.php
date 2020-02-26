<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->default(0);
            $table->integer('users_role')->default(1);
            $table->integer('users_type')->default(0);
            $table->bigInteger('teacher_id')->default(0);
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('username',255)->unique();
            $table->timestamp('email_verified_at')->nullable($value = true);
            $table->string('password',255);
            $table->string('token',2550)->nullable($value = true);
            $table->datetime('token_expire')->nullable($value = true);
            $table->integer('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->ipAddress('ip_address')->nullable($value = true);
            $table->integer('is_deleted')->default(0)->comment('0=not deleted,1=is_deleted');
            $table->integer('deleted_by')->default(0);
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
