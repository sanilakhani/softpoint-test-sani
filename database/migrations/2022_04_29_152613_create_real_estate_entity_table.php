<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_entity', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->enum('real_state_type', ['house', 'department','land','commercial_ground']);
            $table->string('street',128);
            $table->string('external_number',12);
            $table->string('Internal_number',12);
            $table->string('neighborhood',128);
            $table->string('city',64);
            $table->string('country',2);
            $table->integer('rooms');   
            $table->integer('bathrooms')->default(0); 
            $table->string('comments',128);
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
        Schema::dropIfExists('real_estate_entity');
    }
}
