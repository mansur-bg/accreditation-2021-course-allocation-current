<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_number')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('initials')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->boolean('is_default_password')->default(1);
            $table->string('photo')->default('no-image.jpg');
            $table->string('status')->nullable();
            $table->string('rank')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('specialisation')->nullable();
            $table->string('cadre')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
