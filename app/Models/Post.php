<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
   public static function find($slug) {
     if (!file_exists($path = resource_path("/posts/{$slug}.html"))) {
       // ddd("file does not exists");
       // abort(404);
       throw new ModelNotFoundException();
     }

     return cache()->remember("post-{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));
   }
}
