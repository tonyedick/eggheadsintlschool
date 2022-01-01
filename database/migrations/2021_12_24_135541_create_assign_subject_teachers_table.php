<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subject_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('user_id=employee_id');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->integer('designation_id');
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
        Schema::dropIfExists('assign_subject_teachers');
    }
}
