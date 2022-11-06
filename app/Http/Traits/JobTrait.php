<?php

namespace App\Http\Traits;

trait JobTrait {

    public $jobTypes = [
        'FULL_TIME' => 'Full Time',
        'PART_TIME' => 'Part Time',
        'CONTRACTOR' => 'Contractor',
        'TEMPORARY' => 'Temporary',
        'INTERN' => 'Intern',
        'VOLUNTEER' => 'Volunteer',
        'PER_DIEM' => 'Per Diem',
    ];
    
}