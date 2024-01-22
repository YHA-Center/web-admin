<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrinterController extends Controller
{
    public function invoice(Request $request)
    { 
        return view('invoice');
    }



    public function print_form(Request $request)
    {
        return view('print_form');
    }

    public function datasend(Request $request){
        $tableData = $request->input('tableData');
        $tableDataJson = json_encode($tableData);

        $token = md5(uniqid());
        Session::put('tableData_' . $token, $tableDataJson);

        // Return the token in the response
        return response()->json(['token' => $token]);
    }

    public function prnpriview(){
        return view('invoice');
    }
}
