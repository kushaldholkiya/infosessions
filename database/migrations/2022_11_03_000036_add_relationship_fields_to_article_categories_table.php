<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToArticleCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('parentcatid_id')->nullable();
            $table->foreign('parentcatid_id', 'parentcatid_fk_6598546')->references('id')->on('article_categories');
        });
    }
}
