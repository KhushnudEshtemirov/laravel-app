<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{
  public function store()
  {
    $idea = Idea::create([
      'content' => request()->get('idea', null)
    ]);

    return redirect()->route('dashboard');
  }

  public function index(Request $request)
  {
    $ideas = Idea::query()->paginate(2);
    Log::info($ideas);
    // dd($ideas);
    return response()->json(['data' => $ideas]);
  }

  public function show(Request $request, $ideaId)
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
}
