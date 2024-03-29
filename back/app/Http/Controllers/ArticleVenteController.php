<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenteRequest;
use App\Http\Resources\ArticleVentResource;
use App\Http\Resources\VenteResource;
use App\Models\Article;
use App\Models\ArticleVente;
use App\Models\CategorieVente;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ArticleVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return[
            "data"=>[
                "article"=>VenteResource::collection(ArticleVente::all())->paginate(2),
                "categorie"=>CategorieVente::all()
            ],

        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenteRequest $request)
    {
        return DB::transaction(function() use ($request){
            $articleVente=new ArticleVente();
            $articleVente->libelle=$request['libelle'];
            $articleVente->categorie_vente_id=$request["categorie"]["id"];
            $articleVente->reference=$request["reference"];
            $articleVente->path=$request["path"];
            if(isset($request["promo"]))
                $articleVente->promo=$request["promo"];
            if(isset($request["marge"]))
                $articleVente->promo=$request["marge"];
            $articleVente->save();
            $confectionsData = array_reduce($request['confections'], 
            function($carry, $item){
                $carry[$item['id']] =["quantite"=> $item['quantite']];  
                return $carry;
              }, []);

            $articleVente->articles()->sync($confectionsData);  
            return $articleVente;
        });   
 }

    /**
     * Display the specified resource.
     */
    public function show(string $libelle)
    {
        $res=ArticleVente::where("libelle","like",$libelle."%")->get();
       
        return response([
            'data'=>$res,
            "message"=>"not found"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleVente $articleVente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleVente $articleVente)
    {
        //
    }
}
