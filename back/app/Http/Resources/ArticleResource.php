<?php

namespace App\Http\Resources;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $data=array_map(function($dat){
            // return  
            // [
            //     $dat[0]
                
                // "id"=>$dat->article_id,
                // "libelle"=>$dat->article->libelle,
                // "prix_unitaire"=>$dat->prix_unitaire,
                // // "path"=>$dat[0]["article"]["path"]
                // "path"=>base64_encode(Storage::get(str_replace("storage/app/public/" ,"",$dat->article->path))),
                // "reference"=>$dat->article->reference,
                // "categorie"=>Categorie::find( $dat->article->categorie_id)->first(),
                // "stock"=>$dat->article->stock,
            // ];
        // },$this);
        // return [$this->data];
        return[
            "id"=>$this->article->id,
            "libelle"=>$this->article->libelle,
            "prix_unitaire"=>$this->prix_unitaire,
            "path"=>base64_encode(Storage::get(str_replace("storage/app/public/" ,"",$this->article->path))),
            "reference"=>$this->article->reference,
            "categorie"=> new CategorieResource($this->article->categorie),
            "stock"=>$this->article->stock,
            // 'fournisseurs' => FournisseurResource::collection($this->fournisseur)

        ];
        // return $this["links"];
        // return [$this->];
    }
}
