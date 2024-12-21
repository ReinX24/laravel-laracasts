<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Using eager loading for our database, gets records and their employers
        // in a single query rather than multiple queries.
        // This query gets the Job records along with their employers
        // $jobs = Job::with('employer')->get();

        // This is better than using this, which uses lazy loading and runs more
        // queries on our database.
        // $jobs = Job::all();

        // Using pagination
        // $jobs = Job::with('employer')->paginate(3); // 1, 2, 3
        $jobs = Job::with('employer')->latest()->simplePaginate(3); // next, previous
        // $jobs = Job::with('employer')->latest()->cursorPaginate(3); // most performant

        return view(
            'jobs.index',
            [
                'jobs' => $jobs
            ]
        );
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        // Finds the first instance of the boolean being true
        // $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
        // Adding validation for our request data
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        // $job = Job::find($id);
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
        // authorize (on hold...)

        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // find and update the job
        // $job = Job::findOrFail($id);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        // redirect to the job page
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        // authorize (on hold...)

        // delete the job
        // Job::findOrFail($id)->delete();
        $job->delete();

        // redirect
        return redirect("/jobs");
    }
}
