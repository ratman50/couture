<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vente extends Model
{
    use HasFactory;
    protected $table="ventes";

    public function confection():BelongsTo{
        return $this->belongsTo(Article::class);
    }
    public function vente():BelongsTo{
        return $this->belongsTo(ArticleVente::class);
    }
}
