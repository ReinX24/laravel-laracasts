<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        // employer->user grabs the user's in general
        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );

        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        // Checks if the user is authorized to edit a certain job
        // Gate::define('edit-job', function (User $user, Job $job) {
        // Checks if the currently logged in user is the one who is responsible
        // for the job.
        // is() checks if the two models have the same id and belong to the same
        // table.
        // isNot() is the reverse of is().
        // return $job->employer->user->is(Auth::user());
        //     return $job->employer->user->is($user);
        // });

        // If the user is not signed in, redirect them to the login page
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // Checks if the current user can edit the job, returns 403 if not
        // Gate::authorize('edit-job', $job);

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
