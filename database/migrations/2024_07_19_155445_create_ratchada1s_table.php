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
        Schema::create('ratchada1s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('item')->nullable();;
            $table->float('weight')->nullable();;
            $table->string('fishname')->nullable();;
            $table->date('saledate')->nullable();;
            $table->text('remark')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratchada1s');
    }
};
