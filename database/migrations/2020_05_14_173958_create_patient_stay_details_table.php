<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientStayDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_stay_details', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_stay_id')->unsigned();
            $table->integer('transfer_from')->unsigned();
            $table->dateTime('date_from');
            $table->integer('transfer_to')->unsigned();
            $table->dateTime('date_to')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('patient_stay_details');
    }
}
