<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->integer('angkatan');
            $table->string('homeNumber');
            $table->string('phoneNumber');
            $table->char('gender');
            $table->string('bloodType');
            $table->string('hobby');
            $table->string('address');
            $table->string('placeOfBirth');
            $table->dateTime('dateOfBirth');
            $table->string('lastEdu');
            $table->string('lastAchievement');
            $table->string('lastOrganization');
            $table->string('lastEvent');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('interviews');
    }
}
