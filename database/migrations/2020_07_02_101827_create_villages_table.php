<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->unsignedInteger('commune_code');
            $table->unsignedInteger('district_code');
            $table->unsignedInteger('province_code');
            $table->string('name');
            $table->string('name_kh');
            $table->string('type');
            $table->string('type_kh');
            $table->string('reference')->nullable();
            $table->string('official_note')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('villages');
    }
}
