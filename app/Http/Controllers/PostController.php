<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $posts = DB::table('posts')->get();
        $posts = Post::all();
        // dd($posts);
        return view("posts", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = $request->all();
        Post::create($post);
        // dd($post);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        // dd($post);
        return view('details', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        return view('editPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'status' => $request->input('status'),
        ]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::where('id', $id)->delete();
        return redirect("/posts");
    }

    /**
     * Display a listing of the trahsed resource .
     */
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view("trash", ["posts" => $posts]);
    }

    /**
     * Restore the specified resource.
     */
    public function restore(string $id)
    {
        //
        // dd("restore post with id : " . $id);
        Post::withTrashed()->find($id)->restore();
        return redirect("/posts/trash");
    }

    /**
     * Remove the specified resource from storage Permanently.
     */
    public function deletePermanently(string $id)
    {
        //
        // dd("delete permanently post with id : " . $id);
        Post::withTrashed()->find($id)->forceDelete();
        return redirect("/posts/trash");
    }
}
