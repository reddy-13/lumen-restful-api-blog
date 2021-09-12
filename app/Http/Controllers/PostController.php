<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        #posts 
        return Post::all();
    }

    public function store(Request $request)
    {
        try {
            //validation
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;

            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        # updates post by id 
        try {
            //validation
            $post =  Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;

            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post updated successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        # delete posts by id
        try {
            //validation
            $post =  Post::findOrFail($id);
            if ($post->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Post deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}