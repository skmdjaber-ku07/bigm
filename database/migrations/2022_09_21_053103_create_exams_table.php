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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['school', 'college', 'university']);
        });

        Schema::create('applicant_exam', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('exam_id');
            $table->morphs('institute');
            $table->float('result', 8, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');

        Schema::dropIfExists('applicant_exam');
    }
};
