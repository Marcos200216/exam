<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtraccionesTable extends Migration
{
    public function up()
    {
        Schema::create('atracciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->string('descripcion', 50);
            $table->foreignId('id_especie')->constrained('especies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atracciones');
    }
}
