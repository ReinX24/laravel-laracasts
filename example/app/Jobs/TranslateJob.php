<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Where the logic of the job will be triggered
        // logger('hello from TranslateJob'); // prints message to laravel.log
        logger('Transalting ' . $this->jobListing->title . ' to Spanish.');
    }
}
