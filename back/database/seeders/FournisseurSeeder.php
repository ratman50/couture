<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fournisseurs=[
            ["name"=>"adam_service"],
            ["name"=>"adamtest_service"],
            ["name"=>"galan_SA"],
            ["name"=>"galane_SA"],
            ["name"=>"galaean_SA"],
            ["name"=>"galsen_Service"],
        ];
        foreach ($fournisseurs as  $value) {
            Fournisseur::create($value);
        }
    }
}
