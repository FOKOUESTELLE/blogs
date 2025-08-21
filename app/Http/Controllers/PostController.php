<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


use Illuminate\View\View;


class PostController extends Controller
{
    public function index(Request $request): View
    {

        return $this->postView($request->search ? ['search' => $request->search] : []);

    }

    public function postsByCategory(Category $category):View
    {
        return $this->postView(['category' => $category]);
    }

     public function postsByTag(Tag $tag):View
         {

             return $this->postView(['tag' => $tag]);

         }

         protected function postView(array $filters):View
         {

            return view('posts.index', [

                'posts' => Post::filters($filters)->latest()->paginate(10),
            ]);

         }

    public function show (Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);

    }
}
