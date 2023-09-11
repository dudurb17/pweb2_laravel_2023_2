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

        Schema::disableForeignKeyConstraints();
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable()->constrained('name');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->constrained('name');
            $table->bigInteger("produto_id")->unsigned()->index()->nullable();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->string("cnpj");
            $table->date("data_pedido");
            $table->string('email');
            $table->string("Quantidade");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};