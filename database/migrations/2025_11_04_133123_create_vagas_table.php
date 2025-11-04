<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->string('empresa');
            $table->text('descricao');
            $table->string('localizacao')->nullable();
            $table->string('salario')->nullable();
            $table->enum('status', ['rascunho', 'publicada'])->default('rascunho');
            $table->timestamp('expira_em')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vagas');
    }
};
