<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaginationCatRessource;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends Controller
{
    public function index()
    {
        // dd(Categorie::paginate(3)->getCurrentPage());
        return PaginationCatRessource::collection(Categorie::paginate(3));
    }

    public function store(Request $request){
        $credentials=$request->validate([
            "libelle"=>["required","unique:categories","min:4"]
        ]);
        $categorie=Categorie::create($credentials);
        return response([
            "data"=>[$categorie],
            "message"=>""
        ]);
    }
    public function update(Request $request, $cate){
        $credentials=$request->validate([
            "libelle"=>["required","unique:categories"]
        ]);
        $res=Categorie::findOrFail($cate)->update(["libelle"=>$credentials["libelle"]]);
        
        return response([
            "data"=>[
                "id"=>$cate,
                "libelle"=>$credentials["libelle"]
            ],
            "message"=>""
        ]);
    }
    public function handleActif(Request $request)
    {
        $credentials=$request->validate([
            "ids"=>["required","array"]
        ]);
        $tabRes=[];
        $res=Categorie::whereIn("id",$credentials["ids"])->withTrashed()->get();
        foreach ($res as  $value) {
            if($value->trashed()){
                $value->restore();
            }
            else{
                $tabRes[]=$value;
                $value->delete();
            }
        }
        if(count($tabRes))
            return response([
                "data"=>$tabRes,
                "message"=>"mise a jour avec succes"
            ]);
        else{
            return response([
                "data"=>[],
                "message"=>"aucune n'a été supprimé"
            ]);
        }

    }
    public function show($categorie){
        if(strlen($categorie)<3)
            return[
                "data"=>[],
                "message"=>"trop court "
            ];
        $find=Categorie::where("libelle","like",$categorie)->first();
        $response=[
            "data"=>[$find],
            "message"=>"trouvé avec succes"
        ];
        if(!$find)
        {
            $response["message"]="non trouve";
            return response($response,Response::HTTP_NOT_FOUND);
        }
        return response($response);
    }
}
