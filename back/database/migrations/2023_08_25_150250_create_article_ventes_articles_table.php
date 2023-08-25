<?php

use App\Models\Article;
use App\Models\ArticleVente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_article_vente', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ArticleVente::class)->constrained();
            $table->foreignIdFor(Article::class)->constrained();
            $table->float("quantite");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_ventes_articles');
    }
};
