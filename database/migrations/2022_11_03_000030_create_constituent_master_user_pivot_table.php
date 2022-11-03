<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstituentMasterUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('constituent_master_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_6715165')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('constituent_master_id');
            $table->foreign('constituent_master_id', 'constituent_master_id_fk_6715165')->references('id')->on('constituent_masters')->onDelete('cascade');
        });
    }
}
