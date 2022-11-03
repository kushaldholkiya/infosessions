<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietMasterUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('diet_master_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_6715164')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('diet_master_id');
            $table->foreign('diet_master_id', 'diet_master_id_fk_6715164')->references('id')->on('diet_masters')->onDelete('cascade');
        });
    }
}
