<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationGroupeTable extends Migration
{
    public function up()
    {
        Schema::create('formation_groupe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id');
            $table->unsignedBigInteger('groupe_id');
            // Add foreign key constraints
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            // Add unique constraint to prevent duplicates
            $table->unique(['formation_id', 'groupe_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formation_groupe');
    }
}