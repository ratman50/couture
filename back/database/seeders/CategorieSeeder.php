<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            ['libelle'=>'tissus'],
            ["libelle"=>"fournitures"],
            ["libelle"=>"vetements"],
            ["libelle"=>"accessoires"],
            ["libelle"=>"découpe"],
            ["libelle"=>"equipements"],
            ["libelle"=>"emballage"],
        ];
        foreach ($categories as  $value) {
            Categorie::create($value);
        }
    }
}
