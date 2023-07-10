<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $slug, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }
    /**
     * returns content of all files in 'resource_path/posts'
     * @return array|string[]
     */
    public static function all(){
        return cache()->remember('posts.all', now()->addMinutes(5), function (){
            return collect(File::files(resource_path("/posts")))
                -> map(fn($file) => YamlFrontMatter::parseFile($file))
                -> map(fn($document) => new Post (
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ))
                -> sortByDesc('date');
        });
    }
    /**
     * Given a slug, returns file matching that slug
     * @param $slug
     * @return mixed
     */
    public static function find($slug)
    {
        return (static::all()-> firstWhere('slug', $slug));
    }
}
