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
           Schema::create('produit_devis', function (Blueprint $table) {
            $table->id();
            $table->float('quantite');
            $table->float('Prix');

            $table->bigInteger('id_produit')->unsigned();
            $table->bigInteger('id_devis')->unsigned();
            $table->foreign('id_produit')
            ->references('id')
            ->on('produits')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_devis')
            ->references('id')
            ->on('devis')
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
        Schema::dropIfExists('produit_devis');

    }
};
