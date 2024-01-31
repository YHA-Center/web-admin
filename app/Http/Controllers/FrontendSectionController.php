<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register; 
use App\Models\User;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Voucher;
use App\Models\finalPay;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Welcome;
use App\Models\About;
use App\Models\AboutDesc;
use App\Models\Project;
use App\Models\Teacher;
use App\Models\Address;
use App\Models\Event;

class FrontendSectionController extends Controller
{

    public function fronthome(){
        $sliders = Welcome::all();
        $abouts = About::all();
        $aboutDesc = AboutDesc::all();
        $project = Project::all();
        $teacher = Teacher::all();
        $address = Address::all();
        
        return view("frontend_section.homepage", [
            'sliders' => $sliders,
            'abouts' => $abouts,
            'aboutDesc' => $aboutDesc,
            'project' => $project,
            'teacher' => $teacher,
            'address' => $address
        ]); 
    }
    public function courses(){
        return view("frontend_section.courses");
    }
    public function gallery(){
        return view("frontend_section.gallery");
    }
    public function project(){
        $courses = Course::whereNotIn('id', [2, 3, 4])->get();

        return view("frontend_section.project", ['courses' => $courses]);
    }
    public function event(){

        $events = DB::table('events')->paginate(3);

        return view("frontend_section.event", ['events' => $events]);
    }
    public function course(){
        return view("frontend_section.course");
    }

    public function projects(Request $request){
        $courses = Course::whereNotIn('id', [2, 3, 4])->get();
        return view("projects.wdd_proj", ['courses' => $courses]);
    }

    // public function datasend(Request $request){
    //     $tableData = $request->input('tableData');
    //     $tableDataJson = json_encode($tableData); 

    //     $token = md5(uniqid());
    //     Session::put('tableData_' . $token, $tableDataJson);

    //     // Return the token in the response
    //     return response()->json(['token' => $token]);
    // }



    // pos
    public function pos(){
        $courses = Course::all();

        return view('admin.POS.print_form', ['courses' => $courses]);
    } 

    public function invoice(Request $request){
        return view("admin.POS.invoice");
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

    public function insertData(Request $request)
    {
        try {

            if (!$request->has('tableData')) {
                return response()->json(['error' => 'tableData is missing in the request.'], 400);
            }
    
            $validatedData = $request->validate([
                'studentNames' => 'required|array',
                'classStartDate' => 'required|date|date_format:Y-m-d',
                'className' => 'required|string',
                'classid' => 'required|string',
                'classPrice' => 'required|numeric',
                'totalPrice' => 'required|numeric',
                'discount' => 'required|numeric',
                'subtotal' => 'required|numeric',
                'balance' => 'required|numeric',
                'voucher_no' => 'required|numeric',
                'status' => 'required',
            ]);
 
            Payment::create([
                'voucher_no' => $validatedData['voucher_no'],
                'total_amu' => $validatedData['totalPrice'],
                'discount' => $validatedData['discount'],
                'balance' => $validatedData['balance'],
                'paid' => $validatedData['subtotal'],
                'vou_date' => now(),
                'status' => $validatedData['status'],
            ]);
           
            $tableData = $request->input('tableData');

            $voucherDataTableData = [];
            foreach ($tableData as $row) {
                $voucherDataTableData[] = [
                    'voucher_no' => $validatedData['voucher_no'],
                    'stu_name' => $row['studentName'],
                    'course_id' => $row['classid'],
                    'enroll_date' => $row['classStartDate'],
                    'fees' => $row['classPrice'],
                    'vou_date' => now(),
                ];
            }
            Voucher::insert($voucherDataTableData);
    
            return response()->json(['message' => 'Data inserted successfully']);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Error inserting data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    // 


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

    public function income_list(){
        $payment = Payment::paginate(10);
        return view('admin.POS.income_list', ['payment' => $payment]);
    }

    // public function final_pay(){
    //     return view('admin.POS.final_pay');
    // }

    public function final_pay(Request $request){
        $voucherNo = $request->input('voucher_no');

        $payment = Payment::where('voucher_no', $voucherNo)->first();

        if ($payment) {
            return view('admin.POS.final_pay', ['payment' => $payment]);
        } else {
            return view('admin.POS.final_pay')->with('error', 'Payment not found for Voucher No: ' . $voucherNo);
        }
    }

    public function process_final_pay(Request $request)
    {
        $status = $request->input('status');
        $vou_no = $request->input('vou_no');
        $f_paid = $request->input('f_paid');
        $vou_date = now()->toDateTimeString();

        finalPay::create([
            'vou_no' => $vou_no,
            'f_paid' => $f_paid,
            'vou_date' => $vou_date,
        ]);

        DB::table('payment')->where('voucher_no', $vou_no)->update(['status' => $status]);
        Session::flash('success', 'Paid Successfully');
        Session::flash('voucher_no', $vou_no);
        return redirect()->route('final_pay_print', ['voucher_no' => $vou_no]);

        // return view('admin.POS.final_pay');
    }


    public function final_pay_print(Request $request, $voucherNo){
        $payment = Payment::where('voucher_no', $voucherNo)->get();
        $voucher = voucher::where('voucher_no', $voucherNo)->get();

        return view('admin.POS.final_pay_print', [
            'voucherNo' => $voucherNo,
            'payment' => $payment,
            'voucher' => $voucher,
        ]);

        return view('admin.POS.final_pay_print', ['voucherNo' => $voucherNo]);
    }

}

    
