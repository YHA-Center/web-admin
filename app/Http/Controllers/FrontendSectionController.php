<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class FrontendSectionController extends Controller
{

    public function index(){
        return view("frontend_section.homepage");
    }

    public function student_signup(){
        return view('frontend_section.stu_signup');
    }

    public function student_signup_process(Request $request){
        {
            $phoneNumber = $request->input('phone');

            // Check if the phone number exists in the Register table
            $register = Register::where('phone', $phoneNumber)->first();
    
            if ($register) {
                // Phone number exists, user is registered
                return redirect()->route('index')->with('success', 'You have signed up successfully.');
            } else {
                // Phone number doesn't exist, user is not registered
                return redirect()->route('signup.student_signup_process')->with('error', 'You haven\'t registered yet.');
            }}
    }
}
