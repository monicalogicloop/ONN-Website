<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogRepository implements BlogInterface 
{
    public function listAll() 
    {
        return Blog::latest()->get();
    }

    public function listById($id) 
    {
        return Blog::findOrFail($id);
    }

    public function create(array $data) 
    {
        $blog = new Blog;
        $blog->title    = $data['title'];
        $blog->slug     = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);
        $blog->image    = $data['image'] ?? null;
        $blog->content  = $data['content'];
        $blog->position = $data['position'] ?? 0;
        $blog->status   = 1;
        $blog->save();

        return $blog;
    }

    public function update($id, array $data) 
    {
        $blog = Blog::findOrFail($id);
        $blog->title    = $data['title'];
        $blog->slug     = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);
        $blog->image    = $data['image'] ?? $blog->image;
        $blog->content  = $data['content'];
        $blog->position = $data['position'] ?? 0;
        $blog->save();

        return $blog;
    }

    public function toggle($id) 
    {
        $blog = Blog::findOrFail($id);
        $blog->status = ($blog->status == 1) ? 0 : 1;
        $blog->save();

        return $blog;
    }

    public function delete($id) 
    {
        Blog::destroy($id);
    }
}