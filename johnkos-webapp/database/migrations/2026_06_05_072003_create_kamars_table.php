<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function(Blueprint $table){
            $table->id();
            $table->foreignId('kost_id')->constrained()->cascadeOnDelete();
            $table->string('name', 25);
            $table->text('facilities');
            $table->integer('floor');
            $table->decimal('price', 12, 2)->default(0.00);
            $table->float('width');
            $table->float('length');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
