<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isNull;

class JobApplicationApiController extends Controller
{
    public function getJobApplicationsFromUUID($job_uuid) {
        $array = array();
        $job_applicants = JobApplication::where('job_uuid', $job_uuid)->get();
        foreach($job_applicants as $job_applicant) {
            $user = User::where('user_email', $job_applicant->user_email)->first();
            $user['percentage'] = $job_applicant->percentage;
            array_push($array, $user);
        }
        return $array;
    }

    public function addJobApplicant(Request $request) {
        //need to add 1 to joblisting table where uuid is  job_uuid
        $job_listing = JobListings::where('uuid', $request->job_uuid)->first();
        $job_listing->applicants_applied++;
        $job_listing->save();
        
        $job_applicant = new JobApplication();
        $job_applicant->user_email = $request->email;
        $job_applicant->job_uuid = $request->job_uuid;
        $job_applicant->percentage = $request->percentage;
        $job_applicant->save();
    }

    public function hasApplied(Request $request) {
        $has_applied = JobApplication::where(['user_email'=> $request->email, 'job_uuid'=> $request->job_uuid])->get()->count();
        if($has_applied > 0) {
            return true;
        }else {
            return false;
        }
    }
}
