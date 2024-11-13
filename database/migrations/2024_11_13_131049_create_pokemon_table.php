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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('height', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->enum('type', 
                        ['fire', 
                        'water', 
                        'grass', 
                        'electric', 
                        'ice', 
                        'rock', 
                        'ground', 
                        'flying', 
                        'poison', 
                        'bug', 
                        'normal', 
                        'fighting', 
                        'psychic', 
                        'ghost', 
                        'dark', 
                        'steel', 
                        'fairy', 
                        'dragon'
            ]);
            
            $table->integer('evolutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
