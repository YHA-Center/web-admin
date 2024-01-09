<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // direct create page 
    public function createPage(){
        return view('admin.section.create');
    }

    // create section
    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start_time',
        ]);
        // dd($validatedData);
        Section::create($validatedData);
        return redirect()->route('admin.section')->with(['success' => 'Created new section successfully!']);
    }


}
