<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagChart extends BaseChart
{
    public ?string $name = 'TagChart';
    public ?string $routeName = 'tagChart';
    public ?string $prefix = '/';
    public ?array $middlewares = ['auth', 'role:admin'];
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // select tags.name, articles.id from tags LEFT JOIN article_tag on article_tag.tag_id = tags.id INNER JOIN articles on articles.id = article_tag.article_id
        $tag_article = Tag::selectRaw('count(articles.id) cant, tags.name tag')
                            ->leftjoin('article_tag', 'tags.id', '=', 'article_tag.tag_id')
                            ->leftjoin('articles', 'articles.id', '=', 'article_tag.article_id')
                            ->groupBy('tags.name')->pluck('cant', 'tag');
        
        $tag_article = collect($tag_article);

        return Chartisan::build()
                        ->labels($tag_article->keys()->all())
                        ->dataset('Categoria', $tag_article->values()->all());
    }
}