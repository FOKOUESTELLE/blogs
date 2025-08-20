<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


use Illuminate\View\View;


class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function postsByCategory(Category $category):View
    {
         return view('posts.index', [
            //'posts' => $category->posts()->paginate(10),
            'posts' => Post::where(
                'category_id', $category->id
            )->latest()->paginate(perPage: 4),
        ]);
    }

     public function postsByTag(Tag $tag):View
         {
              return view('posts.index', [
                 //'posts' => $category->posts()->paginate(10),
                 'posts' => $tag->posts()->latest()->paginate(10),
             ]);
         }

    public function show (Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);

    }
}
