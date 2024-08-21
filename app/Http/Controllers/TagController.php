<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke($name)
    {

        $name = strtolower($name);


        $tag = Tag::whereRaw('LOWER(name) = ?', [$name])->firstOrFail();


        return view('results', ['jobs' => $tag->jobs]);
    }
}
