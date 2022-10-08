<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('prenom');
            $table->string('email');
            $table->string('tele');
            $table->string('adresse');
            $table->string('codePostale');
            $table->string('paymentMethod');
            $table->string('dateLivraison');
            $table->string('facture_id');
            $table->tinyInteger('statut_commd')->default('0');
            $table->string('description_commd')->nullable();
            $table->string('numéro_commd');
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
        Schema::dropIfExists('commande');
    }
}
