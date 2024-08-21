<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // Retrieve the search query
        $query = $request->input('q');

        // Perform case-insensitive search using LOWER() function
        $jobs = Job::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])->get();

        return view('results', ['jobs' => $jobs]);
    }
}
