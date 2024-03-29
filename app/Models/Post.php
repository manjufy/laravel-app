<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

   public static function all() {
     $files = File::files(resource_path("/posts/"));

     return array_map(function ($file) {
       return $file->getContents();
     }, $files);
   }

   public static function find($slug) {
     if (!file_exists($path = resource_path("/posts/{$slug}.html"))) {
       // ddd("file does not exists");
       // abort(404);
       throw new ModelNotFoundException();
     }

     return cache()->remember("post-{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));
   }
}
