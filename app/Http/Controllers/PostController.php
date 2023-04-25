<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Return All Posts Or Filtered Posts
    public function index()
    {
            /*
             * request('search') -> Value
             * request(['search'])-> array -> ['search' => 'value']
             * */

            // Send all Content To The Home Page Called posts
            return view("posts.index" , [
                'posts'  => Post::latest()->filter(
                    request(['search' , 'category' , 'author'])
                )->paginate(6) // Make 6 Posts Per Page
                    ->withQueryString() // Add all current query string values to the paginator. so you can paginate throw specific Category if it Has Many Posts
            ]);

    }

    // Return Specific Post
    public function show(Post $post)
    {
          /*  Another Way -> Post::where('id' , $post)->firstOrFail() Cause The Default Primary Key is an id
              if You want to Change it Look at getRouteKeyName()
          */
            return view("posts.show" ,[
                    "post"  => $post
                ]
            );
    }

}
