<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_bon_de_commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produit')->unsigned();
            $table->bigInteger('id_bon_de_commande')->unsigned();
            $table->float('quantite');
            $table->foreign('id_produit')
            ->references('id')
            ->on('produits')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_bon_de_commande')
            ->references('id')
            ->on('bon_de_commandes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('produit_bon_de_commandes');
    }
};
