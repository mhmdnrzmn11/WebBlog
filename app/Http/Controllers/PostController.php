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

    public function edit(Post $post)
    {
        $post = Post::where('author_id', Auth::user()->id)->first();
        return view('story.edit', compact('post'));
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
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string',
            'category' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
        ]);

        $thumbnailName = time().'.'.request()->thumbnail->getClientOriginalExtension();

        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->thumbnail = $thumbnailName;
        $post->content = $request->content;       
        $post->tanggal = date('Y-m-d');
        $post->author_id = $user->id;
        $post->save();

        $request->thumbnail->move('storage/uploads', $thumbnailName);
        return redirect('me/stories')->with('Succes', 'Story has been published')->with('thumbnail', $thumbnailName);                    
    }

    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',            
        ]);
        
        $update = array(
            'title'     =>  $request->title,
            'content'   =>  $request->content
        );
        
        $post = Post::where('id', $id);
        $post->update($update);

        Session::flash('Success', 'Story has been Updated');

        return redirect(route('stories.index'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('Success', 'Post has been Removed');
    }
}
