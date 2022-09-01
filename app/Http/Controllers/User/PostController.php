<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    function index(Request $request, $user_id)
    {
        $posts = Post::where('user_id', $user_id)->get();
        return view('dashboard.post.post')->with(['posts' => $posts,'userId'=>$user_id]);
    }
    function create(Request $request)
    {
        $request->validate([
            'image'=>['required','mimes:png,jpg,jpeg','max:5048'],
            'body'=> ['required'],
            'title'=>['required']
        ]);
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $test = $request->image->move(public_path('images'),$newImageName);
        
        //Methods we can use on $request 
        //guessExtension()
        // getMimeType()
        // store()
        // asStore()
        // storePublicly()
        // move()
        // getClientOriginalName()
        // getClientMimeType()
        // guessClientExtension()
        // getSize()
        // getError()
        // isValid() if its the right mime
        // $test = $request->file('image')->getSize();
        // dd($test);

        $current_user_id = Auth::user()->id;

        $post = new Post;
        // $post->user_id = $request->user()->id;
        $post->user_id = $current_user_id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image_path = $newImageName;
        $save = $post->save();
        if ($save) {
            return redirect()->route('user.post', ['user_id' => $current_user_id])
                ->with('success', 'Post successfully created.');
        } else {
            return redirect()->route('user.post', ['user_id' => $current_user_id])
                ->with('fail', 'Something went wrong, Post couldnt be created.');
        }
    }
    // function delete($id, Post $post)
    // {
    //     if (!Gate::allows('update-post', $post)) {
    //         dd('you are not allowed to delete');
    //         abort(403);
    //     }
    //     $post = Post::where('id', $id)->get();
    //     $post->delete();
    //     return redirect()->route('user.post');
    // }
    function destroy(Request $request,Post $post, $user_id, $post_id)
    {
        // $post = Post::where('id', $post_id);
        // $post = Post::where('id', $post_id)->first();
        $post = Post::find($post_id);
        // $post_ = Post::where('id', $post_id)->first();
        // $post = Post::where('id', $post_id)->get()->first();
        // $post = Post::where('id', $post_id)->first()->get();
        // $post_ = Post::where('id', $post_id)->get();
        
        if(Gate::denies('update-post',$post)){
            abort(403);
        }        
        // dd($post);
        // $post = $post->get();
        $delete_result = $post->delete();
        if ($delete_result) {
            return redirect()->route('user.post', ['user_id' => $user_id])->with('success', 'Post Deleted Successfully');
            dd('deleted successfully');
        } else {
            return redirect()->route('user.post', ['user_id' => $user_id])->with('fail', 'Post Not Deleted Successfully');
            dd('couldn\'t delete the post ');
        }
    }
    function edit(Request $request, Post $post, $user_id, $post_id)
    {
        // it needs to be authorized first

        /* I should send the title and body post with GET method so that I don't send 
        ** request to DB 
        */
        // $post = new Post;
        // dd($post);
        
        // $post = Post::where('id',$post_id)->first();
        $post = Post::find($post_id);
        if(Gate::denies('update-post',$post)){
            abort(403);
        } 
        return view('dashboard.post.update',['post'=>$post]);
    }
    function update(Request $request,$user_id, $post_id){
        $post = Post::find($post_id);
        if(Gate::denies('update-post',$post)){
            return abort('403');
        }
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $save = $post->save();
        if($save){
            return redirect()->route('user.post',['user_id'=>$user_id])->with('success','The post has been updated successfully.');
        }else{
            return redirect()->route('user.post',['user_id'=>$user_id])->with('fail','The post couldn\'t get updated.');
        }
    }
}
