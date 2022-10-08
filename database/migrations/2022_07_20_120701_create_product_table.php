<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id(); // L'identifiant
            $table->double("prix"); // Le prix
            $table->text("libelle"); // libelle
            $table->longText("description"); // La description
            $table->bigInteger("cate_id"); // catégorie
            $table->string("image"); // Image
            $table->tinyInteger('populaire');
            $table->tinyInteger('status_prod')->default('0');
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
        Schema::dropIfExists('product');
    }
}
