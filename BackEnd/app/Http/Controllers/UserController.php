<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request) {
        //if $request->purpose="jobSeeker"
        dd($request);
        $user = new User;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->user_email = $request->email;
        $user->birth_date = $request->birthDate;

        if(isset($request->phoneNumber))
            $user->phone_number = $request->phoneNumber;

        $user->country = $request->country;
        $user->address = $request->address;
        $user->field = $request->jobField;
        $user->experience = $request->yearsOfExperience;
        //encrypt the password because you should never save passwords as string
        $user->password = bcrypt($request->password);
        $user->save();
    }
}
