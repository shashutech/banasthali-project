<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);
        return view('posts/index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handling File Upload
        if($request->hasFile('coverImg')){
            // Get Complete File Name 
            $originalName = $request->file('coverImg')->getClientOriginalName();
            // Getting only File name
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            // Getting Extension
            $extension = $request->file('coverImg')->getClientOriginalExtension();
            // File Name to Store
            $fileNameToStore = $fileName.'_'. time() . '.' . $extension;

            $path = $request->file('coverImg')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noImg.jpg';
        }

        // Getting Form Data
        $post = new Post;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->meta_tags = $request->metaTags;
        $post->meta_description = $request->metaDescription;

        $post->save();

        return redirect('/posts')->with('success', 'Post Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('posts/single')->with([
            'post'=>$post,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handling File Upload
        if($request->hasFile('coverImg')){
            // Get Complete File Name 
            $originalName = $request->file('coverImg')->getClientOriginalName();
            // Getting only File name
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            // Getting Extension
            $extension = $request->file('coverImg')->getClientOriginalExtension();
            // File Name to Store
            $fileNameToStore = $fileName.'_'. time() . '.' . $extension;

            $path = $request->file('coverImg')->storeAs('public/cover_images', $fileNameToStore);
        }


        $post = Post::find($id);
        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = $request->body;
        if($request->hasFile('coverImg')){
            $post->cover_image = $fileNameToStore;
        }
        $post->meta_tags = $request->metaTags;
        $post->meta_description = $request->metaDescription;
        $post->update();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
