<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleCategorie extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function fournisseur():BelongsTo{
        return $this->belongsTo(Fournisseur::class);
    }
    public function article():BelongsTo{
        return $this->belongsTo(Article::class);
    }
}
