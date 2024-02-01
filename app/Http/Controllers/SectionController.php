<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Rules\UniqueTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    // direct create page 
    public function createPage(){
        return view('admin.section.create');
    }

    // create section
    public function create(Request $request){
        $validatedData = $this->validation($request);
        // dd($validatedData);
        Section::create($validatedData);
        return redirect()->route('admin.section')->with(['success' => 'Created new section successfully!']);
    }

    // edit section 
    public function edit($id){
        $data = Section::where('id', $id)->first();
        return view('admin.section.edit', compact('data'));
    }

    // update section
    public function update(Request $request){
        $validatedData = $this->validation($request);
        return redirect()->route('admin.section')->with(['success' => 'Updated section ' . $validatedData->name . ' successfully!']);
    }

    // delete section
    public function delete($id){
        $section = Section::where('id', $id)->first();
        // dd($section->toArray());
        Section::where('id', $id)->delete();
        return redirect()->route('admin.section')->with(['success'=> 'Deleted section ' . $section->name . " successfully!"]);
    }


    // validation 
    private function validation($request){
        return $validatedData = $request->validate([
            //'name' => 'required|string|max:255|unique:sections,name,'.$request->id,
            'name' => 'required|string|max:255'.$request->id,
            'start' => [
                'required',
                'date_format:H:i',
                new UniqueTime($request), // Pass the request data to the rule
            ],
            'end' => 'required|date_format:H:i|after:start',
        ]);
    }


}
