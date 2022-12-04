<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commerciaux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $table = 'commerciaux'; // je protège la variable car laravel traduit automatiquement la variable au pluriel


    public function up()
    {
        Schema::create('commerciaux', function (Blueprint $table) {
            $table->increments('commercial'); // Clé primaire + index sur phpmyadmin
           
            $table->string('nom')->unique();
            $table->string('ville');
            $table->integer('nbre_commande');
            $table->integer('total_vente');
            $table->binary('image');
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
        Schema::dropIfExists('commerciaux');
    }
}
