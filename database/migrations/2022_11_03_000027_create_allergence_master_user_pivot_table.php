<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenceMasterUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('allergence_master_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_6715162')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('allergence_master_id');
            $table->foreign('allergence_master_id', 'allergence_master_id_fk_6715162')->references('id')->on('allergence_masters')->onDelete('cascade');
        });
    }
}
