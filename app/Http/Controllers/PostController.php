<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Post;
use App\User;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = Auth::user();
        $post = Post::all();
            

        return view('post.index', compact('user', 'post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'date' => 'required',
            'category_id' => 'required',            
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'date' => date('d-m-Y'),
            'category_id' => $request->get('catogory_id'),
            'author_id' => $request->get('author_id')
        ]);

        if ($post->save()) {
            return Redirect::back()->with('Succes', 'Post has been Added');
        }

    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'date' => 'required',
            'category_id' => 'required',            
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->date = date('d-m-Y');
        $post->category_id = $request->category_id;
        $post->author_id = $request->author_id;

        $post->save();

        Session::flash('Success', 'Post has been Updated');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return Redirect::back()->with('Success', 'Post has been Removed');
    }
}
