<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            

            $table->unsignedBigInteger('commercial_id');
            $table->foreign('commercial_id')->references('commercial')->on('commerciaux');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('client')->on('clients');
          
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
           Schema::dropIfExists('commandes');
    }
}
