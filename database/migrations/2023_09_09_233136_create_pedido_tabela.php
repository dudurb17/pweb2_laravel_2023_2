<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger("produto_id")->unsigned()->index()->nullable();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->string("cnpj");
            $table->date("data_pedido");
            $table->string('email');
            $table->string("Quantidade");
            $table->string("nome_peca");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};