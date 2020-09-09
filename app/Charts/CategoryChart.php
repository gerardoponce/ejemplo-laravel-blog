<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Article;

class CategoryChart extends BaseChart
{
    public ?string $name = 'CategoryChart';
    public ?string $routeName = 'categoryChart';
    public ?string $prefix = '/';
    public ?array $middlewares = ['auth', 'role:admin'];
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // SELECT count(articles.id), categories.name from articles RIGHT JOIN categories on articles.category_id = categories.id GROUP BY categories.name
        $category_article = Article::selectRaw('COUNT(articles.id) cant, categories.name category')
                                    ->rightJoin('categories', 'articles.category_id', '=', 'categories.id')
                                    ->groupBy('categories.name')->pluck('cant', 'category');
        
        $category_article = collect($category_article);
                            
        return Chartisan::build()
                        ->labels($category_article->keys()->all())
                        ->dataset('Sample', $category_article->values()->all());
    }
}