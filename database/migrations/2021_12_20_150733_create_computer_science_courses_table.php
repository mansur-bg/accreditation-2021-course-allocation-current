<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerScienceCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        id, course_id, code, title, level, semester, registered_students, academic_session
        Schema::create('computer_science_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->string('code',20);
            $table->string('title');
            $table->integer('level');
            $table->integer('semester');
            $table->integer('registered_students');
            $table->string('academic_session');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('computer_science_courses', function (Blueprint $table) {
            $table->unique(['code', 'academic_session'], 'unique_cs_code_academic_session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_science_courses');
    }
}
