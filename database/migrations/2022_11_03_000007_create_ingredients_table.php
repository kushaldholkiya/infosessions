<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('producer')->nullable();
            $table->string('origin')->nullable();
            $table->string('allergence')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
