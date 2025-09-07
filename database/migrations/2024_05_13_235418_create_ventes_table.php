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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->float('qantite');
            $table->float('total_prix');
            $table->string('mode_paiement');
            $table->date('date_operation');
            $table->bigInteger('id_autoentrepreneur')->unsigned(); 
            $table->bigInteger('id_client')->unsigned(); 
            $table->bigInteger('id_produit')->unsigned(); 
            $table->bigInteger('id_facture')->unsigned(); 

            $table->foreign('id_autoentrepreneur')
                ->references('id')
                ->on('autoentrepreneurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_client')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_produit')
                ->references('id')
                ->on('produits')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->foreign('id_facture')
->references('id')
->on('factures')
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
        Schema::dropIfExists('ventes');
    }
};
