<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationApiController extends Controller
{
    public function getJobApplicationsFromUUID($job_uuid) {
        return JobApplication::where('job_uuid', $job_uuid)->get();
    }

    public function addJobApplicant(Request $request) {
        $job_applicant = new JobApplication();
        $job_applicant->user_email = $request->email;
        $job_applicant->job_uuid = $request->job_uuid;
        $job_applicant->save();
    }
}
