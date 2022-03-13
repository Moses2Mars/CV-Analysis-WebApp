<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobListingsController extends Controller
{
    public function createJobListing(Request $request) {
        $job = new JobListings;
        $job->uuid = Str::uuid();
        $job->company_name = $request->companyName;
        $job->contact_email = $request->contactEmail;
        $job->release_date = $request->releaseDate;
        $job->expiry_date = $request->expiryDate;
        $job->field_required = $request->fieldRequired;
        $job->position_required = $request->positionRequired;
        $job->applicants_needed = $request->applicantsNeeded;
        $job->required_experience = $request->requiredExperience;
        $job->job_description = $request->jobDescription;
        $job->save();
        return $job;
    }
}
