<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  // Get all posts
  public function getAllPosts()
  {
    $posts = Post::orderBy('created_at', 'desc')->paginate(3);
    // $posts = Post::paginate(3);

    return response()->json(['data' => $posts]);
  }

  // Get single post
  public function getSinglePost($postId)
  {
    $post = Post::findOrFail($postId);
    $post->eyes = $post->eyes + 1;

    $post->save();

    return response()->json(['data' => $post]);
  }

  // Create new post
  public function createPost(Request $request)
  {
    $post = Post::create($request->all());

    return response()->json($post, 201);
  }

  // Update post
  public function updatePost(Request $request, $postId)
  {
    $post = Post::findOrFail($postId);
    $post->update($request->all());

    return response()->json($post);
  }

  //Delete post
  public function deletePost($postId)
  {
    $post = Post::findOrFail($postId);
    $post->delete();

    return response()->json(['message' => 'Post is deleted successfully!']);
  }
}
