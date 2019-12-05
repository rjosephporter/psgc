<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('parent');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('geographic_level')->nullable();
            $table->string('city_class')->nullable();
            $table->string('income_classification')->nullable();
            $table->string('urban_rural', 5)->nullable();
            $table->integer('population')->nullable();
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
        Schema::dropIfExists('municipalities');
    }
}
