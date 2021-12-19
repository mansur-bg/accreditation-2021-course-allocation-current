<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('regno')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('phone')->nullable();
            $table->string('otheremail')->nullable();
            $table->string('nok')->nullable();
            $table->string('nokphone')->nullable();
            $table->string('nokrelationship')->nullable();
            $table->string('nokaddress')->nullable();
            $table->string('nokemail')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo_old')->nullable();
            $table->string('photo_exists')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo_rename_moved_success')->nullable();
            $table->string('healthstatus')->nullable();
            $table->string('disability')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('medication')->nullable();
            $table->string('matriculation_no')->nullable();
            $table->string('putme_de_invoice_no')->nullable();
            $table->string('academic_session')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('student_profiles', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
//            $table->foreign('regno')->references('regno')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_profiles');
    }
}
