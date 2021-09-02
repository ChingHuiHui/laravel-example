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

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        $files = File::files(resource_path('posts/'));

        return collect($files)
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(
                fn ($document) =>
                new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                )
            )
            ->sortByDesc('date');
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {

        // of all the blog posts, find the one with a slug that matches the one that was requested
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;

        // $path = resource_path("/posts/{$slug}.html");

        // if (!file_exists($path)) {
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

        //     $path = __DIR__ . "/../resources/posts/{$slug}.html";
        //     if(! file_exists($path)) {
        //         // dd('files does not exists' . $path);
        //         // ddd('files does not exists');
        //         // abort(404);
        //         return redirect('/posts');
        //     };

        //     // $post = cache()->remember("posts.{$slug}", now()->addMinutes(20), function()use($path) {
        //     //     var_dump('file_get_contents');
        //     //     return file_get_contents($path);
        //     // });

        //     $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));

    }
}
