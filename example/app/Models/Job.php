<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = "job_listings";

    // Data that could be filled in when inserting a job_listing record using
    // a Job object.
    protected $fillable = ['title', 'salary'];

    public function employer()
    {
        // This means that this job belongs to an instance of the Employer class
        // $job->employer
        return $this->belongsTo(Employer::class);
    }
}
