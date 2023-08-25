<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles=[
            ["libelle"=>"coton","categorie_id"=>1,"path"=>"public/image1.jpeg","reference"=>"REF-COT-TISSU-1","stock"=>20],
            ["libelle"=>"lin","categorie_id"=>1,"path"=>"public/image2.jpeg","reference"=>"REF-LIN-TISSU-2","stock"=>20],
            ["libelle"=>"soie","categorie_id"=>1,"path"=>"public/image3.jpeg","reference"=>"REF-SOI-TISSU-3","stock"=>20],
            ["libelle"=>"aiguilles","categorie_id"=>2,"path"=>"public/image4.jpeg","reference"=>"REF-AIG-FOURNITURES-4","stock"=>20],
            ["libelle"=>"chemises","categorie_id"=>3,"path"=>"public/image5.jpeg","reference"=>"REF-CHE-VETEMENTS-5","stock"=>20],
            ["libelle"=>"test","categorie_id"=>3,"path"=>"public/image5.jpeg","reference"=>"REF-CHE-VETEMENTS-5","stock"=>20],
        ];
        foreach ($articles  as $value) {
            Article::create($value);

        }
    }
}
