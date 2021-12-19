<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegisteredCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registered_courses', function (Blueprint $table) {
            $table->id();
            $table->string('year')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('regno')->nullable();
            $table->string('ccode',20);
            $table->string('semester')->nullable();
            $table->string('isdeletable')->nullable();
            $table->string('time_stamp')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('grade')->nullable();
            $table->string('isco')->nullable();
            $table->string('ca')->nullable();
            $table->string('exam')->nullable();
            $table->string('isapproved')->nullable();
            $table->string('approvedby')->nullable();
            $table->string('remark')->nullable();
            $table->string('uploader')->nullable();
            $table->string('upload_status')->nullable();
            $table->string('uploaded_on')->nullable();
            $table->string('modified_on')->nullable();
            $table->string('approved_on')->nullable();
            $table->string('disapproved_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('student_registered_courses', function (Blueprint $table) {
//            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('regno')->references('regno')->on('students');
//            $table->foreign('ccode')->references('code')->on('courses');
            $table->foreign('academic_session')->references('academic_session')->on('academic_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_registered_courses');
    }
}
