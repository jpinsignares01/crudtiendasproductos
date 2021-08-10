<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('ID');
            $table->string('nombre');
            $table->string('SKU')->unique();
            $table->string('descripcion');
            $table->integer('valor');
            $table->bigInteger('tienda_id')->unsigned();
            $table->string('imagen');
            $table->timestamps();
            //
            $table->foreign('tienda_id')->references('ID')->on('tienda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('producto');
        Schema::enableForeignKeyConstraints();
    }
}
