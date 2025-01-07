<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        // dd(request('q'));
        // TODO: resume @8:08:00
        Job::where('title', 'LIKE', '%' . request('q') . '%');
    }
}
