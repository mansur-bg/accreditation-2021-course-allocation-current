<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        id	jambno	regno	level
        Schema::dropIfExists('verified_students');
        Schema::create('verified_students', function (Blueprint $table) {
            $table->id();
            $table->string('jambno')->nullable();
            $table->string('regno')->unique()->nullable();
            $table->string('level')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('verified_students', function (Blueprint $table) {
            $table->foreign('regno')->references('regno')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verified_students');
    }
}
