<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return[

            "data"=>PaginationResource::collection($this->collection),
            "links"=>$this->paginationInformation()
            // "links"=>$this->links
        ];
       
    }
    public function paginationInformatino(){
        
    }
}
