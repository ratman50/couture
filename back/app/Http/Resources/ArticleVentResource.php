<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleVentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "libelle"=>$this->libelle,
            "categorie"=>$this->categorie->libelle,
            "promo"=>$this->promo,
            "confections"=>$this->confection,
            "reference"=>$this->reference,
            "path"=>$this->path,
            "marge"=>$this->marge
        
        ];
    }
}
