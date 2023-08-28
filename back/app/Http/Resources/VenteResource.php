<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class VenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data= [
            "id"=>$this->id,
            "libelle"=>$this->libelle,
            "categorie"=>$this->categorie->libelle,
            "reference"=>$this->reference,
            "path"=>$this->path,
            'confection' => $this->articles->map(function($article) {
                return [
                  "id"=>$article->id,
                  "libelle"=>$article->libelle,
                  "reference"=>$article->reference,
                  "stock"=>$article->stock,
                  'quantite' => DB::table("article_article_vente")->where([
                      "article_vente_id"=>$article->id,
                      "article_id"=>$this->id,
                  ])->pluck('quantite')->first()
                   
                ];
              })
            // "quantite"=>
        ];
        if($this->promo)
            $data["promo"]=$this->promo;

        if($this->marge)
            $data["marge"]=$this->marge;
        return $data;
    }
}
