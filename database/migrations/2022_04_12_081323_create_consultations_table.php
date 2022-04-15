<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('patient_id', 'patient_fk_6416266')->references('id')->on('users');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->string('symptom_one');
            $table->string('symptom_two');
            $table->string('symptom_three')->nullable();
            $table->string('symptom_four')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('doctor_id', 'doctor_fk_6416780')->references('id')->on('users');
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
        Schema::dropIfExists('consultations');
    }
}
