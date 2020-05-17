<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');    
            $table->string('companyName');
            $table->string('name');
            $table->string('phone');
            $table->string('temp');
            $table->string('symptom1');
            $table->string('symptom2');
            $table->string('travel');
            $table->string('smoke');
            $table->string('contactWithAffected');            
            $table->string('previousHistory');
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
        Schema::dropIfExists('partners');
    }
}
