<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;

use App\Post;
use App\User;
use App\PostCategory;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = Auth::user();
        $post = Post::where('author_id', $user->id)->get();
            

        return view('story.index', compact('user', 'post'));
    }

    public function create()
    {
        $user = Auth::user();
        $category = PostCategory::get();

        return view('story.create', compact('user', 'category'));
    }

    public function imageUpload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
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
