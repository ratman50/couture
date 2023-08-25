<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class ArticleVente extends Model
{
    use HasFactory;
    public function confection():BelongsToMany{
        return $this->belongsToMany(ArticleCategorie::class);
    }
    public function articles():BelongsToMany{
        return $this->belongsToMany(Article::class);
    }
    protected $guarded=["id"];
    protected static function booted(){
        
        static::created(function($request) {

            
        });
    }
}
