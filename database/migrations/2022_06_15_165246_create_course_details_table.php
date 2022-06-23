<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('course_details')) {
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_description');
            $table->json('curriculum');
            $table->biginteger('course_price');
            $table->string('course_duration');
            $table->bigInteger('sessionyear_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('course_details');
        
    }
}
