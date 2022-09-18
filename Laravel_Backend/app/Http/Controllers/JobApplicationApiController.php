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
            $user['resume'] = $job_applicant->resume_path;
            array_push($array, $user);
        }
        return $array;
    }

    public function addJobApplicant(Request $request) {        
        $file = $request->file('file');

        $storage_path= Storage::disk('CV')->put('/', $file);
        $storage_name = basename($storage_path);
        $path = '/user_resumes/'.$storage_name;

        $job_applicant = new JobApplication();
        $job_applicant->user_email = $request->email;
        $job_applicant->job_uuid = $request->job_uuid;
        $job_applicant->percentage = $request->percentage;
        $job_applicant->resume_path = $path;
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
