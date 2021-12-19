<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->unique();
            $table->string('title');
            $table->integer('credit')->unsigned();
            $table->integer('level')->unsigned();
            $table->integer('semester');
            $table->string('status')->nullable();
            $table->string('prerequisite')->nullable();
            $table->string('corequisite')->nullable();
            $table->string('remark')->nullable();
            $table->string('faculty_id')->nullable();
            $table->string('faculty')->nullable();
            $table->string('department_id')->nullable();
            $table->string('department')->nullable();
            $table->string('programme_id')->nullable();
            $table->string('programme')->nullable();
            $table->integer('iscentralised')->nullable()->unsigned();
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
        Schema::dropIfExists('courses');
    }
}
