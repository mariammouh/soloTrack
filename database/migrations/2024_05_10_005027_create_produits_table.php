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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_autoentrepreneur')->unsigned(); 
            $table->string('nom');
            $table->string('description');
            $table->date('date_creation');
            // $table->date('date_expiration'); 
            $table->float('prix');
            $table->float('stock');
            $table->string('example');
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
        Schema::dropIfExists('produits');
    }
};
