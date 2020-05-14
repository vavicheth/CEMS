<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientStaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_stays', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->unsigned();
            $table->dateTime('date_admit');
            $table->dateTime('date_discharge')->nullable();
            $table->string('diagnostic')->nullable();
            $table->string('description')->nullable();
            $table->char('status',1)->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('patient_stays');
    }
}
