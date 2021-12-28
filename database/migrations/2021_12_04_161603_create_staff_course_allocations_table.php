<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffCourseAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_course_allocations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->string('course_code', 20);
            $table->string('academic_session');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('staff_course_allocations', function (Blueprint $table) {
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('course_code')->references('code')->on('courses');
            $table->foreign('academic_session')->references('academic_session')->on('academic_sessions');
            $table->unique(['staff_id','course_code','academic_session'],'unique_staff_allocation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_course_allocations');
    }
}
