<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->content = request()->get('content');

        $comment->save();

        // return redirect()->route('/ideas', $idea->id)->with('success', 'Comment posted successfully!');
    }
}
