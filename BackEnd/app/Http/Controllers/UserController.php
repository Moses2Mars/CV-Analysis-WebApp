<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function createJobSeeker(Request $request) {
        $file = $request->file('image');
        if(!isset($file)){
            $path = 'assets/user_images/default.jpg';
        }else {
            $storage_path= Storage::disk('image')->put('/', $file);
            $storage_name = basename($storage_path);
            $path = 'assets/user_images/'.$storage_name;
        }
        //if $request->purpose="jobSeeker"
        $user = new User;
        
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->user_email = $request->email;
        $user->birth_date = $request->birthDate;

        if(isset($request->phoneNumber))
            $user->phone_number = $request->phoneNumber;
        $user->image_path = $path;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->field = $request->jobField;
        $user->experience = $request->yearsOfExperience;
        //encrypt the password because you should never save passwords as string
        $user->password = bcrypt($request->password);
        $user->save();

        return $user;
    }

    public function createRecruiter(Request $request) {
        //if $request->purpose="recruiter"
        $file = $request->file('image');
        if(!isset($file)){
            $path = 'assets/user_images/default.jpg';
        }else {
            $storage_path= Storage::disk('image')->put('/', $file);
            $storage_name = basename($storage_path);
            $path = 'assets/user_images/'.$storage_name;
        }
        $user = new Company();
        $user->image_path = $path;
        $user->company_name = $request->companyName;
        $user->company_email = $request->email;
        $user->country = $request->country;
        $user->address = $request->address;
        //encrypt the password because you should never save passwords as string
        $user->password = bcrypt($request->password);
        $user->save();

        return $user;
    }

    public function login(Request $request) {
        $user = User::where(['user_email' => $request->email])->first();
        
        if(isset($user) && $this->checkHashedPassword($request->password, $user->password)) {
            return ['email' => $user->user_email, 'name' => $user->first_name, 'purpose' => 'jobSeeker', 'id'=> $user->id];
        }

        //if user doesnt exist in users table, check if exists in companies table     
        $user = Company::where(['company_email' => $request->email])->first();
        
        if(isset($user) && $this->checkHashedPassword($request->password, $user->password)) {
            return ['email' => $user->company_email, 'name' => $user->company_name, 'purpose' => 'recruiter', 'id'=> $user->id];
        }
        
        //if not, abort
        abort(500, 'Something went wrong');
    }

    private function checkHashedPassword($passwordSent, $databasePassword) {
        $isCorrectPassword = Hash::check($passwordSent, $databasePassword);
        return $isCorrectPassword;
    }
}
