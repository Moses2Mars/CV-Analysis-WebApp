<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationApiController extends Controller
{
    public function getJobApplicationsFromUUID($job_uuid) {
        return JobApplication::where('job_uuid', $job_uuid)->get();
    }
}
