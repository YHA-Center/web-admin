<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Rules\UniqueTime;
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
            'name' => 'required|string|max:255',
            'start' => [
                'required',
                'date_format:H:i',
                new UniqueTime($request), // Pass the request data to the rule
            ],
            'end' => 'required|date_format:H:i|after:start',
        ]);
        // dd($validatedData);
        Section::create($validatedData);
        return redirect()->route('admin.section')->with(['success' => 'Created new section successfully!']);
    }


}
