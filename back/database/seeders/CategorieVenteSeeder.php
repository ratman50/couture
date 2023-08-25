<?php

namespace Database\Seeders;

use App\Models\CategorieVente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieVenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'libelle' => 'T-shirt',
            ],
            [
                'libelle' => 'Pantalon', 
            ],
            [
                'libelle' => 'Robe',
            ],
            [
                'libelle' => 'Chemise',
            ],
        ];

       CategorieVente::insert($categories);
    }
}
