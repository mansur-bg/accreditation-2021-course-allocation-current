<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('regno')->unique()->nullable();
            $table->string('matriculation_no')->nullable();
            $table->string('admissionletter_sn')->nullable();
            $table->string('fullname')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('emailactivated')->nullable();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->string('admissionset')->nullable();
            $table->string('result_admissionset')->nullable();
            $table->string('accountactive')->nullable();
            $table->unsignedBigInteger('std_status')->nullable();
            $table->string('modeofentry')->nullable();
            $table->integer('level')->nullable();
            $table->string('category')->nullable();
            $table->string('entrystatus')->nullable();
            $table->string('modeofstudy')->nullable();
            $table->string('academic_session')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
