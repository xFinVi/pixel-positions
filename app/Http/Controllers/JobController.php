<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = Job::all();
        $featuredJobs = Job::where('featured', true)->get();
        $tags = Tag::all();

        return view('jobs.index', [
            'jobs' => $jobs,
            'featuredJobs' => $featuredJobs,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'workplace' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        // Ensure user is authenticated
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->withErrors('You need to be logged in to post a job.');
        }

        // Ensure user has an associated employer
        $employer = $user->employer;
        if (!$employer) {
            return redirect('/')->withErrors('You need to have an employer profile to post a job.');
        }

        $attributes = $request->only(['title', 'salary', 'location', 'schedule', 'url', 'description', 'workplace']);
        $attributes['featured'] = $request->has('featured');

        // Create job
        $job = $employer->jobs()->create($attributes);

        // Attach tags if present
        if ($request->filled('tags')) {
            $tags = explode(',', $request->tags);
            $tagIds = [];

            foreach ($tags as $tagName) {
                $tagName = strtolower(trim($tagName)); // Convert tag name to lowercase
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }

            $job->tags()->sync($tagIds);
        }
        session()->flash('success', 'Job posted successfully!');


        // Return a redirect to the jobs.create route
        return redirect('/jobs/create');
    }

    public function jobsOnly()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get(); // Fetch all jobs
        $tags = Tag::all(); // Fetch all tags

        return view('jobs.jobsOnly', [
            'jobs' => $jobs,
            'tags' => $tags,
        ]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        // Validate the request data
        $jobAttributes = $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'workplace' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        $jobAttributes = $request->only(['title', 'salary', 'location', 'schedule', 'url', 'description', 'workplace']);
        $jobAttributes['featured'] = $request->has('featured');

        $job->update($jobAttributes);

        // Update tags if provided
        if ($request->filled('tags')) {
            $tags = explode(',', $request->tags);
            $tagIds = [];

            foreach ($tags as $tagName) {
                $tagName = strtolower(trim($tagName));
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }

            $job->tags()->sync($tagIds);
        }

        session()->flash('success', 'Job updated successfully!');


        return redirect()->route('jobs.edit', $job->id);
    }


    public function destroy(Job $job)
    {
        $user = Auth::user();
        if ($user->id !== $job->employer_id) {
            return redirect('/')->withErrors("You do not have permission to delete this listing!");
        }
        $job->delete();
        return redirect('/jobs')->with('message', 'Job deleted successfully');
    }
}
