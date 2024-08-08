<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('periodo', 50);
            $table->string('descripcion', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('especies');
    }
}
