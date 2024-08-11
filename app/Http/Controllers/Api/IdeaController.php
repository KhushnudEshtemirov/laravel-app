<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
  // Create a new idea
  public function store(Request $request)
  {
    $idea = Idea::create($request->all());

    return response()->json($idea, 201);
    // return redirect()->route('dashboard');
  }

  // Get all ideas with pagination
  public function index()
  {
    $ideas = Idea::orderBy('created_at', 'desc')->paginate(3);
    // Log::info($ideas);
    // dd($ideas);
    return response()->json(['data' => $ideas]);
  }

  // Get one idea
  public function show($ideaId)
  {
    $idea = Idea::findOrFail($ideaId);
    $idea->likes = $idea->likes + 1;

    $idea->save();

    // dd($idea);
    return response()->json(['data' => [
      "id" => $idea->id,
      "content" => $idea->content,
      "likes" => $idea->likes,
    ]]);
  }

  // Update a idea
  public function update(Request $request, $ideaId)
  {
    $idea = Idea::findOrFail($ideaId);
    $idea->update($request->all());

    return response()->json($idea, 200);
  }

  // Delete a idea
  public function destroy($ideaId)
  {
    $idea = Idea::findOrFail($ideaId);
    $idea->delete();

    return response()->json(['message' => 'The idea is deleted'], 200);
  }
}
