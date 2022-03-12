<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('session')->nullable();
            $table->string('sift_group')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('trade_id')->nullable();
            $table->string('is_deleted')->default('0');
            $table->string('is_student')->default('0');
            $table->string('is_teacher')->default('0');
            $table->string('is_super')->default('0');
            $table->string('teacher_role')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('added_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
};
