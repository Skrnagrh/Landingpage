<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('idcard');
            $table->string('name');
            $table->string('gander');
            $table->text('address');
            $table->text('city');
            // $table->string('different')->nullable();
            $table->text('date');
            $table->string('email');
            $table->string('phone');
            $table->string('education');
            $table->text('school');
            $table->string('major');
            $table->string('gpa');
            $table->text('graduation');
            $table->string('course1');
            $table->text('course2');
            $table->text('course3');
            $table->text('experience1');
            $table->text('experience2');
            $table->text('experience3');
            $table->string('cv');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applies');
    }
};
