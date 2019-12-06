<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostCategory;

class StoryController extends Controller
{
    public function welcome()
    {
        $newPost = Post::orderBy('id', 'desc')->take(3)->get();

        return view('welcome', compact('newPost'));
    }

    public function index()
    {
        $newPost = Post::orderBy('id', 'desc')->take(3)->get();
        $sport = Post::where('category_id', 1)->orderBy('id', 'desc')->take(3)->get();
        $oto = Post::where('category_id', 2)->orderBy('id', 'desc')->take(3)->get();
        $games = Post::where('category_id', 3)->orderBy('id', 'desc')->take(3)->get();
        $photo = Post::where('category_id', 4)->orderBy('id', 'desc')->take(3)->get();
        $tech = Post::where('category_id', 5)->orderBy('id', 'desc')->take(3)->get();
        $misc = Post::where('category_id', 6)->orderBy('id', 'desc')->take(3)->get();

        return view('blog.index', compact('newPost', 'sport', 'tech', 'photo', 'oto', 'games', 'misc'));
    }

    public function read($id)
    {        
        $post = Post::where('id', $id)->first();
        $baca = Post::orderBy('id', 'desc')->take(6)->get();

        return view('blog.read', compact('post', 'baca'));
    }

    public function automotive()
    {        
        $post = Post::where('category_id', 2)->get();

        return view('blog.category.automotive', compact('post'));
    }

    public function technology()
    {
        $post = Post::where('category_id', 5)->get();

        return view('blog.category.technology', compact('post'));
    }

    public function photoghrapy()
    {
        $post = Post::where('category_id', 4)->get();

        return view('blog.category.photoghrapy', compact('post'));
    }

    public function sports()
    {
        $post = Post::where('category_id', 1)->get();

        return view('blog.category.sports', compact('post'));
    }

    public function games()
    {
        $post = Post::where('category_id', 3)->get();

        return view('blog.category.games', compact('post'));
    }

    public function misc()
    {
        $post = Post::where('category_id', 6)->get();

        return view('blog.category.misc', compact('post'));
    }
}
