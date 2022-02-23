<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAllocationAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_allocation_accreditations', function (Blueprint $table) {
//            id	name	code	title	level	credit	status	semester
            $table->id();
            $table->bigInteger('staff_id')->unsigned();
            $table->string('staff_number')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('title');
            $table->unsignedInteger('level');
            $table->unsignedInteger('credit');
            $table->string('status');
            $table->unsignedInteger('semester');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('staff_allocation_accreditations', function (Blueprint $table) {
            $table->foreign('code')->references('code')->on('courses');
            $table->foreign('staff_id')->references('id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_allocation_accreditations');
    }
}
