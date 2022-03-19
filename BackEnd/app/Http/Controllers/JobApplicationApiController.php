<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListings;
use Illuminate\Http\Request;

class JobApplicationApiController extends Controller
{
    public function getJobApplicationsFromUUID($job_uuid) {
        return JobApplication::where('job_uuid', $job_uuid)->get();
    }

    public function addJobApplicant(Request $request) {
        $has_applied = JobApplication::where(['user_email'=> $request->email, 'job_uuid'=> $request->job_uuid])->first();

        if(isset($has_applied)) 
            abort(512, 'You Have Already Applied');

        //need to add 1 to joblisting table where uuid is  job_uuid
        $job_listing = JobListings::where('uuid', $request->job_uuid)->first();
        $job_listing->applicants_applied++;
        $job_listing->save();
        
        $job_applicant = new JobApplication();
        $job_applicant->user_email = $request->email;
        $job_applicant->job_uuid = $request->job_uuid;
        $job_applicant->save();
    }
}
