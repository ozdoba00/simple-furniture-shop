<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('root_id')->nullable();
            $table->string('name');
            $table->string('symbol');
            $table->unique(['root_id', 'symbol']);
        });

        Schema::table('offer_categories',function (Blueprint $table){
            $table->foreign('root_id')->references('id')->on('offer_categories');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_categories');
    }
};
