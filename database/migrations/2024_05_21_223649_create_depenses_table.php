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
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->string('description'); 
            $table->decimal('montant', 10, 2);
            $table->date('date_depense'); 
            $table->date('date_limit_depense');         
            $table->string('mode_paiement');
            $table->bigInteger('id_categorie')->unsigned(); 
            $table->bigInteger('id_autoentrepreneur')->unsigned(); 
            $table->foreign('id_categorie')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_autoentrepreneur')
            ->references('id')
            ->on('autoentrepreneurs')
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
        Schema::dropIfExists('depenses');
    }
};
