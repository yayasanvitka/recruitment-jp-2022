<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('cities', function (Blueprint $table) {
        //     $table->bigIncrements('id_city');
        //     $table->string('city_name')->unique();
        //     $table->foreignId('province_id')->required();
        //     $table->timestamps();
        // });


        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('city_id');
            $table->string('city_name')->unique();
            $table->foreignId('province_id')->required();
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
        Schema::dropIfExists('cities');
    }
}
