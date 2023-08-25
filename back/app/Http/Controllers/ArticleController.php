<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\PaginationCatRessource;
use App\Http\Resources\PaginationCollection;
use App\Http\Resources\PaginationResource;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\ArticleCategorie;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
     
    public function index(){
        $groupByArticleId=function($data) {
            return $data->article_id;
          };
        $paginated=ArticleCategorie::with("fournisseur","article")->get()->groupBy($groupByArticleId);
        $paginated=$paginated->map(function($element){
            return [
                "id"=>$element[0]["article_id"],
                "libelle"=>$element[0]["article"]["libelle"],
                "prix_unitaire"=>$element[0]["prix_unitaire"],
                "fournisseur"=>$element->map(function($el){
                    return $el->fournisseur;

                },$element),
                "path"=>[
                    "codage"=>'data:image/jpeg;base64,'.base64_encode(Storage::get($element[0]["article"]["path"])),
                    "name"=>str_replace("public/",'',$element[0]["article"]["path"])
                ],
                "reference"=>$element[0]["article"]["reference"],
                "categorie"=>$element[0]["article"]->categorie,
                "stock"=>$element[0]["article"]["stock"],

            ];
        });
        return
        [
            "data"=>[

                "article"=>$paginated->paginate(3),
                "categorie"=>PaginationCatRessource::collection(Categorie::all()),
                "fournisseur"=>Fournisseur::all(),
                "total"=>array_map(function($element){
                    return [
                            "id"=>$element[0]->categorie->id,
                            "libelle"=>$element[0]->categorie->libelle,
                            "total"=>count($element)];
                },
                
                [...Article::all()->groupBy('categorie_id')]
                )
            ]
            
            
        ];

    }
    public function destroy(Article $article){
        ArticleCategorie::where("article_id",$article->id)->delete();
        $article->delete();
        return $article;

    }
    public function store(Request $request){
        $credentials=$request->validate([
            "libelle"=>"required|min:3|unique:articles",
            "prix_unitaire"=>"required|numeric",
            "categorie"=>["required","exists:categories,id"],
            "path"=>"required",
            "fournisseur"=>["required","array"],
            "stock"=>["required"],
            "reference"=>["required"]
        ]);
        $article=Article::create(
            [
                "libelle"=>$credentials["libelle"],
                "path"=>'public/' . $credentials["path"]["name"],
                "stock"=>2*$credentials["stock"],
                "categorie_id"=>$credentials["categorie"],
                "reference"=>$credentials["reference"]
            ]
            );
        foreach ($credentials["fournisseur"] as $value) {
            $image = str_replace('data:image/jpeg;base64,', '', $credentials["path"]["codage"]);

            Storage::disk('public')->put($credentials["path"]["name"], base64_decode($image));
            $approvisionnement=ArticleCategorie::create([
                "fournisseur_id"=>$value["id"],
                "article_id"=>$article->id,
                "quantite"=>$credentials["stock"],
                "prix_unitaire"=>$credentials["prix_unitaire"]
            ]);
        }
        return response($credentials);
    }
}
