<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('enrol_students')) {
        Schema::create('enrol_students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('student_phone_number');
            $table->string('student_email');
            $table->bigInteger('coursedetail_id')->unsigned()->nullable();
            $table->bigInteger('mobile_dev_id')->unsigned()->nullable();
            $table->bigInteger('sessionyear_id')->unsigned();
            $table->timestamps();
        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrol_students');
    }
}
