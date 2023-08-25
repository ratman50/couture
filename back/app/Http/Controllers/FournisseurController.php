<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index(){
        return response([
            "data"=>Fournisseur::all(),
            "message"=>""
        ]);
    }
    public function show( $fournisseur){
        return response([
            "data"=>Fournisseur::where("name","like","$fournisseur%")->get(),
            "message"=>""
        ]);
    }
}
