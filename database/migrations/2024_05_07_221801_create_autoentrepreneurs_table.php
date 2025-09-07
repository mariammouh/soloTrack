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
        Schema::create('autoentrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_entreprise');
            $table->string('Identifiant_Fiscal');
            $table->string('contact');
            $table->string('adresse');
            $table->string('Domain_de_travail');
            $table->string('logo');
            $table->date('date_creation');
            $table->string('ICE'); 

            $table->string('TP'); 
            $table->string('CNCC'); 
            $table->string('numero_autoentrepreneur');
            $table->decimal('taux_tax', 5, 2); 
            
            $table->bigInteger('id_user')->unsigned(); 
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('autoentrepreneurs');
    }
};
