<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAskSessionToInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->string('pertanyaan1');
            $table->string('pertanyaan2');
            $table->string('pertanyaan3');
            $table->string('jawaban1');
            $table->string('jawaban2');
            $table->string('jawaban3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropColumn('pertanyaan1');
            $table->dropColumn('jawaban1');
            $table->dropColumn('pertanyaan2');
            $table->dropColumn('jawaban2');
            $table->dropColumn('pertanyaan3');
            $table->dropColumn('jawaban3');
        });
    }
}
