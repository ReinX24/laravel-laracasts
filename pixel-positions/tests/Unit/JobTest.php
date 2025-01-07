<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

it('belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // Act and Assert
    expect($job->employer->is($employer))->toBeTrue();
});

it('belongs to a user', function () {
    // Arrange
    $user = User::factory()->create();
    $employer = Employer::factory()->create([
        'user_id' => $user->id
    ]);

    // Act and Assert
    expect($employer->user->is($user))->toBeTrue();
});

it('can have tags', function () {
    // Arrange
    $job = Job::factory()->create();

    // Act
    $job->tag('Frontend');

    // Assert
    expect($job->tags)->toHaveCount(1);
});
