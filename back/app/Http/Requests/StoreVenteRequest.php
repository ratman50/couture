<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "libelle"=>'required|unique:article_ventes', 
            "categorie"=>"required|numeric",
            "confections"=>"required|array",
            "reference"=>"required|string",
            "promo"=>"sometimes|required",
            "marge"=>"sometimes|required"
        ];
    }
}
