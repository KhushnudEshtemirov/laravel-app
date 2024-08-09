<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
    public function store()
    {
        $idea = Idea::create([
            'content' => request()->get('idea', null)
        ]);

        return redirect()->route('dashboard');
    }
}
