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
            $table->unsignedBigInteger('job_vacancy');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('gender');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->string('cover_letter');
            $table->string('resume');
            $table->unsignedBigInteger('applicant_status')->default(1);
            $table->boolean('is_delete')->default(0);
            $table->unsignedBigInteger('added_by');
            $table->timestamps();

            $table->foreign('job_vacancy')->references('id')->on('job_vacancies');
            $table->foreign('applicant_status')->references('id')->on('applicant_statuses');
            $table->foreign('added_by')->references('id')->on('users');
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
    }
};
