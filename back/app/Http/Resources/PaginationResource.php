<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            "libelle"=>$this->libelle,
            "prix"=>$this->prix,
            "reference"=>$this->reference,
            "stock"=>$this->stock,
            "path"=>$this->path,
            "categorie"=>$this->categorie->libelle
        ];
    }
}
