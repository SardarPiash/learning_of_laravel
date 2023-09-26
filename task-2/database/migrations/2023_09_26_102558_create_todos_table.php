<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('todoname');
            $table->string('userName');
            $table->string('todolist');
            $table->string('date');
            
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
