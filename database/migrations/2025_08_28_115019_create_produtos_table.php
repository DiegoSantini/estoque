<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('nome_produto'); // Nome do produto
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); 
            // Relacionamento com categoria, se excluir categoria exclui produtos
            $table->integer('quantidade')->default(0); // Estoque inicial
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produtos');
    }
};
