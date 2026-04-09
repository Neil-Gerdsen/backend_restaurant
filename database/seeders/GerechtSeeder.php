<?php

namespace Database\Seeders;

use App\Models\Gerecht;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GerechtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gerecht::create([
            'naam' => 'Spaghetti Carbonara',
            'beschrijving' => 'Traditionele Italiaanse pasta met guanciale, ei, kaas en zwarte peper',
            'prijs' => 13.50,
        ]);

        Gerecht::create([
            'naam' => 'Risotto ai Funghi',
            'beschrijving' => 'Romige risotto met gemengde paddestoelen, witte wijn en parmezaan',
            'prijs' => 14.95,
        ]);

        Gerecht::create([
            'naam' => 'Osso Buco',
            'beschrijving' => 'Langzaam gestoofd kalfsvlees met groenten, witte wijn en bouillon',
            'prijs' => 22.50,
        ]);

        Gerecht::create([
            'naam' => 'Tiramisù',
            'beschrijving' => 'Klassiek Italiaans dessert met mascarpone, espresso en cacao',
            'prijs' => 7.00,
        ]);
    }
}
