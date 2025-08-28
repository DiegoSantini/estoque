<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('nome_categoria'); // Nome da categoria
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('categorias');
    }
};
