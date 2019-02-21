<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',30);
            $table->integer('qtd');
            $table->float('prc_venda',8,2);
            $table->float('prc_compra',8,2);
            $table->integer('provider_id');
            $table->integer('classification_id');
            $table->timestamps();

            $table->foreign('provider_id')
                  ->references('id')
                  ->on('providers');
                  
            $table->foreign('classification_id')
                  ->references('id')
                  ->on('classifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
