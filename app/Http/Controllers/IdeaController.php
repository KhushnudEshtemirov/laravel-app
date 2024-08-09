<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate('required|min:3|max:10');

        $idea = Idea::create([
            'content' => request()->get('idea', null)
        ]);

        return redirect()->route('dashboard');
    }
}
