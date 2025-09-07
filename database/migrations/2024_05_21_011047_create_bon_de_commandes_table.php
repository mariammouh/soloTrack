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
        Schema::create('bon_de_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('mode_paiement');
            $table->date('date_operation');
            $table->bigInteger('id_autoentrepreneur')->unsigned(); 
            $table->bigInteger('id_fournisseur')->unsigned(); 
            $table->foreign('id_autoentrepreneur')
            ->references('id')
            ->on('autoentrepreneurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        $table->foreign('id_fournisseur')
            ->references('id')
            ->on('fournisseurs')
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
        Schema::dropIfExists('bon_de_commandes');
    }
};
