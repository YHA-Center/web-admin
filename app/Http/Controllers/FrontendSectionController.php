<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register; 
use App\Models\User;

class FrontendSectionController extends Controller
{

    public function fronthome(){
        return view("frontend_section.homepage"); 
    }
    public function courses(){
        return view("frontend_section.courses");
    }
    public function gallery(){
        return view("frontend_section.gallery");
    }
    public function project(){
        return view("frontend_section.project");
    }
    public function event(){
        return view("frontend_section.event");
    }
    public function course(){
        return view("frontend_section.course");
    }


    // pos
    public function pos(){
        return view("print.pos");
    }
    public function invoice(Request $request){
        return view("print.invoice");
    }


    public function student_signup(){
        return view('frontend_section.stu_signup');
    }

    public function student_signup_process(Request $request)
    {
        $phoneNumber = $request->input('ph');
        $user = Register::where('phone', $phoneNumber)->first();

        if ($user) {
            return response()->json(['name' => $user->name]);
        } else {
            return response()->json(['name' => 'Name not found']); // Return an empty name if not found
        }

        $validator = $request->validate([ 
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users,phone',
            'password' => 'required|string|min:2|confirmed',
            'email' => 'nullable|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'user';
        $user->email = $request->filled('email') ? $request->input('email') : 'no email';

        try {
            $user->save();
            return response()->json(['message' => 'User registered successfully']);
        } catch (\Exception $e) {
            \Log::error('Error saving user: ' . $e->getMessage());
            return response()->json(['error' => 'Error saving user.'], 500);
        }
    }


    public function student_login_process(Request $request){
        $phoneNumber = $request->input('phno');
        $password = $request->input('pass');

        $user = User::select('name', 'password', 'phone')->where('phone', $phoneNumber)->first();
        //dd($user);
        if ($user && password_verify($password, $user->password)) {
            session(['name' => $user->name, 'phone' => $user->phone]);
            return redirect()->route('fronthome');
        } else {
            return redirect()->route('signup.student_signup_process')->with('error', 'Invalid phone number or password');
        }
    }
}

    
