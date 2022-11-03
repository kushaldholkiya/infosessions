<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('phone')->nullable();
            $table->string('country')->nullable();
            $table->longText('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('maritial_status')->nullable();
            $table->string('eme_contact_person')->nullable();
            $table->string('eme_contact_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('process_number')->nullable();
            $table->string('national_number')->nullable();
            $table->string('health_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->longText('other_information')->nullable();
            $table->string('favourite_food')->nullable();
            $table->string('disliked_food')->nullable();
            $table->longText('diseases')->nullable();
            $table->longText('medication')->nullable();
            $table->longText('personal_history')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
