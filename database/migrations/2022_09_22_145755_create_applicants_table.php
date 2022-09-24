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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('language');
            $table->string('division');
            $table->string('district');
            $table->string('upazila');
            $table->string('address_details');
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });

        Schema::create('applicant_exam', function (Blueprint $table) {
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('exam_id');
            $table->morphs('institute');
            $table->float('result', 8, 2)->unsigned();
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
        Schema::dropIfExists('applicants');

        Schema::dropIfExists('applicant_exam');
    }
};
