<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\b;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::paginate(10)
        ]);
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit' , ['post' => $post]);
    }
    public function create()
    {
        return view('posts.create' , [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $validator = array_merge($this->validatePost() , [
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        Post::create($validator);
        return redirect('/');
    }

    public function update(Post $post)
    {
        $validator = $this->validatePost($post);
        if ($validator['thumbnail'] ?? false){
            $validator['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($validator);
        return back()->with('success' , 'updated!');

    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success' , 'deleted!');
    }

    protected function validatePost(?Post $post = null)
    {
        // if we didn't send the post parameter [null] create new one
        $post ??=new Post();
        return request()->validate([
            'title' => ['required'],
            'body' => ['required'],
            'category_id' => ['required' , 'integer' , Rule::exists('categories' , 'id')],
            'thumbnail' => $post->exists ?  ['image'] : ['required' , 'image']
        ]);

    }
}
