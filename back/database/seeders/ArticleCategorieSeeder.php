<?php

namespace Database\Seeders;

use App\Models\ArticleCategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records=[
            ["fournisseur_id"=>1,"article_id"=>1,"quantite"=>10,"prix_unitaire"=>200],
            ["fournisseur_id"=>2,"article_id"=>2,"quantite"=>20,"prix_unitaire"=>200],
            ["fournisseur_id"=>3,"article_id"=>3,"quantite"=>20,"prix_unitaire"=>200],
            ["fournisseur_id"=>1,"article_id"=>4,"quantite"=>20,"prix_unitaire"=>200],
            ["fournisseur_id"=>2,"article_id"=>5,"quantite"=>20,"prix_unitaire"=>200],
            ["fournisseur_id"=>3,"article_id"=>1,"quantite"=>10,"prix_unitaire"=>200],
        ];
        foreach ($records as  $value) {
            ArticleCategorie::create($value);
        }
    }
}
