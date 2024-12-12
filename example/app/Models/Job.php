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
    protected $fillable = ['employer_id', 'title', 'salary'];

    // All fields are accepted when making a POST request
    // protected $guarded = [];

    public function employer()
    {
        // This means that this job belongs to an instance of the Employer class
        // $job->employer
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        // This means that this job belongs to many tags
        // $job->tags
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
