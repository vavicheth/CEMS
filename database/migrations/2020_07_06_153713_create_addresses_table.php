<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('addressable_id');
            $table->string('addressable_type');
            $table->string('address')->nullable();
            $table->unsignedInteger('village_code')->nullable();
            $table->unsignedInteger('commune_code')->nullable();
            $table->unsignedInteger('district_code')->nullable();
            $table->unsignedInteger('province_code')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
