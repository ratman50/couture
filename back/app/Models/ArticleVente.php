<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class ArticleVente extends Model
{
    use HasFactory;
    public function confection():BelongsToMany{
        return $this->belongsToMany(Article::class);
    }
    public function articles():BelongsToMany{
        return $this->belongsToMany(Article::class);
    }
    public function categorie():BelongsTo{
        return $this->belongsTo(CategorieVente::class,"categorie_vente_id");
    }
    protected $guarded=["id"];
    
}
