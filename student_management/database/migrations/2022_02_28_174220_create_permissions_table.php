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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_status')->default('0');
            $table->string('is_student')->default('0');
            $table->string('is_techer')->default('0');
            $table->string('teacher_role')->default('0');
            $table->string('is_super')->define('0');
            $table->string('is_deleted')->default('0');
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('permissions');
    }
};
