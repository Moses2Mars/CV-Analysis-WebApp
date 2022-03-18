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
        $job->company_id = $request->companyId;
        $job->company_name = $request->companyName;
        $job->contact_email = $request->contactEmail;
        $job->release_date = $request->releaseDate;
        $job->expiry_date = $request->expiryDate;
        $job->field_required = $request->fieldRequired;
        $job->position_required = $request->positionRequired;
        $job->applicants_needed = $request->applicantsNeeded;
        $job->applicants_applied = 0;
        $job->required_experience = $request->requiredExperience;
        $job->job_description = $request->jobDescription;
        $job->save();
        return $job;
    }

    public function getJobListingsForCompany($company_id) {
        $jobs = JobListings::where('company_id', $company_id)->get();
        if(isset($jobs)){
            foreach($jobs as $job) {
                //if the expiry date is less than today's date, it means the job has expired
                if($job['expiry_date'] < date('Y-m-d')) {
                    $job['state'] = 'Complete';
                    //if the release date is greater than today's date and the expiry date is greater than today's date  
                    //it means the job list has been scheduled to release
                } else if($job['release_date'] > date('Y-m-d') && $job['expiry_date'] > date('Y-m-d')) {
                    $job['state'] = 'Scheduled';
                    //if the release date is less than today's date and the expiry date is greater than today's date  
                    //it means the job list is running
                }else if($job['release_date'] <= date('Y-m-d') && $job['expiry_date'] >= date('Y-m-d')) {
                    $job['state'] = 'Running';
                }
            }
        }
        return $jobs;
    }

    public function getAllRunningJobs() {
        return JobListings::where('release_date', '<=', date('Y-m-d'))->where('expiry_date', '>', date('Y-m-d'))->get();
    }

    public function getJobListingsFromUUID($uuid) {
        return JobListings::where('uuid', $uuid)->first();
    }
}
