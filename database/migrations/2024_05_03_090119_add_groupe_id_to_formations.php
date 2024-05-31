<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('formations', function (Blueprint $table) {
            // Add the groupe_id column as a foreign key referencing the id column of groupes table
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formations', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['groupe_id']);
            
        });
    }
};

