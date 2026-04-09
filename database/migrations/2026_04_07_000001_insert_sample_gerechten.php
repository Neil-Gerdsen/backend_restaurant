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
        // Maak sample gerechten aan
        DB::table('gerechten')->insertOrIgnore([
            [
                'naam' => 'Spaghetti Carbonara',
                'beschrijving' => 'Traditionele Italiaanse pasta met guanciale, ei, kaas en zwarte peper',
                'prijs' => 13.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Risotto ai Funghi',
                'beschrijving' => 'Romige risotto met gemengde paddestoelen, witte wijn en parmezaan',
                'prijs' => 14.95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Osso Buco',
                'beschrijving' => 'Langzaam gestoofd kalfsvlees met groenten, witte wijn en bouillon',
                'prijs' => 22.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Tiramisù',
                'beschrijving' => 'Klassiek Italiaans dessert met mascarpone, espresso en cacao',
                'prijs' => 7.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Verwijder de gegevens
    }
};
